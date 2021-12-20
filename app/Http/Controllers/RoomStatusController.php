<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomStatusRequest;
use App\Http\Requests\UpdateRoomStatusRequest;
use App\Models\Room;
use App\Models\RoomCategories;
use App\Models\RoomStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomStatusController extends Controller
{
    protected $roomStatus;

    public function __construct(RoomStatus $roomStatus)
    {
        $this->roomStatus = $roomStatus;
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roomCategories = RoomCategories::all();
        $rooms = Room::all();
        $roomStatus = $this->roomStatus->search($request->all());
        return view('AdminPage.room_statuses.index', compact('roomStatus', 'rooms', 'roomCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $status = RoomStatus::all();
        return view('AdminPage.room_statuses.create', compact('rooms', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateRoomStatusRequest $request)
    {
        $this->roomStatus->saveStatus($request);
        return redirect(route('status.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(RoomStatus $roomStatus)
    {
        return view('AdminPage.room_statuses.show')->with([
            'roomStatus' => $roomStatus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomStatus $roomStatus)
    {
        $rooms = Room::all();
        return view("AdminPage.room_statuses.edit")->with([
            'roomStatus' => $roomStatus,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomStatus $roomStatus)
    {
        $this->validate($request, [
            'time' => [
                'required',
                'date_format:"Y-m-d"',
                //Rule::unique('room_statuses')->ignore($roomStatus),
            ],
            'status' => 'required'
        ]);

        $roomStatus->time = $request->time;
        $roomStatus->status = $request->status;
        $roomStatus->room_id = $request->room_id;
        $roomStatus->save();

        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomStatus $roomStatus)
    {
        $roomStatus->delete();
        return redirect()->route('status.index');
    }
}

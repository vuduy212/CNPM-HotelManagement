<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use App\Models\RoomCategories;
use App\Models\RoomStatus;
use App\Rules\StrLengthRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    protected $rooms;

    public function __construct(Room $rooms)
    {
        $this->rooms = $rooms;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = $this->rooms->search($request->all());
        $roomCategories = RoomCategories::all();
        return view('AdminPage.rooms.index', compact('rooms', 'roomCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $roomCategories = RoomCategories::all();
        return view('AdminPage.rooms.create', compact('rooms', 'roomCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomRequest $request)
    {
        $this->rooms->saveRoom($request);
        return redirect(route('rooms.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('AdminPage.rooms.show')->with([
            'room' => $room,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $roomCategories = RoomCategories::all();
        return view("AdminPage.rooms.edit")->with([
            'roomCategories' => $roomCategories,
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $this->validate($request, [
            'room_name' => [
                'required',
                'alpha_dash',
                Rule::unique('rooms')->ignore($room),
                new StrLengthRule()
            ],
            'description' => 'required|min:6|max:255',
        ]);

        $room->room_name = $request->room_name;
        $room->category_id = $request->category_id;
        $room->description = $request->description;
        $room->save();

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}

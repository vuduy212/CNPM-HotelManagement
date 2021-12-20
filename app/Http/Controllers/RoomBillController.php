<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomBillRequest;
use App\Http\Requests\UpdateRoomBillRequest;
use App\Models\RoomBill;
use App\Models\RoomCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomBillController extends Controller
{
    protected $bills;

    public function __construct(RoomBill $bills)
    {
        $this->bills = $bills;
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bills = $this->bills->search($request->all());
        $roomCategories = RoomCategories::all();
        return view('AdminPage.room_bills.index', compact('bills', 'roomCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bills = RoomBill::all();
        $roomCategories = RoomCategories::all();
        return view('AdminPage.room_bills.create', compact('bills', 'roomCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomBillRequest $request)
    {
        $this->bills->saveBill($request);
        return view("AdminPage.room_bills.success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomBill  $roomBill
     * @return \Illuminate\Http\Response
     */
    public function show(RoomBill $roomBill)
    {
        return view("AdminPage.room_bills.show", compact('roomBill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomBill  $roomBill
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomBill $roomBill)
    {
        return view("AdminPage.room_bills.edit", compact('roomBill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomBill  $roomBill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomBillRequest $request, RoomBill $roomBill)
    {
        $roomBill->bill_status = $request->bill_status;
        $roomBill->payment = $request->payment;
        $roomBill->date_start = Carbon::parse($request->date_start)->format('Y-m-d');
        $roomBill->date_finish = Carbon::parse($request->date_finish)->format('Y-m-d');
        $roomBill->save();

        return redirect()->route('bills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomBill  $roomBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomBill $roomBill)
    {
        $roomBill->delete();
        return redirect()->route('bills.index');
    }
}

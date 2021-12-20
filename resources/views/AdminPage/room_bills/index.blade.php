@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <h1 class="mt-4">Room Orders Management</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Welcome to Room Orders Management !!</li>
            </ol>
            <div class="card">
                <form action="{{ route("bills.index") }}" method="GET" class="md-3 d-flex">
                    
                    <select name="filter_status">
                        <option value="">Filter by Status</option>
                        <option name="bill_status" value="0" {{ request('filter_status') == '0' ? "selected":"" }}>Unconfirmed</option>
                        <option name="bill_status" value="1" {{ request('filter_status') == '1' ? "selected":"" }}>Confirmed</option>
                        <option name="bill_status" value="2" {{ request('filter_status') == '2' ? "selected":"" }}>Paid</option>
                        <option name="bill_status" value="3" {{ request('filter_status') == '3' ? "selected":"" }}>Cancelled</option>
                    </select>

                    <input type="text" class="form-control" placeholder="Enter phonenumber..." name="key" value="{{ request('key') }}">
                    <input type="date" class="form-control" placeholder="Enter date start..." name="filter_date_start" value="{{ request('date_start') }}">
                    <input type="date" class="form-control" placeholder="Enter date finish..." name="filter_date_finish" value="{{ request('date_end') }}">
                    <input type="text" class="form-control" placeholder="Enter number per page" name="number" value="{{ request('number') }}">

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <div class="card-body">

                    <table class="table">

                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date start</th>
                            <th scope="col">Date finish</th>
                            <th scope="col">Client's name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Time order</th>
                            <th scope="col">Status</th>
                            @receptionist
                            <th scope="col">Actions</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                            <tr>
                                <th scope="row">{{$bill->id}}</th>
                                <td>
                                    @foreach ($roomCategories as $category)
                                        @if($bill->category_id == $category->id) {{$category->category_name}} @endif
                                    @endforeach
                                </td>
                                <td>{{$bill->date_start}}</td>
                                <td>{{$bill->date_finish}}</td>
                                <td>{{$bill->client_name}}</td>
                                <td>{{$bill->phone}}</td>
                                <td>{{$bill->email}}</td>
                                <td>
                                    @if($bill->payment == '0') Cash
                                    @else Bank Card
                                    @endif
                                </td>
                                <td>{{$bill->created_at}}</td>
                                <td>
                                    @if($bill->bill_status == '0') Unconfirmed
                                    @elseif($bill->bill_status == '1') Confirmed
                                    @elseif($bill->bill_status == '2') Paid
                                    @else Cancelled
                                    @endif
                                </td>
                                @receptionist
                                <td>
                                    {{-- <a href="{{ route('bills.show', $bill->id) }}"><button type="button" class="btn btn-success">DETAIL</button></a> --}}
                                    <a href="{{ route('bills.edit', $bill->id) }}"><button type="button" class="btn btn-warning">EDIT</button>
                                    <form action="{{ route('bills.destroy', $bill) }}" method="POST" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                                @endif
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$bills->appends(request()->only('key','number','filter_status','phone','date_start','date_finish'))->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

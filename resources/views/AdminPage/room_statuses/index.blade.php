@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <h1 class="mt-4">Room's Status Management</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Welcome to Room's Status Management !!</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    @receptionist
                    <a href="{{ route('status.create') }}" class="btn btn-primary">Create New Room's Status</a>
                    @endif
                </div>

                <form action="{{ route("status.index") }}" method="GET" class="md-3 d-flex">
                    <select name="room_id" class="form-select form-select-sm">
                        <option value="">Filter by Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" {{ request('room_id') == $room->id ? "selected":"" }}> Room {{ $room->room_name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <select name="filter_status" class="form-select form-select-sm">
                        <option value="">Filter by Status</option>
                        <option name="status" value="0" {{ request('filter_status') == '0' ? "selected":"" }}>Empty</option>
                        <option name="status" value="1" {{ request('filter_status') == '1' ? "selected":"" }}>Used</option>
                    </select>
                    <br>
                    <input type="date" class="form-control" placeholder="Enter time" name="key" value="{{ request('key') }}">
                    <br>
                    <input type="text" class="form-control" placeholder="Enter number per page" name="number" value="{{ request('number') }}">
                    <br>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Room's Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Time</th>
                            @receptionist
                            <th scope="col">Actions</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roomStatus as $status)
                            <tr>
                                <th scope="row">{{$status->id}}</th>
                                <td>
                                    @foreach ($rooms as $room)
                                        @if($status->room_id == $room->id) {{$room->room_name}} @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if($status->status == '0') Empty
                                    @else Used
                                    @endif
                                </td>
                                <td>{{$status->time}}</td>
                                @receptionist
                                <td>
                                    <a href="{{ route('status.show', $status->id) }}"><button type="button" class="btn btn-success">DETAIL</button></a>
                                    <a href="{{ route('status.edit', $status->id) }}"><button type="button" class="btn btn-warning">EDIT</button>
                                    <form action="{{ route('status.destroy', $status) }}" method="POST" class="float-left">
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
                      {{$roomStatus->appends(request()->only('key','number','filter_status','room_id'))->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

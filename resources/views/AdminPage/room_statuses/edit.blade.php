@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Room Status {{$roomStatus->id}}</div>

                <div class="card-body">
                    <form action="{{ route('status.update', $roomStatus) }}" method="POST">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Time</label>

                            <div class="col-md-6">
                                <input id="time" name="time" value="{{ $roomStatus->time }}" type="date" class="form-control @error('time') is-invalid @enderror" >
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Select Room</label>
                            <div class="col-md-6">
                                <select name="room_id" class="form-select form-select-sm">
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}"
                                        @if($room->id == $roomStatus->room_id) selected @endif> Room {{ $room->room_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="radio" name="status" value="0" @if($roomStatus->status == 0) checked @endif>
                                    <label for="">Empty</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="1" @if($roomStatus->status == 1) checked @endif>
                                    <label for="">Used</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

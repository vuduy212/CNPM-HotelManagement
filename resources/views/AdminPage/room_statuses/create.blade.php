@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('status.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Room</label>
                            <div class="col-md-6">
                                @foreach ($rooms as $room)
                                    <div class="form-check">
                                        <input type="radio" name="room_name" value="{{ $room->room_name }}">
                                        <label for="">{{ $room->room_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="radio" name="status" value="0">
                                    <label for="">Empty</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="1">
                                    <label for="">Fill</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>
                            <div class="col-md-6">
                                <input id="time" name="time" type="text" class="form-control {{-- @error('time') is-invalid @enderror --}}" >
                                {{-- @error('time') --}}
                                    {{-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> --}}
                                {{-- @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

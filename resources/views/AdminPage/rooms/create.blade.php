@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Room') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rooms.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Room Name') }}</label>
                            <div class="col-md-6">
                                <input id="room_name" value="{{ old('room_name') }}" name="room_name" type="text" class="form-control @error('room_name') is-invalid @enderror" >
                                @error('room_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input id="description" value="{{ old('description') }}" name="description" type="text" class="form-control @error('description') is-invalid @enderror" >
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Room Category') }}</label>
                            <div class="col-md-6">
                                @foreach ($roomCategories as $category)
                                    <div class="form-check">
                                        <input type="radio" name="category_id" id="category_name" value="{{ $category->id }}"
                                        @if($category->id == 1) checked @endif>
                                        <label for="">{{ $category->category_name }}</label>
                                    </div>
                                @endforeach
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

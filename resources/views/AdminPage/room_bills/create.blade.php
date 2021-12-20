@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mt-4">Room Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Welcome to Room Order !!</li>
            </ol>
            <div class="card">
                <div class="card-header">{{ __('Order') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bills.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Select Room Category</label>
                            <div class="col-md-6">
                                <select name="category_id" class="form-select form-select-sm">
                                    @foreach ($roomCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Date Start* (dd-mm-YYYY)</label>
                            <div class="col-md-6">
                                <input id="date_start" value="{{ old('date_start') }}" name="date_start" type="date" class="form-control @error('date_start') is-invalid @enderror" >
                                @error('date_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Date Finish* (dd-mm-YYYY)</label>
                            <div class="col-md-6">
                                <input id="date_finish" value="{{ old('date_finish') }}" name="date_finish" type="date" class="form-control @error('date_finish') is-invalid @enderror" >
                                @error('date_finish')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name*</label>
                            <div class="col-md-6">
                                <input id="client_name" value="{{ old('client_name') }}" name="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" >
                                @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">CMND*</label>
                            <div class="col-md-6">
                                <input id="CMND" value="{{ old('CMND') }}" name="CMND" type="text" class="form-control @error('CMND') is-invalid @enderror" >
                                @error('CMND')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Phone number*</label>
                            <div class="col-md-6">
                                <input id="phone" value="{{ old('phone') }}" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" value="{{ old('email') }}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Payment method</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="radio" name="payment" value="0" checked>
                                    <label for="">Cash</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="payment" value="1">
                                    <label for="">Bank Card</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Order
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

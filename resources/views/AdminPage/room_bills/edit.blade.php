@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Order of {{$roomBill->client_name}} - {{$roomBill->phone}} - {{$roomBill->email}}</div>

                <div class="card-body">
                    <form action="{{ route('bills.update', $roomBill) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Date Start') }}</label>
                            <div class="col-md-6">
                                <input id="date_start" name="date_start" value="{{ $roomBill->date_start }}" type="date" class="form-control @error('date_start') is-invalid @enderror" >
                                @error('date_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Date Finish') }}</label>
                            <div class="col-md-6">
                                <input id="date_finish" name="date_finish" value="{{ $roomBill->date_finish }}" type="date" class="form-control @error('date_finish') is-invalid @enderror" >
                                @error('date_finish')
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
                                    <input type="radio" name="payment" value="0" @if($roomBill->payment == 0) checked @endif>
                                    <label for="">Cash</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="payment" value="1" @if($roomBill->payment == 1) checked @endif>
                                    <label for="">Bank Card</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="radio" name="bill_status" value="0" @if($roomBill->bill_status == 0) checked @endif>
                                    <label for="">Unconfirmed</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="bill_status" value="1" @if($roomBill->bill_status == 1) checked @endif>
                                    <label for="">Confirmed</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="bill_status" value="2" @if($roomBill->bill_status == 2) checked @endif>
                                    <label for="">Paid</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="bill_status" value="3" @if($roomBill->bill_status == 3) checked @endif>
                                    <label for="">Cancelled</label>
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

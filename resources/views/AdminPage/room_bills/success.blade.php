@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Success') }}</div>

                <div class="card-body">
                    {{ __('The reservation is successful ! Please wait for the receptionist to contact you to confirm !') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

@section('title')Index @endsection

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="p-4 rounded-4 shadow-sm border bg-light">
                <h5 class="mb-3">Vacation Balance</h5>
                <div class="row">
                    <div class="col-6">
                        <p class="mb-1 text-muted">Remaining Days</p>
                        <h4 class="fw-bold">{{ $Total_balance }}</h4>
                    </div>
                    <div class="col-6">
                        <p class="mb-1 text-muted">Total Balance</p>
                        <h4 class="fw-bold">{{ $Balance_Amount }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 rounded-4 shadow-sm border bg-light">
                <h5 class="mb-3">Latest Vacation Request</h5>
                <p>No vacation requests found</p>
            </div>
        </div>
    </div>
</div>

@endsection
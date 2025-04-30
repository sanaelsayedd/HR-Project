@extends('layouts.app')

@section('title', 'Permission Request')

@section('content')
    @auth
    <div class="container mt-4">
        <h2 class="mb-4">Permission Request</h2>

        @if(session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('Users.permission.store') }}">
            @csrf

            <div class="mb-3">
                <label for="permission_reason" class="form-label">What is your permission</label>
                <textarea class="form-control @error('Comments') is-invalid @enderror" 
                          name="Comments" 
                          id="permission_reason" 
                          rows="3" 
                          required>{{ old('Comments') }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" 
                       class="form-control @error('Start_Date') is-invalid @enderror" 
                       name="Start_Date" 
                       id="start_date" 
                       value="{{ old('Start_Date') }}"
                       min="{{ date('Y-m-d') }}"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" 
                       class="form-control @error('End_Date') is-invalid @enderror" 
                       name="End_Date" 
                       id="end_date" 
                       value="{{ old('End_Date') }}"
                       min="{{ date('Y-m-d') }}"
                       required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit Request</button>
            </div>
        </form>
    </div>
    @else
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">Access Denied</div>
                    <div class="card-body">
                        <p>Please <a href="{{ route('login') }}">login</a> to request a permission.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection

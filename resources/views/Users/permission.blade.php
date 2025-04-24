@extends('layouts.app')

@section('title')Permissions @endsection

@section('content')

@auth
<div class="container">
    <h1>Permission Request</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('Users.permission') }}">
        @csrf

        <div class="mb-3">
            <label for="permission_reason" class="form-label">What is your permission</label>
            <textarea class="form-control @error('Comments') is-invalid @enderror" 
                    name="Comments" 
                    id="permission_reason" 
                    rows="3" 
                    required>{{ old('Comments') }}</textarea>
      

        <div class="col-md-6">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" 
                   class="form-control @error('Start_Date') is-invalid @enderror" 
                   name="Start_Date" 
                   id="start_date" 
                   value="{{ old('Start_Date') }}"
                   min="{{ date('Y-m-d') }}"
                   required>
         
        </div>

        <div class="col-md-6">
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Access Denied</div>
                <div class="card-body">
                    <p>Please <a href="{{ route('login') }}">login</a> to view this page.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth

@endsection

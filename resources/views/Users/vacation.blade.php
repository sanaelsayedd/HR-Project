@extends('layouts.app')

@section('title')Vacation Request @endsection

@section('content')
@section('header')
    <h2>Vacation Request</h2>
@endsection

<div class="container">
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

    <form class="row g-3" method="POST" action="{{ route('store.vacation') }}" id="vacationForm">
        @csrf

        <div class="col-12 mb-3">
            <label for="comments" class="form-label">Vacation Reason</label>
            <textarea class="form-control 
            @error('comments') is-invalid @enderror" 
                    name="comments" 
                    id="comments" 
                    rows="3" 
                    required>{{ old('comments') }}</textarea>
            @error('comments')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" 
                   class="form-control @error('start_date') is-invalid @enderror" 
                   name="start_date" 
                   id="start_date" 
                   value="{{ old('start_date') }}"
                   min="{{ date('Y-m-d') }}"
                   required>
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="end_date" class="form-label">End Date:</label>
            <input type="date" 
                   class="form-control @error('end_date') is-invalid @enderror" 
                   name="end_date" 
                   id="end_date" 
                   value="{{ old('end_date') }}"
                   min="{{ date('Y-m-d') }}"
                   required>
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </div>
    </form>
</div>

<script>
document.getElementById('vacationForm').addEventListener('submit', function(e) {
    const startDate = new Date(document.getElementById('start_date').value);
    const endDate = new Date(document.getElementById('end_date').value);
    
    if (endDate < startDate) {
        e.preventDefault();
        alert('End date cannot be earlier than start date');
    }
});
</script>

@endsection
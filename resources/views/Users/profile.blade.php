@extends('layouts.app')

@section('content')

@section('title')Vacation @endsection
<div class="m-4 col-sm-6">
    <table class="table table-striped">
        <tr>
            <th>Name</th><td>Name</td>
        </tr>
        <tr>
            <th>Email</th><td>email@gmail.com</td>
        </tr>
        <tr>
            <th>Vacations</th><td>2</td>
        </tr>
        <tr>
            <th>permissions</th><td>0</td>
        </tr>

        <tr>
            <th>Roles</th>
            <td>
               
                <span class="badge bg-primary">Employee</span>
            </td>
        </tr>

        <tr>
            <th>Department</th>
            <td>
               
                <span class="badge bg-success">Transportation</span>
            </td>
        </tr>

        <tr>
            <th>Job Title</th>
            <td>
               
                <span class="badge bg-primary">RPA Developer</span>
            </td>
        </tr>
    </table>
@endsection
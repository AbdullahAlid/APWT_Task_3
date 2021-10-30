@extends('layouts.app')
@section('content')
@if (session()->has('admin'))
<table align="center"class="table table-bordered">
    <tr>
        <td>Name</td>
        <td>Username</td>
        <td>Password</td>
        <td>Email</td>
        <td>Dob</td>
        <td>Age</td>
    </tr>
    @foreach ($users as $u)
    <tr>
        <td>{{$u->name}}</td>
        <td>{{$u->username}}</td>
        <td>{{$u->password}}</td>
        <td>{{$u->email}}</td>
        <td>{{$u->dob}}</td>
        <td>{{$u->age}}</td> 
        <td><a href="/admin/edit/{{$u->id}}">Edit</a></td>
    </tr>    
    @endforeach
    
</table>
@else
    {{"authorization needed"}}
@endif
@endsection
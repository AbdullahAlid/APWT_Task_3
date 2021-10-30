@extends('layouts.app')
@section('content')
@if (session()->has('user'))
<table align="center">
        
    <tr>
        <td align="right">Name:</td>
        <td>{{$user->name}}</td><td>
       
    </tr>
    
    <tr>
        <td align="right">Email:</td>
        <td>{{$user->email}}</td><td>
        
    </tr>
    <tr>
        <td align="right">Dob:</td>
        <td>{{$user->dob}}</td><td>
       
    </tr>
    <tr>
        <td align="right">Age:</td>
        <td>{{$user->age}}</td><td>
        
    </tr>
</table>
@else
    {{"authorization needed"}}
@endif
    
@endsection
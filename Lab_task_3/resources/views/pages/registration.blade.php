@extends('layouts.app')
@section('content')
    <table align="center">
        <form action="/registration" method="post">
            {{ csrf_field() }}
            <tr>
                <td align="right">Name</td>
                <td><input type="text" name="name" value="{{old('name')}}"></td><td>
                @if ($errors->has('name'))
                    <strong>{{$errors->first('name')}}</strong>
                @endif</td>
            </tr>
            <tr>
                <td align="right">Username</td>
                <td><input type="text" name="uname" value="{{old('uname')}}"></td>
                <td>
                @if ($errors->has('uname'))
                    <strong>{{$errors->first('uname')}}</strong>
                @endif</td>
            </tr>
            <tr>
                <td align="right">Password</td>
                <td><input type="password" name="password" value="{{old('password')}}"></td><td>
                @if ($errors->has('password'))
                    <strong>{{$errors->first('password')}}</strong>
                @endif</td>
            </tr>
            <tr>
                <td align="right">Email</td>
                <td><input type="text" name="email" value="{{old('email')}}"></td><td>
                @if ($errors->has('email'))
                    <strong>{{$errors->first('email')}}</strong>
                @endif</td>
            </tr>
            <tr>
                <td align="right">Dob</td>
                <td><input type="date" name="dob" value="{{old('dob')}}"></td><td>
                @if ($errors->has('dob'))
                    <strong>{{$errors->first('dob')}}</strong>
                @endif</td>
            </tr>
            <tr>
                <td align="right">Age</td>
                <td><input type="text" name="age" value="{{old('age')}}"></td><td>
                @if ($errors->has('age'))
                    <strong>{{$errors->first('age')}}</strong>
                @endif</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register"></td> 
            </tr>

        </form>
    </table>
@endsection
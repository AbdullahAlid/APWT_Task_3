@extends('layouts.app')
@section('content')
    <table align="center">
        <form action="/login" method="post">
            {{ csrf_field() }}
            <tr>
                <td><input type="text" name="uname" placeholder="Username"></td>
            </tr>
            <tr>
                <td><input type="password" name="pass" placeholder="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="login"></td>
            </tr>
            <tr>
                <td><a href="/registration">Create new Account. </a></td>
            </tr>

        </form>
    </table>
@endsection

<a href="{{route('login')}}">Login</a>
<a href="{{route('Adminlogin')}}">AdminLogin</a>
<a href="{{route('userRegistration')}}">Registration</a>
@if (session()->has('user'))
<a href="{{route('logout')}}">Logout</a>
<a href="{{route('dashboard')}}">Dashboard</a>
@endif
@if (session()->has('admin'))
<a href="{{route('adminlogout')}}">AdminLogout</a>
<a href="{{route('userlist')}}">Userlist</a>
@endif

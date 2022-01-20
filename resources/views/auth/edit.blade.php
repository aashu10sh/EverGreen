<html>
<head>
    <title> EverGreen. | Edit Profile </title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
<div class="main-body">
    @if(session()->has('error'))
    <div class="error">
        <h2>{{session()->get('error')}}</h2>
    </div>
    @endif
    @if(isset($message))
        <h2>{{$message}}</h2>
        @endif

    <div class="login-page">
        <div class="form">
{{--            <form class="register-form">--}}
{{--                <input type="text" placeholder="name"/>--}}
{{--                <input type="password" placeholder="password"/>--}}
{{--                <input type="text" placeholder="email address"/>--}}
{{--                <button>create</button>--}}
{{--                <p class="message">Already registered? <a href="#">Sign In</a></p>--}}
{{--            </form>--}}
            <form class="login-form" method="POST" action="">
                @method('PUT')
                @csrf
                <input type="text" placeholder="Full Name" required name="new_name" value="{{$user->name}}">
                <input type="text" placeholder="Username" name="new_username" value="{{$user->username}}" />
                <input type="text" placeholder="Phone Number" required name="new_phonenumber" value="{{$user->phonenumber}}">
                <input type="text" placeholder="Email" required name="new_email" value="{{$user->email}}">
                <input type="password" placeholder="Old Password" name="old_password"/>
                <input type="password" placeholder="New Password" name="new_password"/>
                <button>login</button>
                <p class="message">Already Registered ? <a href="/login">Login</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>

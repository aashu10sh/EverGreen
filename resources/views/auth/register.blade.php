<html>
<head>
    <title> EverGreen. | Register </title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
<div class="main-body">
    @if(isset($error))
        @foreach($error->all() as $error)
    <div class="error">
        <h2>{{$error}}</h2>
    </div>
        @endforeach
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
            <form class="login-form" method="POST" action="/register">
                @csrf
                <input type="text" placeholder="Full Name" required name="name">
                <input type="text" placeholder="Username" name="username"/>
                <input type="text" placeholder="Phone Number" required name="phonenumber">
                <input type="text" placeholder="Email" required name="email">
                <input type="password" placeholder="Password" name="password"/>
                <button>Register</button>
                <p class="message">Already Registered ? <a href="/login">Login</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>

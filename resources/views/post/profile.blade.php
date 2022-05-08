<html>
<head>
    <title>{{" $user->username | EverGreen."}}</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body>
	<div class="username-container__main">
		<h2 class="username-main__main">{{$user->username}}</h2>
		<br>
		<br>
		<div class="name-profile__container">
			<h3 class="name-profile__main">{{$user->name }}</h3>
		</div>
	</div>
<h4 class='poster__username'>{{"$user->username's Posts:"}}</h4>
@foreach($posts as $post)
    <div  class='__post'>
        <a href="/post/{{$post->id}}">
            {{$post->title}}
        </a>
    </div>
@endforeach
</body>

</html>

<html>
<head>
    <title>{{" $user->username | EverGreen."}}</title>
</head>

<body>
<h2>{{$user->username}}</h2>
<h3>{{$user->name }}</h3>
<h4>{{"$user->username's Posts:"}}</h4>
@foreach($posts as $post)
    <div style="margin:10px;">
        <a href="/post/{{$post->id}}">
            {{$post->title}}
        </a>
    </div>
@endforeach
</body>

</html>

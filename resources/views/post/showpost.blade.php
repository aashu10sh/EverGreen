<DOCTYPE html>
<html>
<head>
    <title>{{$post->title}} | EverGreen.</title>
</head>
<body>
<div>
    <h1>{{" $post->title "}}</h1>
    <div>
        <span> Posted BY :: <span><a href="{{"/@$user->username"}}">{{$user->username}}</a> </span> {{$post->created_at}}</span>
        <p>
            {{  $post->content }}
        </p>
    </div>
</div>
</body>
</html>

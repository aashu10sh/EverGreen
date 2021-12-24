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
        <img src="{{asset('storage/images')."/".$post->image_path}}" style="width: 350px;height: 350px">
    </div>
</div>
</body>
</html>

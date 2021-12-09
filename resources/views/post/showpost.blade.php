<DOCTYPE html>
<html>
<head>
    <title>{{$post->title}} | EverGreen.</title>
</head>
<body>
<div>
    <h1>{{" $post->title "}}</h1>
    <div>
        <span>{{ " Posted BY :: $user->username  $post->created_at" }}</span>
        <p>
            {{  $post->content }}
        </p>
    </div>
</div>
</body>
</html>

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
        {{-- <div> --}}
        @if($user->id == session()->get('user')->id)
            <div>
        		<section>
        			<div>
        				<button onclick="editpost()">Edit Post</button>
        				<form method="POST" action="/post/delete">
        					<input type="hidden" name="to_delete" value="{{$post->id}}">
        					@method('DELETE')
        					@csrf
        					<button type="submit">Delete</button>
        				</form>
        			</div>
        		</section>
        	</div>
        @endif
        
    </div>
</div>
</body>
</html>

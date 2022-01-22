<DOCTYPE html>
<html>
<head>
    <title>{{$post->title}} | EverGreen.</title>
</head>
<body>
<div>
    @if(session()->has('message'))
        <h2>{{session()->get('message')}}</h2>
    @endif
    <h1>{{" $post->title "}}</h1>
    <div>
        <span> Posted BY :: <span><a href="{{"/@$user->username"}}">{{$user->username}}</a> </span> {{$post->created_at}}</span>
        <p>
            {{  $post->content }}
        </p>
        <img src="{{asset('storage/images')."/".$post->image_path}}" style="width: 350px;height: 350px">
        {{-- <div> --}}
        @if($user->id == session()->get('user')->id)
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
        @endif
        <section class='comment-section' >
            <h3>All Comments</h3>
            <section class="comments">
                @foreach($post->comments as $comment)
                    <div>
                        <h4>{{$comment->user->username}}</h4>
                        {{$comment->comment}}
                        <span >:::::{{$comment->created_at}}</span>
                    </div>
                @endforeach
            </section>
            <form method="POST" action="/create/comment/{{$post->id}}">
                @csrf
                <input type="textarea" name="comment">
                <button type="submit">Post Comment</button>
            </form>

        </section>

    </div>
</div>
</body>
</html>

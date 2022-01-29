<DOCTYPE html>
<html>
<head>
    <title>{{$post->title}} | EverGreen.</title>
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
</head>
<body>
<div>
    @if(session()->has('message'))
        <h2>{{session()->get('message')}}</h2>
    @endif
    <div class="title-container">
        <h1 class="title">{{" $post->title "}}</h1>
    </div>
    <div class="posted-by-container">
        <span class="posted-by-span"> Posted By  <span><a href="{{"/@$user->username"}}">{{$user->username}}</a> on </span> {{$post->created_at}}</span>
        <div class="content-container">
            <p class="content-p">
            {{  $post->content }}
            </p>
        </div>
        <img src="{{asset('storage/images')."/".$post->image_path}}"  class="post-image"  style="">
        {{-- <div> --}}
        @if($user->id == session()->get('user')->id)
        		<section class="edit-delete-section">
        			<div>
        				<button class="edit-button" onclick="editpost()">Edit Post</button>
                        <br>
        				<form method="POST" action="/post/delete">
        					<input type="hidden" name="to_delete" value="{{$post->id}}">
        					@method('DELETE')
        					@csrf
        					<button type="submit" class="delete-button">Delete</button>
        				</form>
        			</div>
        		</section>
        @endif
        <section class='comment-section' >
            <h3 class="all-comments-header">All Comments</h3>
            <section class="comments">
                @foreach($post->comments as $comment)
                    <div class="comment-container">
                        <h4 class="commented-by">{{$comment->user->username}}</h4>
                        <p class="comment-main">
                            {{$comment->comment}}
                            <span >::  {{$comment->created_at}}</span>
                        </p>
                    </div>
                @endforeach
            </section>
            <section class="post-section">
                <form method="POST" action="/create/comment/{{$post->id}}">
                    @csrf
                    <textarea class="text-comment" name="comment"></textarea>
                    <br>
                    <button type="submit">Post Comment</button>
                </form>
            </section>

        </section>
    </div>
</div>
</body>
</html>

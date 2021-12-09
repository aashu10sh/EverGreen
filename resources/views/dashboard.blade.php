<html lang="html">
<head><title>Dashboard</title></head>
<body style="background-color: green;">
<div >
	@if(session()->has('message'))
		<div>{{ session()->get('message') }}</div>
	@endif
    <h1 style="color:white;">THIS IS DASHBOARD</h1>
    <div>
        <a style="color:white;" href="/create"> Create a Post</a>
    </div>
        @foreach($posts as $post)
            <div style="background-color: white; vertical-align: center; margin-left: 30%;margin-right: 50%;border-radius: 1.2em; padding: 1em; margin: 1em 1em 1em 1em;">
                <h3 style="color:black;">{{ $post->title }}</h3>
                <a href="/post/{{$post->id}}">More Here</a>
            </div>
        @endforeach

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">LOGOUT</button>
    </form>

</div>
</body>
</html>

<html lang="html">
<head><title>Dashboard</title></head>
<body>
<div>
	@if(session()->has('message'))
		<div>{{ session()->get('message') }}</div>
	@endif
    <h1>THIS IS DASHBOARD</h1>
    <div>
        <a href="/create"> Create a Post</a>
    </div>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">LOGOUT</button>
    </form>

</div>
</body>
</html>

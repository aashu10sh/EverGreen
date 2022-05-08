<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | EverGreen.</title>
    <link rel='stylesheet' href="{{asset('css/dashboard.css')}}">
    <script src="{{asset('js/script.js')}}" defer></script>
    <link rel='stylesheet' href="{{asset('css/pop_up.css')}}">

</head>
<body>


    <section class="head" name="TOP">
        <h2 class='main-evergreen-title'>EverGreen.</h2>
        <div class="profile-div" id="add_dropdown">
        	<code style="color:white" class="username">{{$user}}</code>
            <button class="side-btn edit" id="pfp" onclick="window.location=`/profile/edit`">Edit Profile</button>
            {{-- <form method="POST" action="/logout"> --}}
                @csrf
                <button class="side-btn logout" type="submit" onclick="window.location=`/logout`">Logout</button>
            {{-- </form> --}}
        </div>
    </section>


    <div class=" create-container">
    	<!-- <button class="create-btn" onclick="window.location=`/create`">Create a Post</button> -->
        <button class='create-btn' onclick='openForm()' style="line-height: 20px;">Create a Post</button>
        <div class="form-popup" id="myForm">
            <form action="/create" method='POST' class="form-container" enctype='multipart/form-data'>
                <h1>Create a Post</h1>
                @csrf

                <label for="email"><b>Title</b></label>
                <input type="text" placeholder="Enter Title" name="title" required>

                <label for="psw"><b>Content</b></label>
                <textarea type="text" placeholder="Enter Content" name="content" required></textarea>

                <input type="file" name="image">

                <button type="submit" class="btn">Post</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
    </div>



    <section name="MIDDLE" class="posts-box">
        @foreach($posts as $post)
        <div name="main-posts-div" class="post-div">
            <h2 class='post-title'>{{$post->title}}</h5>
            <h3 class='posted-by'>Posted By : : <a href="{{"/@".$post->user->username}}">{{$post->user->username}}</a></h3>
            <button class='more-here' onclick="window.location=`/post/{{$post->id}}`"><a>More Here</a></button>
        </div>
        @endforeach
{{--         <div name="main-posts-div" class="post-div">
            <h2 class='post-title'>Why Compost is necessary</h5>
            <h3 class='posted-by'>Samir Baskota</h3>
            <button class='more-here' onclick="window.location=`https://google.com`"><a>More Here</a></button>
        </div> --}}
    </section>

</body>
</html>

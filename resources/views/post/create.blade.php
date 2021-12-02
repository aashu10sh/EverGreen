<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link src="{{ asset('css/create.css') }}">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <h1>Create a post</h1>

            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title <span class="require">*</span></label>
                    <input type="text" class="form-control" name="title" />
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control" name="content" ></textarea>
                </div>

                <div class="form-group">
                    <p><span class="require">*</span> - required fields</p>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                    <button class="btn btn-default" >
                        <a href="/dashboard">Cancel</a>
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

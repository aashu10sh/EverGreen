<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\PostModel;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.create');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        return json_encode($request->all());
        //
        $title = $request->input('title');
        $content = $request->input('content');
        $posted_by = $request->session()->get('user')->id;
        // $this->validate(['title'=>'required','content'=>'required' ])
        $data = ['title'=>$title,'content'=>$content,'posted_by'=>$posted_by,'likes'=>0];
        PostModel::create($data);
        $message = "Posted!";
        return redirect("/dashboard")->with("message", $message);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostModel::find($id);
        $user = $post->user;
        return view('post.showpost',compact('post','user'));

        //
    }
    public function profile(Request $request, $username)
    {
//        dd("THIS IS $username");
        $user = UserModel::all()->where("username", $username)->first();
        $posts = $user->posts;
        return view('post.profile', ["user" => $user, "posts" => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

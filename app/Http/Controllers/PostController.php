<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\PostModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;


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
         $validated = $request->validate(
             [
                 "title"=>'required|max:1000',
                 "content"=>'required|max:1000',
                  "image"=>'required|image|mimes:jpg,png,jpeg,gif,svg'
             ]);
        $imageM = $request->file("image");
        $imageM->getFilename();
        $img = Image::make($imageM);
        $imageName = time().'.'.$request->file("image")->getClientOriginalExtension();
//        $request->imageM->move(public_path('images'), $imageName
        $img-> save('storage/images/' .$imageName);
//        return json_encode($imageName);
        $title = $request->input('title');
        $content = $request->input('content');
        $posted_by = $request->session()->get('user')->id;
        // return json_encode($image);
//        $request->imageM->move(public_path('images'), $imageName);
        // $request->image->move(public_path('images'), $imageName);
        // $this->validate(['title'=>'required','content'=>'required' ])
        $data = ['title'=>$title,'content'=>$content,'posted_by'=>$posted_by,'likes'=>0,'image_path'=>$imageName];
        // dd($imageName);
        PostModel::create($data);
        $message = "Posted!";
        return redirect("/dashboard")->with("message", $message);



    }
    public function create_comment(Request $request ,$id)
    {
        $request->validate(['comment'=>'required|min:10|max:1000']);
        $comment = $request->comment;
        $commented_by = $request->session()->get('user')->id;
        $data = [
            'comment' =>$comment,
            'commented_by'=>$commented_by,
            'posted_on'=>$id
            ];
        CommentModel::create($data);
        return back()->with('message',"Comment Posted");

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
    public function update(Request $request)
    {

        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:user_models',
            'phonenumber'=>'required',
            'password'=>'required',
            'username'=>'required|unique:user_models'
        ]);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->input("to_delete"));
        $to_del_id = $request->to_delete;

        $post = PostModel::find($to_del_id);
        $post->delete();
        return redirect('/dashboard')->with('message',"Post Succesfully Deleted");

        //
    }
}

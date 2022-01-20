<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $this->register();
        //
    }

    public function dashboard(Request $request)
    {
        $posts = PostModel::all()->sortByDesc('id');
        $user = session()->get('user')->name;
        return view('dashboard',compact('posts','user'));
    }
    public function register()
    {
        return view('auth.register');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $uuser_name = $request->username;
        $ppassword = $request->password;
        $data = DB::table('user_models')->where('username',$uuser_name)->first();
        if ($data == null)
        {
            $errors = ["No Such User : ".$uuser_name];
            return view('auth.login',compact('errors'));
        }
        if ($data->username == $uuser_name && Hash::check($ppassword, $data->password))
        {
            $request->session()->put('user', $data);
            return redirect('/dashboard');
        }else{
            $errors = ["Incorrect Credentials"];
            return view('auth.login',compact('errors'));
        }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:user_models',
            'phonenumber'=>'required',
            'password'=>'required',
            'username'=>'required|unique:user_models'
        ]);
        $name = $request->input("name");
        $email = $request->input("email");
        $phonenumber = $request->phonenumber;
        $password = $request->password;
        $username = $request->input("username");
        $password = Hash::make($password);
        $data = [
            "name" => $name,
            "email" => $email,
            "phonenumber" => $phonenumber,
            "username" => $username,
            "password" => $password
        ];
        UserModel::create($data);
        $message = "User Registered";
        return view('auth.register',compact('message'));


        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id_for_db = $request->session()->get('user')->id;
        $user = UserModel::find($id_for_db);
        return view('auth.edit',compact('user'));
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
            'new_name'=>'required',
            'new_email'=>'required|email',
            'new_phonenumber'=>'required',
            'new_password'=>'required',
            'new_username'=>'required',
            'old_password'=>'required'
        ]);
//        dd($validated);

        $user_data = $request->session()->get('user');
        if (Hash::check($request->old_password,$user_data->password))
        {
            $data = [
                "name" => $request->new_name,
                "email" =>$request->new_email,
                "phonenumber"=>$request->new_phonenumber,
                "username"=>$request->new_username,
                "password"=>Hash::make($request->new_password)
                ];
            $old_data = UserModel::find($user_data->id);
            $old_data->update($data);
            $request->session()->put('user', $old_data);
            return redirect('/dashboard')->with("message","Succesfully Updated Data");
        }
        return redirect()->back()->with('error',"Old Password is Incorrect");
        dd($outp);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id == session()-get('user')->id)
        {

        }

        //
    }
}

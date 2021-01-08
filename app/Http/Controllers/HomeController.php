<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data= User::paginate(10);
        return view('home',['users'=>$data]);
    }
    public function addUser()
    {
        return view('/auth/signup');
    }

    function userSignup(Request $req){
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required','date'],
            'profession' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        if($req){
            $data = new User;
            $data->name=$req->name;
            $data->email=$req->email;
            $data->dob=$req->dob;
            $data->profession=$req->profession;
            $data['password']=Hash::make($req->password);
            $data->save();
            return redirect('home');
        }
       
    } 

    //to delete data
    function delete($id){
        $data = User::find($id);
        if(Auth::id() ==$id){
            return Redirect::back()->withErrors(['msg', 'You canoot delete this member.']);
        }
        else{
            $data ->delete();
            return redirect('home');
        }
    }

    //to get user data to update it
    function updateData($id){
        $data = User::find($id);
        return view('update',['data'=>$data]);
    }

    //to update data
    function updateUser(Request $req){
        $data = User::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->dob=$req->dob;
        $data->profession=$req->profession;
        $data->save();
        return redirect('home');
    }
}

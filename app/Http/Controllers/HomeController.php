<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Session; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    } 

    public function postLogin(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
        
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error" ,"login data are not validate" );
    }
   public function registration()
   {
    if(Auth::check()){
        return redirect(route('home'));
    }
       return view('registeration');
   }

   public function postRegistration(Request $request)
   {
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required'
        ]);

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $user=User::create($data);  

        if(!$user){
            return redirect(route('register'))->with("error" ,"registration failed . try again!!" );
        }
        return redirect(route('login'))->with("success" ,"registration success. login now." );
    
        
   } 
}
    function logout(){
    Session::flush();
    Auth::logout();
    return redirect(route('login'));
   }
   
}

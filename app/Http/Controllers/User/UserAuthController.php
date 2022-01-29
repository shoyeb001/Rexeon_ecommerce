<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use App\Models\Referer;

class UserAuthController extends Controller
{
    public function UserRegister(Request $request){
        $request->validate([
            "email" => "required",
            "password"=>"required",
            "phone"=>"required",
            "name"=>"required",
            "confirm_password"=>"required"
        ]);

        $name = $request->input("name");
        $email = $request->input("email");
        $phone = $request->input("phone");
        $password = $request->input("password");
        $confirm_password = $request->input("confirm_password");

        $data = DB::table("users")->where('email', $email)->get()->count();

        if ($data > 0) {
            $request->session()->flash("msg","user already exists");
            return view("auth/login");
        } else {
            if ($password != $confirm_password) {
                $request->session()->flash("msg","Password does not match");
                return view("auth/login");
            } else {
                if ($request->input("referer_id")) {
                    $referer_id = $request->input("referer_id");

                    $user = array(
                        "name" => $name,
                        "email"=>$email,
                        "password"=>$password,
                        "phone"=>$phone,
                        "is_buyer"=>"no",
                        "referer_id"=>$referer_id
                    );
                }else{
                    $user = array(
                        "name" => $name,
                        "email" => $email,
                        "phone"=>$phone,
                        "password" => $password,
                        "is_buyer"=>"no",
                        'updated_at' => date('y-m-d h:i:s'),
                        'created_at' => date('y-m-d h:i:s')
                    );
                }        
                DB::table('users')->insert($user);
                $data=["name"=>$name,"email"=>$email];
                $user['to']= $email;
                Mail::send("auth/mail",$data,function($messeges) use($user){
                    $messeges->to($user["to"]);
                    $messeges->subject("verify email");
                });
                $request->session()->flash("msg","Account created successfully. Please verify your email.");
                return view("auth/login");
            }
                
        }
    }

    public function sendmail(){
        $data=["name"=>"shoyeb",];
        $user['to']= "sakilak388@gmail.com";
        Mail::send("auth/mail",$data,function($messeges) use($user){
            $messeges->to($user["to"]);
            $messeges->subject("verify email");

        });
    }
    
    public function EmailVerify(Request $request, $email){
        $data = DB::table("users")->where('email', $email)->get()->count();

        if ($data==0) {
            $request->session()->flash("login_msg","Email not found");
        }else {
            $array = array(
                "email_verified_at"=> date('y-m-d h:i:s')
            );
            User::where("email",$email)->update($array);
            $request->session()->flash("login_msg","Email verified successfully. Now login");
        }

        return view("auth/login");
 
    }

    public function UserLoginAuth(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        $email = $request->input("email");
        $password = $request->input("password");

        $data = User::where("email",$email)->where("password",$password)->get();

        if (!isset($data[0])) {
            $request->session()->flash("login_msg","please enter correct login information");
            return redirect(route("auth.login"));
        }else {
            $request->session()->put("USER_ID", $data[0]->id);
            if ($data[0]->is_buyer == "yes") {
                $request->session()->put("IS_BUYER", "yes");
            }
            $r_data = Referer::where("user_id",$data[0]->id)->get()->count();

            if ($r_data==1) {
                $request->session()->put("USER_REFER","yes");
                $refer = Referer::where("user_id",$data[0]->id)->get();
                $request->session()->put("REFER_ID",$refer[0]->id);
            }
            if ($request->input("remember")!=NULL) {
                setcookie('user_email',$email,time()+60*60*24*30);
                setcookie('user_password',$password,time()+60*60*24*30);
            }
            return redirect(url("/"));
        }
    }

    public function UserLogout(Request $request){
        $request->session()->forget("USER_ID");
        return redirect(url("/"));
    }

    public function UserForgotPassword(){
        return view("auth.user_forgot_password");
    }

    public function MailResetPassword(Request $request){
        $request->validate([
            "email" => "required"
        ]);

        $email = $request->input("email");

       $data =  DB::table("users")->where("email",$email)->get()->count();

       if ($data==0) {
        $notification = array(
			'message' => 'We could not found this email',
			'alert-type' => 'error'
		);

		return redirect()->route('user.forgot.password')->with($notification);
       }else {

        $user = User::where("email",$email)->get();
        $password = uniqid();
        $newpassword = array(
            "password"=>$password
        );
        User::where("email",$email)->update($newpassword);

        $data = [
            "name"=> $user[0]->name,
            "email"=> $user[0]->email,
            "body" => "your new password is $password. Please login with this password and change it from user profile section.",

        ];

        Mail::to($email)->send(new ResetPassword($data));

        $notification = array(
			'message' => 'Password reset successfully. Check your email.',
			'alert-type' => 'success'
		);

		return redirect()->route('auth.login')->with($notification);
       }

    }

    public function ReferSignup($referer_id){
        return view("auth.refer_login",compact("referer_id"));
    }

 
}

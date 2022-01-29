<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
class AdminProfileController extends Controller
{
   function AdminDashboard(){
       return view('admin.admin_index');
   } 

   function AdminProfile(){
       $adminData = Admin::find(session("ADMIN_ID"));
       return view('admin.admin_profile_view',compact('adminData'));
   }

   function AdminProfileEdit(){
    $editData = Admin::find(session("ADMIN_ID"));
    return view('admin.admin_profile_edit',compact('editData'));
   }

   function AdminChangePassword(){
       return view("admin.admin_change_password");
   }

   public function GetAllUsers(){
    $users = User::latest()->get();
    return view('backend.user.all_user',compact('users'));
   }

   public function AdminProfileUpdate(Request $request){
    $id = session("ADMIN_ID");
    $data = Admin::find($id);
    $data->name = $request->name;
    $data->email = $request->email;


    if ($request->file('profile_photo_path')) {
        $file = $request->file('profile_photo_path');
        @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['profile_photo_path'] = $filename;
    }
    $data->save();

    $notification = array(
        'message' => 'Admin Profile Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('admin.profile.view')->with($notification);
   }

   public function UpdatePassword(Request $request){
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required',
        'confirm_password'=>'required'
    ]);
    $id = session("ADMIN_ID");
    $user = Admin::find($id);

    $old_password = $request->input("old_password");
    $new_password = $request->input("new_password");
    $confirm_password = $request->input("confirm_password");

    if ($confirm_password != $new_password) {
        $notification = array(
            'message' => 'new password and confirm password are not same',
            'alert-type' => 'error'
        );
    }else {
        if ($old_password != $user->password) {
            $notification = array(
                'message'=>'please enter correct password',
                'alert-type'=>'error'
            );
        }else {
            $data = array(
                "password"=>$new_password
            );

            Admin::where("id",$id)->update($data);
            $notification = array(
                'message' => 'Password updated successfully',
                'alert-type' => 'success'
            );
        }
    }

    return redirect()->route('admin.profile.view')->with($notification);
   }





}

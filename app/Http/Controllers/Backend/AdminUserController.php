<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Admin;

class AdminUserController extends Controller
{
    public function AllAdminRole()
    {
        $adminuser = Admin::where('type', 2)->latest()->get();
        return view('backend.role.admin_role_all', compact('adminuser'));
    }

    public function AddAdminRole()
    {
        return view('backend.role.admin_role_create');
    }

    public function StoreAdminRole(Request $request)
    {
       
        $email = $request->input("email");
        $admins = Admin::where("email",$email)->get()->count();
        if ($admins>0 ) {
            
        $notification = array(
            'message' => 'Admin User already exits',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin.user')->with($notification);

        }else{
        
        $image = $request->file('profile_photo_path');
        $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
        $save_url = 'upload/admin_images/' . $name_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'brands' => $request->brand,
            'categories' => $request->category,
            'products' => $request->product,
            'sliders' => $request->slider,

            'settings' => $request->setting,
            //'returnorders' => $request->returnorder,

            'orders' => $request->orders,
            'stocks' => $request->stock,
            //'reports' => $request->reports,
            //'alluser' => $request->alluser,
            'manage_admins' => $request->adminuserrole,
            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin.user')->with($notification);
    }
    }

    public function EditAdminRole($id)
    {
        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin_role_edit', compact('adminuser'));
    }

    public function UpdateAdminRole(Request $request)
    {
        $admin_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {

            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin_images/' . $name_gen);
            $save_url = 'upload/admin_images/' . $name_gen;

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,

                'phone' => $request->phone,
                'brands' => $request->brand,
                'categories' => $request->category,
                'products' => $request->product,
                'sliders' => $request->slider,
                //	'coupons' => $request->coupons,

                'settings' => $request->setting,
                'returnorders' => $request->returnorder,

                'orders' => $request->orders,
                'stocks' => $request->stock,
                'reports' => $request->reports,
                'allusers' => $request->alluser,
                'manage_admins' => $request->adminuserrole,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);
        } else {

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,

                'phone' => $request->phone,
                'brands' => $request->brand,
                'categories' => $request->category,
                'products' => $request->product,
                'sliders' => $request->slider,
                //'coupons' => $request->coupons,

                'settings' => $request->setting,
                'returnorders' => $request->returnorder,
                'orders' => $request->orders,
                'stocks' => $request->stock,

                //'reports' => $request->reports,
                'allusers' => $request->alluser,
                'manage_admins' => $request->adminuserrole,
                'type' => 2,

                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);
        } // end else 
    }

    public function DeleteAdminRole($id){
       Admin::where("id",$id)->delete();
       $notification = array(
        'message' => 'Admin User deleted Successfully',
        'alert-type' => 'info'
    );
       return redirect()->route('all.admin.user')->with($notification);
    }
}

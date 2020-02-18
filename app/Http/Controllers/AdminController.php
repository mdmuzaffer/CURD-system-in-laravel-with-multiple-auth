<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use Session;

class AdminController extends Controller
{
    public function adminUser(Request $request ){
    	if($request->isMethod('post')){

    	$data = $request->all();
    	$adminCount = AdminUser::where(['admin_email'=>$data['email'],'admin_password'=>$data['password']])->count();
    	if($adminCount >0){
    		Session::put('BackendAdmin', $data);
    			return redirect('/admin/dashboard');
    		}else{
    			return back()->with('error','You are not authorise admin!');
    		}
    	}
    	return view('admin.adminlogin');
    }

    public function adminDashboard(){
    	return view('admin.admin');
    }
}

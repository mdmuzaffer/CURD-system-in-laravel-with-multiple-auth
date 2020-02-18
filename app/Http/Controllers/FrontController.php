<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrontUser;
use Session;
use Auth;
use DB;
use App\UserDetail;

class FrontController extends Controller
{
    //front view controller
    public function front(){
    	return view('front.index');
    }

    public function userLogin(Request $request){
    	if($request->isMethod('post')){
    		$data  = $request->all();
    		//$userCount = FrontUser :: where(['email'=>$data['email'],'password'=>$data['password']])->count();
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    			Session::put('FrontAdmin', $data);
    			return redirect('/user/dashboard');
    		}else{
    			return back()->with('error','You are not authorise!');
    		}
    	}
    	return view('front.userlogin');
    }

    public function userDashboard(){
        $userDetails = UserDetail::get();
        $userDetails = json_decode(json_encode($userDetails));
    	return view('front.front')->with(compact('userDetails'));
    }

    public function userLogout(){
    	$data = Session::all();
    	Session::flush();
        return redirect('/');
    }

    public function userSignUp(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $userdetail = new UserDetail();
            $userdetail->name = $data['name'];
            $userdetail->email = $data['email'];
            $userdetail->address = $data['address'];
            $userdetail->mobile = $data['mobile'];
            $userdetail->save();
            return back()->with('flush_messsage_success','Your data inserted successfully !');
        }
        return view('front.signup');
    }

    public function userDelete($id){
        DB::table('user_details')->delete($id);
        return redirect('user/dashboard')->with('flush_messsage_success','Your data deleted successfully !');
    }

    public function userUpdate(Request $request ,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            UserDetail::where('id', $id)->update([
           'name' => $data['name'],
           'email' => $data['email'],
           'address' => $data['address'],
           'mobile' => $data['mobile']
           ]);
           return back()->with('flush_messsage_success','Your data updated successfully !');
        }
        $userUpdate = UserDetail::where('id',$id)->get();
        $userDetails = json_decode(json_encode($userUpdate));
        return view('front.update')->with(compact('userDetails'));
    }
}

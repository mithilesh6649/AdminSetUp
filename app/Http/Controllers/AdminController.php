<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;

class AdminController extends Controller
{
	/**
	 * This function is used to Show Admin Dashboard
	*/
	public function dashboard(Request $request) {

		$adminscounts = Admin::where('role_id','!=', 1)
								->where('id', '!=', Auth::id())
								->orderBy('id', 'Desc')->get()->count();

		return view('dashboard', [
			'admincounts'=>$adminscounts
		]);
	}

	/**
	 * This function is used to Show Admin Profile
	*/
	public function adminProfile(Request $request) {
		$userDetails = Admin::findOrFail(Auth::id());
		return view('admin_profile')->with('userDetails', $userDetails );
	}

	/**
	 * This function is used to Update Admin Profile
	*/
	public function updateProfile(Request $request) {
	
		$validatedData = $request->validate([
			'name' => 'required',
		], [
			'name.required' => 'Name is required',
		]);
		$updateProfile = Admin::where('id', $request->id)->update(['name' => $request->name]);
		if($updateProfile) {
			return back()->with('success', 'Profile Updated Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again later.');
		}
	}

	public function checkPassword(Request $request) {
		$passwordType = $request['password_type'];
		$admin = Admin::find(Auth::id());
		if($passwordType == 'old') {
			if(Hash::check($request->password, $admin->password) == false) {
				return true;
			}
			else if(Hash::check($request->password, $admin->password) == true) {
				return false;
			}
		}
		else if($passwordType == 'new') {
			if(Hash::check($request->password, $admin->password) == false) {
				return false;
			}
			else {
				return true;
			}
		} 
	}

	/**
	 * This function is used to Change Admin Password
	*/
	public function changePassword(Request $request) {
		$changePassword = Admin::where('id', Auth::id())->update(['password' => Hash::make($request->password)]);
		if($changePassword) {
			return back()->with('success', 'Password Updated Successfully!');
		}
		else {
			return back()->with('error', 'Something went wrong! Please try again later.');
		}
	}
}

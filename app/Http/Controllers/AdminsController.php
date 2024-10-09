<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminsController extends Controller
{
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:recruiters'],
			'role' => ['required']
		]);
	}
	/**
	 * This function is used to Show Admins Listing
	 */
	public function adminsList(Request $request)
	{

		if (Auth::user()->can('manage_admin_action')) {
			$adminsList = Admin::where('role_id', '!=', 1)
				->where('id', '!=', Auth::id())
				->orderBy('id', 'Desc')->get();
			return view('admins/admins_list', ['adminsList' => $adminsList]);
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Admins Listing
	 */
	public function addAdmin(Request $request)
	{

		if (Auth::user()->can('add_admin')) {
			$roles = Role::orderBy('name')->where('id', '!=', 1)->where('role_type', 'admin')->get();
			return view('admins/add_admin', ['roles' => $roles]);
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Admins Listing
	 */
	public function checkAdminEmail(Request $request)
	{
		$email = Admin::where('email', $request->email)->get();
		if (count($email) > 0) {
			$res = 1;
			return response()->json(['response' => $res]);
		} else {
			$res = 0;
			return response()->json(['response' => $res]);
		}
	}

	/**
	 * This function is used to Save Admins and show listing
	 */
	public function saveAdmin(Request $request)
	{
		$admin = new Admin;
		$admin->first_name = $request->first_name;
		$admin->last_name = $request->last_name;
		$admin->email = $request->email;
		$admin->password = Hash::make($request->password);
		$admin->ip_address = $request->ip();
		$admin->status = $request->status;
		$admin->role_id = $request->role_id;
		$admin->created_by = Auth::user()->id;
		$admin->phone_number = $request->phone_number;

		if ($admin->save()) {
			return redirect()->route('admins_list')->with('success', 'Admin Created Successfully!');
		} else {
			return redirect()->back()->with('error', 'Something went wrong!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	 */
	public function viewAdmin($id)
	{
		if (Auth::user()->can('view_admin')) {
			$viewAdmin = Admin::where('id', $id)->get();
			$deletedAdmins = Admin::onlyTrashed()->get();
			if ($viewAdmin->isNotEmpty()) {
				return view('admins/view_admin', ['viewAdmin' => $viewAdmin]);
			} else {
				return view('admins/view_admin', ['viewAdmin' => $deletedAdmins]);
			}
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Admins Listing
	 */
	public function editAdmin($id)
	{
		if (Auth::user()->can('edit_admin')) {

			//$roles = Role::orderBy('name')->where('id', Auth::id())->get();
			$roles = Role::orderBy('name')->where('id', '!=', 1)->where('role_type', 'admin')->get();
			$admin = Admin::where('id', $id)->get();
			return view('admins/edit_admin', ['roles' => $roles, 'admin' => $admin]);
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Update Admins Listing
	 */
	public function updateAdmin(Request $request)
	{
		if ($request->password != null) {
			$dataToUpdate = [
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'email' => $request->email,
				'role_id' => $request->role_id,
				'status' => $request->status,
				'password' => Hash::make($request->password),
				'phone_number' => $request->phone_number,
			];
		} else {
			$dataToUpdate = [
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'email' => $request->email,
				'role_id' => $request->role_id,
				'status' => $request->status,
				'phone_number' => $request->phone_number,
			];
		}

		$updateAdmin = Admin::where('id', $request->id)->update($dataToUpdate);
		if ($updateAdmin) {
			$adminsList = Admin::where('role_id', 1)->get();
			return redirect()->route('admins_list', ['adminsList' => $adminsList])->with('success', "Admin Updated Successfully!");
		} else {
			return back()->with('error', "Something went wrong! Please try again.");
		}
	}

	/**
	 * This function is used to Permanent Delete Admin
	 */
	public function permanentDeleteAdmin(Request $request)
	{

		if (Auth::user()->can('permanent_deleted_admin')) {

			$admin = Admin::where('id', $request->id)->onlyTrashed()->first();
			$deleteAdmin = $admin->forceDelete();
			if ($deleteAdmin) {
				$res['success'] = 1;
				return json_encode($res);
			} else {
				$res['success'] = 0;
				return json_encode($res);
			}
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	 */
	public function deleteAdmin(Request $request)
	{
		if (Auth::user()->can('delete_admin')) {
			$deleteAdmin = Admin::where('id', $request->id)->delete();
			if ($deleteAdmin) {
				$res['success'] = 1;
				return json_encode($res);
			} else {
				$res['success'] = 0;
				return json_encode($res);
			}
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	 */
	public function deletedAdminsList()
	{

		if (Auth::user()->can('view_deleted_admin')) {
			$deletedAdmins = Admin::onlyTrashed()->orderByDesc('email')->get();
			return view('admins/deleted_admins_list', ['deletedAdmins' => $deletedAdmins]);
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	 */
	public function restoreAdmin(Request $request)
	{
		if (Auth::user()->can('restore_admin')) {

			$restoreAdmin = Admin::where('id', $request->id)->restore();
			if ($restoreAdmin) {
				$res['success'] = 1;
				return json_encode($res);
			} else {
				$res['success'] = 0;
				return json_encode($res);
			}
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Admin;
use Auth;

class RolesController extends Controller {
	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function rolesList(Request $request) {
	
		if(Auth::user()->can('manage_roles_action')) {
			$roles = Role::orderBy('name')->where('id', '!=', 1)->where('role_type','admin')->get();
			return view('roles/roles_list', ['roles' => $roles]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function viewRole($id) {
		if(Auth::user()->can('view_role')) {
			$role = Role::find($id);
			$permissions = \DB::table('permission_role')->where('role_id', $role->id)->get();
			return view('roles/view_role', [
				'role' => $role,
				'permissions' => $permissions,
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function addRole(Request $request) {
		if(Auth::user()->can('add_role')) {
			return view('roles/add_role');
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function saveRole(Request $request) {
		$nameToLowercase = strtolower($request->role_name);
		$roleTag = $name = str_replace(' ', '_', $nameToLowercase);
		$role = Role::where("tag", $roleTag)->get();
		if(count($role) <= 0) {
			$role = new Role;
			$role->name = $request->role_name;
			$role->tag = $roleTag;
			$role->role_type='admin';
			$role->status = 1;
			if($role->save()) {
				$roles = Role::where('id', '!=', 1)->get();
				return redirect()->route('roles_list', ['roles' => $roles])->with('success', 'Role Added successfully!');
			}
			else {
				return redirect()->back()->with('error', 'Something went wrong!');
			}
		}
		else {
			$roles = Role::where('id', '!=', 1)->get();
			return redirect()->route('roles_list', ['roles' => $roles])->with('error', 'The Role already exists! Please edit the Role if you want to make any changes.');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editRole($id) {
		if(Auth::user()->can('edit_role')) {
			$role = Role::find($id);
			return view('roles/edit_role', [
				'role' => $role
			]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Update Role
	*/
	public function updateRole(Request $request) {
		$updateRole = Role::where('id', $request->id)->update([
			'name' => $request->name
		]);
		if($updateRole) {
			$roles = Role::orderByDesc('id')->get();
			return redirect()->route('roles_list', ['roles' => $roles])->with('success', 'Role Updated successfully!');
		}

	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function getRolePermissions(Request $request) {
		$rolePermissions = \DB::table('permission_role')->where('role_id', $request->role_id)->get();
		return json_encode($rolePermissions);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
    /*
	public function rolePermissions(Request $request) {

		if(Auth::user()->can('add_permissions')) {
			
			$roles = Role::orderBy('name')->where('id', '!=', 1)->get();
			if($roles->isNotEmpty()) {
				$appUsersPermissions = Permission::where('module_slug', 'app_user')->get();
				$groupsPermissions = Permission::where('module_slug', 'groups')->get();
				return view('roles/role_permissions', [
					'roles' => $roles,
					'appUsersPermissions' => $appUsersPermissions,
					'groupsPermissions' => $groupsPermissions,
				]);
			}
			else {
				return redirect()->route('add_role')->with('warning', 'No Roles Found! Please add a Role first.');
			}
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	} */


	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function rolePermissions(Request $request) {

		if(Auth::user()->can('edit_permission')) {
			$roles = Role::orderBy('name')->where('id', '!=', 1)->where('role_type','admin')->get();
			if($roles->isNotEmpty()) {

				$coordinatorPermissions = Permission::where('module_slug', 'manage_coordinator')->get();
				
				$adminsPermissions = Permission::where('module_slug', 'manage_admin')->get();
				$transactionsPermissions = Permission::where('module_slug', 'manage_transactions')->get();
				$reviewsPermissions = Permission::where('module_slug', 'reviews')->get();
				
				$wantsPermissions = Permission::where('module_slug', 'wants')->get();
				$wantsReportedPermissions = Permission::where('module_slug', 'wants_reported')->get();
				// $wantsDiscussionReportedPermissions = Permission::where('module_slug', 'wants_discussion_reported')->get();
				
				$miscPermissions = Permission::where('module_slug', 'manage_misc')->get();
				$allRecyledPermissions = Permission::where('module_slug', 'recycle_bin')->get();
				$adminNewsManagement = Permission::where('module_slug', 'admins_users_news')->get();
				$rolesPermissions = Permission::where('module_slug', 'manage_roles')->get();
				$accessPermissions = Permission::where('module_slug', 'manage_permission')->get();
				$accessfeedback = Permission::where('module_slug', 'feedback')->get();
				$websitePagesPermissions = Permission::where('module_slug', 'manage_website_content')->get();
				$mobilePagesPermissions = Permission::where('module_slug', 'manage_mobile_content')->get();
				$mobilemediaPermissions = Permission::where('module_slug', 'manage_mobile_media')->get();
				$brandsPermissions = Permission::where('module_slug', 'manage_brands')->get();
				$helpsupportPermissions = Permission::where('module_slug', 'manage_help_support')->get();


				return view('roles/role_permissions', [
					'roles' => $roles,
					'coordinatorPermissions'=>$coordinatorPermissions,
					'mobilemediaPermissions'=>$mobilemediaPermissions,
					'adminsPermissions' => $adminsPermissions,
					'wantsPermissions' => $wantsPermissions,
					'wantsReportedPermissions' => $wantsReportedPermissions,
					'mobilePagesPermissions' => $mobilePagesPermissions,
					'miscPermissions' => $miscPermissions,
					'allRecyledPermissions' => $allRecyledPermissions,
					'rolesPermissions' => $rolesPermissions,
					'accessPermissions' => $accessPermissions,
					'adminnewsPermissions' => $adminNewsManagement,
					'accessfeedback' => $accessfeedback,
					'websitePagesPermissions' => $websitePagesPermissions,
					'apptransactionsPermissions'=>$transactionsPermissions,
					'reviewsPermissions'=>$reviewsPermissions,
					'brandsPermissions'=>$brandsPermissions,
					'helpsupportPermissions'=>$helpsupportPermissions,

				

				]);
			}
			else {
				return redirect()->route('add_role')->with('warning', 'No Roles Found! Please add a Role first.');
			}
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}


	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function saveRolePermissions(Request $request) {
		$role = Role::find($request->role_id);
		$updatePermissions = $role->permissions()->sync($request->permissions);
		if($updatePermissions) {
			$roles = Role::where('id', '!=', 1)->get();
			return back()->with('success', 'Role Permissions Added successfully!');
		}
		else {
			return redirect()->back()->with('error', 'Something went wrong!');
		}
	}

	/**
	 * This function is used to Permanent Delete Role
	*/
	public function permanentDeleteRole(Request $request) {
		if(Auth::user()->can('permanent_delete_role')) {

			$role = Role::where('id', $request->id)->onlyTrashed()->first();
			$role->permissionRoles()->forceDelete();
			$role->admins()->forceDelete();
			$deleteRole = $role->forceDelete();
			if($deleteRole) {
				$res['success'] = 1;
				return json_encode($res);
			}
			else {
				$res['success'] = 0;
				$res['message'] = "Something went wrong! Please try again.";
				return json_encode($res);
			}
		}else{
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function deleteRole(Request $request) {

		if(Auth::user()->can('delete_role')) {

			$admin = Admin::where('role_id', $request->id)->first();
			if($admin != null) {
				$res['success'] = 0;
				$res['message'] = "You cannot delete this record as it's being used.";
				return json_encode($res);
			}
			else {
				$role = Role::where('id', $request->id)->first();
				$role->permissionRoles()->delete();
				$role->admins()->delete();
				$deleteRole = $role->delete();
				if($deleteRole) {
					$res['success'] = 1;
					return json_encode($res);
				}
				else {
					$res['success'] = 0;
					$res['message'] = "Something went wrong! Please try again.";
					return json_encode($res);
				}
			}

		}else{
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}

	}

	/**
	 * This function is used to Show deleted Roles
	*/
	public function deletedRoles() {

		if(Auth::user()->can('view_deleted_roles')) {
			$deletedRoles = Role::onlyTrashed()->orderByDesc('id')->get();
			return view('roles/deleted_roles_list', ['deletedRoles' => $deletedRoles]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Restore Roles
	*/
	public function restoreRole(Request $request) {

		if(Auth::user()->can('restore_role')) {

			$role = Role::where('id', $request->id)->onlyTrashed()->first();
			$role->permissionRoles()->restore();
			$role->admins()->restore();
			$restoreRole = $role->restore();
			if($restoreRole) {
				$res['success'] = 1;
				return json_encode($res);
			}
			else {
				$res['success'] = 0;
				$res['message'] = "Something went wrong! Please try again.";
				return json_encode($res);
			}
		}else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	public function getAllPermissions(Request $request) {
		$permissions = Permission::orderBy('name')->get();
		for ($i=0; $i < count($permissions); $i++) { 
			echo $permissions[$i]->id.' : '.$permissions[$i]->slug."<br>";
			echo "\n";
		}
	}

	public function getUserPermissions(Request $request) {
		$user = $request->user();
		$permissions = $user->role->permissions;
		for ($i=0; $i < count($permissions); $i++) { 
			echo $permissions[$i]->id.' : '.$permissions[$i]->slug."<br>";
			echo "\n";
		}
	}
}

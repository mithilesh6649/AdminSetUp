<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();


		//coordinator auth
		Gate::define('manage_coordinator_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_coordinator' ||
					$permissions[$i]->slug == 'edit_coordinator' ||
					$permissions[$i]->slug == 'delete_coordinator' ||
					$permissions[$i]->slug == 'view_expert' ||
					$permissions[$i]->slug == 'edit_expert' ||
					$permissions[$i]->slug == 'delete_expert' ||
					$permissions[$i]->slug == 'view_expert_panel' ||
					$permissions[$i]->slug == 'edit_expert_panel' ||
					$permissions[$i]->slug == 'delete_expert_panel'
				) {
					return true;
				}
			}
		});

		Gate::define('view_coordinator', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_coordinator') {
					return true;
				}
			}
		});

		Gate::define('edit_coordinator', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_coordinator') {
					return true;
				}
			}
		});

		Gate::define('delete_coordinator', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_coordinator') {
					return true;
				}
			}
		});


		Gate::define('view_expert', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_expert') {
					return true;
				}
			}
		});

		Gate::define('edit_expert', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_expert') {
					return true;
				}
			}
		});

		Gate::define('delete_expert', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_expert') {
					return true;
				}
			}
		});


		Gate::define('view_expert_panel', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_expert_panel') {
					return true;
				}
			}
		});

		Gate::define('edit_expert_panel', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_expert_panel') {
					return true;
				}
			}
		});

		Gate::define('delete_expert_panel', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_expert_panel') {
					return true;
				}
			}
		});



		/*  Admins */

		Gate::define('manage_admin_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'add_admin' ||
					$permissions[$i]->slug == 'view_admin' ||
					$permissions[$i]->slug == 'edit_admin' ||
					$permissions[$i]->slug == 'delete_admin'
				) {
					return true;
				}
			}
		});

		Gate::define('edit_admin', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_admin') {
					return true;
				}
			}
		});

		Gate::define('add_admin', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'add_admin') {
					return true;
				}
			}
		});

		Gate::define('view_admin', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_admin') {
					return true;
				}
			}
		});

		Gate::define('delete_admin', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_admin') {
					return true;
				}
			}
		});

		/*  Contents */

		Gate::define('manage_content_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_website_content' ||
					$permissions[$i]->slug == 'edit_website_content' ||
					$permissions[$i]->slug == 'view_mobile_content' ||
					$permissions[$i]->slug == 'edit_mobile_content' ||
					$permissions[$i]->slug == 'view_media_content' ||
					$permissions[$i]->slug == 'Edit_media_content'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_website_content_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_website_content' ||
					$permissions[$i]->slug == 'edit_website_content'
				) {
					return true;
				}
			}
		});

		Gate::define('manage_mobile_content_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_mobile_content' ||
					$permissions[$i]->slug == 'edit_mobile_content'
				) {
					return true;
				}
			}
		});

		//media auth
		Gate::define('manage_media_content_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_media_content' ||
					$permissions[$i]->slug == 'Edit_media_content'
				) {
					return true;
				}
			}
		});
		Gate::define('view_media_content', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_media_content') {
					return true;
				}
			}
		});

		Gate::define('Edit_media_content', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'Edit_media_content') {
					return true;
				}
			}
		});


		Gate::define('view_website_content', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_website_content') {
					return true;
				}
			}
		});

		Gate::define('edit_website_content', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_website_content') {
					return true;
				}
			}
		});

		Gate::define('view_mobile_content', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_mobile_content') {
					return true;
				}
			}
		});

		Gate::define('edit_mobile_content', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_mobile_content') {
					return true;
				}
			}
		});


		/* Question Management */
		/*************Manage Questionnaire START**************/
		Gate::define('manage_questionnaire_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_questionnaire' ||
					$permissions[$i]->slug == 'add_questionnaire' ||
					$permissions[$i]->slug == 'edit_questionnaire' ||
					$permissions[$i]->slug == 'delete_questionnaire'
				) {
					return true;
				}
			}
		});

		Gate::define('view_questionnaire', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_questionnaire') {
					return true;
				}
			}
		});


		Gate::define('add_questionnaire', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'add_questionnaire') {
					return true;
				}
			}
		});

		Gate::define('edit_questionnaire', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_questionnaire') {
					return true;
				}
			}
		});

		Gate::define('delete_questionnaire', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_questionnaire') {
					return true;
				}
			}
		});
		/*************Manage Questionnaire END**************/

		/*************Manage Question START**************/
		Gate::define('manage_question_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_question' ||
					$permissions[$i]->slug == 'add_question' ||
					$permissions[$i]->slug == 'edit_question' ||
					$permissions[$i]->slug == 'delete_question'
				) {
					return true;
				}
			}
		});

		Gate::define('view_question', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_question') {
					return true;
				}
			}
		});

		Gate::define('add_question', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'add_question') {
					return true;
				}
			}
		});

		Gate::define('edit_question', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_question') {
					return true;
				}
			}
		});

		Gate::define('delete_question', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_question') {
					return true;
				}
			}
		});
		/*************Manage Question END**************/


		/*  Feedback */
		Gate::define('manage_feedback_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_helpandsupport' ||
					$permissions[$i]->slug == 'reply_content'
				) {
					return true;
				}
			}
		});

		Gate::define('view_helpandsupport', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_helpandsupport') {
					return true;
				}
			}
		});


		/*  Misc Data */
		/*
		Gate::define('manage_misc_data_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_brands' ||
					$permissions[$i]->slug == 'edit_brands' ||
					$permissions[$i]->slug == 'delete_brands' ||
					$permissions[$i]->slug == 'add_brands'

				) {
					return true;
				}
			}
		});

		//brand auth
		Gate::define('manage_brand_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_brands' ||
					$permissions[$i]->slug == 'edit_brands' ||
					$permissions[$i]->slug == 'delete_brands' ||
					$permissions[$i]->slug == 'add_brands'

				) {
					return true;
				}
			}
		});

		Gate::define('view_brands', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_brands') {
					return true;
				}
			}
		});

		Gate::define('edit_brands', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_brands') {
					return true;
				}
			}
		});

		Gate::define('delete_brands', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_brands') {
					return true;
				}
			}
		});

		Gate::define('add_brands', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'add_brands') {
					return true;
				}
			}
		});
		*/


		/*************Manage Expertise START**************/
		Gate::define('manage_expertise_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_expertise' ||
					$permissions[$i]->slug == 'add_expertise' ||
					$permissions[$i]->slug == 'edit_expertise' ||
					$permissions[$i]->slug == 'delete_expertise'
				) {
					return true;
				}
			}
		});

		Gate::define('view_expertise', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_expertise') {
					return true;
				}
			}
		});


		Gate::define('add_expertise', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'add_expertise') {
					return true;
				}
			}
		});

		Gate::define('edit_expertise', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_expertise') {
					return true;
				}
			}
		});

		Gate::define('delete_expertise', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_expertise') {
					return true;
				}
			}
		});
		/*************Manage Expertise END**************/




		/*  Roles */

		Gate::define('manage_roles_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_role' ||
					$permissions[$i]->slug == 'edit_role' ||
					$permissions[$i]->slug == 'delete_role' ||
					$permissions[$i]->slug == 'add_role'
				) {
					return true;
				}
			}
		});

		Gate::define('view_role', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_role') {
					return true;
				}
			}
		});

		Gate::define('add_role', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'add_role') {
					return true;
				}
			}
		});


		Gate::define('edit_role', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_role') {
					return true;
				}
			}
		});


		Gate::define('delete_role', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'delete_role') {
					return true;
				}
			}
		});

		/*  Permissions */


		Gate::define('manage_permissions_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_permission' ||
					$permissions[$i]->slug == 'edit_permission'
				) {
					return true;
				}
			}
		});

		Gate::define('view_permission', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_permission') {
					return true;
				}
			}
		});

		Gate::define('edit_permission', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'edit_permission') {
					return true;
				}
			}
		});

		/*  Recycle Bin Action*/

		Gate::define('manage_recyclebin_action', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_admin' ||
					$permissions[$i]->slug == 'restore_admin' ||
					$permissions[$i]->slug == 'permanent_deleted_admin' ||

					$permissions[$i]->slug == 'view_deleted_coordinator' ||
					$permissions[$i]->slug == 'restore_coordinator' ||
					$permissions[$i]->slug == 'permanent_deleted_coordinator' ||

					$permissions[$i]->slug == 'view_deleted_expert' ||
					$permissions[$i]->slug == 'restore_expert' ||
					$permissions[$i]->slug == 'permanent_deleted_expert' ||

					$permissions[$i]->slug == 'view_deleted_expert_panel' ||
					$permissions[$i]->slug == 'restore_expert_panel' ||
					$permissions[$i]->slug == 'permanent_deleted_expert_panel' ||

					$permissions[$i]->slug == 'view_deleted_questionnaire' ||
					$permissions[$i]->slug == 'restore_questionnaire' ||
					$permissions[$i]->slug == 'permanent_deleted_questionnaire' ||

					$permissions[$i]->slug == 'view_deleted_question' ||
					$permissions[$i]->slug == 'restore_question' ||
					$permissions[$i]->slug == 'permanent_deleted_question' ||

					$permissions[$i]->slug == 'view_deleted_brands' ||
					$permissions[$i]->slug == 'restore_brands' ||
					$permissions[$i]->slug == 'permanent_deleted_brands' ||

					$permissions[$i]->slug == 'view_deleted_expertise' ||
					$permissions[$i]->slug == 'restore_expertise' ||
					$permissions[$i]->slug == 'permanent_deleted_expertise' ||

					$permissions[$i]->slug == 'view_deleted_role' ||
					$permissions[$i]->slug == 'restore_role' ||
					$permissions[$i]->slug == 'permanent_deleted_role'
				) {
					return true;
				}
			}
		});

		//misc data management recycle_bin auth
		Gate::define('manage_recycle_bin_misc_data', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_brands' ||
					$permissions[$i]->slug == 'restore_brands' ||
					$permissions[$i]->slug == 'permanent_deleted_brands'
				) {
					return true;
				}
			}
		});

		//recycle bin Coordinator
		Gate::define('manage_recycle_bin_coordinator', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_coordinator' ||
					$permissions[$i]->slug == 'restore_coordinator' ||
					$permissions[$i]->slug == 'permanent_deleted_coordinator'
				) {
					return true;
				}
			}
		});

		Gate::define('view_deleted_coordinator', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_coordinator') {
					return true;
				}
			}
		});

		Gate::define('restore_coordinator', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_coordinator') {
					return true;
				}
			}
		});

		Gate::define('permanent_deleted_coordinator', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_coordinator') {
					return true;
				}
			}
		});


		Gate::define('view_deleted_expert', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_expert') {
					return true;
				}
			}
		});

		Gate::define('restore_expert', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_expert') {
					return true;
				}
			}
		});

		Gate::define('permanent_deleted_expert', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_expert') {
					return true;
				}
			}
		});


		Gate::define('view_deleted_expert_panel', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_expert_panel') {
					return true;
				}
			}
		});

		Gate::define('restore_expert_panel', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_expert_panel') {
					return true;
				}
			}
		});

		Gate::define('permanent_deleted_expert_panel', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_expert_panel') {
					return true;
				}
			}
		});


		/*******recycle bin Questionnaire**********START*/
		Gate::define('manage_recycle_bin_questionnaire', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_questionnaire' ||
					$permissions[$i]->slug == 'restore_questionnaire' ||
					$permissions[$i]->slug == 'permanent_deleted_questionnaire'
				) {
					return true;
				}
			}
		});

		Gate::define('view_deleted_questionnaire', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_questionnaire') {
					return true;
				}
			}
		});

		Gate::define('restore_questionnaire', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_questionnaire') {
					return true;
				}
			}
		});

		Gate::define('permanent_deleted_questionnaire', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_questionnaire') {
					return true;
				}
			}
		});
		/*******recycle bin Questionnaire**********END*/

		/*******recycle bin Question**********START*/
		Gate::define('manage_recycle_bin_question', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_question' ||
					$permissions[$i]->slug == 'restore_question' ||
					$permissions[$i]->slug == 'permanent_deleted_question'
				) {
					return true;
				}
			}
		});

		Gate::define('view_deleted_question', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_question') {
					return true;
				}
			}
		});

		Gate::define('restore_question', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_question') {
					return true;
				}
			}
		});

		Gate::define('permanent_deleted_question', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_question') {
					return true;
				}
			}
		});
		/*******recycle bin Question**********END*/


		//brands recycle bin auth
		Gate::define('manage_recycle_bin_brands', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_brands' ||
					$permissions[$i]->slug == 'restore_brands' ||
					$permissions[$i]->slug == 'permanent_deleted_brands'
				) {
					return true;
				}
			}
		});

		Gate::define('view_deleted_brands', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_brands') {
					return true;
				}
			}
		});

		Gate::define('restore_brands', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_brands') {
					return true;
				}
			}
		});

		Gate::define('permanent_deleted_brands', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_brands') {
					return true;
				}
			}
		});


		/*******recycle bin Expertise**********START*/
		Gate::define('manage_recycle_bin_expertise', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_expertise' ||
					$permissions[$i]->slug == 'restore_expertise' ||
					$permissions[$i]->slug == 'permanent_deleted_expertise'
				) {
					return true;
				}
			}
		});

		Gate::define('view_deleted_expertise', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_expertise') {
					return true;
				}
			}
		});

		Gate::define('restore_expertise', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_expertise') {
					return true;
				}
			}
		});

		Gate::define('permanent_deleted_expertise', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_expertise') {
					return true;
				}
			}
		});
		/*******recycle bin Expertise**********END*/

		//admin recycle_bin auth
		Gate::define('manage_recycle_bin_admin', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_admin' ||
					$permissions[$i]->slug == 'restore_admin' ||
					$permissions[$i]->slug == 'permanent_deleted_admin'
				) {
					return true;
				}
			}
		});

		Gate::define('view_deleted_admin', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_admin') {
					return true;
				}
			}
		});

		Gate::define('restore_admin', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_admin') {
					return true;
				}
			}
		});

		Gate::define('permanent_deleted_admin', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_admin') {
					return true;
				}
			}
		});






		Gate::define('manage_recycle_bin_roles', function ($user) {
			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if (
					$permissions[$i]->slug == 'view_deleted_roles' ||
					$permissions[$i]->slug == 'restore_role' ||
					$permissions[$i]->slug == 'permanent_delete_role'
				) {
					return true;
				}
			}
		});


		Gate::define('view_deleted_roles', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'view_deleted_role') {
					return true;
				}
			}
		});

		Gate::define('restore_role', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'restore_role') {
					return true;
				}
			}
		});

		Gate::define('permanent_delete_role', function ($user) {

			$user = Auth::user();
			$permissions = $user->role->permissions;
			for ($i = 0; $i < count($permissions); $i++) {
				if ($permissions[$i]->slug == 'permanent_deleted_role') {
					return true;
				}
			}
		});
	}
}

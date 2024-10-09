<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {

        DB::table('permissions')->truncate();
        DB::table('permissions')->insert([

            //Coordinator Management
            [
                'name' => 'View',
                'slug' => 'view_coordinator',
                'module_name' => 'View',
                'module_slug' => 'manage_coordinator',
                'description' => 'Coordinator Management',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_coordinator',
                'module_name' => 'Edit',
                'module_slug' => 'manage_coordinator',
                'description' => 'Coordinator Management',
                'status' => 1
            ],
            [
                'name' => 'Delete',
                'slug' => 'delete_coordinator',
                'module_name' => 'Delete',
                'module_slug' => 'manage_coordinator',
                'description' => 'Coordinator Management',
                'status' => 1
            ],

            //Expert Management
            [
                'name' => 'View',
                'slug' => 'view_expert',
                'module_name' => 'View',
                'module_slug' => 'manage_expert',
                'description' => 'Coordinator Management',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_expert',
                'module_name' => 'Edit',
                'module_slug' => 'manage_expert',
                'description' => 'Coordinator Management',
                'status' => 1
            ],
            [
                'name' => 'Delete',
                'slug' => 'delete_expert',
                'module_name' => 'Delete',
                'module_slug' => 'manage_expert',
                'description' => 'Coordinator Management',
                'status' => 1
            ],

            //Expert Panel Management
            [
                'name' => 'View',
                'slug' => 'view_expert_panel',
                'module_name' => 'View',
                'module_slug' => 'manage_expert_panel',
                'description' => 'Coordinator Management',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_expert_panel',
                'module_name' => 'Edit',
                'module_slug' => 'manage_expert_panel',
                'description' => 'Coordinator Management',
                'status' => 1
            ],
            [
                'name' => 'Delete',
                'slug' => 'delete_expert_panel',
                'module_name' => 'Delete',
                'module_slug' => 'manage_expert_panel',
                'description' => 'Coordinator Management',
                'status' => 1
            ],


            //User Manegement [02 - Admin]
            [
                'name' => 'View',
                'slug' => 'view_admin',
                'module_name' => 'View',
                'module_slug' => 'manage_admin',
                'description' => 'Admins Management',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_admin',
                'module_name' => 'Edit',
                'module_slug' => 'manage_admin',
                'description' => 'Admins Management',
                'status' => 1
            ],
            [
                'name' => 'Delete',
                'slug' => 'delete_admin',
                'module_name' => 'Delete',
                'module_slug' => 'manage_admin',
                'description' => 'Admins Management',
                'status' => 1
            ],
            [
                'name' => 'Add',
                'slug' => 'add_admin',
                'module_name' => 'Add',
                'module_slug' => 'manage_admin',
                'description' => 'Admins Management',
                'status' => 1
            ],


            //misc data management      
            //Brand  
            /*
         [
            'name' => 'View',
            'slug' => 'view_brands',
            'module_name' => 'View',
            'module_slug' => 'manage_brands',
            'description' => 'Misc Data Management',
            'status' => 1
        ],
        [
            'name' => 'Edit',
            'slug' => 'edit_brands',
            'module_name' => 'Edit',
            'module_slug' => 'manage_brands',
            'description' => 'Misc Data Management',
            'status' => 1
        ],
        [
            'name' => 'Delete',
            'slug' => 'delete_brands',
            'module_name' => 'Delete',
            'module_slug' => 'manage_brands',
            'description' => 'Misc Data Management',
            'status' => 1
        ],
        [
            'name' => 'Add',
            'slug' => 'add_brands',
            'module_name' => 'Add',
            'module_slug' => 'manage_brands',
            'description' => 'Misc Data Management',
            'status' => 1
        ],*/


            /************Question Management*************/
            //Questionnaire
            [
                'name' => 'View',
                'slug' => 'view_questionnaire',
                'module_name' => 'View',
                'module_slug' => 'manage_questionnaire',
                'description' => 'Question Management',
                'status' => 1
            ],
            [
                'name' => 'Add',
                'slug' => 'add_questionnaire',
                'module_name' => 'Add',
                'module_slug' => 'manage_questionnaire',
                'description' => 'Question Management',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_questionnaire',
                'module_name' => 'Edit',
                'module_slug' => 'manage_questionnaire',
                'description' => 'Question Management',
                'status' => 1
            ],
            [
                'name' => 'Delete',
                'slug' => 'delete_questionnaire',
                'module_name' => 'Delete',
                'module_slug' => 'manage_questionnaire',
                'description' => 'Question Management',
                'status' => 1
            ],

            //Question
            [
                'name' => 'View',
                'slug' => 'view_question',
                'module_name' => 'View',
                'module_slug' => 'manage_question',
                'description' => 'Question Management',
                'status' => 1
            ],
            [
                'name' => 'Add',
                'slug' => 'add_question',
                'module_name' => 'Add',
                'module_slug' => 'manage_question',
                'description' => 'Question Management',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_question',
                'module_name' => 'Edit',
                'module_slug' => 'manage_question',
                'description' => 'Question Management',
                'status' => 1
            ],
            [
                'name' => 'Delete',
                'slug' => 'delete_question',
                'module_name' => 'Delete',
                'module_slug' => 'manage_question',
                'description' => 'Question Management',
                'status' => 1
            ],

            //help and support
            [
                'name' => 'View',
                'slug' => 'view_helpandsupport',
                'module_name' => 'View',
                'module_slug' => 'manage_help_support',
                'description' => 'Help and support',
                'status' => 1
            ],


            //Content Management [01 - website content]
            [
                'name' => 'View',
                'slug' => 'view_website_content',
                'module_name' => 'View',
                'module_slug' => 'manage_website_content',
                'description' => 'Website Content',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_website_content',
                'module_name' => 'Edit',
                'module_slug' => 'manage_website_content',
                'description' => 'Website Content',
                'status' => 1
            ],

            [
                'name' => 'View',
                'slug' => 'view_mobile_content',
                'module_name' => 'View',
                'module_slug' => 'manage_mobile_content',
                'description' => 'Mobile Content',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_mobile_content',
                'module_name' => 'Edit',
                'module_slug' => 'manage_mobile_content',
                'description' => 'Mobile Content',
                'status' => 1
            ],
            [
                'name' => 'View',
                'slug' => 'view_media_content',
                'module_name' => 'View',
                'module_slug' => 'manage_mobile_media',
                'description' => 'Mobile Media',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'Edit_media_content',
                'module_name' => 'Edit',
                'module_slug' => 'manage_mobile_media',
                'description' => 'Mobile Media',
                'status' => 1
            ],



            //Expertise
            [
                'name' => 'View',
                'slug' => 'view_expertise',
                'module_name' => 'View',
                'module_slug' => 'manage_expertise',
                'description' => 'Expertise Management',
                'status' => 1
            ],
            [
                'name' => 'Add',
                'slug' => 'add_expertise',
                'module_name' => 'Add',
                'module_slug' => 'manage_expertise',
                'description' => 'Expertise Management',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_expertise',
                'module_name' => 'Edit',
                'module_slug' => 'manage_expertise',
                'description' => 'Expertise Management',
                'status' => 1
            ],
            [
                'name' => 'Delete',
                'slug' => 'delete_expertise',
                'module_name' => 'Delete',
                'module_slug' => 'manage_expertise',
                'description' => 'Expertise Management',
                'status' => 1
            ],



            //Roles
            [
                'name' => 'View',
                'slug' => 'view_role',
                'module_name' => 'View Role',
                'module_slug' => 'manage_roles',
                'description' => 'Roles',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_role',
                'module_name' => 'Edit Role',
                'module_slug' => 'manage_roles',
                'description' => 'Roles',
                'status' => 1
            ],
            [
                'name' => 'Delete',
                'slug' => 'delete_role',
                'module_name' => 'Delete Role',
                'module_slug' => 'manage_roles',
                'description' => 'Roles',
                'status' => 1
            ],
            [
                'name' => 'Add',
                'slug' => 'add_role',
                'module_name' => 'Add Role',
                'module_slug' => 'manage_roles',
                'description' => 'Roles',
                'status' => 1
            ],


            //Permissions
            [
                'name' => 'View',
                'slug' => 'view_permission',
                'module_name' => 'View Permission',
                'module_slug' => 'manage_permission',
                'description' => 'Permissions',
                'status' => 1
            ],
            [
                'name' => 'Edit',
                'slug' => 'edit_permission',
                'module_name' => 'Edit Permission',
                'module_slug' => 'manage_permission',
                'description' => 'Permissions',
                'status' => 1
            ],

            //Recyclebin
            [
                'name' => 'View Deleted Coordinator',
                'slug' => 'view_deleted_coordinator',
                'module_name' => 'View Deleted Coordinator',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Coordinator',
                'status' => 1
            ],
            [
                'name' => 'Restore Coordinator',
                'slug' => 'restore_coordinator',
                'module_name' => 'Restore Coordinator',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore Coordinator',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Coordinator',
                'slug' => 'permanent_deleted_coordinator',
                'module_name' => 'Permanent Delete Coordinator',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Coordinator',
                'status' => 1
            ],

            [
                'name' => 'View Deleted Expert',
                'slug' => 'view_deleted_expert',
                'module_name' => 'View Deleted Expert',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Expert',
                'status' => 1
            ],
            [
                'name' => 'Restore Expert',
                'slug' => 'restore_expert',
                'module_name' => 'Restore Expert',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore Expert',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Expert',
                'slug' => 'permanent_deleted_expert',
                'module_name' => 'Permanent Delete Expert',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Expert',
                'status' => 1
            ],

            [
                'name' => 'View Deleted Expert Panel',
                'slug' => 'view_deleted_expert_panel',
                'module_name' => 'View Deleted Expert Panel',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Expert Panel',
                'status' => 1
            ],
            [
                'name' => 'Restore Expert Panel',
                'slug' => 'restore_expert_panel',
                'module_name' => 'Restore Expert Panel',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore Expert Panel',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Expert Panel',
                'slug' => 'permanent_deleted_expert_panel',
                'module_name' => 'Permanent Delete Expert Panel',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Expert Panel',
                'status' => 1
            ],

            [
                'name' => 'View Deleted Admin',
                'slug' => 'view_deleted_admin',
                'module_name' => 'View Deleted Admin',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Admins',
                'status' => 1
            ],
            [
                'name' => 'Restore Admin',
                'slug' => 'restore_admin',
                'module_name' => 'Restore Admin',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore Admins',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Admin',
                'slug' => 'permanent_deleted_admin',
                'module_name' => 'Permanent Delete Admin',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Admin',
                'status' => 1
            ],



            //Recyclebin
            [
                'name' => 'View Deleted Questionnaire',
                'slug' => 'view_deleted_questionnaire',
                'module_name' => 'View Deleted Questionnaire',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Questionnaire',
                'status' => 1
            ],
            [
                'name' => 'Restore Questionnaire',
                'slug' => 'restore_questionnaire',
                'module_name' => 'Restore Questionnaire',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore Questionnaire',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Questionnaire',
                'slug' => 'permanent_deleted_questionnaire',
                'module_name' => 'Permanent Delete Questionnaire',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Questionnaire',
                'status' => 1
            ],


            //Recycle bin Question
            [
                'name' => 'View Deleted Question',
                'slug' => 'view_deleted_question',
                'module_name' => 'View Deleted Question',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Question',
                'status' => 1
            ],
            [
                'name' => 'Restore Question',
                'slug' => 'restore_question',
                'module_name' => 'Restore Question',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore Question',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Question',
                'slug' => 'permanent_deleted_question',
                'module_name' => 'Permanent Delete Question',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Question',
                'status' => 1
            ],


            //Recycle bin Expertise
            [
                'name' => 'View Deleted Expertise',
                'slug' => 'view_deleted_expertise',
                'module_name' => 'View Deleted Expertise',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Expertise',
                'status' => 1
            ],
            [
                'name' => 'Restore Expertise',
                'slug' => 'restore_expertise',
                'module_name' => 'Restore Expertise',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore Expertise',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Expertise',
                'slug' => 'permanent_deleted_expertise',
                'module_name' => 'Permanent Delete Expertise',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Expertise',
                'status' => 1
            ],

            /*
            [
                'name' => 'View Deleted Brands',
                'slug' => 'view_deleted_brands',
                'module_name' => 'View Deleted brands',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete brands',
                'status' => 1
            ],
            [
                'name' => 'Restore Brands',
                'slug' => 'restore_brands',
                'module_name' => 'Restore brands',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore brands',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Brands',
                'slug' => 'permanent_deleted_brands',
                'module_name' => 'Permanent Delete brands',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete brands',
                'status' => 1
            ],
            */

            [
                'name' => 'View Deleted Role',
                'slug' => 'view_deleted_role',
                'module_name' => 'View Deleted Role',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Roles',
                'status' => 1
            ],
            [
                'name' => 'Restore Role',
                'slug' => 'restore_role',
                'module_name' => 'Restore Role',
                'module_slug' => 'recycle_bin',
                'description' => 'Restore Roles',
                'status' => 1
            ],
            [
                'name' => 'Permanent Delete Role',
                'slug' => 'permanent_deleted_role',
                'module_name' => 'Permanent Delete Role',
                'module_slug' => 'recycle_bin',
                'description' => 'Delete Roles',
                'status' => 1
            ],





        ]);

        $allPermissions = DB::table('permissions')->get();
        for ($i = 0; $i < count($allPermissions); $i++) {
            $permission = $allPermissions[$i];
            DB::table('permission_role')->insert([
                'permission_id' => $permission->id,
                'role_id' => 1
            ]);
        }
    }
}

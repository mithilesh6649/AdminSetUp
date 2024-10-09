<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\RolesController;
// use App\Http\Controllers\MiscController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HelpSupportController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\BlogsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  Artisan::call('view:clear');
  return redirect()->route('login');
})->name('admin_home');



Route::middleware(['auth:admin'])->group(function () {

  // Admin Panel
  Route::group(['prefix' => 'admin_panel'], function () {
    Route::get('/user_permissions', [RolesController::class, 'getUserPermissions'])->name('user_permissions');
    Route::get('/all_permissions', [RolesController::class, 'getAllPermissions'])->name('all_permissions');

    // Common
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin_profile', [AdminController::class, 'adminProfile'])->name('admin_profile');
    Route::post('/update_profile', [AdminController::class, 'updateProfile'])->name('update_profile');
    Route::post('/check_password', [AdminController::class, 'checkPassword'])->name('check_password');
    Route::post('/change_password', [AdminController::class, 'changePassword'])->name('change_password');
    Route::any('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('custom-logout');


    // Admins
    Route::group(['prefix' => 'admins'], function () {
      Route::get('/check_email', [AdminsController::class, 'checkAdminEmail'])->name('check_admin_email');
      Route::get('/list', [AdminsController::class, 'adminsList'])->name('admins_list');
      Route::get('/view/{id}', [AdminsController::class, 'viewAdmin'])->name('view_admin');
      Route::get('/edit/{id}', [AdminsController::class, 'editAdmin'])->name('edit_admin');
      Route::post('/update', [AdminsController::class, 'updateAdmin'])->name('update_admin');
      Route::post('/delete', [AdminsController::class, 'deleteAdmin'])->name('delete_admin');
      Route::post('/restore', [AdminsController::class, 'restoreAdmin'])->name('restore_admin');
      Route::get('/add', [AdminsController::class, 'addAdmin'])->name('add_admin');
      Route::post('/save', [AdminsController::class, 'saveAdmin'])->name('save_admin');
    });


    // Coordinator
    Route::group(['prefix' => 'coordinator'], function () {
      Route::get('list', [CoordinatorController::class, 'list'])->name('coordinator.list');
      Route::get('view/{id}', [CoordinatorController::class, 'view'])->name('coordinator.view');
      Route::get('edit/{id}', [CoordinatorController::class, 'edit'])->name('coordinator.edit');
      Route::post('update', [CoordinatorController::class, 'updateCoordinator'])->name('coordinator.update');
      Route::post('/delete', [CoordinatorController::class, 'deleteCoordinator'])->name('delete_coordinator');

      /*Coordinator => Expert*/
      Route::get('experts_list/{id}', [CoordinatorController::class, 'expertList'])->name('coordinator.expert_list');
      Route::post('/add_expert', [CoordinatorController::class, 'addExpert'])->name('add_expert');
      Route::post('/edit_expert', [CoordinatorController::class, 'editExpert'])->name('edit_expert');
      Route::post('/delete_expert', [CoordinatorController::class, 'deleteExpert'])->name('delete_expert');



      /*Coordinator => Panel*/
      Route::get('panel_list/{id}', [CoordinatorController::class, 'panelList'])->name('coordinator.panel_list');
      Route::get('/view_expert_panel/{id}/{panel_id}', [CoordinatorController::class, 'viewExpertPanel'])->name('coordinator.view_expert_panel');
      Route::get('/edit_expert_panel/{id}/{panel_id}', [CoordinatorController::class, 'editExpertPanel'])->name('coordinator.edit_expert_panel');
      Route::post('/update_expert_panel', [CoordinatorController::class, 'updateExpertPanel'])->name('update_expert_panel');
      Route::post('/delete_expert_panel', [CoordinatorController::class, 'deleteExpertPanel'])->name('delete_expert_panel');
    });


    // Questionnaire
    Route::group(['prefix' => 'questionnaire'], function () {
      Route::get('list', [QuestionnaireController::class, 'list'])->name('questionnaire.list');
      Route::get('view/{id}', [QuestionnaireController::class, 'view'])->name('questionnaire.view');
      Route::get('edit/{id}', [QuestionnaireController::class, 'edit'])->name('questionnaire.edit');
      Route::post('update', [QuestionnaireController::class, 'updateQuestionnaire'])->name('questionnaire.update');
      Route::post('/delete', [QuestionnaireController::class, 'deleteQuestionnaire'])->name('delete_questionnaire');
      Route::get('/add', [QuestionnaireController::class, 'addQuestionnaire'])->name('add_questionnaire');
      Route::post('/save', [QuestionnaireController::class, 'saveQuestionnaire'])->name('save_questionnaire');
    });

    Route::group(['prefix' => 'questionnaires'], function () {
      Route::get('list', [QuestionnaireController::class, 'questionnairesList'])->name('questionnaires.list');
      Route::get('view/{id}', [QuestionnaireController::class, 'questionnairesView'])->name('questionnaires.view');
      Route::get('viewallquestions/{id}/{question_expert_panel_id}', [QuestionnaireController::class, 'viewAllQuestions'])->name('questionnaire.viewallquestions');
    });

    // Question
    Route::group(['prefix' => 'question'], function () {
      Route::get('list', [QuestionController::class, 'list'])->name('question.list');
      Route::get('view/{id}', [QuestionController::class, 'view'])->name('question.view');
      Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
      Route::post('update', [QuestionController::class, 'updateQuestion'])->name('question.update');
      Route::post('/delete', [QuestionController::class, 'deleteQuestion'])->name('delete_question');
      Route::get('/add', [QuestionController::class, 'addQuestion'])->name('add_question');
      Route::post('/save', [QuestionController::class, 'saveQuestion'])->name('save_question');
      Route::post('/delete/option', [QuestionController::class, 'deleteQuestionOption'])->name('delete_question_option');
    });

   //Contact 
     Route::group(["prefix" => "contact_us"], function () {
        Route::post("/status", [ContactUsController::class,"statusUpdate"])->name("contact.status.update");
        Route::get("/list", [ ContactUsController::class,"contactUsMessagesList"])->name("contact_us_message_list");
        Route::get("/view/{id}", [ContactUsController::class,"viewContactUsMessage"])->name("view_contact_us_message");
    });


    // Access Controls
    Route::group(['prefix' => 'roles'], function () {
      Route::get('add', [RolesController::class, 'addRole'])->name('add_roles');
      Route::post('save_role', [RolesController::class, 'saveRole'])->name('save_role');
      Route::get('/view/{id}', [RolesController::class, 'viewRole'])->name('view_role');
      Route::get('/list', [RolesController::class, 'rolesList'])->name('roles_list');
      Route::get('/edit/{id}', [RolesController::class, 'editRole'])->name('edit_role');
      Route::post('/update', [RolesController::class, 'updateRole'])->name('update_role');
      Route::post('/get_role_permissions', [RolesController::class, 'getRolePermissions'])->name('get_role_permissions');

      Route::get('/role_permissions', [RolesController::class, 'rolePermissions'])->name('role_permissions');

      Route::post('/save_permissions', [RolesController::class, 'saveRolePermissions'])->name('save_permissions');
      Route::post('/delete', [RolesController::class, 'deleteRole'])->name('delete_role');
      Route::post('/restore', [RolesController::class, 'restoreRole'])->name('restore_role');
    });

    // Content Management
    Route::group(['prefix' => 'content'], function () {

      Route::group(['prefix' => 'website'], function () {
        Route::get('/list', [ContentController::class, 'websitePagesList'])->name('website_pages_list');
        Route::get('/view/{id}', [ContentController::class, 'viewWebsitePage'])->name('view_website_page');
        Route::get('/edit/{id}', [ContentController::class, 'editWebsitePage'])->name('edit_website_page');
        Route::post('/update', [ContentController::class, 'updateWebsitePage'])->name('update_website_page');
      });

      Route::group(['prefix' => 'mobile'], function () {
        Route::get('/list', [ContentController::class, 'mobilePagesList'])->name('mobile_pages_list');
        Route::get('/view/{id}', [ContentController::class, 'viewMobilePage'])->name('view_mobile_page');
        Route::get('/edit/{id}', [ContentController::class, 'editMobilePage'])->name('edit_mobile_page');
        Route::post('/update', [ContentController::class, 'updateMobilePage'])->name('update_mobile_page');
        Route::get('/add', [ContentController::class, 'addMobilePage'])->name('add_mobile_page');
        Route::post('/save', [ContentController::class, 'saveMobilePage'])->name('save_mobile_page');
        Route::post('/delete', [ContentController::class, 'deleteMobilePage'])->name('delete_mobile_page');
        Route::post('/restore', [ContentController::class, 'restoreMobilePage'])->name('restore_mobile_page');
      });

      Route::group(['prefix' => 'mobilehome'], function () {
        Route::get('list', [MediaController::class, 'mobilehomelist'])->name('mobile-home.list');
        Route::get('view/{id}', [MediaController::class, 'mobilehomeview'])->name('mobile-home.view');
        Route::get('edit/{id}', [MediaController::class, 'mobilehomeedit'])->name('mobile-home.edit');
      });

      Route::group(['prefix' => 'media'], function () {
        Route::get('list', [MediaController::class, 'medialist'])->name('media.list');

        Route::group(['prefix' => 'website'], function () {
          Route::get('list/{slug}', [MediaController::class, 'mediawebsitelist'])->name('media.website.list');
          Route::get('edit-list/{slug}', [MediaController::class, 'mediawebsiteeditlist'])->name('media.website.editlist');
          Route::get('edit/{id}', [MediaController::class, 'mediawebsiteedit'])->name('media.website.edit');
          Route::post('update', [MediaController::class, 'mediawebsiteiupdate'])->name('media.website.update');
        });

        Route::group(['prefix' => 'mobile'], function () {
          Route::get('list/{slug}', [MediaController::class, 'mediamobilelist'])->name('media.mobile.list');
          Route::get('edit-list/{slug}', [MediaController::class, 'mediamobileeditlist'])->name('media.mobile.editlist');
          Route::get('edit/{id}', [MediaController::class, 'mediamobileedit'])->name('media.mobile.edit');
          Route::post('update', [MediaController::class, 'mediamobileiupdate'])->name('media.mobile.update');
        });
      });

      Route::group(['prefix' => 'expertise'], function () {
        Route::get('list', [ExpertiseController::class, 'expertiselist'])->name('expertise_list');
        Route::get('edit/{id}', [ExpertiseController::class, 'edit'])->name('expertise.edit');
        Route::post('update', [ExpertiseController::class, 'updateExpertise'])->name('expertise.update');
        Route::post('/delete', [ExpertiseController::class, 'deleteExpertise'])->name('delete_expertise');
        Route::get('/add', [ExpertiseController::class, 'addExpertise'])->name('add_expertise');
        Route::post('/save', [ExpertiseController::class, 'saveExpertise'])->name('save_expertise');
      });

      Route::group(['prefix' => 'blogs'], function () {
        Route::get('list', [BlogsController::class, 'bloglist'])->name('blogs_list');
        Route::get('edit/{id}', [BlogsController::class, 'edit'])->name('blogs.edit');
        Route::post('update', [BlogsController::class, 'updateblogs'])->name('blogs.update');
        Route::post('/delete', [BlogsController::class, 'deleteblogs'])->name('delete_blogs');
        Route::get('/add', [BlogsController::class, 'addblogs'])->name('add_blogs');
        Route::post('/save', [BlogsController::class, 'saveblogs'])->name('save_blogs');
        Route::post('/blog_image_delete', [BlogsController::class, 'deleteBlogImage'])->name('delete.blog_image_delete');
      });
    });


    // Contact Us
    // Route::group(['prefix' => 'contact_us'], function () {
    //   Route::post('/status', [TicketsController::class, 'statusUpdate'])->name('status_Update');
    //   Route::get('/list', [TicketsController::class, 'contactUsMessagesList'])->name('contact_us_message_list');
    //   Route::get('/view/{id}', [TicketsController::class, 'viewContactUsMessage'])->name('view_contact_us_message');
    // });


    //help and support management
    Route::group(['prefix' => 'feedback'], function () {
      Route::group(['prefix' => 'help-and-support'], function () {
        Route::get('list', [HelpSupportController::class, 'helplist'])->name('feed.help-support.list');
        Route::get('view/{id}', [HelpSupportController::class, 'helpview'])->name('feed.help-support.view');
        Route::post('change-status', [HelpSupportController::class, 'changeStatus'])->name('feed.help-support.changestatus');
        Route::post('send-message', [HelpSupportController::class, 'sendMessage'])->name('help-suport.sendmessage');
      });

      Route::get('/list', [TicketsController::class, 'feedbacksList'])->name('feedbacks_list');
      Route::get('/view/{id}', [TicketsController::class, 'viewFeedback'])->name('view_feedback');
    });


    // Report Data Management
    Route::group(['prefix' => 'report-management'], function () {

        Route::get('country-list', [ReportController::class, 'countryList'])->name('country-list');
        Route::get('list', [ReportController::class, 'list'])->name('list');
        Route::get('user-list', [ReportController::class, 'userlist'])->name('user-list');
  
        Route::get('report-score', [ReportController::class, 'reportScore'])->name('report-score');
  
        Route::get('report-download', [FileController::class, 'reportDownload'])->name('report-download');
        Route::get('exceldownload/{id}', [FileController::class, 'exceldownload'])->name('exceldownload');
  
        Route::post('calculate-score', [ReportController::class, 'calculateScore'])->name('calculate-score');
    });




    // Misc Data Management
    // Route::group(['prefix' => 'misc'], function () {

    //   Route::group(['prefix' => 'brand'], function () {
    //     Route::get('add', [MiscController::class, 'brandadd'])->name('brand.add');
    //     Route::post('save', [MiscController::class, 'savebrand'])->name('brand.save');
    //     Route::get('list', [MiscController::class, 'brandlist'])->name('brand.list');
    //     Route::get('view/{id}', [MiscController::class, 'brandview'])->name('brand.view');
    //     Route::get('edit/{id}', [MiscController::class, 'brandedit'])->name('brand.edit');
    //     Route::post('update', [MiscController::class, 'brandupdate'])->name('brand.update');
    //     Route::post('delete', [MiscController::class, 'movetorecycle'])->name('brand.movetorecycle');
    //   });
    // });

    // Recycle Bin
    Route::group(['prefix' => 'recycle_bin'], function () {

      // Route::group(['prefix' => 'misc'], function () {

      //   Route::group(['prefix' => 'brands'], function () {
      //     Route::get('deleted', [MiscController::class, 'branddeletedlist'])->name('brand.deleted.list');
      //     Route::post('restore', [MiscController::class, 'branddeletedrestore'])->name('brand.deleted.restore');
      //     Route::post('delete-permanent', [MiscController::class, 'branddeletedpermanent'])->name('brand.deleted.deletepermanent');
      //   });
      // });

      Route::group(['prefix' => 'admins'], function () {
        Route::get('/deleted', [AdminsController::class, 'deletedAdminsList'])->name('deleted_admins_list');
        Route::post('/permanent_delete', [AdminsController::class, 'permanentDeleteAdmin'])->name('permanent_delete_admin');
      });

      //Recycle Bin Coordinator
      Route::group(['prefix' => 'coordinator'], function () {
        Route::get('/deleted', [CoordinatorController::class, 'deletedCoordinatorList'])->name('deleted_coordinator_list');
        Route::post('restore', [CoordinatorController::class, 'coordinatorDeletedrestore'])->name('coordinator.deleted.restore');
        Route::post('/permanent_delete', [CoordinatorController::class, 'permanentDeleteCoordinator'])->name('permanent_delete_coordinator');
      });

      Route::group(['prefix' => 'expert'], function () {
        Route::get('/deleted', [CoordinatorController::class, 'deletedExpertList'])->name('deleted_expert_list');
        Route::post('restore', [CoordinatorController::class, 'expertDeletedrestore'])->name('expert.deleted.restore');
        Route::post('/permanent_delete', [CoordinatorController::class, 'permanentDeleteExpert'])->name('permanent_delete_expert');
      });

      Route::group(['prefix' => 'expert_panel'], function () {
        Route::get('/deleted', [CoordinatorController::class, 'deletedExpertPanelList'])->name('deleted_expert_panel_list');
        Route::post('restore', [CoordinatorController::class, 'expertPanelDeletedrestore'])->name('expert.panel.deleted.restore');
        Route::post('/permanent_delete', [CoordinatorController::class, 'permanentDeleteExpertPanel'])->name('permanent_delete_expert_panel');
      });

      Route::group(['prefix' => 'questionnaire'], function () {
        Route::get('/deleted', [QuestionnaireController::class, 'deletedQuestionnaireList'])->name('deleted_questionnaire_list');
        Route::post('restore', [QuestionnaireController::class, 'questionnaireDeletedrestore'])->name('questionnaire.deleted.restore');
        Route::post('/permanent_delete', [QuestionnaireController::class, 'permanentDeleteQuestionnaire'])->name('permanent_delete_questionnaire');
      });

      Route::group(['prefix' => 'question'], function () {
        Route::get('/deleted', [QuestionController::class, 'deletedQuestionList'])->name('deleted_question_list');
        Route::post('restore', [QuestionController::class, 'questionDeletedrestore'])->name('question.deleted.restore');
        Route::post('/permanent_delete', [QuestionController::class, 'permanentDeleteQuestion'])->name('permanent_delete_question');
      });

      Route::group(['prefix' => 'expertise'], function () {
        Route::get('/deleted', [ExpertiseController::class, 'deletedExpertiseList'])->name('deleted_expertise_list');
        Route::post('restore', [ExpertiseController::class, 'expertiseDeletedrestore'])->name('expertise.deleted.restore');
        Route::post('/permanent_delete', [ExpertiseController::class, 'permanentDeleteExpertise'])->name('permanent_delete_expertise');
      });

      Route::group(['prefix' => 'roles'], function () {
        Route::get('/deleted', [RolesController::class, 'deletedRoles'])->name('deleted_roles');
        Route::post('/permanent_delete', [RolesController::class, 'permanentDeleteRole'])->name('permanent_delete_role');
      });

      Route::group(['prefix' => 'blogs'], function () {
        Route::get('/deleted', [BlogsController::class, 'deletedBlogList'])->name('deleted_blog_list');
        Route::post('restore', [BlogsController::class, 'blogDeletedrestore'])->name('blog.deleted.restore');
        Route::post('/permanent_delete', [BlogsController::class, 'permanentDeleteBlog'])->name('permanent_delete_blog');
      });
    });
  });
});


Route::get('countryScore', [FileController::class, 'countryScore']); //API For Map

Route::get('excelfile', [FileController::class, 'excelfile']); 

Auth::routes([
  //'register' => false,
  'reset' => false,
  'verify' => false,
]);

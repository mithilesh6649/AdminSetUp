<?php

namespace App\Http\Controllers;

// use App\Jobs\HelpAndSupportJob;
// use App\Mail\HelpAndSupportMail;
// use Illuminate\Support\Facades\Mail;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HelpAndSupport;
use App\Models\HelpChatHeadLog;


const OPENED = 1;
const RESOLVED = 2;
const ADMIN = 3;
const COORDINATOR = 1;
const EXPERT = 2;
class HelpSupportController extends Controller
{
    public function helplist()
    {
        $helplist = HelpAndSupport::orderBy('id', 'DESC')->get();
        return view('feedbacks.help-support.help_list', compact('helplist'));
    }


    public function helpview($id, Request $request)
    {
        $id = base64_decode($id);
        $viewhelp = HelpAndSupport::where('id', $id)->with('helpResponse')->first();

        //Get Help Support Related User Data
        if ($viewhelp->user_type == COORDINATOR) {
            // $user = User::where('id', $viewhelp->user_id)->with('getcountry')->first();
            // $viewhelp->user_profile_image = $user->profile_image ?? '';
            // $viewhelp->user_timezone = $user->getcountry->timezone ?? '';
            $viewhelp->user_profile_image = User::where('id', $viewhelp->user_id)->pluck("profile_image")->first();

        } elseif ($viewhelp->user_type == EXPERT) {
            // $user = Expert::where('id', $viewhelp->user_id)->with('getcountry')->first();
            // $viewhelp->user_profile_image = $user->profile ?? '';
            // $viewhelp->user_timezone = $user->getcountry->timezone ?? '';
            $viewhelp->user_profile_image = Expert::select("profile")->where('id', $viewhelp->user_id)->pluck("profile")->first();
        }

        return view('feedbacks.help-support.view_help', compact('viewhelp'));
    }

    public function changeStatus(Request $request)
    {
        $status_data = HelpAndSupport::where('id', $request->id)->first();
        if ($status_data) {
            $status_data->status = $request->status;
            $status_data->update();
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function sendMessage(Request $request)
    {
        try {
            $message = [
                "help_and_support_id" => $request->help_and_support_id,
                "description" => $request->message,
                "status" => RESOLVED,
                "user_type" => ADMIN,
                "response_by" => ADMIN
            ];
            HelpChatHeadLog::create($message);

            //HelpAndSupport::where('id', $request->help_and_support_id)->update(['status' => RESOLVED]);

            //Send Email To User
            // $helpAndSupport = HelpAndSupport::where('id', $request->help_and_support_id)->first();
            // if ($helpAndSupport->user_type == COORDINATOR) {
            //     $user = User::where('id', $helpAndSupport->user_id)->first();
            //     $user_name =  $user->name_and_affiliation;
            // } elseif ($helpAndSupport->user_type == EXPERT) {
            //     $user = Expert::where('id', $helpAndSupport->user_id)->first();
            //     $user_name =  $user->name;
            // }

            // if ($user) {
            //     $emailData =  [
            //         "user_email" => $user->email,
            //         "user_name" => $user_name,
            //         "reply_message" => $request->message,
            //     ];
            //     HelpAndSupportJob::dispatch($emailData);
            // }

            return response()->json([
                'success' => true,
                'message' => 'Sent Successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong !",
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use DB;

class ContactUsController extends Controller
{
      public function contactUsMessagesList(Request $request)
    {
        //if(Auth::user()->can('view_contact_us')) {
        $contactUsMessagesList = ContactUs::orderByDesc('id')->get();
        
        return view('feedbacks.contact_us.list', compact('contactUsMessagesList'));
//      }
        //      else {
        //          return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        //      }
    }

    public function viewContactUsMessage($id)
    {
        //if(Auth::user()->can('view_contact_us')) {
        $contactUsMessage = ContactUs::find($id);
        
        return view('feedbacks.contact_us.view', compact('contactUsMessage'));
//      }
        //      else {
        //          return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        //      }
    }

    public function statusUpdate(Request $request)
    {
        $contactUs = ContactUs::find($request->id);
        $contactUs['status'] = $request->status;
        $contactUs->save();
        if ($contactUs) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => true]);
        }
    }
}

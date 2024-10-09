<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\MediaPage;
use App\Models\MediaPageSection;
use Illuminate\Http\Request;
use App\Models\IntroPageContent;
use Auth;
class MediaController extends Controller
{
    public function medialist()
    {
        if (Auth::user()->can('view_media_content')) {

			$medialist = Media::get();
            return view('pages.media.media_list', compact('medialist'));

		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}

    }

    public function mediawebsitelist($slug)
    {
        if (Auth::user()->can('Edit_media_content')) {

			$mediaweblist = MediaPage::where('media_type', 'website')->get();
            return view('pages.media.web.web_list', compact('mediaweblist'));

		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}

        
    }

    public function mediamobilelist($slug)
    {
        if (Auth::user()->can('Edit_media_content')) {

            $mediamobilelist = MediaPage::where('media_type', 'mobile')->get();
            return view('pages.media.mobile.mobile_list', compact('mediamobilelist'));

		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
        
    }
    public function mediawebsiteeditlist($slug)
    {
        if (Auth::user()->can('Edit_media_content')) {
             
            $mediawebseclist = MediaPageSection::where('page_slug', $slug)->get();
            return view('pages.media.web.edit_web_list', compact('mediawebseclist'));

		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
    }

    public function mediawebsiteedit($id)
    {
        if (Auth::user()->can('Edit_media_content')) {
             
            $mediawebsecedit = MediaPageSection::where('id', base64_decode($id))->first();
            return view('pages.media.web.edit_web', compact('mediawebsecedit'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
       
    }
    public function mediawebsiteiupdate(Request $request)
    {
        $mediaupdate = MediaPageSection::where('id', $request->id)->first();
        if ($request->file('image')) {
            $filename = rand() . time() . '.' . $request->file('image')->extension();
            if ($request->file('image')->move('assets/media', $filename)) {
                $mediaupdate->light_image = $filename;
                $mediaupdate->update();
            } 
        }

        return redirect()->route('media.website.editlist', $mediaupdate->page_slug)->with('status', 'Media Update Successfully');
    }

     /**
     * mobile home content dynamic
     */
    public function mobilehomelist()
    {
       $homelistdata=IntroPageContent::get();
        return view('pages.mobile-home.mobile_home_list',compact('homelistdata'));
    }

    public function mobilehomeview($id)
    {
        $viewmobilehome = IntroPageContent::where('id',base64_decode($id))->first();
        return view('pages.mobile-home.view_home',compact('viewmobilehome'));
    }
    public function mobilehomeedit($id)
    {
        $editmobilehome = IntroPageContent::where('id',base64_decode($id))->first();
        return view('pages.mobile-home.edit_mobile_home',compact('editmobilehome'));
    }

    public function mediamobileeditlist($slug)
    {

        $mediawebseclist = MediaPageSection::where('page_slug', $slug)->get();
        return view('pages.media.mobile.edit_mobile_list', compact('mediawebseclist'));
    }

    public function mediamobileedit($id)
    {

        $mediawebsecedit = MediaPageSection::where('id', base64_decode($id))->first();
        return view('pages.media.mobile.edit_mobile', compact('mediawebsecedit'));
    }
    public function mediamobileiupdate(Request $request)
    {
        $mediaupdate = MediaPageSection::where('id', $request->id)->first();
        if ($request->file('lightimage')) {
            $filename = 'light_'.rand() . time() . '.' . $request->file('lightimage')->extension();
            if ($request->file('lightimage')->move('assets/media', $filename)) {
                $mediaupdate->light_image = $filename;
            } 
        }

        if ($request->file('darkimage')) {
            $filename = 'dark_'.rand() . time() . '.' . $request->file('darkimage')->extension();
            if ($request->file('darkimage')->move('assets/media', $filename)) {
                $mediaupdate->dark_image = $filename;
            } 
        }

        $mediaupdate->update();

        return redirect()->route('media.mobile.editlist', $mediaupdate->page_slug)->with('status', 'Media Update Successfully');
    }



}

<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertiseController extends Controller
{
    public function expertiselist()
    {
        if (Auth::user()->can('view_media_content')) {

            $expertiselist = Expertise::get();
            return view('pages.expertise.expertise_list', compact('expertiselist'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }


    public function addExpertise(Request $request)
    {

        if (Auth::user()->can('add_expertise')) {
            return view('pages.expertise.add_expertise');
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }


    /**
     * This function is used to Save Expertise and show listing
     */
    public function saveExpertise(Request $request)
    {
        $expertise = new Expertise;
        $expertise->name = $request->name;
        $expertise->status = $request->status;
        $expertise->created_by = Auth::user()->id;
        if ($expertise->save()) {
            return redirect()->route('expertise_list')->with('success', 'Expertise Added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function edit($id)
    {
        if (Auth::user()->can('edit_expertise')) {
            $id = base64_decode($id);
            $expertise_edit = Expertise::where('id', $id)->first();
            return view('pages.expertise.edit_expertise', compact('expertise_edit'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function updateExpertise(Request $request)
    {
        $expertise_edit = Expertise::where('id', $request->id)->first();
        $expertise_edit->name = $request->name;
        $expertise_edit->status = $request->status;
        $expertise_edit->update();
        return redirect()->route('expertise_list')->with('success', 'Expertise details updated Successfully!');
    }

    public function deleteExpertise(Request $request)
    {
        if (Auth::user()->can('delete_expertise')) {
            $deleteExpertise = Expertise::where('id', $request->id)->first();
            if ($deleteExpertise) {
                $deleteExpertise->delete();

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


    /*=============Recycle Bin===================================START*/
    public function deletedExpertiseList()
    {
        if (Auth::user()->can('view_deleted_expertise')) {

            $expertises = Expertise::onlyTrashed()->orderBy('updated_at', 'DESC')->get();
            return view('pages.expertise.deleted_expertise_list', compact('expertises'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function expertiseDeletedrestore(Request $request)
    {
        $deleted_d = Expertise::onlyTrashed()->where('id', $request->id)->first();

        if ($deleted_d) {
            $deleted_d->restore();


            return response()->json([
                'success' => 1,
            ]);
        } else {
            return response()->json([
                'success' => 0,
            ]);
        }
    }

    public function permanentDeleteExpertise(Request $request)
    {
        $deleted_d = Expertise::onlyTrashed()->where('id', $request->id)->first();
        if ($deleted_d) {
            $deleted_d->forceDelete();
            return response()->json([
                'success' => 1,
            ]);
        } else {
            return response()->json([
                'success' => 0,
            ]);
        }
    }
    /*=============Recycle Bin===================================END*/
}

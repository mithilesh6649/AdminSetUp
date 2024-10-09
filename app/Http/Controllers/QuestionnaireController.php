<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Question;
use App\Models\QuestionExpertPanel;
use App\Models\Questionnaire;
use App\Models\QuestionExpertResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public function list()
    {
        if (Auth::user()->can('view_questionnaire')) {

            $questionnairelist = Questionnaire::orderBy('id', 'DESC')->get();
            return view('questionnaire.questionnaire_list', compact('questionnairelist'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function view($id)
    {
        if (Auth::user()->can('view_questionnaire')) {
            $id = base64_decode($id);
            $questionnaires_detl = Questionnaire::where('id', $id)->with('questionExpertPanel.expertPanel.experPanelExepert.Expert')->first();
            return view('questionnaire.view_questionnaire', compact('questionnaires_detl'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function addQuestionnaire(Request $request)
    {

        if (Auth::user()->can('add_questionnaire')) {
            return view('questionnaire.add_questionnaire');
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }


    /**
     * This function is used to Save Admins and show listing
     */
    public function saveQuestionnaire(Request $request)
    {
        $questionnaire = new Questionnaire;
        $questionnaire->title = $request->title;
        $questionnaire->status = $request->status;
        $questionnaire->created_by = Auth::user()->id;

        if ($questionnaire->save()) {
            return redirect()->route('questionnaire.list')->with('success', 'Questionnaire Created Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->can('edit_questionnaire')) {

            $id = base64_decode($id);
            $questionnaires_edit = Questionnaire::where('id', $id)->first();

            return view('questionnaire.edit_questionnaire', compact('questionnaires_edit'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function updateQuestionnaire(Request $request)
    {
        $questionnaire_edit = Questionnaire::where('id', $request->id)->first();
        $questionnaire_edit->title = $request->title;
        $questionnaire_edit->status = $request->status;
        $questionnaire_edit->update();
        return redirect()->route('questionnaire.list')->with('success', 'Questionnaire details updated Successfully!');
    }


    public function deleteQuestionnaire(Request $request)
    {
        if (Auth::user()->can('delete_questionnaire')) {
            $deletequestionnaire = Questionnaire::where('id', $request->id)->first();
            if ($deletequestionnaire) {
                $deletequestionnaire->delete();

                Question::where('questionnaire_id', $request->id)->delete();

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


    /*=============For Admin Questionnaires Related View Expert List===================================START*/
    public function questionnairesList()
    {
        if (Auth::user()->can('view_questionnaire')) {
            $questionnairelist = Questionnaire::orderBy('id', 'DESC')->get();

            return view('questionnaire.questionnaires_list', compact('questionnairelist'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function questionnairesView($id)
    {
        $id = base64_decode($id);
        $questionnaires_detl = Questionnaire::where('id', $id)->with('questionExpertPanel.expertPanel.experPanelExepert.Expert')->first();
        return view('questionnaire.view_questionnaires_list', compact('questionnaires_detl'));
    }

    public function viewAllQuestions($id = null, $question_expert_panel_id)
    {
        if ($id != null) {
            $Id = base64_decode($id);
            $question_expert_panel_id = base64_decode($question_expert_panel_id);
            $expertDetail = Expert::find($Id);
            if ($expertDetail) {
                $coordinateId = $expertDetail->user_id;
                $questionDetailwithAnswers = QuestionExpertResponse::viewAllQuestions($Id, $question_expert_panel_id,$coordinateId);
                return view('questionnaire.view_all_questions', compact('expertDetail', 'questionDetailwithAnswers'));
            }
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    /*=============For Admin Quesstionnaires Related View Expert List===================================END*/


    /*=============Recycle Bin===================================START*/
    public function deletedQuestionnaireList()
    {
        if (Auth::user()->can('view_deleted_questionnaire')) {

            $questionnaires = Questionnaire::onlyTrashed()->orderBy('updated_at', 'DESC')->get();
            return view('questionnaire.deleted_questionnaire_list', compact('questionnaires'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function questionnaireDeletedrestore(Request $request)
    {

        $deleted_d = Questionnaire::onlyTrashed()->where('id', $request->id)->first();

        if ($deleted_d) {
            $deleted_d->restore();

            Question::where('questionnaire_id', $request->id)->restore();

            return response()->json([
                'success' => 1,
            ]);
        } else {
            return response()->json([
                'success' => 0,
            ]);
        }
    }

    public function permanentDeleteQuestionnaire(Request $request)
    {
        $deleted_d = Questionnaire::onlyTrashed()->where('id', $request->id)->first();
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

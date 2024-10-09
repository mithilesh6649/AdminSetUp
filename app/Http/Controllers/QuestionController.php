<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Question;
use App\Models\QuestionExpertResponse;
use App\Models\Questionnaire;
use App\Models\QuestionOption;
use App\Models\QuestionSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class QuestionController extends Controller
{
    public function list()
    {
        if (Auth::user()->can('view_question')) {
            $questionlist = Question::with(['questionnaire', 'question_options'])->get();
            return view('question.question_list', compact('questionlist'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function view($id)
    {
        if (Auth::user()->can('view_question')) {

            $id = base64_decode($id);
            $question_detl = Question::where('id', $id)->with(['questionnaire', 'questionSection', 'question_options'])->first();

            return view('question.view_question', compact('question_detl'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function addQuestion(Request $request)
    {
        if (Auth::user()->can('add_question')) {
            $questionnaireList = Questionnaire::all();
            $questionSectionList = QuestionSection::all();
            return view('question.add_question', compact('questionnaireList', 'questionSectionList'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }


    /**
     * This function is used to Save Admins and show listing
     */
    public function saveQuestion(Request $request)
    {

        try {
            $Question = Question::create([
                'questionnaire_id' => $request->questionnaire_id,
                'question' => $request->question,
                'question_type' => $request->question_type,
                'question_section_id' => $request->question_section,
                'status' => $request->status,
                'created_by' => Auth::user()->id,
            ]);

            //Available question types (1=option, 2=text)
            // if ($request->question_type == 1 && $request->option) {
            //     for ($i = 0; $i < count($request->option); $i++) { //Add Questions Options
            //         QuestionOption::create([
            //             'question_id' => $Question->id,
            //             'option' => $request->option[$i],
            //             //'is_correct' => $request->is_correct[$i],
            //             'created_by' => Auth::user()->id,
            //         ]);
            //     }
            // }

            return response()->json([
                'success' => true,
                'message' => 'Question added successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        if (Auth::user()->can('edit_question')) {

            $questionnaireList = Questionnaire::all();
            $questionSectionList = QuestionSection::all();

            $id = base64_decode($id);
            $question_edit = Question::where('id', $id)->with(['questionnaire', 'question_options'])->first();

            return view('question.edit_question', compact('question_edit', 'questionnaireList', 'questionSectionList'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }


    public function deleteQuestionOption(Request $request)
    {
        $deleteQuestionOption = QuestionOption::where('id', $request->id)->delete();
        if ($deleteQuestionOption) {
            return response()->json([
                'success' => true,
                'message' => 'option deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function updateQuestion(Request $request)
    {
        try {
            //Update Question
            Question::where('id', $request->id)->update([
                'questionnaire_id' => $request->questionnaire_id,
                'question' => $request->question,
                'question_section_id' => $request->question_section,
                'status' => $request->status,
            ]);

            /*
            //Available question types (1=option, 2=text)
            if ($request->question_type == 1) {
                //Update Existing Questions Options
                if ($request->option_ids) {
                    for ($i = 0; $i < count($request->option_ids); $i++) {
                        QuestionOption::where([
                            'question_id' => $request->id,
                            'id' => $request->option_ids[$i],
                        ])->update([
                            'option' => $request->option[$i],
                            // 'is_correct' => $request->is_correct[$i],
                        ]);
                    }
                }

                if ($request->add_option) {
                    //As well Add new question options (if user want)
                    for ($i = 0; $i < count($request->add_option); $i++) {
                        QuestionOption::create([
                            'question_id' => $request->id,
                            'option' => $request->add_option[$i],
                            //'is_correct' => $request->add_is_correct[$i],
                            'created_by' => Auth::user()->id,
                        ]);
                    }
                }
            }
            */

            return response()->json([
                'success' => true,
                'message' => 'Question updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong !",
            ]);
        }
    }


    public function deleteQuestion(Request $request)
    {
        if (Auth::user()->can('delete_question')) {
            $deletequestion = Question::where('id', $request->id)->first();
            if ($deletequestion) {
                $deletequestion->delete();
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

    public function deletedQuestionList()
    {
        if (Auth::user()->can('view_deleted_question')) {

            $questions = Question::onlyTrashed()->orderBy('updated_at', 'DESC')->get();

            foreach ($questions as $key => $value) {
                $value->questionnaire = Questionnaire::withTrashed()->where('id', $value->questionnaire_id)->first();
            }

            return view('question.deleted_question_list', compact('questions'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function questionDeletedrestore(Request $request)
    {

        $deleted_d = Question::onlyTrashed()->where('id', $request->id)->first();

        if ($deleted_d) {
            //check Questionnaire is in trashed or not
            $is_questionnaire_trashed = Questionnaire::onlyTrashed()->where('id', $deleted_d->questionnaire_id)->first();
            if ($is_questionnaire_trashed) {
                return response()->json([
                    'success' => 0,
                    'message' => "Please proceed with restore the questionnaire first.",
                ]);
            }

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

    public function permanentDeleteQuestion(Request $request)
    {
        $deleted_d = Question::onlyTrashed()->where('id', $request->id)->first();
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

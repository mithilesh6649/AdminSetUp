<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionExpertResponse extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'question_expert_responses';

    protected $fillable = ['id', 'expert_id', 'question_id', 'questionnaires_id', 'status', 'created_by', 'region_id', 'answer', 'text_answer', 'edit_count'];


    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id')->with('questionSection', 'questionnaire');
    }

    public function Region() {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

     public function Expert() {

        return $this->belongsTo(Expert::class, 'expert_id', 'id');
    }


    public static function viewAllQuestions($Id,$question_expert_panel_id,$coordinateId) {

        $questionsDetail = QuestionExpertResponse::select('question_id')->where(['expert_id'=>$Id,'questionnaires_id'=>$question_expert_panel_id])->groupBy('question_id')->get();
        if(count($questionsDetail) > 0) {
           $questionList = [];$count=0;
           foreach($questionsDetail as $key) {
              $questionDetail = QuestionExpertResponse::where('expert_id',$Id)->where('question_id',$key->question_id)->with(['question','Region'])
                                                        ->with('question.coordinateQuestions',function($q) use ($coordinateId){
                                                            $q->where('coordinator_id',$coordinateId);
                                                        })->get();                                                                       
              $region = [];$answer = [];$text_answer=[];
              foreach($questionDetail as $key2) {
                $question_name = isset($key2->question->coordinateQuestions->question) ? $key2->question->coordinateQuestions->question : $key2->question->question;
                if($key2->region_id != '') {
                    $region[] = $key2->Region->region;
                    $answer[] = $key2->answer == 1 ? 'Most unlikely' : 'Most likely';
                } else {
                    $text_answer[] = $key2->text_answer; 
                }
              }
              if(!empty($region) && !empty($answer)) {
                $implode_region = implode("<br>",$region);
                $implode_answer = implode("<br>",$answer); 
                $implode_text   = '';
              } else {
                $implode_region = '';
                $implode_answer = ''; 
                $implode_text   = implode("<br>",$text_answer); 
              }

              $questionList[$key->question_id] = ['question' => $question_name,
                                                  'implodeRegion' => $implode_region,
                                                  'implodeAnswer' => $implode_answer,
                                                  'implodeText' => $implode_text
                                                ];
            }
            return $questionList;
        } else {
            return [];
        }
    }
}

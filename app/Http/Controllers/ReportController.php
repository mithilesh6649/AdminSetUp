<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\User;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\QuestionExpertResponse;
use App\Models\Country;
use App\Models\QuestionOption;
use App\Models\QuestionSection;

use Illuminate\Support\Facades\Auth;



class ReportController extends Controller
{

    public function countryList()
    {


        $getCountry = Country::whereStatus('1')->with('region')->get();


        $MOST_UNLIKELY = 1;
        $MOST_LIKELY = 2;
        $MOST_UNLIKELY_POINT = 1;
        $MOST_LIKELY_POINT = 10;

        $finalScore = [];

        $score2 = [
            "country" => "",
            "region" => "",
            "expert_count" => 0,
            "the_biophysical_conditions_score" => 0,
            "tradeoff_intensity_score" => 0,
            "institutional_response_score" => 0,
            "total_score" => 0,
        ];


        foreach (Country::all() as $key => $value) {

            $countryData = Country::where('id', $value->id)->with('region')->get()->toArray();

            $regions_ids = [];
            foreach ($countryData as $key => $country) {

                foreach ($country["region"] as $key => $region) {

                    //global total experts count according to country
                    array_push($regions_ids, $region["id"]);

                    $total_experts_count = QuestionExpertResponse::where('region_id', $region["id"])->distinct("expert_id")->count();


                    //calculate 3 regions sections score
                    foreach ($region["question_expert_response"] as $key => $expert_response) {

                        if (isset($expert_response["question"]["question_section"]["slug"])) {

                            $sectionSlug = $expert_response["question"]["question_section"]["slug"];
                            //Calculate For total score
                            $score2[$sectionSlug . "_score"] += $expert_response["answer"] == $MOST_LIKELY ? $MOST_LIKELY_POINT : $MOST_UNLIKELY_POINT;
                            $score2["total_score"] += $expert_response["answer"] == $MOST_LIKELY ? $MOST_LIKELY_POINT : $MOST_UNLIKELY_POINT;
                        }
                    }
                }

                //Calculate total final score
                $score2["country"] = $country["country_name"];

                $total_experts_count = QuestionExpertResponse::whereIn('region_id', $regions_ids)->distinct("expert_id")->count();
                $score2["expert_count"] = $total_experts_count;
                if ($score2["total_score"] > 0) {

                    $score2["total_score"] =  $score2["total_score"] / $total_experts_count;
                }

                array_push($finalScore, $score2);
                $score2 = array_fill_keys(
                    [
                        "country",
                        "region",
                        "expert_count",
                        "the_biophysical_conditions_score",
                        "tradeoff_intensity_score",
                        "institutional_response_score",
                        "total_score"
                    ],
                    0
                );
            }
        }



        //$getCountry =Country::whereStatus('1')->where('id', 103)->with('region')->get()->toArray();


        return view('report.country_list', compact('finalScore'));
    }




    public function list()
    {
        $this_year = date("Y");
        $year = [];

        for ($years = 2023; $years <= $this_year; $years++) {

            $year[] = $years;
        }

        $user = [];
        foreach ($year as $key => $value) {

            $user[] = QuestionExpertResponse::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->count();
        }




        $data['lineChart'] = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"), \DB::raw('max(created_at) as createdAt'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_name')
            ->orderBy('createdAt')
            ->get();

        return view('report.list', $data)->with('year', json_encode($year, JSON_NUMERIC_CHECK))->with('user', json_encode($user, JSON_NUMERIC_CHECK));
    }




    public function userlist()
    {
        $this_year = date("Y");
        $year = [];

        for ($years = 2023; $years <= $this_year; $years++) {

            $year[] = $years;
        }

        $user = [];
        foreach ($year as $key => $value) {

            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->count();
        }

        $data['lineChart'] = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"), \DB::raw('max(created_at) as createdAt'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_name')
            ->orderBy('createdAt')
            ->get();

        return view('report.list_user', $data)->with('year', json_encode($year, JSON_NUMERIC_CHECK))->with('user', json_encode($user, JSON_NUMERIC_CHECK));
    }

    public function reportScore(Request $request)
    {
        $countries = Country::all();
        return view('report.bar_chart', compact('countries'));
    }


    public function calculateScore(Request $request)
    {
        //Country Related Total Region Score , Region Related Section Score
        $MOST_UNLIKELY = 1;
        $MOST_LIKELY = 2;
        $MOST_UNLIKELY_POINT = 1;
        $MOST_LIKELY_POINT = 10;
        //$TEXT_ANSWER_POINT = 0;

        $finalScore = [];


        $score = [

            "color" => 0,
            "country" => "",
            "region" => "",
            "expert_count" => 0,
            "the_biophysical_conditions_score" => 0,
            "tradeoff_intensity_score" => 0,
            "institutional_response_score" => 0,
            "total_score" => 0,
        ];

        $score2 = [
            "color" => 1,
            "country" => "",
            "region" => "",
            "expert_count" => 0,
            "the_biophysical_conditions_score" => 0,
            "tradeoff_intensity_score" => 0,
            "institutional_response_score" => 0,
            "total_score" => 0,
        ];

        //get total score according to country
        $country_id = $request->country_id;
        $countryData = Country::where('id', $country_id)->with('region')->get()->toArray();

        //Refererence for text answer
        //$expert_id = $countryData[0]["region"][0]["question_expert_response"][0]["expert_id"];

        $regions_ids = [];
        foreach ($countryData as $key => $country) {

            foreach ($country["region"] as $key => $region) {

                //global total experts count according to country
                array_push($regions_ids, $region["id"]);

                //get total expert count of specific region of "question_expert_responses" table
                $total_experts_count = QuestionExpertResponse::where('region_id', $region["id"])->distinct("expert_id")->count();

                $score["country"] = $country["country_name"];
                $score["region"] = $region["region"];
                $score["expert_count"] =  $total_experts_count;


                //calculate 3 regions sections score
                foreach ($region["question_expert_response"] as $key => $expert_response) {

                    if (isset($expert_response["question"]["question_section"]["slug"])) {

                        $sectionSlug = $expert_response["question"]["question_section"]["slug"];
                        $score[$sectionSlug . "_score"] += $expert_response["answer"] == $MOST_LIKELY ? $MOST_LIKELY_POINT :  $MOST_UNLIKELY_POINT;
                        $score["total_score"] += $expert_response["answer"] == $MOST_LIKELY ? $MOST_LIKELY_POINT :  $MOST_UNLIKELY_POINT;

                        //Calculate For total score
                        $score2[$sectionSlug . "_score"] += $expert_response["answer"] == $MOST_LIKELY ? $MOST_LIKELY_POINT :  $MOST_UNLIKELY_POINT;
                        $score2["total_score"] += $expert_response["answer"] == $MOST_LIKELY ? $MOST_LIKELY_POINT :  $MOST_UNLIKELY_POINT;


                        /*********Add Text Answer Point************/
                        /*
                        if ($expert_response["expert_id"] != $expert_id) {
                            $where = [
                                'expert_id' => $expert_id,
                                'questionnaires_id' =>  $expert_response["questionnaires_id"],
                                'region_id' => NULL,
                            ];
                            $text_answer = QuestionExpertResponse::where($where)->whereNotNull('text_answer')->pluck("text_answer")->first();
                            if ($text_answer) {
                                $score[$sectionSlug . "_score"] += $TEXT_ANSWER_POINT;
                                $score["total_score"] += $TEXT_ANSWER_POINT;

                                $score2[$sectionSlug . "_score"] += $TEXT_ANSWER_POINT;
                                $score2["total_score"] += $TEXT_ANSWER_POINT;

                            }
                            $expert_id=$expert_response["expert_id"];
                        }
                        */
                        /*********Add Text Answer Point************/
                    }
                }


                array_push($finalScore, $score); //get 3 regions count data
                $score = array_fill_keys(
                    [
                        "color",
                        "country",
                        "region",
                        "expert_count",
                        "the_biophysical_conditions_score",
                        "tradeoff_intensity_score",
                        "institutional_response_score",
                        "total_score"
                    ],
                    0
                );

                //$score2["region"][] = $region["region"];
            }

            //Calculate total final score
            $score2["country"] = $country["country_name"];

            $total_experts_count = QuestionExpertResponse::whereIn('region_id', $regions_ids)->distinct("expert_id")->count();
            $score2["expert_count"] = $total_experts_count;

            array_push($finalScore, $score2);
        }

        return response()->json([
            'data' => $finalScore,
            'success' => true,
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FinalExport;
use App\Models\Question;
use App\Models\ExpertPanel;
use App\Models\Country;
use App\Models\Expertise;
use App\Models\FilesLinks;
use App\Models\Affiliation;
use App\Models\QuestionExpertResponse;
use Illuminate\Support\Carbon;
use stdClass;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

 



class FileController extends Controller
{

    public function excelfile()
    {

       /* $directoryPath = 'public/ExcelSheet';
        $files = Storage::files($directoryPath);

        $fileNames = [];

        foreach ($files as $file) {
            //  $file[] = basename($file);

            $file_name = basename($file);
            $sourcePath = public_path('storage/ExcelSheet/'.$file_name);
            $destinationPath = public_path('storage/new/'.$file_name);
            File::copy($sourcePath, $destinationPath);


        }*/

       // dd( $fileNames);  

       // India.xlsx



       //same server 
       /* $sourcePath = public_path('storage/ExcelSheet/India.xlsx'); 
        $destinationPath = public_path('storage/new/India.xlsx');  
        File::copy($sourcePath, $destinationPath);*/



        //other server


       /* $sourceServer = [
            'host' => 'source_host',
            'port' => '22',
            'username' => 'source_username',
            'password' => 'source_password',
        ];

        $destinationServer = [
            'host' => 'destination_host',
            'port' => '22',
            'username' => 'destination_username',
            'password' => 'destination_password',
        ];






        $sourcePath = public_path('storage/ExcelSheet/India.xlsx'); 


        $destinationPath = 'srv/rvtechnologies.in/server3/public_html/loss-and-damage/fileMove/India.xlsx';


      //  Storage::disk('source')->copy($fileToCopy, $destinationPath);


        $ssh = new SSH2($sourceServer['host'], $sourceServer['port']);

        $ssh->login($sourceServer['username'], $sourceServer['password']);

        $sftp = new SFTP($destinationServer['host'], $destinationServer['port']);
        $sftp->login($destinationServer['username'], $destinationServer['password']);

        if ($ssh->isConnected() && $sftp->isConnected()) {
            $sftp->put($destinationPath, $ssh->get($sourcePath));
            echo 'File transferred successfully.';
        } else {
            echo 'Connection failed.';
        }*/






 





    }









    public function reportDownload()
    {
        $getCountry = Country::whereStatus('1')->with('region', 'filelinks')->get();
        return view('report.report_download', compact('getCountry'));
    }




    public function exceldownload($country_id)
    {
        $MOST_UNLIKELY = 1;
        $MOST_LIKELY = 2;
        $MOST_UNLIKELY_POINT = 1;
        $MOST_LIKELY_POINT = 10;
        $TEXT_POINT = 0;

        $country_name = time();

        $getCountry = Country::select('id', 'country_name')->with('region')->whereStatus('1')->where('id', $country_id)->first();

        if ($getCountry) {
            $country_name = $getCountry->country_name;
        }

        $xlsx_data = new stdClass();

        $questions = Question::whereStatus(1)->get();

        /************Country Sheet Data**************START*/
        if ($getCountry) {

            //Get Country Total Score
            $countryData = Country::where('id', $country_id)->with('region')->get()->toArray();
            $regions_ids = [];
            $score2 = [
                "expert_count" => 0,
                "total_score" => 0,
            ];

            $total_score = 0;

            foreach ($countryData as $key => $country) {


                foreach ($country["region"] as $key => $region) {    //calculate 3 regions section score
                    array_push($regions_ids, $region["id"]); //global total experts count according to country
                    foreach ($region["question_expert_response"] as $key => $expert_response) {
                        if (isset($expert_response["question"]["question_section"]["slug"])) {
                            $score2["total_score"] += $expert_response["answer"] == $MOST_LIKELY ? $MOST_LIKELY_POINT :  $MOST_UNLIKELY_POINT;
                        }
                    }
                }
                //Calculate total final score
                $total_experts_count = QuestionExpertResponse::whereIn('region_id', $regions_ids)->distinct("expert_id")->count();
                $score2["expert_count"] = $total_experts_count;
            }


            if ($score2["total_score"]) {

                $total_score = round($total_score = ($score2["total_score"] / $score2["expert_count"]), 2);
            }



            $country_data = [
                [
                    //'country_title' => $country["country_name"],
                    'country_title' => '',
                    'score_title' => "Total Score",
                ],
            ];

            foreach ($questions as $key => $value) {
                $country_data[] = [
                    'question' => $value->question,
                    'total_score' => $total_score ? $total_score : '0',
                ];
            }

            $xlsx_data->country_data = $country_data;  //Append data to global xlsx_data for sheets
        }
        /************Country Sheet Data**************END*/

        /************Region Sheet Data**************START*/
        $regionData = [];

        foreach ($getCountry->region as $key => $getRegion) {

            $total_experts_count = QuestionExpertResponse::where('region_id', $getRegion["id"])->distinct("expert_id")->count();

            $total_score = $totalAvgScore = 0;
            if ($getRegion->question_expert_response) {
                foreach ($getRegion->question_expert_response as $key3 => $expertResponse) {
                    $total_score += $expertResponse->answer == 1 ? $MOST_UNLIKELY_POINT : 0;
                    $total_score += $expertResponse->answer == 2 ? $MOST_LIKELY_POINT : 0;
                    $total_score += $expertResponse->text_answer != nuLl ? $TEXT_POINT : 0;
                }

                if ($total_score) {

                    $totalAvgScore = round($total_score / $total_experts_count, 2);
                }
            }


            $regionData[] =
            [
                'region' => 'Region ' . ++$key,
                'totalScoretitle' => '',

            ];
            foreach ($questions as $key => $getQuestions) {
                $regionData[] =
                [
                    'question' => $getQuestions['question'],
                    'totalScore' => $totalAvgScore ? $totalAvgScore : '0',
                ];
            }

            $regionData[] =
            [
                'region_space' => '',
                'totalScore' => '',
            ];
        }

        $xlsx_data->region_data = $regionData;  //Append data to global xlsx_data for sheets
        /************Region Sheet Data**************END*/

        /************Gender Sheet Data**************START*/
        $getGender = ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'];
        $genderData = [];

        foreach ($getGender as $key => $gender) {
            /*->whereHas('Coordinator', Means that Coordinator creates a expert and coordinator and expert countries will be same*/
            $total_count = QuestionExpertResponse::whereHas('Expert', function ($q) use ($key, $country_id) {
                $q->where('gender', $key)
                ->whereHas('Coordinator', function ($q) use ($country_id) {
                    $q->where('country', $country_id);
                });
            })->distinct("expert_id")->count();

            $getExpertResponse = QuestionExpertResponse::whereHas('Expert', function ($q) use ($key, $country_id) {
                $q->where('gender', $key)
                ->whereHas('Coordinator', function ($q) use ($country_id) {
                    $q->where('country', $country_id);
                });
            })->get();


            $gendertotal_score = $genderAvgScore = 0;
            if ($getExpertResponse) {

                foreach ($getExpertResponse as $key3 => $expertResponse) {
                    $gendertotal_score += $expertResponse->answer == 1 ? $MOST_UNLIKELY_POINT : 0;
                    $gendertotal_score += $expertResponse->answer == 2 ? $MOST_LIKELY_POINT : 0;
                    $gendertotal_score += $expertResponse->text_answer != nuLl ? $TEXT_POINT : 0;
                }
                if ($gendertotal_score) {

                    $genderAvgScore = round($gendertotal_score / $total_count, 2);
                }
            }

            $genderData[] = [
                'gender' => $gender,
                'totalScoretitle' => '',
            ];

            foreach ($questions as $key => $getQuestions) {
                $genderData[] =
                [
                    'question' => $getQuestions['question'],
                    'totalScore' => $genderAvgScore ? $genderAvgScore : '0',
                ];
            }
            $genderData[] =
            [
                'region' => '',
                'totalScoret' => '',
            ];
        }
        $xlsx_data->gender_data = $genderData;  //Append data to global xlsx_data for sheets
        /************Gender Sheet Data**************END*/

        /************Panel Sheet Data**************START*/
        $getExpertPanel = ExpertPanel::where('status', 1)
        ->whereHas('panel_owner', function ($q) use ($country_id) {
            $q->where('country', $country_id);
        })
        ->withCount(['experPanelExepert' => function ($q) {
            $q->whereHas('expertResponse');
        }])->get();

        $totalAvgScore = 0;
        $allPanelsData = [];

        foreach ($getExpertPanel as $key => $panel) {

            $total_experts_count = $panel->exper_panel_exepert_count;
            $total_score = $totalAvgScore = 0;
            if (@$panel->questionExpertPanel->expertResponse) {
                foreach ($panel->questionExpertPanel->expertResponse as $key3 => $expertResponse) {
                    $total_score += $expertResponse->answer == 1 ? $MOST_UNLIKELY_POINT : 0;
                    $total_score += $expertResponse->answer == 2 ? $MOST_LIKELY_POINT : 0;
                    // $total_score += $expertResponse->text_answer!=nuLl?$TEXT_POINT:0; 
                }

                if ($total_score) {

                    $totalAvgScore = round($total_score / $total_experts_count, 2);
                }
            }
            $allPanelsData[] =
            [
                'panel_title' => $panel->panel_name,
                'totalScoretitle' => '',
            ];

            foreach ($questions as $key => $getQuestions) {
                $allPanelsData[] =
                [
                    'panel' => $getQuestions['question'],
                    'totalScore' => $totalAvgScore ? $totalAvgScore : '0',
                ];
            }

            $allPanelsData[] =
            [
                'panel' => '',
                'totalScore' => '',
            ];
        }
        $xlsx_data->panels_data = $allPanelsData;  //Append data to global xlsx_data for sheets
        /************Panel Sheet Data**************END*/


        /************Expertise Sheet Data**************START*/
        $getExpertise = Expertise::where('status', 1)->get();

        $expertiseData = [];

        foreach ($getExpertise as $key => $expertise) {
            $expertiseId = $expertise->id;

            $total_count = QuestionExpertResponse::whereHas('Expert', function ($q) use ($expertiseId, $country_id) {
                $q->where('expertise', $expertiseId)
                ->whereHas('Coordinator', function ($q) use ($country_id) {
                    $q->where('country', $country_id);
                });
            })->distinct("expert_id")->count();

            $getExpertResponse = QuestionExpertResponse::whereHas('Expert', function ($q) use ($expertiseId, $country_id) {
                $q->where('expertise', $expertiseId)
                ->whereHas('Coordinator', function ($q) use ($country_id) {
                    $q->where('country', $country_id);
                });
            })->get();

            $gendertotal_score = $expertiseAvgScore = 0;
            if ($getExpertResponse) {

                foreach ($getExpertResponse as $key3 => $expertResponse) {
                    $gendertotal_score += $expertResponse->answer == 1 ? $MOST_UNLIKELY_POINT : 0;
                    $gendertotal_score += $expertResponse->answer == 2 ? $MOST_LIKELY_POINT : 0;
                    //$gendertotal_score += $expertResponse->text_answer!=nuLl?$TEXT_POINT:0; 
                }

                if ($gendertotal_score) {
                    $expertiseAvgScore = round($gendertotal_score / $total_count, 2);
                }
            }

            $expertiseData[] = [
                'expertisetitle' => $expertise->name,
                'totalScoretitle' => '',
            ];

            foreach ($questions as $key => $getQuestions) {
                $expertiseData[] =
                [
                    'question' => $getQuestions['question'],
                    'totalScore' => $expertiseAvgScore ? $expertiseAvgScore : '0',
                ];
            }
            $expertiseData[] =
            [
                'expertise' => '',
                'totalScoret' => '',
            ];
        }

        $xlsx_data->expertise_Data = $expertiseData;  //Append data to global xlsx_data for sheets
        /************Expertise Sheet Data**************END*/



       // Affiliation wise

        $getAffiliation= Affiliation::where('status',1)->get();       

        $affiliationData=[];     

        foreach ($getAffiliation as $key => $affiliatio) {
            $affiliatioId=$affiliatio->id;        

            $total_count = QuestionExpertResponse::whereHas('Expert',function($q) use($affiliatioId,$country_id){ 
                $q->where('affiliation',$affiliatioId)
                ->whereHas('Coordinator', function ($q) use ($country_id) {
                    $q->where('country', $country_id);
                });
            })
            ->distinct("expert_id")->count();

            $getAffiliationResponse = QuestionExpertResponse::whereHas('Expert',function($q) use($affiliatioId,$country_id){ 
                $q->where('affiliation',$affiliatioId) ->whereHas('Coordinator', function ($q) use ($country_id) {
                    $q->where('country', $country_id);
                });})->get();

            $affiliatioIdTotalScore =$affiliationAvgScore=0;
            if ($getAffiliationResponse) {

                foreach ($getAffiliationResponse as $key3 => $expertResponse) {
                    $affiliatioIdTotalScore += $expertResponse->answer==1?$MOST_UNLIKELY_POINT:0; 
                    $affiliatioIdTotalScore += $expertResponse->answer==2?$MOST_LIKELY_POINT:0; 
                    //$affiliatioIdTotalScore += $expertResponse->text_answer!=nuLl?$TEXT_POINT:0; 
                }

                if ($affiliatioIdTotalScore) {
                    $affiliationAvgScore =round($affiliatioIdTotalScore/$total_count,2);
                }

            }

            $affiliationData[]=[
                'affiliationtitle'=>$affiliatio->name,
                'totalScoretitle'=>'',
            ]; 

            foreach ($questions as $key => $getQuestions) {
                $affiliationData[]=
                [
                    'question'=>$getQuestions['question'],
                    'totalScore'=>$affiliationAvgScore?$affiliationAvgScore:'0',
                ];
            }
            $affiliationData[]=
            [
                'affiliation'=>'',
                'totalScoret'=>'',
            ]; 
        }


        $xlsx_data->affiliation_Data = $affiliationData;  



        try {
            Excel::store(new FinalExport($xlsx_data), $country_name . '.xlsx', 'excel_save_url');

            $file_download_link = config('site.STORAGE_PATH') . 'storage/ExcelSheet/' . $country_name . '.xlsx';
            FilesLinks::updateOrCreate(
                [
                    "country_id" => $country_id,
                ],
                [
                    "country_id" => $country_id,
                    "country_name" => $country_name,
                    "link" => $file_download_link,
                    "file_path" => "storage/ExcelSheet/" . $country_name . '.xlsx',
                    "status" => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );

            return Excel::download(new FinalExport($xlsx_data), $country_name . '.xlsx');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    





















    //Google API For Map
    public function countryScore(Request $request)
    {
        $MOST_UNLIKELY = 1;
        $MOST_LIKELY = 2;
        $MOST_UNLIKELY_POINT = 1;
        $MOST_LIKELY_POINT = 10;

        $finalScore = [];

        $score2 = [
            "color" => "",
            "country" => "",
            "lat" => "",
            "long" => "",
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
                            //Calculate For total score
                            $score2["total_score"] += $expert_response["answer"] == $MOST_LIKELY ? $MOST_LIKELY_POINT : $MOST_UNLIKELY_POINT;
                        }
                    }
                }

                //Calculate total final score
                $score2["country"] = $country["country_name"];
                $score2["lat"] = $country["lat"];
                $score2["long"] = $country["long"];

                if ($regions_ids) {
                    $total_experts_count = QuestionExpertResponse::whereIn('region_id', $regions_ids)->distinct("expert_id")->count();
                }

                if ($score2["total_score"] > 0) {
                    $score2["total_score"] =  $score2["total_score"] / $total_experts_count;
                }

                //Set Color According to Total Score
                $GREEN = "#198754";
                $RED = "#dc3545";
                $YELLOW = "#ffc107";

                if ($score2['total_score'] >= 0 && $score2['total_score'] <= 23) {
                    $score2["color"] =  $GREEN;
                } else if ($score2['total_score'] >= 24 && $score2['total_score'] <= 110) {
                    $score2["color"] =  $YELLOW;
                } else if ($score2['total_score'] >= 111 && $score2['total_score']) {
                    $score2["color"] =  $RED;
                }

                array_push($finalScore, $score2);
                $score2 = array_fill_keys(
                    [
                        "color",
                        "country",
                        "total_score",
                        "lat",
                        "long"
                    ],
                    0
                );
            }
        }
        return response()->json([
            'finalScore' => $finalScore,
        ]);
    }
}

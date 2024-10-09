<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Expert;
use App\Models\ExpertPanel;
use App\Models\ExpertPanelExpert;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CoordinatorController extends Controller
{

    public function list(Request $request)
    {
        #Server-Side Datatable with Pagination And Search
        if (Auth::user()->can('view_coordinator')) {

            if ($request->ajax()) {
                $coordinatorlist = User::select('*');
                return DataTables::of($coordinatorlist)
                    ->addIndexColumn()
                    ->addColumn('serial_number', function ($row) {
                        return $row->DT_RowIndex;
                    })
                    ->addColumn('image', function ($row) {
                        return '<img src="'.asset('/').$row->profile_image . '" alt="image">';
                    })
                    ->addColumn('status', function ($row) {
                        $status = $row->status == 1 ? 'Active' : 'Inactive';
                        $class = $row->status == 1 ? 'text-info' : 'text-danger';
                        return '<span class="text-center ' . $class . '">' . $status . '</span>';
                    })
                    ->addColumn('action', function ($row) {
                        $viewUrl = route('coordinator.view', base64_encode($row->id));
                        $editUrl = route('coordinator.edit', ['id' => base64_encode($row->id)]);
                        $deleteUrl = 'javascript:void(0)';
                        $deleteDataId = $row->id;
                        $buttons = '';
                        if (Gate::check('view_coordinator')) {
                            $buttons .= '<a class="action-button" title="View" href="' . $viewUrl . '"><i class="text-info fa fa-eye"></i></a>';
                        }
                        if (Gate::check('edit_coordinator')) {
                            $buttons .= '<a title="Edit" href="' . $editUrl . '"><i class="text-warning fa fa-edit"></i></a>';
                        }
                        if (Gate::check('delete_coordinator')) {
                            $buttons .= '<a class="action-button" onclick="deleteCoordinator(' . $deleteDataId . ')" title="Delete" href="' . $deleteUrl . '" data-id="' . $deleteDataId . '"><i class="text-danger fa fa-trash"></i></a>';
                        }
                        return $buttons;
                    })
                    ->editColumn('created_at', function ($row) {
                        return Carbon::parse($row->created_at)->format('d/m/Y');
                    })
                    ->editColumn('name_and_affiliation', function ($row) {
                        return $row->name_and_affiliation ?? 'N/A';
                    })
                    ->editColumn('country', function ($row) {
                        return ucfirst($row->getcountry->country_name) ?? 'N/A';
                    })
                    ->rawColumns(['image', 'status', 'action'])
                    ->make(true);
            }
            return view('coordinator.coordinator_list');
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }

        // if (Auth::user()->can('view_coordinator')) {
        //     $coordinatorlist = User::with('getcountry')->orderBy('id', 'DESC')->get();
        //     return view('coordinator.coordinator_list', compact('coordinatorlist'));
        // } else {
        //     return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        // }
    }

    public function view($id)
    {
        if (Auth::user()->can('view_coordinator')) {

            $id = base64_decode($id);
            $coordinator = User::where('id', $id)->with('getcountry', 'getUserRegion.region')->first();

            return view('coordinator.view_coordinator', compact('coordinator'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->can('edit_coordinator')) {

            $id = base64_decode($id);
            $coordinators_edit = User::where('id', $id)->with('getcountry', 'getUserRegion.region')->first();

            $counteries = Country::all();
            return view('coordinator.edit_coordinator', compact('coordinators_edit', 'counteries'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function updateCoordinator(Request $request)
    {
        // dd($request->all());
        $coordinator_edit = User::where('id', $request->id)->first();
        $coordinator_edit->name_and_affiliation = $request->name_and_affiliation;
        // $coordinator_edit->country = $request->country;
        // $coordinator_edit->phone_number = $request->phone_number;
        $coordinator_edit->status = $request->status;
        // $coordinator_edit->gps_coordination = $request->gps_coordination;
        $coordinator_edit->assessment_in_two_months = $request->assessment_in_two_months;
        $coordinator_edit->finalize_country_questionnaire = $request->finalize_country_questionnaire;

        if (isset($request->password)) {
            $coordinator_edit->password = $request->password;
        }

        $coordinator_edit->update();
        return redirect()->route('coordinator.list')->with('success', 'User details updated Successfully!');
    }


    public function deleteCoordinator(Request $request)
    {
        if (Auth::user()->can('delete_coordinator')) {
            $deletecoordinator = User::where('id', $request->id)->first();
            if ($deletecoordinator) {
                $deletecoordinator->delete();
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
    public function deletedCoordinatorList()
    {
        if (Auth::user()->can('view_deleted_coordinator')) {

            $coordinators = User::onlyTrashed()->orderBy('updated_at', 'DESC')->get();
            return view('coordinator.deleted_coordinator_list', compact('coordinators'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function coordinatorDeletedrestore(Request $request)
    {

        $deleted_d = User::onlyTrashed()->where('id', $request->id)->first();

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

    public function permanentDeleteCoordinator(Request $request)
    {
        $deleted_d = User::onlyTrashed()->where('id', $request->id)->first();
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



    /*=========Expert & Panel Section================================START*/
    public function expertList(Request $request)
    {
        $coordinator_id = base64_decode($request->id);
        $coordinator = User::select('id', 'name_and_affiliation')->where('id', $coordinator_id)->first();
        $expertlist = Expert::where('user_id', $coordinator_id)->orderBy('id', 'DESC')->get();

        return view('coordinator.expert_list', compact('expertlist', 'coordinator'));
    }

    public function panelList(Request $request)
    {
        $coordinator_id = base64_decode($request->id);
        $coordinator = User::select('id', 'name_and_affiliation')->where('id', $coordinator_id)->first();
        $panellist = ExpertPanel::with('ExpertPanel.Expert')->withCount('ExpertPanel')->where('user_id', $coordinator_id)->orderBy('id', 'DESC')->get();
        return view('coordinator.expert_panel', compact('panellist', 'coordinator'));
    }

    public function addExpert(Request $request)
    {
        $coordinator_id = base64_decode($request->coordinator_id);
        try {
            if (User::where('id', $coordinator_id)->exists()) {

                Expert::create([
                    'user_id' => $coordinator_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    "password" => Hash::make($request->password),
                    'gender' => $request->gender,
                    'affiliation' => $request->affiliation,
                    'occupation' => $request->occupation,
                    'expertise' => $request->expertise,
                    'profile' => 'user_profile.jpg',
                    'status' => $request->status,
                    'created_by' => $coordinator_id,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Expert added successfully',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong !",
            ]);
        }
    }


    public function editExpert(Request $request)
    {
        try {
            $expert = [
                'name' => $request->name,
                'affiliation' => $request->affiliation,
                'occupation' => $request->occupation,
                'expertise' => $request->expertise,
                'gender' => $request->gender,
                //'phone_number' => $request->phone_number,
                'status' => $request->status,
            ];

            if ($request->password) {
                $expert["password"] = Hash::make($request->password);
            }

            Expert::where('id', $request->id)->update($expert);

            return response()->json([
                'success' => true,
                'message' => 'Expert updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong !",
            ]);
        }
    }

    public function deleteExpert(Request $request)
    {
        if (Auth::user()->can('delete_expert')) {

            $deleteExpert = Expert::where('id', $request->id)->delete();
            if ($deleteExpert) {
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

    public function viewExpertPanel(Request $request)
    {
        $coordinator_id = base64_decode($request->id);
        $panel_id = base64_decode($request->panel_id);

        $coordinator = User::select('id', 'name_and_affiliation')->where('id', $coordinator_id)->first();
        $panel = ExpertPanel::where('id', $panel_id)->where('user_id', $coordinator_id)->with(['panel_owner:id,name_and_affiliation,email', 'ExpertPanel.Expert'])->withCount('ExpertPanel')->orderBy('id', 'DESC')->first();

        return view('coordinator.view_expert_panel', compact('panel', 'coordinator'));
    }

    public function editExpertPanel(Request $request)
    {
        $coordinator_id = base64_decode($request->id);
        $panel_id = base64_decode($request->panel_id);

        $coordinator = User::select('id', 'name_and_affiliation')->where('id', $coordinator_id)->first();
        $panel = ExpertPanel::where('id', $panel_id)->where('user_id', $coordinator_id)->with(['panel_owner:id,name_and_affiliation,email', 'ExpertPanel.Expert'])->withCount('ExpertPanel')->orderBy('id', 'DESC')->first();

        return view('coordinator.edit_expert_panel', compact('panel', 'coordinator'));
    }

    public function updateExpertPanel(Request $request)
    {
        try {
            ExpertPanel::where('id', $request->panel_id)->update([
                'panel_name' => $request->panel_name,
                'ep_status' => $request->ep_status,
                'status' => $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Panel updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong !",
            ]);
        }
    }

    public function deleteExpertPanel(Request $request)
    {
        if (Auth::user()->can('delete_expert')) {

            $deleteExpertPanel = ExpertPanel::where('id', $request->id)->delete();

            if ($deleteExpertPanel) {
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





    /*=======Expert Recycle Bin=======START*/
    public function deletedExpertList()
    {
        if (Auth::user()->can('view_deleted_expert')) {
            $experts = Expert::onlyTrashed()->orderBy('updated_at', 'DESC')->get();
            return view('coordinator.deleted_expert_list', compact('experts'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function expertDeletedrestore(Request $request)
    {
        $deleted_d = Expert::onlyTrashed()->where('id', $request->id)->first();

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

    public function permanentDeleteExpert(Request $request)
    {
        $deleted_d = Expert::onlyTrashed()->where('id', $request->id)->first();
        if ($deleted_d) {
            $deleted_d->forceDelete();
            ExpertPanelExpert::where('expert_id', $request->id)->forceDelete();

            return response()->json([
                'success' => 1,
            ]);
        } else {
            return response()->json([
                'success' => 0,
            ]);
        }
    }
    /*=======Expert Recycle Bin=======END*/


    /*=======Expert Panel Recycle Bin=======START*/
    public function deletedExpertPanelList()
    {
        if (Auth::user()->can('view_deleted_expert_panel')) {
            $expert_panels = ExpertPanel::onlyTrashed()->with('ExpertPanel.Expert')->withCount('ExpertPanel')->orderBy('id', 'DESC')->get();
            return view('coordinator.deleted_expert_panel_list', compact('expert_panels'));
        } else {
            return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
        }
    }

    public function expertPanelDeletedrestore(Request $request)
    {
        $deleted_d = ExpertPanel::onlyTrashed()->where('id', $request->id)->first();

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

    public function permanentDeleteExpertPanel(Request $request)
    {
        $deleted_d = ExpertPanel::onlyTrashed()->where('id', $request->id)->first();
        if ($deleted_d) {
            $deleted_d->forceDelete();
            ExpertPanelExpert::where('expert_panel_id', $request->id)->forceDelete();

            return response()->json([
                'success' => 1,
            ]);
        } else {
            return response()->json([
                'success' => 0,
            ]);
        }
    }
    /*=======Expert Panel Recycle Bin=======END*/


    /*=========Expert & Panel Section================================END*/
}

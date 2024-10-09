<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\MdTimezone;
use App\Models\MdCountry;
use App\Models\CountryTimezone;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class MiscController extends Controller
{
	public function brandadd()
	{
		if (Auth::user()->can('add_brands')) {
			return view('misc.brand.brand_add');
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
		
	}
	public function savebrand(Request $request)
	{
		if (Auth::user()->can('add_brands')) {

			$brand = new Brand();
			$brand->name = $request->name;
			$brand->save();
			return redirect()->route('brand.list')->with('status', 'Brand saved successfully');
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
	public function brandlist()
	{
		if (Auth::user()->can('view_brands')) {

			$brand = Brand::orderBy('id','DESC')->get();
			return view('misc.brand.brand_list', compact('brand'));
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	public function brandview($id)
	{
		if (Auth::user()->can('view_brands')) {

			$viewbrand = Brand::where('id', base64_decode($id))->first();
			return view('misc.brand.brand_view', compact('viewbrand'));
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
		
	}

	public function brandedit($id)
	{
		if (Auth::user()->can('edit_brands')) {

			$editbrand = Brand::where('id', base64_decode($id))->first();
			return view('misc.brand.brand_edit', compact('editbrand'));
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}

	}

	public function brandupdate(Request $request)
	{
		if (Auth::user()->can('edit_brands')) {
			
			$brand = Brand::where('id', $request->id)->first();
			if ($brand) {
				$brand->name = $request->name;
				$brand->update();
				return redirect()->route('brand.list')->with('status', 'Brand updated successfully');
			} else {
				return redirect()->route('brand.list')->with('status', 'something went wrong');;
			}
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}

	}

	public function movetorecycle(Request $request)
	{
		if (Auth::user()->can('delete_brands')) {

			$brand = Brand::where('id', $request->id)->first();
			if ($brand) {
				$brand->delete();
				return response()->json(['success' => 1]);
			} else {
				return response()->json(['success' => 0]);
			}
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}
   
	public function branddeletedlist(){
		if (Auth::user()->can('view_deleted_brands')) {
			
			$deletebrand=Brand::onlyTrashed()->get();
			return view('misc.brand.deleted_brand_list',compact('deletebrand'));
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}

	}

	public function branddeletedrestore(Request $request)
	{
		if (Auth::user()->can('restore_brands')) {
			
			$deleted_d=Brand::onlyTrashed()->where('id',$request->id)->first();
		 
			if($deleted_d)
			{
				$deleted_d->restore();
				return response()->json([
					'success'=>1,
					]);
			} else{
				return response()->json([
					'success'=>0,
					]);
			}

		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	public function branddeletedpermanent(Request $request)
	{
		if (Auth::user()->can('permanent_deleted_brands')) {
			
			$deleted_d=Brand::onlyTrashed()->where('id',$request->id)->first();
			
			if($deleted_d)
			{
				$deleted_d->forceDelete();
				return response()->json([
					'success'=>1,
					]);
			} else{
				return response()->json([
					'success'=>0,
					]);
			}
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
		
	}


	
	public function countriesList()
	{

		if (Auth::user()->can('manage_misc_data_action')) {
			$mdCountries = MdCountry::orderBy('nicename', 'asc')->get();
			return view('misc.countries.list', ['mdCountries' => $mdCountries]);
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to view City
	 */
	public function viewCountry($id)
	{
		if (Auth::user()->can('view_misc')) {

			$mdCountry = MdCountry::find($id);
			return view('misc.countries.view', ['mdCountry' => $mdCountry]);
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Add City View
	 */
	public function addCountry()
	{

		if (Auth::user()->can('add_misc')) {

			//$mdCountries = MdCountry::all();
			//$mdTimezones = MdTimezone::all();
			return view('misc.countries.add');
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}



	/**
	 * This function is used to Check Country Name
	 */
	public function checkCountry(Request $request)
	{
		if ($request->method == 'create') {
			$country = MdCountry::where('nicename', $request->country)->get();
		} else {
			$country = MdCountry::query();
			$country = $country->where('id', '!=', $request->id);
			$country = $country->where('nicename', $request->country);
			$country = $country->get();
		}

		if (count($country) > 0) {
			$res = 1;
			return response()->json(['response' => $res]);
		} else {
			$res = $country;
			return response()->json(['response' => $res]);
		}
	}

	/**
	 * This function is used to check ISO code
	 */
	public function checkISO(Request $request)
	{
		if ($request->method == 'create') {
			$iso = MdCountry::where('iso', $request->iso)->get();
		} else {
			$iso = MdCountry::query();
			$iso = $iso->where('id', '!=', $request->id);
			$iso = $iso->where('iso', $request->iso);
			$iso = $iso->get();
		}
		if (count($iso) > 0) {
			$res = 1;
			return response()->json(['response' => $res]);
		} else {
			$res = 0;
			return response()->json(['response' => $res]);
		}
	}

	/**
	 * This function is used to Check Phone Code
	 */
	public function checkPhoneCode(Request $request)
	{
		$phonecode = MdCountry::where('phonecode', $request->phonecode)->get();
		if ($request->method == 'create') {
			$phonecode = MdCountry::where('phonecode', $request->phonecode)->get();
		} else {
			$phonecode = MdCountry::query();
			$phonecode = $phonecode->where('id', '!=', $request->id);
			$phonecode = $phonecode->where('phonecode', $request->phonecode);
			$phonecode = $phonecode->get();
		}
		if (count($phonecode) > 0) {
			$res = 1;
			return response()->json(['response' => $res]);
		} else {
			$res = 0;
			return response()->json(['response' => $res]);
		}
	}

	/**
	 * This function is used to Save City
	 */
	public function saveCountry(Request $request)
	{
		$mdCountry = new MdCountry;
		$mdCountry->nicename = $request->nicename;
		$mdCountry->iso = strtoupper($request->iso);
		$mdCountry->phonecode = $request->phonecode;

		if ($mdCountry->save()) {

			foreach ($request->selected_timezones as $timezone) {
				$countryTimezone = new CountryTimezone;
				$countryTimezone->country_id = $mdCountry->id;
				$countryTimezone->timezone_id = $timezone;
				$countryTimezone->save();
			}
			return redirect()->route('countries_list')->with('success', 'Country Added Successfully');
		} else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Show Edit City View
	 */
	public function editCountry($id)
	{

		if (Auth::user()->can('edit_misc')) {

			$mdCountry = MdCountry::find($id);
			return view('misc.countries.edit', ['mdCountry' => $mdCountry]);
		} else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Update City
	 */
	public function updateCountry(Request $request)
	{

		// $validatedData = $request->validate([
		//           "id" => "required|unique:md_countries,id,".$request->id,
		// 	'nicename' => 'required',
		//           'iso' => 'required|unique:md_countries,iso,'.$request->id,
		// 	'phonecode' => 'required|integer',
		//           'selected_timezones' => 'required|array|min:1'
		// ], [
		// 	//'county.required' => 'County Name is required',
		// 	//'country.required' => 'Country is required',
		// ]);


		$mdCountry = MdCountry::where('id', $request->id)->first();
		$mdCountry->nicename = $request->nicename;
		$mdCountry->iso = strtoupper($request->iso);
		$mdCountry->phonecode = $request->phonecode;

		if ($mdCountry->save()) {

			CountryTimezone::where('country_id', $request->id)->forceDelete();

			foreach ($request->selected_timezones as $timezone) {
				$countryTimezone = new CountryTimezone;
				$countryTimezone->country_id = $mdCountry->id;
				$countryTimezone->timezone_id = $timezone;
				$countryTimezone->save();
			}
			return redirect()->route('countries_list')->with('success', 'Country Updated Successfully');
		} else {
			return back()->with('error', 'Something went wrong! Please try again.');
		}
	}

	/**
	 * This function is used to Delete County
	 */
	public function deleteCountry(Request $request)
	{
		$countryId = $request->id;
		$deleteCountry = MdCountry::where('id', $countryId)->delete();
		if ($deleteCountry) {

			//$citiesList = County::all();
			$res['success'] = 1;
			$res['data'] = ''; // $citiesList;
			return json_encode($res);
		} else {
			$res['success'] = 0;
			$res['message'] = "Something went wrong! Please try again.";
			return json_encode($res);
		}
	}


	public function permanentDeleteCounty(Request $request)
	{
		$countryId = $request->id;
		$deleteCountry = MdCountry::where('id', $countryId)->forceDelete();
		if ($deleteCountry) {

			//$citiesList = County::all();
			$res['success'] = 1;
			$res['data'] = ''; // $citiesList;
			return json_encode($res);
		} else {
			$res['success'] = 0;
			$res['message'] = "Something went wrong! Please try again.";
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show Deleted Cities Listing
	 */
	public function deletedCountries()
	{
		// if(Auth::user()->can('manage_recycle_bin_counties')) {
		$deletedCounties = MdCountry::onlyTrashed()->orderBy('nicename')->get();
		return view('misc/counties/deleted_counties_list', ['deletedCounties' => $deletedCounties]);
		// }
		// else {
		// 	return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		// }
	}

	/**
	 * This function is used to Restore County
	 */
	public function restoreCounty(Request $request)
	{
		$countyId = $request->id;
		$county = MdCountry::where('id', $countyId);
		$restoreCounty = $county->restore();
		if ($restoreCounty) {
			$res['success'] = 1;
			return json_encode($res);
		} else {
			$res['success'] = 0;
			$res['message'] = "Something went wrong! Please try again.";
			return json_encode($res);
		}
	}

	public function fetchTimezonesList(Request $request)
	{

		$term = $request->post('search');
		$md_countries = MdTimezone::where('timezone', 'LIKE', '%' . $term . '%')->get();

		$result = [];
		if ($md_countries->isNotEmpty()) {
			foreach ($md_countries as $key => $value) {
				$result[] = ['text' => $value->timezone, 'value' => $value->id];
			}
		}

		return json_encode($result);
	}

	public function fetchSelectedTimezonesList(Request $request)
	{

		$selected_timezones = CountryTimezone::where('country_id', $request->country_id)->pluck('timezone_id');
		$md_selected_timezones = MdTimezone::whereIn('id', $selected_timezones)->get();
		$result = [];

		if ($md_selected_timezones->isNotEmpty()) {
			foreach ($md_selected_timezones as $key => $value) {
				$result[] = ['text' => $value->timezone, 'value' => $value->id];
			}
		}
		return json_encode($result);
	}
}

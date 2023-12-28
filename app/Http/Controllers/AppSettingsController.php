<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $application = AppSettings::firstWhere('name', 'application');

        // view()->share('Application', DeveloperSettings::firstWhere('name', 'application'));
        return view('back_end.settings.app_settings',compact('application'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AppSettings $appSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppSettings $appSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppSettings $appSettings)
    {
        $this->validate($request, [
            'app_name' => 'required',
        ]);
        $application = AppSettings::firstWhere('name', 'application');
        // $application= AppSettings::find(1);

        dd($application);

        $Application->data['app_name']= $request->app_name;


        if ($request->status==0)
            {
                $application->status==0;
            }

        $application->status = $request->status;

        $application->updated_by = Auth::user()->id;

        $application->save();

        return redirect()->route('app-settings.index')
                        ->with('message_store', 'application Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppSettings $appSettings)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $application = Application::where('status','survey')->get();
        return view('admin.survey.index',compact('application'));
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
    public function show($id)
    {
        $application = Application::find($id);
        return view('admin.survey.edit',compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $application = Application::find($id);
        
        $data = [
            'survey_report'=>$request->survey_report,
            'status'=>'survey_completed',
            'report_date'=>date('Y-m-d')
        ];
       $r =  $application->update($data);
       if($r){
        return redirect()->route('survey.index')->with('success','Your report has been addedd successfully!');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

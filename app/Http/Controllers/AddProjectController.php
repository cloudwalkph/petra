<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Project_Task;
use App\User;
use App\Project_user;
use App\User_profile;
class AddProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $userprofile = User_profile::all();
        $projects = Project::all();
      /* return view('adminpetra.AdminProject', ['user_profiles' => "$user_profile",
                                                'fname' => "$user_profile->first_name",
                                                'lname' => "$user_profile->last_name"]);*/
       return view('adminpetra.AdminProject')->with('userprofiles', $userprofile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userprofile = User_profile::all();
        $projects = Project::all();
      /* return view('adminpetra.AdminProject', ['user_profiles' => "$user_profile",
                                                'fname' => "$user_profile->first_name",
                                                'lname' => "$user_profile->last_name"]);*/
       return view('adminpetra.AdminProject')->with('userprofiles', $userprofile);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = $request->member;
        $user = DB::table('user_profiles')
                ->whereColumn([
                    ['last_name', '=', '$member']
                ])->value('user_id');
        $project = new Project;
        $userid = $user->id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->type = $request->type;
        $project->complexity = $request->complexity;
        $userProfile->save();

        $project_user = new Project_user;
        $userid = $user->id;
        $projectid = $project->id;
        $user->save();

        $userprofile = User_profile::all();
        return view('adminpetra.designAddUsers')->with('userprofiles', $userprofile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        trytrytry//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

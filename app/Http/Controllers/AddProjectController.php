<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Client;
use App\User_profile;
use Registrar;
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
        $project = Project::all();
       return view('adminpetra.AdminProject')->with(['projects' => $project, 'userprofiles' => $userprofile]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_user = DB::table('project_user_profile')
            ->join('user_profiles', 'project_user_profile.user_profile_id', '=', 'user_profiles.id')
            ->join('projects', 'project_user_profile.project_id', '=', 'projects.id')
            ->select('user_profiles.first_name', 'user_profiles.last_name',
             'projects.name', 'projects.description', 'projects.estimated_deadline', 'projects.type',
             'projects.complexity', 'projects.status')
            ->get();

        $userprofile = User_profile::all();
        return view('adminpetra.AdminProject')->with(['projects' => $project_user, 'userprofiles' => $userprofile]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$member = $request->member;
        $user_id = DB::table('user_profiles')->whereColumn([['last_name', '=', '$member']])->value('user_id');
        $project = Project::all();  
        $project_users = Project_user::find('user_id')->$user_profile->profile_picture;*/
        /*$project_user = User_profile::find(1)->projects()->get();*/

        $id = DB::table('user_profiles')->where([['last_name', '=', $request->member]])->value('id');
        $user = User_profile::find($id);
        $client = new Client;
        $client->client_name = $request->clientname;
        $client->save();
        $clientid = $client->id;

        $project = new Project(['client_id' => "$clientid",
                                'name' => "$request->name",
                                'description' => "$request->description",
                                'estimated_deadline' => "$request->deadline",
                                'type' => "$request->type",
                                'status' => "$request->status",
                                'complexity' => "$request->complexity"]);

        $user->projects()->save($project);

        $userprofile = User_profile::all();
        $project_user = Project::all();
        /*$project_user = User_profile::find(1)->projects()->get();*/
        return view('adminpetra.AdminProject')->with(['projects' => $project_user, 'userprofiles' => $userprofile]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_profile;
use App\User;
use App\User_group;

class adminAddUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpetra.designAddUsers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $userprofile = User_profile::all();
       return view('adminpetra.designAddUsers')->with('userprofiles', $userprofile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_group = new User_group;
        $user_group->usertype = $request->User_type;
        $user_group->save();

        $user = new User;
        $usergroupid = $user_group->id;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->user_group_id = $usergroupid;
        $user->save();

        $userProfile = new User_profile;
        $userid = $user->id;
        $userProfile->first_name = $request->fname;
        $userProfile->last_name = $request->lname;
        $userProfile->middle_name = $request->mname;
        $userProfile->position = $request->position;
        $userProfile->gender = $request->gender;
        $userProfile->user_id = $userid;
        $id = $user->id;
        $file = request()->file('profile_picture');
        $ext = $file->guessClientExtension();
        $path =  $file->storeAs('public',"$id.{$ext}");
        $userProfile->profile_picture = "storage/{$id}.{$ext}";

        $userProfile->save();

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

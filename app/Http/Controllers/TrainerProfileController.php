<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class TrainerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();

        return view('index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view('create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = auth()->user();
        $newProfile = new Profile();

        $newProfile->phone_number = $data['phone_number'];
        $newProfile->photo = $data['photo'];
        $newProfile->curriculum = $data['curriculum'];
        $newProfile->plan_program = $data['plan_program'];
        $newProfile->work_address = $data['work_address'];

        $newProfile->user()->associate($user);

        $newProfile->save();

        return redirect()->route('index', $newProfile->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);

        return view('show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);

        return view('edit', compact('profile'));
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
        $data = $request->all();

        $profile = Profile::find($id);

        $profile->phone_number = $data['phone_number'];
        $profile->photo = $data['photo'];
        $profile->curriculum = $data['curriculum'];
        $profile->plan_program = $data['plan_program'];
        $profile->work_address = $data['work_address'];

        $profile->save();

        return redirect()->route('profile.show', $profile->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile :: find($id);

        $profile ->messages() ->delete();
        $profile ->reviews() ->delete();


        $profile ->specializations() ->detach();
        $profile ->sponsorships() ->detach();
        $profile ->votes() ->detach();

        $profile->delete();

        return redirect()->route('index');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TrainerProfileFormRequest;
use App\Http\Requests\TrainerProfileFormRequestEdit;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Specialization;

class TrainerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::find($id);

        return view('show', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $specializations = Specialization::all();

        return view('create', compact('user', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainerProfileFormRequest $request)
    {
        $data = $request->all();

        $user = auth()->user();
        $newProfile = new Profile();

        $img_path = Storage::put('images', $data['photo']);
        $curriculum_path = Storage::put('documents', $data['curriculum']);
            

        $newProfile->phone_number = $data['phone_number'];
        $newProfile->photo = $img_path;
        $newProfile->curriculum = $curriculum_path;
        $newProfile->plan_program = $data['plan_program'];
        $newProfile->work_address = $data['work_address'];
        
        $newProfile->user()->associate($user);
        
        $newProfile->save();
        
        $newProfile -> specializations() -> attach($data['specialization_id']);
        return redirect()->route('dashboard', $newProfile->id);
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
        $specializations = Specialization::all();

        return view('edit', compact('profile', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainerProfileFormRequestEdit $request, $id)
    {
        $data = $request->all();

        $profile = Profile::find($id);
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('/images');
            $profile->photo = $photoPath;
        }
    
        if ($request->hasFile('curriculum')) {
            $curriculumPath = $request->file('curriculum')->store('/documents');
            $profile->curriculum = $curriculumPath;
        }

        $profile->phone_number = $data['phone_number'];
        $profile->plan_program = $data['plan_program'];
        $profile->work_address = $data['work_address'];

        $profile -> specializations() -> sync($data['specialization_id']);

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

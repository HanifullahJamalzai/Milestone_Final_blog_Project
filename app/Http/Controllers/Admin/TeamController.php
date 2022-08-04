<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('IsAdmin');
        $teams = Team::all();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('IsAdmin');
        $data = $request->validate([
            'name' => 'required|min:8|max:255',
            'position' => 'required|min:8|max:255',
            'bio' => 'required|min:8',
            'photo' => 'required',
        ]);

        
        if($request->hasFile('photo')){
            $fileName = date('YmdHis').'_'.$request->name.'_'.rand(10,10000).'.'.$request->photo->extension();
            
            $img = Image::make($request->file('photo'));
            $img->resize(300, 300);
            $img->save('storage/images/team/'.$fileName);
            $photo = '/storage/images/team/'.$fileName;
        }

        Team::create([
            'name' => $data['name'],
            'position' => $data['position'],
            'bio' => $data['bio'],
            'photo' => $photo,
        ]);

        return back()->with('success', 'Team member has successfully added!');

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
    public function edit(Team $team)
    {
        Gate::authorize('IsAdmin');
        $teams = Team::all();
        return view('admin.team.index', compact('team', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        Gate::authorize('IsAdmin');
        $data = $request->validate([
            'name' => 'required|min:8|max:255',
            'position' => 'required|min:8|max:255',
            'bio' => 'required|min:8',
        ]);

        
        if($request->hasFile('photo')){
            @unlink(public_path().'/'.$team->photo);
            
            $fileName = date('YmdHis').'_'.$request->name.'_'.rand(10,10000).'.'.$request->photo->extension();
            
            $img = Image::make($request->file('photo'));
            $img->resize(300, 300);
            $img->save('storage/images/team/'.$fileName);
            $photo = '/storage/images/team/'.$fileName;
        }

        $team->update([
            'name' => $data['name'],
            'position' => $data['position'],
            'bio' => $data['bio'],
            'photo' => $request->hasFile('photo') ? $photo : $team->photo,
        ]);

        return  redirect()->route('team.index')->with('success', 'Team member has been updated successfully added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('IsAdmin');
    }
}

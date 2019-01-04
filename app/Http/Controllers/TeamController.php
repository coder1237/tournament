<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\TeamFormRequest;
use App\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with('group')->get();
        return view('teams.index', ['teams' => $teams]);
    }

    public function create()
    {
        $groups = Group::get();
        return view('teams.form',['groups'=>$groups]);
    }

    public function store(TeamFormRequest $request)
    {
        try {
            $inputs = $request->only('name','code','group_id');
            $team = Team::create($inputs);
            session()->flash('success', 'Team '.$team->name.' created successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', $e->getMessage());
        }
        return redirect()->route('teams.index');
    }

    public function edit($id)
    {
        try {
            $team = Team::findOrFail($id);
            $groups = Group::get();
            return view('teams.form',['groups'=>$groups,'team' => $team]);
        } catch (\Throwable $e) {
            session()->flash('error', $e->getMessage());
        }
        return redirect()->route('teams.index');

    }

    public function update(TeamFormRequest $request, $id)
    {
        try {
            $team = Team::findOrFail($id);
            $inputs = $request->only('name','code','group_id');
            $team->update($inputs);
            session()->flash('success', 'Team  '.$team->name.' updated successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', $e->getMessage());
        }
        return redirect()->route('teams.index');
    }

    public function destroy($id)
    {
        try {
            $team = Team::findOrFail($id);
            if ($team->delete()) {
                session()->flash('success', 'Team '.$team->name.' deleted successfully!');
            } else {
                session()->flash('error', 'Whoops! Something went wrong..!');
            }
        } catch (\Throwable $e) {
            session()->flash('error', $e->getMessage());
        }
        return redirect()->route('teams.index');
    }
}
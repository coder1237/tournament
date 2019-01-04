<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\GroupFormRequest;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::get();
        return view('groups.index',['groups'=>$groups]);
    }

    public function create()
    {
        return view('groups.form');
    }

    public function store(GroupFormRequest $request)
    {
        try{
            $group = Group::create($request->only('name'));
            session()->flash('success','Group '.$group->name.' created successfully!');
        }
        catch (\Throwable $e){
            session()->flash('error',$e->getMessage());
        }
        return redirect()->route('groups.index');
    }

    public function edit($id)
    {
        try{
            $group = Group::findOrFail($id);
            return view('groups.form',['group'=>$group]);
        }
        catch (\Throwable $e){
            session()->flash('error',$e->getMessage());
        }
        return redirect()->route('groups.index');

    }

    public function update(GroupFormRequest $request, $id)
    {
        try{
            $group = Group::findOrFail($id);
            $group->update(['name'=>$request->name]);
            session()->flash('success','Group '.$group->name.' updated successfully!');
        }
        catch (\Throwable $e){
            session()->flash('error',$e->getMessage());
        }
        return redirect()->route('groups.index');
    }

    public function destroy($id)
    {
        try{
            $group = Group::findOrFail($id);
            if($group->delete()){
                session()->flash('success','Group '.$group->name.' deleted successfully!');
            }else{
                session()->flash('error','Whoops! Something went wrong..!');
            }
        }
        catch (\Throwable $e){
            session()->flash('error',$e->getMessage());
        }
        return redirect()->route('groups.index');
    }
}

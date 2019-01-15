<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $user     = Auth::user();
        return view('home',compact('projects','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        $image      = $request->file('image_banner');

        $image_name = time() . $image->getClientOriginalName();                      

        $image_path = 'uploads/';

        if($image->move($image_path, $image_name))
        {

            Project::updateOrCreate([
                    'title'        => $request->title,
                    'author'       => $request->author,
                    'image_banner' => $image_path.$image_name,
                    'content'      => $request->content
            ]);
        }
       return redirect()->route('project.index')->with(['success'=>'Your successfully save new project']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.detail',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $image      = $request->file('image_banner');

        $image_name = time() . $image->getClientOriginalName();                      

        $image_path = 'uploads/';

        if($image->move($image_path, $image_name))
        {

            Project::where('id',$id)->update([
                    'title'        => $request->title,
                    'author'       => $request->author,
                    'image_banner' => $image_path.$image_name,
                    'content'      => $request->content
            ]);
        }

       return redirect()->route('project.index')->with(['success'=>'Your project is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Project::where('id',$id)->delete();
       return redirect()->route('project.index')->with(['success'=>'Your project is successfully deleted']);
    }
}

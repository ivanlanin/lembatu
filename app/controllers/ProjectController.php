<?php
// namespace Lembatu;

class ProjectController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();
        return View::make('projects.index')
            ->with('projects', $projects)
            ->with('pageHeader', Lang::get('msg.projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('projects.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return View::make('projects.show')
            ->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        return View::make('projects.edit')
            ->with('project', $project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'code' => 'required',
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('projects/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $project = new Project;
            $project->code = Input::get('code');
            $project->name = Input::get('name');
            $project->save();

            Session::flash('message', 'Successfully created project!');

            return Redirect::to('projects');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {
        $rules = array(
            'code' => 'required',
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('projects/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $project = Project::find($id);
            $project->code = Input::get('code');
            $project->name = Input::get('name');
            $project->save();

            Session::flash('message', 'Successfully updated project!');

            return Redirect::to('projects');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        Session::flash('message', 'Successfully deleted the project!');

        return Redirect::to('projects');
    }
}

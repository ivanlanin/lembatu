<?php
/**
 * This file is part of Lembatu
 */
namespace Lembatu\Controller;

use Input;
use Lang;
use Lembatu\Model\Project;
use URL;
use Session;
use Validator;
use Redirect;
use View;

/**
 * Project controller
 */
class ProjectController extends BaseController
{
    /**
     * @var array Breadcrumb
     */
    private $breadcrumb;

    /**
     * @var string Page header
     */
    private $pageHeader;

    /**
     * Create instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->breadcrumb = array(array('url' => URL::to('projects'), 'label' => Lang::get('msg.projects')));
        $this->pageHeader = Lang::get('msg.projects');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::paginate(50);
        $this->pageHeader = Lang::get('msg.projectList');
        unset($this->breadcrumb[0]['url']);

        return View::make('projects.index')
            ->with('projects', $projects)
            ->with('create', 'projects/create')
            ->with('breadcrumb', $this->breadcrumb)
            ->with('pageHeader', $this->pageHeader);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->breadcrumb[] = array('label' => Lang::get('msg.create'));
        $this->pageHeader = Lang::get('msg.newProject');

        return View::make('projects.create')
            ->with('breadcrumb', $this->breadcrumb)
            ->with('pageHeader', $this->pageHeader);
    }

    /**
     * Display the specified resource.
     *
     * @param  int      $recordId
     * @return Response
     */
    public function show($recordId)
    {
        $project = Project::find($recordId);
        $this->pageHeader = $project->name;
        $this->breadcrumb[] = array('label' => Lang::get('msg.detail'));

        return View::make('projects.show')
            ->with('project', $project)
            ->with('create', 'projects/create')
            ->with('edit', 'projects/' . $recordId . '/edit')
            ->with('delete', 'projects/' . $recordId)
            ->with('breadcrumb', $this->breadcrumb)
            ->with('pageHeader', $this->pageHeader);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int      $recordId
     * @return Response
     */
    public function edit($recordId)
    {
        $project = Project::find($recordId);
        $this->pageHeader = $project->name;
        $this->breadcrumb[] = array('label' => Lang::get('msg.edit'));

        return View::make('projects.edit')
            ->with('project', $project)
            ->with('detail', 'projects/' . $recordId)
            ->with('delete', 'projects/' . $recordId)
            ->with('breadcrumb', $this->breadcrumb)
            ->with('pageHeader', $this->pageHeader);
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

            return Redirect::to('projects/' . $project->id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int      $recordId
     * @return Response
     */
    public function update($recordId)
    {
        $rules = array(
            'code' => 'required',
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('projects/' . $recordId . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $project = Project::find($recordId);
            $project->code = Input::get('code');
            $project->name = Input::get('name');
            $project->save();

            Session::flash('message', 'Successfully updated project!');

            return Redirect::to('projects/' . $recordId);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int      $recordId
     * @return Response
     */
    public function destroy($recordId)
    {
        $project = Project::find($recordId);
        $project->delete();

        Session::flash('message', 'Successfully deleted the project!');

        return Redirect::to('projects');
    }
}

<?php
/**
 * This file is part of Lembatu
 */
namespace Lembatu\Controller;

use Input;
use Lang;
use Lembatu\Model\Client;
use URL;
use Session;
use Validator;
use Redirect;
use View;

/**
 * Client controller
 */
class ClientController extends BaseController
{
    /**
     * @var string Module name
     */
    protected $route = 'client';

    /**
     * Create instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->modelClass = 'Lembatu\Model\Client';
        $this->pageHeader = Lang::get("$this->route.clients");
        $this->breadcrumb = array(array('url' => URL::to($this->route), 'label' => $this->pageHeader));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($recordId = null)
    {
        if ($recordId !== null) {
            $this->getShow($recordId);
        }

        $modelClass = $this->modelClass;
        $model = $modelClass::paginate(50);
        $this->pageHeader = Lang::get("$this->route.list");
        unset($this->breadcrumb[0]['url']);

        return $this->setView("$this->route.index")
            ->with('create', "$this->route/create")
            ->with('model', $model);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $this->breadcrumb[] = array('label' => Lang::get('msg.create'));
        $this->pageHeader = Lang::get("$this->route.new");

        return $this->setView("$this->route.create");
    }

    /**
     * Display the specified resource.
     *
     * @param int $recordId
     * @return Response
     */
    public function getShow($recordId)
    {
        return $this->viewRecord($recordId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $recordId
     * @return Response
     */
    public function getEdit($recordId)
    {
        return $this->viewRecord($recordId, true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore()
    {
        return $this->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $recordId
     * @return Response
     */
    public function postEdit($recordId)
    {
        return $this->save($recordId);
    }

    /**
     * Unified save method
     *
     * @param int $recordId
     * @return Response
     */
    private function save($recordId = null)
    {
        $failed = $recordId === null ? "$this->route/create" : "$this->route/edit/$recordId";

        $rules = array(
            'code' => 'required',
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to($failed)
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            if ($recordId === null) {
                $model = new $this->modelClass;
                $message = Lang::get("$this->route.created");
            } else {
                $model = $this->findRecord($recordId);
                $message = Lang::get("$this->route.updated");
            }
            $model->code = Input::get('code');
            $model->name = Input::get('name');
            $model->save();
            $recordId = $model->id;

            Session::flash('message', $message);

            return Redirect::to("$this->route/show/$recordId");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $recordId
     * @return Response
     */
    public function anyDelete($recordId)
    {
        $model = $this->findRecord($recordId);
        $model->delete();

        Session::flash('message', Lang::get("$this->route.deleted"));

        return Redirect::to($this->route);
    }

    /**
     * Find record by Id.
     *
     * @param int $recordId
     * @return \Eloquent
     */
    private function findRecord($recordId)
    {
        $modelClass = $this->modelClass;

        return $modelClass::find($recordId);
    }

    /**
     * Get record.
     *
     * @param int $recordId
     * @param bool $isForm
     * @return Response
     */
    private function viewRecord($recordId, $isForm = false)
    {
        $model = $this->findRecord($recordId);
        $label = $isForm ? Lang::get('msg.edit') : Lang::get('msg.detail');
        $viewName = $isForm ? "$this->route.edit" : "$this->route.show";
        $this->pageHeader = $isForm ? Lang::get("$this->route.edit") : $model->name;
        $this->breadcrumb[] = array('label' => Lang::get($label));

        $view = $this->setView($viewName)
            ->with('model', $model)
            ->with('create', "$this->route/create")
            ->with('delete', "$this->route/delete/$recordId");
        if ($isForm) {
            $view->with('detail', "$this->route/show/$recordId");
        } else {
            $view->with('edit', "$this->route/edit/$recordId");
        }

        return $view;
    }

    /**
     * Set view.
     *
     * @param string $view
     * @return \View
     */
    private function setView($view)
    {
        return View::make($view)
            ->with('breadcrumb', $this->breadcrumb)
            ->with('pageHeader', $this->pageHeader)
            ->with('pageTitle', $this->pageHeader);
    }
}

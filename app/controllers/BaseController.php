<?php
/**
 * This file is part of Lembatu
 */
namespace Lembatu\Controller;

use Controller;
use View;

/**
 * Base controller class
 */
class BaseController extends Controller
{
    /**
     * @var string Module name
     */
    protected $route;

    /**
     * @var \Eloquent Model class
     */
    protected $modelClass;

    /**
     * @var array Breadcrumb
     */
    protected $breadcrumb;

    /**
     * @var string Page title
     */
    protected $pageTitle;

    /**
     * @var string Page header
     */
    protected $pageHeader;

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
}

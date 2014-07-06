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

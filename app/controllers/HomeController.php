<?php
namespace Lembatu\Controller;

use Auth;
use Input;
use Lang;
use Redirect;
use Validator;
use View;

/**
 * Home controller
 */
class HomeController extends BaseController
{
    /**
     * Show dashboard
     */
    public function showDashboard()
    {
        return View::make('home.dashboard')
            ->with('title', 'Dashboard')
            ->with('pageHeader', Lang::get('msg.home'));
    }

    /**
     * Show login
     */
    public function showLogin()
    {
        return View::make('home.login');
    }

    /**
     * Do login
     */
    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required',
            'password' => 'required|alphaNum|min:3',
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            if (Auth::attempt($userdata)) {
                return Redirect::to('/');
            } else {
                return Redirect::to('login');
            }
        }
    }

    /**
     * Do logout
     */
    public function doLogout()
    {
        Auth::logout();

        return Redirect::to('login');
    }
}

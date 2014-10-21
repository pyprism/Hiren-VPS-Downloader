<?php
/**
 * Created by PhpStorm.
 * User: prism
 * Date: 10/20/14
 * Time: 7:58 PM
 */

class UserController extends BaseController {

    public function getRegister(){
        if (Auth::check()){
            return Redirect::to('users/dashboard')->with('message', 'You are already logged in !');
        }
        elseif(!User::all()->isEmpty()){
            return Redirect::to('users/login');
        }else
            return View::Make('users.register')->with('register', User::all()->isEmpty());
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(), User::$rules);
        if ($validator->passes()) {
            // validation has passed, save user in DB
            // check if there is already a admin registered
            if(User::all()->isEmpty()) {
                $user = new User;
                $user->username = Input::get('username');
                $user->password = Hash::make(Input::get('password'));
                $user->download = True;
                $user->admin = True;
                $user->save();
                return Redirect::to('users/login')->with('message', 'Thanks for registering!');
            }//Todo for normal users
        } else {
           // validation has failed, display error messages
            return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }


    public function getLogin() {
        if (Auth::check()){
            return Redirect::to('users/dashboard')->with('message', 'You are already logged in !');
        }else
            return View::make('users.login')->with('register', User::all()->isEmpty());;
    }


    public function postLogin() {
        if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
            return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
        } else {
            return Redirect::to('users/login')
                ->with('message', 'Your username/password combination was incorrect')
                ->withInput();
        }
    }


    public function getLogout(){
        Auth::logout();
        return Redirect::to('users/login')->with('message', 'Your are now logged out!');
    }
}
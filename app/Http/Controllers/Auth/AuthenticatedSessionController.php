<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $redirectTo = request()->redirectTo;
        
          $get_user = User::where('email', $request->email)->first()->toArray();
        //echo "<pre>"; print_r($get_user); die();
        if (!empty($get_user)) 
        {
            Session::put('user_id', $get_user['id']);
            Session::put('admin_name', $get_user['name']);
            Session::put('admin_image', $get_user['profile_image']);
            Session::put('user_type', $get_user['user_type']);
            
            if($get_user['user_type'] == 1)
            {
                //Session::put('avatar', $get_user['avatar']);

                if ($redirectTo) {
     
                    return redirect($redirectTo);
                } 
                else 
                {
                    return redirect('admin/dashboard');
                } 
            }
            else if($get_user['user_type'] == 2)
            {
                if ($redirectTo) {
                    return redirect($redirectTo);
                } 
                else 
                {
                    return redirect('admin/dashboard');
                }
    
            }
             else if($get_user['user_type'] == 3)
            {
                //echo 'hii';die();
                if ($redirectTo) {
                    return redirect($redirectTo);
                } 
                else 
                {
                     
                    return redirect('admin/dashboard');
                }
    
            }
              else if($get_user['user_type'] == 4)
            {
                if ($redirectTo) {
                    return redirect($redirectTo);
                } 
                else 
                {
                     
                    return redirect('admin/dashboard');
                }
    
            } 
            
            
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

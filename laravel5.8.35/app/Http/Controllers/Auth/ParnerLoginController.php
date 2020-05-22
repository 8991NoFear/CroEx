<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// @author: ledinhbinh
use Auth;
use Illuminate\Validation\ValidationException;
//

class ParnerLoginController extends Controller
{
    public function __construct()
    {
        // @author: ledinhbinh
        $this->middleware('guest:parner')->except('logout');
        //
    }

    // @author: ledinhbinh
    public function showLoginForm()
    {
        return view('auth.parner-login');
    }

    public function login(Request $request)
    {
        // validate the form data
        $this->validate($request,
            [
                'email' => ['required', 'email'],
                'password' => ['required', 'string', 'min:6'],
            ]);

        // attempt to log user in
        if (Auth::guard('parner')->attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->remember)) {
            // if successful then redirect to intended location
            return redirect()->intended(route("parner.dashboard"));
        }

        // else redirect back to login form with the form data
        return $this->sendFailedLoginResponse($request);
    }

    public function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        return 'email';
    }

    public function logout(Request $request)
    {
        Auth::guard('parner')->logout();
        return redirect('/');
    }
    //
}

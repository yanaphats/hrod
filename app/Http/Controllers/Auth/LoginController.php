<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

	/**
	 * Override username function in
	 * Illuminate\Foundation\Auth\AuthenticatedUsers Traits
	 * @return void
	 */
	public function username()
	{
		return 'username';
	}

	/**
	 * The user has been authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  mixed  $user
	 * @return mixed
	 */
	protected function authenticated(Request $request, $user)
	{

		if ($user->verified == false) {
			$this->guard()->logout();

			$request->session()->invalidate();

			session()->push('user.email', $user->email);
			return redirect()->route(localizeRoute('login'))->withErrors(['unverified' => true]);
		}

		return null;
	}

	/**
	 * Override validateLogin function in
	 * Illuminate\Foundation\Auth\AuthenticatedUsers Traits
	 * @return void
	 */
	protected function validateLogin(Request $request)
	{
		$this->validate($request, [
			$this->username() => 'required',
			'password' => 'required',
		], [
			$this->username() . '.required' => $this->username() == 'email' ? __('auth.required.email') : __('auth.required.username'),
			'password.required' => __('auth.required.password')
		]);
	}

	/**
	 * Override redirectTo function in
	 * Illuminate\Foundation\Auth\AuthenticatesUsers
	 * @return void
	 */
	public function redirectTo()
	{
		if (empty(auth()->user())) {
			$redirectTo = route(localizePath('login'));
		} else {
			$redirectTo = route(localizeRoute('index'));
		}

		return $redirectTo;
	}

	/**
	 * Override logout function in
	 * Illuminate\Foundation\Auth\AuthenticatesUsers
	 * @return void
	 */
	public function logout(Request $request)
	{
		$this->guard()->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		if ($response = $this->loggedOut($request)) {
			return $response;
		}

		return $request->wantsJson()
			? new JsonResponse([], 204)
			: redirect()->route(localizeRoute('index'));
	}

}

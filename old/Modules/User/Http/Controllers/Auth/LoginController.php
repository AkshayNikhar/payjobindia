<?php

namespace Modules\User\Http\Controllers\Auth;

use Modules\User\Http\Controllers\Controller;
use Modules\User\Entities\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

use Modules\Jobs\Entities\Company;

class LoginController extends Controller
{
    private $providers = [
        'facebook',
        'twitter',
        'linkedin',
        'google',
        'github',
        'gitlab',
        'bitbucket',
    ];

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

    public function redirectTo(){

        $this->redirectTo = 'dashboard';

        switch (Auth::user()->role) {
            case 'employer':
                $c = Company::where('user_id', Auth::user()->id)->first();
                if(!empty($c->company_name) && !empty($c->company_email) && !empty($c->company_ceo) && !empty($c->industry_id) && !empty($c->ownership_type_id) && !empty($c->description) && !empty($c->location) && !empty($c->phone) && !empty($c->country_id) && !empty($c->state_id) && !empty($c->city_id)){
                $this->redirectTo = 'company/dashboard';
                }
                else{
                    $this->redirectTo = 'company/profile';
                }
                break;
            case 'admin':
                $this->redirectTo = 'settings/dashboard';
                break;
            default:
                if(!empty(Auth::user()->getGender->id) && !empty(Auth::user()->getEducation->id) && !empty(Auth::user()->getDegreeType->id)){

                $this->redirectTo = '/jobs';
                }
                else{
                $this->redirectTo = 'dashboard';
                }
                //$this->redirectTo = 'myappliedjobs';
                break;
        }
        return $this->redirectTo;

    }
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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('themes::' . config('app.SITE_LANDING') . '.auth.login');
    }

    /**
     * Redirect the user to the authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if (!in_array($provider, $this->providers)) {
            return redirect()->route('login');
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        if (!in_array($provider, $this->providers)) {
            return redirect()->route('login');
        }

        try {

            $social = Socialite::driver($provider)->user();

            $user = User::firstOrCreate(
                [
                    'email' => $social->getEmail(),
                ],
                [
                    'name'          => $social->getName(),
                    'password'      => Hash::make(Str::random(40)),
                    
                ]
            );

            Auth::login($user);

            return redirect('/');

        } catch (\Exception $e) {

            return redirect()->route('login')->with('error', $e->getMessage());

        }
    }

}

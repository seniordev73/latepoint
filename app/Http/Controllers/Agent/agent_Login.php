<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;
use App\Models\UserVerificationToken;

class agent_Login extends Controller
{
    protected $providers = [
        'google',
        'facebook',
        'linkedin'
    ];

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('agent.dashboard');
        }
        return view('agent.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login_act(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Check if user is agent
        $user = User::where('email', $request->email)->where('is_deleted', 0)->first();
        $credentials = $request->only('email', 'password');

        if ($user) {
            if ($user->status) {
                if ($user->is_verified) {
                    if (Auth::attempt($credentials)) {
                        return redirect()->route('agent.dashboard');
                    } else {
                        return back()->with('error', "Credentials do not match !");
                    }
                } else {
                    return back()->with('error', "Your account is not verified !");
                }
            } else {
                return back()->with('error', "Your account is inactive !");
            }
        } else {
            return back()->with('error', "Credentials do not match !");
        }

        if (!Auth::attempt($credentials)) {
            return back()->with('error', __('frontend.Credentials_donot_match'));
        }

        return redirect()->route('agent.login');
    }

    public function redirectToProvider($driver)
    {
        if (!$this->isProviderAllowed($driver)) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // Check for email in returned user
        return empty($user->email)
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->intended('agent.dashboard');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('agent.login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // Check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // If user already found
        if ($user) {
            // Update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
            // Login the user
            Auth::login($user, true);

            // Redirect to agent dashboard
            return redirect()->route('agent.dashboard');
        } else {
            // Redirect to registration page if user not found
            return redirect()->route('agent.register');
        }
    }

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
}

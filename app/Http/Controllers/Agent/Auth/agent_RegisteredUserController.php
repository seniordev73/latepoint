<?php

namespace App\Http\Controllers\Agent\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVerificationToken;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;


class agent_RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('agent.auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rule =
            [
                'firstname' => 'required|string|max:20',
                'lastname' => 'required|string|max:20',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ];
        $error_msg = [
            'email.required' => __('Please fill in the field'),
            'email.email' => __('Email must be a valid email address'),
            'password.required' => __('Please fill in the field'),
            'password.min' => __('Password should be minium 6 characters'),
        ];

        $request->validate($rule, $error_msg);
        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => '1',
            'is_verified' => '0',
        ]);

        $token = Str::random(64);

        UserVerificationToken::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        $details = [
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'token' => $token,
            'email' => $user->email
        ];
        dispatch(new \App\Jobs\VerifyEmailJob($details));
        // Auth::attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
        return redirect()->route('admin.verify.email');
    }
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }


    public function verify_email()
    {
        return view('agent.auth.verify-email');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyAccount($token)
    {
        $verifyUser = UserVerificationToken::where('token', $token)->first();

        $message = 'Sorry your e-mail cannot be identified.';
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->is_verified) {
                $user->is_verified = 1;
                $user->email_verified_at = Carbon::now();
                $user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
            Auth::login($user);
        }
        return redirect()->route('admin.login')->with('error', $message);
    }

}

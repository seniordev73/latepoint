<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Mail;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => __('frontend.required_field'),
            'email.email' => __('Email must be a valid email address'),
        ]);

        $user = User::where('email', $request->email)->first();

        if (!is_null($user)) {
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('emails.forgotPassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject(__('Forgot your password?'));
            });

            return back()->with('success', __('We have emailed your password reset link.'));
        } else {
            return back()->with('error', __('The email address cannot be found.'));
        }
    }

}

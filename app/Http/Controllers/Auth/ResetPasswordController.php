<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Auth::logout();
        // $this->middleware('guest', ['except' => 'reset']);
    }

    public function showResetForm(Request $request, $token = null)
    {
        //$user = DB::table('user_activations')->where('token',$token)->first();

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

     /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /* public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string',
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
        ]);

        return $request->all();

        $user = User::where('email', $request->email)->first();
        $resetToken = DB::table('password_resets')
            ->where('email', $request->email)
            ->first();

        if (!password_verify($request->token, $resetToken->token)) {
            return back()
                ->withInput()
                ->with('gagal', 'Token expired');
        }

        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);
        return redirect('/');
    } */
}

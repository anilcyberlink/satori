<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /** @var string */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Verify Google reCAPTCHA
        $captchaResponse = $request->input('g_recaptcha_response');

        if (!$this->verifyCaptcha($captchaResponse)) {
            return redirect('adminisclient')
                ->with('status', 'You are Robot!');
        }

        // Authenticate using email, password and PIN
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'pin' => $request->pin,
        ];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Check suspended account
            if (Auth::user()->suspended) {
                return redirect('account-suspended');
            }

            return redirect()->intended('admin/dashboard');
        }

        return redirect('adminisclient')
            ->with('status', 'Invalid Username, Password or PIN!');
    }

    private function verifyCaptcha(?string $captchaResponse): bool
    {
        if (empty($captchaResponse)) {
            return false;
        }

        try {
            $response = Http::asForm()
                ->timeout(10)
                ->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => config('services.recaptcha.secret'),
                    'response' => $captchaResponse,
                ]);

            if (!$response->successful()) {
                return false;
            }

            return (bool) ($response->object()->success ?? false);

        } catch (\Throwable $e) {
            report($e);

            return false;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('adminisclient');
    }
}

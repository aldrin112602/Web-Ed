<?php

namespace App\Http\Controllers;

use App\Services\PHPMailerService;
use App\Models\AdminOtpAccount;
use App\Models\AdminAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

class AdminOtpController extends Controller
{
    protected $mailerService;

    public function __construct(PHPMailerService $mailerService)
    {
        $this->mailerService = $mailerService;
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = AdminAccount::where('email', $request->email)->first();
        if ($user) {
            $otp = $this->getRandomNumbers();
            $expiresAt = Carbon::now()->addMinutes(10);

            $sent = $this->mailerService->sendOtp($request->email, $otp);

            if ($sent) {
                AdminOtpAccount::create([
                    'email' => $request->email,
                    'otp' => $otp,
                    'expires_at' => $expiresAt,
                ]);

                // Store email in session
                Session::put('otp_email', $request->email);
                Session::put('otp', $otp);

                return redirect()->route('admin.password.reset');
            }

            return back()->withErrors(['email' => 'Failed to send OTP, please try again']);
        } else {
            return back()->withErrors(['email' => 'User not found, please try again']);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required']);

        // Retrieve email from session
        $email = Session::get('otp_email');
        if (!$email) {
            return back()->withErrors(['otp' => 'Email not found in session']);
        }

        $otpEntry = AdminOtpAccount::where('email', $email)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otpEntry) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }

        return redirect()->route('admin.password.reset');
    }

    public function request()
    {
        return view('admin.auth.email');
    }

    public function reset()
    {
        return view('admin.auth.reset');
    }

    public function update()
    {
    }


    public function getRandomNumbers($count = 1)
    {
        $randomNumbers = [];
        for ($i = 0; $i < $count; $i++) {
            $randomNumbers[] = rand(100000, 999999);
        }
        return $randomNumbers[0];
    }
}

<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerService
{
    protected $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        // Server settings
        $this->mailer->isSMTP();
        $this->mailer->Host       = env('MAIL_HOST') ?? 'smtp.gmail.com';
        $this->mailer->SMTPAuth   = true;
        $this->mailer->Username   = env('MAIL_USERNAME') ?? 'caballeroaldrin02@gmail.com';
        $this->mailer->Password   = env('MAIL_PASSWORD') ?? 'igtpplhigzmehdjc';
        $this->mailer->SMTPSecure = env('MAIL_ENCRYPTION') ?? 'ssl';
        $this->mailer->Port       = env('MAIL_PORT') ?? 465;
    }

    public function sendOtp($to, $otp)
    {
        try {
            // Recipients
            $this->mailer->setFrom(env('MAIL_FROM_ADDRESS') ?? 'caballeroaldrin02@gmail.com', env('MAIL_FROM_NAME') ?? 'WebEd');
            $this->mailer->addAddress($to);

            // Content
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'OTP Verification';
            $this->mailer->Body    = '<div style="background: #f0f0f0; padding: 30px;">
        <p style="padding: 20px; font-size: 20px; background: #fff; color: #222; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); border-radius: 10px; text-align: center; margin: auto;">
            Please use the following One Time Password (OTP) to change your password: 
            <b style="font-size: 30px; display: block; margin-top: 10px; text-decoration: underline;">' . $otp . '</b>
            <br>Warning: Do not share this OTP with anyone. 
            <br> Thank you!
        </p>
    </div>';

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

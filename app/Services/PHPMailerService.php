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
            $this->mailer->Subject = 'Your OTP Code';
            $this->mailer->Body    = 'Your OTP code is: ' . $otp;

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

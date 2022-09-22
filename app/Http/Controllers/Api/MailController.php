<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //要記得手動引入

class MailController extends Controller
{
  public function sendMail(Request $request)
  {
    $data = $request->all();

    //Laravel Mail 使用方法可參考：https://laravel.com/docs/5.1/mail#sending-mail
    Mail::send('email.feedbackContent', $data, function ($message) use ($data) {
      $message->from(ENV('MAIL_USERNAME', 'airysue@gmail.com'), $data['name']);
      $message->to(ENV('MAIL_SUPPORT', 'aa@ssgmail.com'))->subject('Feedback Mail--使用者意見回饋信');
    });
    return "success";
  }
}
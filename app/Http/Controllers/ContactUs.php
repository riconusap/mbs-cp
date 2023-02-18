<?php

namespace App\Http\Controllers;

use App\Mail\contactUs as MailContactUs;
use App\Model\Client;
use App\Model\TentangPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ContactUs extends Controller
{
    public function mail(Request $request)
    {
      // dd($request->all());
        if(empty($request->name)  || empty($request->subject) || empty($request->message) || !filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(500);
            // dd("Error");
            exit();
          }
          $name = strip_tags(htmlspecialchars($request->name));
          $email = strip_tags(htmlspecialchars($request->email));
          $m_subject = strip_tags(htmlspecialchars($request->subject));
          $message = strip_tags(htmlspecialchars($request->message));
          
          $to = "admin@rpramawijayalawfirm.com"; // Change this email to your //
          $header = "From: $email";
          $header .= "Reply-To: $email";	

          $details = [
            'header' => "From: $email",
            'header' => "Reply-To: $email",
            'title' => "$m_subject:  $name",
            'body' => "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message",
          ];
          
          Mail::to($to)->send(new MailContactUs($details));   
          return Response::json($respone = ['error' => "Silahkan Pilih Kategori!"], 200);
    }
}

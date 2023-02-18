<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\TentangPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function mail(Request $request)
    {
        if(empty($request->name)  || empty($request->subject) || empty($request->message) || !filter_var($request->message, FILTER_VALIDATE_EMAIL)) {
            http_response_code(500);
            exit();
          }
          
          $name = strip_tags(htmlspecialchars($request->name));
          $email = strip_tags(htmlspecialchars($request->email));
          $m_subject = strip_tags(htmlspecialchars($request->subject));
          $message = strip_tags(htmlspecialchars($request->message));
          
          $to = "admin@rpramawijayalawfirm.com"; // Change this email to your //
          $subject = "$m_subject:  $name";
          $body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
          $header = "From: $email";
          $header .= "Reply-To: $email";	
          
          if(!mail($to, $subject, $body, $header))
            http_response_code(500);
    }
}

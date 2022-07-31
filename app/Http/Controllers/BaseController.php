<?php

namespace App\Http\Controllers;

use App\Model\TentangPerusahaan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
      //its just a dummy data object.
      $tp = TentangPerusahaan::all();
  
      // Sharing is caring
      View::share('tp', $tp);
    }
}

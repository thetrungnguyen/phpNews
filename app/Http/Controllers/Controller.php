<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

<<<<<<< HEAD
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
=======
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
      $this->Dangnhap();
    }
    function Dangnhap()
    {
      if(Auth::check())
      {
        view()->share('userLogin',Auth::user());
      }
    }
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
}

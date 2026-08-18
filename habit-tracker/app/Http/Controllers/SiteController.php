<?php

namespace App\Http\Controllers;

/**@var */

use Illuminate\View\View;

class SiteController extends Controller {



    public function index():View {

        return view('home');
    }

}

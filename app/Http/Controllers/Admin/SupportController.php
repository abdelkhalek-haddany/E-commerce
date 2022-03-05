<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function support(){
        return view('admin/pages/support');
    }
    public function documentation(){
        return view('admin/pages/documentation');
    }
}

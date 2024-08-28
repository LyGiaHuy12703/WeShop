<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function getAdmin(){
        return order::select('Status')->first();
    }
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index(){
        return view('frontend.chef.chef',['chefs'=> Chef::all()]);
    }
}

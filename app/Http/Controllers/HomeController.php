<?php

namespace App\Http\Controllers;

use App\Facade\Tenants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return Tenants::getTenant();
    }
}
 
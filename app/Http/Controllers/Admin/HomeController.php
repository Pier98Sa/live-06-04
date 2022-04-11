<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $fineMeseCorrente = Carbon::now()->endOfMonth()->endOfDay();
        $now = Carbon::now()->timezone('Europe/Rome');
        $diffInDays = $fineMeseCorrente->diffInDays($now);
        $user = Auth::user();

        dump($now ->format('d/m/Y h:i:s'));
        return view('admin.home', compact('user', 'diffInDays'));
    }
}

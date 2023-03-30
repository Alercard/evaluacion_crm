<?php

namespace App\Http\Controllers\TestFLC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeerController extends Controller
{
    public function index() {
        return view('peers.index');
    }
}

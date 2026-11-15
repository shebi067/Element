<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show the music application homepage.
     */
    public function __invoke(): View
    {
        return view('music.index');
    }
}

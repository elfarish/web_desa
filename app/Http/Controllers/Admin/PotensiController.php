<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function index()
    {
        return view('admin.potensi.index');
    }
}

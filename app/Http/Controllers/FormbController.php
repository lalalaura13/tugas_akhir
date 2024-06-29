<?php

namespace App\Http\Controllers;

use App\Models\KelompokLatihan;
use Illuminate\Http\Request;

class FormbController extends Controller
{
    public function index()
    {
        $formB = KelompokLatihan::all();
        return view('admin.data-formb', compact('formB'));
    }
}

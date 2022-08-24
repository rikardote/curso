<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function UnitAll()
    {
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all', compact('units'));
    }

    public function UnitAdd()
    {
        return view('backend.unit.unit_add');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visit;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function index()
    {
        $datas = User::where('id', Auth::user()->id)
            ->with(['visits' => function($query) {
                $query->with('organization');
                $query->with('user');
            }])->first();

        return view('visits.index', compact('datas'));
    }
}

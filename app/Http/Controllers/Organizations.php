<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Organizations extends Controller
{
    public function index()
    {
        $organisations = Organization::where('user_id', Auth::user()->id)->get();

        return view('organizations.index', compact('organisations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'display' => 'required'
        ]);

        Organization::create([
            "status" => true,
            "name" => $request->name,
            "user_id" => Auth::user()->id,
            "display_name" => $request->display
        ]);

        return redirect()->back();
    }
}

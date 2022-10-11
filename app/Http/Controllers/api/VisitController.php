<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'national_id' => 'required',
            'name' => 'required',
            'destination' => 'required',
            'phone' => 'required',
        ]);

        $user = User::where('id', Auth::user()->id)->first();


        $data = $user->organizations->where('status', true);

        Visit::create([
            'national_id' => $request->national_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'destination' => $request->destination,
            'added_by' => $user->id,
            'organization_id' => $data[0]->id,
        ]);

        return response()->json([
            'message' => "Record updated successfully"
        ], 201);
    }
}

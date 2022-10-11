<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function index()
    {
        $organizations = Organization::where('user_id', Auth::user()->id)->with('users')->get();
        // return $organizations;

        return view('teams.index', compact('organizations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'organization' => 'required'
        ]);

        $organization = Organization::find($request->organization);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make("1234567890"),
        ]);

        $organization->users()->attach($user, ['status' => true]);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NifController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:account');
    }

    public function index()
    {

        return view('frontend-page.nif');
    }

    public function gantiPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|max:12',
            'new_password' => 'confirmed|max:12|different:password',
            'new_password_confirmation' => 'required'
        ]);
        $user = \App\Account::findOrFail(Auth::user()->id);
        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password),
            ])->save();
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'Success',
                ]);
            }
            $request->session()->flash('success', 'Password changed');
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'Error',
                ]);
            }
            $request->session()->flash('error', 'Password does not match');
        }
        return redirect()->route('member.nif');
    }
}

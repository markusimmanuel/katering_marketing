<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function index()
    {
        return view('merchant.dashboard');
    }

    public function editProfile()
    {
        $merchant = Auth::user()->merchant;
        return view('merchant.profile.edit', compact('merchant'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact_number' => 'required|string|max:15',
            'description' => 'nullable|string',
        ]);

        $merchant = Auth::user()->merchant;
        $merchant->update($request->only('company_name', 'address', 'contact_number', 'description'));

        return redirect()->route('merchant.dashboard')->with('success', 'Profile updated successfully.');
    }
}

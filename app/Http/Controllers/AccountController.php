<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    // public function updateContact(Request $request)
    // {
    //     $user = Auth::user();

    //     $data = $request->validate([
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'full_name' => 'required',
    //         'passport_data' => 'required',
    //     ]);

    //     $user->update($data);

    //     return redirect()->back()->with('success', 'Contact details updated successfully.');
    // }
    public function updateContact(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'full_name' => 'required |max:23',
            'phone_number' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:20',
            'state' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20'
        ]);

        $user->update($data);

        return response()->json(['message' => 'Account details updated successfully']);
    }

    public function showQuestionnaire()
    {
        return view('account.questionnaire');
    }

    public function submitQuestionnaire(Request $request)
    {
        // Process and save the questionnaire data here
        // Example:
        $data = $request->all();

        // Save the data to the database or perform any other actions

        return redirect()->back()->with('success', 'Questionnaire submitted successfully.');
    }
}

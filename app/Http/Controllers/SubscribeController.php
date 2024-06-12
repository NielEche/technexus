<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscribers;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        subscribers::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'service' => $request->input('service'),
            'Inquiry' => $request->input('Inquiry'),
        ]);

        return redirect()->back()->with('success', 'That worked, your message has been received!');
    }
}

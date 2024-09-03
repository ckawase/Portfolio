<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function sendMail(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ロワンヴー]*$/u'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
            'body' => ['required', 'string', 'max:2000'],
        ]);

        Mail::to('admin@example.com')->send(new ContactAdminMail($validated));

        return to_route('contact.complete')->with('success' ,);
    }

    public function complete()
    {
        return view('contact.complete');
    }
}

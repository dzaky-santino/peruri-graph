<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FormMail;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function index()
    {
        return view('personal-data.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first' => 'required|string|max:255',
            'last' => 'required|string|max:255',
            'email' => 'required|email',
            'company' => 'required|string|max:255',
            'job-title' => 'required|string|max:255',
            'job-function' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ]);

        Mail::to('dzakysan2002@gmail.com')->send(new FormMail($validated)); #digitalchannel@peruri.co.id

        return redirect()->back()->with('success', 'Data berhasil dikirim ke email!');
    }
}
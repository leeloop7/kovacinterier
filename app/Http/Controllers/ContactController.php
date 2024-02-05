<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Send the contact email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'how-can-we-help' => 'required',
            'how-did-you-hear-about-us' => 'required'
        ]);

        if (!$validated) {
            return back()->withInput();
        }

        Mail::to('info@kovacinterier.com')->send(new ContactMail($request->input()));
        return back()->with('success', '');
    }

}

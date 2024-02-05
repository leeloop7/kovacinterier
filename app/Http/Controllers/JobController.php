<?php

namespace App\Http\Controllers;

use App\Mail\JobMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Send the job email
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
            'phone' => 'required',
            'file-input' => 'required',
            'file-input.*' => 'required|max:10000|mimes:pdf'
        ]);

        if (!$validated) {
            return back()->withInput();
        }

        Mail::to('info@kovacinterier.com')->send(new JobMail($request->except("_token")));
        return back()->with('success', '');
    }

}

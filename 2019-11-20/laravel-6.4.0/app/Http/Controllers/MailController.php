<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::queue(new Contact($request->get('name'), $request->get('email'), $request->get('message'), $request->get('attachment')));
    }

    public function subscription(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        DB::table('subscription')->updateOrInsert([
            'email' => $request->get('email')
        ], [
            'email' => $request->get('email')
        ]);
    }
}

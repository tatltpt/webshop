<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function getContact()
   {
        return view('contact');
   }
    public function saveContact(Request $request)
    {
        dd($request->all());
    }

}

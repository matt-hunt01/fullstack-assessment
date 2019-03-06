<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Notifications\ContactUsFormNotification;

class ContactUsController extends Controller {
    
    public function show () {
        return view( 'contact-us' );
    }
    
    public function store ( ContactUsRequest $request ) {
        $contactUs = $request->store();
        if($contactUs){
            $contactUs->notify( new ContactUsFormNotification($contactUs));
            return response(['status' => true, 'message' => 'Thank you for getting in touch.']);
        }
        return response(['status' => false, 'message' => 'Something went wrong please try again.'], 500);
    }
}

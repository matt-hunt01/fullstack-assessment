<?php

namespace App\Http\Requests;

use App\ContactUs;
use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest {
    
    public function authorize () {
        return true;
    }
    
    public function rules () {
        return [
            'name'     => 'required|string',
            'email'    => 'required|email',
            'company'  => 'nullable|string|min:2|max:120',
            'phone-no' => 'required|integer|digits:11',
            'subject'  => 'required|string|min:3|max:250',
            'message'  => 'required|string|min:10|max:500',
        ];
    }
    
    public function attributes () {
        return [
            'phone-no' => 'phone number',
        ];
    }
    
    public function store () {
        $request             = $this;
        $contactUs           = new ContactUs();
        $contactUs->name     = $request[ 'name' ];
        $contactUs->email    = $request[ 'email' ];
        $contactUs->company  = $request->has( 'company' ) ? $request[ 'company' ] : '';
        $contactUs->phone_no = $request[ 'phone-no' ];
        $contactUs->subject  = $request[ 'subject' ];
        $contactUs->message  = $request[ 'message' ];
        $contactUs->save();
        return $contactUs;
    }
}

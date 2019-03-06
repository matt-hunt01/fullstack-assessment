@component('mail::message')
    Thank you for getting in touch!

    Name: {{$data['name']}}
    Email: {{$data['email']}}
    Company: {{$data['company']}}
    Phone No: {{$data['phone_no']}}
    Subject: {{$data['subject']}}
    Message: {{$data['message']}}

    Thanks,<br >
    {{ $data['name']}}
@endcomponent

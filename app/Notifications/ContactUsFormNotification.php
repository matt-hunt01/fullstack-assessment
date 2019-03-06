<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactUsFormNotification extends Notification {
    
    use Queueable;
    public $data;
    public function __construct ($data) {
        $this->data = $data;
    }
    
    public function via ( $notifiable ) {
        return [ 'mail' ];
    }
    
    public function toMail ( $notifiable ) {
        return ( new MailMessage )
            ->markdown('mail.contact-us', ['data' => $this->data])
            ->subject( 'Thank you for contacting us' )
            ->from('assessment@test.com', 'Test Assessment');
    }
    
    public function toArray ( $notifiable ) {
        return [//
        ];
    }
    //public function build()
    //{
    //    return $this->markdown('mail.contact-us', ['data' => $this->data]);
    //}
}

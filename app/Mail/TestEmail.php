<?php

namespace App\Mail;
use App\Denseignant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

   
  
     protected $order;
     public function __construct(Denseignant $ens)
    {
        $this->ens = $ens;
    }

    public function build()
    {
        $address = $this->ens->email;
        $subject = 'validation';
        $name = 'Centre de langue vivant';
        
        return $this->view('emails.email')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ;
    }
                    
    
}

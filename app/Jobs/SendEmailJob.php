<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\MailerController;

class SendEmailJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
    * Create a new job instance.
    *
    * @return void
    */
    Public String  $email;
    Public String  $type;
    Public String  $id;
    Public String  $userId;

    public function __construct( $email, $type, $id ,$userId ) {
        $this->email = $email;
        $this->type = $type;
        $this->id = $id;
        $this->userId = $userId;

    }

    /**
    * Execute the job.
    *
    * @return void
    */

    public function handle() {
        ( new MailerController )->userEmail( $this->email,  $this->id , $this->userId, $this->type);
    }
}

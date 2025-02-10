<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class ReviewRejectedNotification extends Notification
{
    // use Queueable;
    // i don't use queue because of error 

    protected $review;
    protected $claimer;
    protected $founder;
    protected $status;


    public function __construct($review, $claimer, $founder, $status)
    {
        $this->review = $review;
        $this->claimer = $claimer;
        $this->founder = $founder;
        $this->status = $status;
        
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
    $recipientType = ($notifiable->id == $this->claimer->id) ? 'loser' : 'founder';

    return [
        'message' => $recipientType === 'loser' 
            ? "Unfortunately, your lost item review has been rejected. Please ensure your information is accurate before reapplying." 
            : "",
        'review_id' => $this->review->id,
        'claimer_id' => $this->claimer->id,
        'founder_name' => $this->founder->name,
        'claimer_name' => $this->claimer->name,
        'founder_id' => $this->founder->id,
        'item_name' => $this->review->lost_item_name,
        'recipient_type' => $recipientType, // 'loser' or 'founder'
        'status' => $this->status 
    ];
    }

}

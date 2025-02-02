<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class ReviewApprovedNotification extends Notification
{
    // use Queueable;
    // i don't use queue because of error 

    protected $review;
    protected $claimer;
    protected $founder;

    public function __construct($review, $claimer, $founder)
    {
        $this->review = $review;
        $this->claimer = $claimer;
        $this->founder = $founder;
        
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
            ? "Your lost item review has been approved!  You can contact the founder now." 
            : "Your found item review has been approved!  The loser can now claim the item.",
        'review_id' => $this->review->id,
        'claimer_id' => $this->claimer->id,
        'founder_name' => $this->founder->name,
        'claimer_name' => $this->claimer->name,
        'founder_id' => $this->founder->id,
        'item_name' => $this->review->lost_item_name,
        'approved_at' => now()->format('d-m-Y'),
        'recipient_type' => $recipientType, // 'loser' or 'founder'
    ];
    }

}

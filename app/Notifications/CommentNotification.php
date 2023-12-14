<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CommentNotification extends Notification
{
    protected $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function via(object $notifiable): array
{
    return ['database'];
}

    public function toDatabase($notifiable)
    {
        return [
            // Add any additional data you want to include in the notification array
            'id' => $this->comment->id,
            'content' => $this->comment->content,
        ];
    }
}

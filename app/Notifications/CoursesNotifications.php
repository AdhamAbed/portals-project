<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CoursesNotifications extends Notification
{
    use Queueable;

    private $mail_details;
    private $database_details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mail_details,$database_details)
    {
        $this->mail_details = $mail_details;
        $this->database_details = $database_details;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//            ->greeting($this->details['greeting'])
//            ->line($this->details['body'])
//            ->action($this->details['actionText'], $this->details['actionURL'])
//            ->line($this->details['thanks']);
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->database_details['title'],
            'action_url' => $this->database_details['action_url'],
            'course_id' => $this->database_details['course_id']
        ];
    }

}

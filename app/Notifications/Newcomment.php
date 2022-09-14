<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use Illuminate\Notifications\Messages\BroadcastMessage;

class Newcomment extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
     
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)//notifiable=> الشخص الي هبعتله الاشعار
    {

        return ['database','mail','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $body = sprintf(' %s has replied to your review. {click leads to: exact page where the review is submitted}.',
        $this->user->first_name,
      
    );
        $message =new MailMessage;
        $message->subject('comment')
                ->line( $body)//عباره عن فقره بالرساله كل لاين فقرة
                ->action('view to comment', url('/profile'))//rout('profile.session',$this->session->id)
                ->greeting('hello'.($notifiable->last_name ?? ''));
                //->from('a@a.com','name')
         return $message;
    }



    public function toDatabase($notifiable)
    {
        $body = sprintf(' %s has replied to your review. {click leads to: exact page where the review is submitted}.',
        $this->user->last_name,
        
    );
        return [
            'title' => 'new comment',
            'body' => $body,
            'icon' => 'icon-clock-oh',
            'url' => '/profile',

             
        ];
    }



    public function toBroadcast($notifiable)
    {
        $body = sprintf(' %s has replied to your review. {click leads to: exact page where the review is submitted}.',
        $this->user->last_name,
     
    );
        return new BroadcastMessage( [
            'title' => 'new comment',
            'body' => $body,
            'icon' => 'icon-mentor',
            'url' => '/profile',

             
        ]);
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

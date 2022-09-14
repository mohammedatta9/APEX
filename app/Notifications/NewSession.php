<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Sp_session;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewSession extends Notification
{
    use Queueable;

    protected $sp_session;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Sp_session $sp_session, User $user)
    {
        $this->sp_session = $sp_session;
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

        $body = sprintf('%s requsted for %s , Click to go to your profile and read the details of the request to accept or reject it',
        $this->user->last_name,
        $this->sp_session->title,
    );
        $message =new MailMessage;
        $message->subject('new session')
                ->line( $body)//عباره عن فقره بالرساله كل لاين فقرة
                ->action('view to session', url('/profile'))//rout('profile.session',$this->session->id)
                ->greeting('hello'.($notifiable->last_name ?? ''));
                //->from('a@a.com','name')
         return $message;
    }



    public function toDatabase($notifiable)
    {
        $body = sprintf('%s requsted for %s session, Click to go to your profile and read the details of the request to accept or reject it',
        $this->user->last_name,
        $this->sp_session->title,
    );
        return [
            'title' => 'new requst aession',
            'body' => $body,
            'icon' => 'icon-user',
            'url' => '/profile',

             
        ];
    }



    public function toBroadcast($notifiable)
    {
        $body = sprintf('%s requsted for %s , Click to go to your profile and read the details of the request to accept or reject it',
        $this->user->last_name,
        $this->sp_session->title,
    );
        return new BroadcastMessage( [
            'title' => 'new requst session',
            'body' => $body,
            'icon' => 'icon-user',
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

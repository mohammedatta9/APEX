<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
 
use Illuminate\Notifications\Messages\BroadcastMessage;

class AcceptRegRequest extends Notification
{
    use Queueable;

    protected $password;
 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password;
 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)//notifiable=> الشخص الي هبعتله الاشعار
    {

        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $body = sprintf('The request to join TELCCA has been accepted , your password : %s ,You can change it from the settings',
        $this->password,
        
    );
        $message =new MailMessage;
        $message->subject('accept request')
                ->line( $body)//عباره عن فقره بالرساله كل لاين فقرة
                ->action('go to telcca', url('/login'))//rout('profile.session',$this->session->id)
                ->greeting('hello '.($notifiable->first_name ?? ''));
                //->from('a@a.com','name')
         return $message;
    }



    public function toDatabase($notifiable)
    {
        $body = sprintf('The request to join TELCCA has been accepted , your password : %s',
        $this->password,
    );
        return [
            'title' => 'accept request',
            'body' => $body,
            'icon' => 'icon-clock-oh',
            'url' => '/settings',

             
        ];
    }



    public function toBroadcast($notifiable)
    {
        $body = sprintf('%s accept requste for %s',
        $this->mentor->last_name,
        $this->sp->title,
    );
        return new BroadcastMessage( [
            'title' => 'accept aession',
            'body' => $body,
            'icon' => 'icon-mentor',
            'url' => '/settings',

             
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

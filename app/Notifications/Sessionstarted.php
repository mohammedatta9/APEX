<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Student_session;
use Illuminate\Notifications\Messages\BroadcastMessage;

class Sessionstarted extends Notification
{
    use Queueable;

    protected $ss;
 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Student_session $ss)
    {
        $this->ss = $ss;
       
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

        $body = sprintf('%s Session started , Click for more details ',
       
        $this->ss->title,
    );
    $id= $this->ss->id;
        $message =new MailMessage;
        $message->subject('Session started')
                ->line( $body)//عباره عن فقره بالرساله كل لاين فقرة
                ->action('view to session', url('/ss-profile/'.$id))//rout('profile.session',$this->session->id)
                ->greeting('hello'.($notifiable->last_name ?? ''));
                //->from('a@a.com','name')
         return $message;
    }



    public function toDatabase($notifiable)
    {
        $body = sprintf('%s Session started , Click for more details',
       
        $this->ss->title,
    );
    $id= $this->ss->id;
        return [
            'title' => ' Session started',
            'body' => $body,
            'icon' => 'icon-user',
            'url' => '/ss-profile/'.$id,

             
        ];
    }



    public function toBroadcast($notifiable)
    {
        $body = sprintf('%s  Session started , Click for more details',
        
        $this->ss->title,
    );
    $id= $this->ss->id;
        return new BroadcastMessage( [
            'title' => ' Session started',
            'body' => $body,
            'icon' => 'icon-user',
            'url' => '/ss-profile/'.$id,

             
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

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Student_session;
use Illuminate\Notifications\Messages\BroadcastMessage;

class Stillpending1 extends Notification
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

        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
 
    }



    public function toDatabase($notifiable)
    {

        if($notifiable->type_id == 4){
            $body = sprintf('%s session request is pending . Try to message him/her! {click leads to: SESSIONS}.',
            $this->ss->title,
            
        );
        }else{
            $body = sprintf('%s session request is still pending by you. Respond soon before the chance is gone! {click leads to: SESSIONS REQUESTS}.',
            $this->ss->title,
          
        );
        }
       
    
        return [
            'title' => '  ',
            'body' => $body,
            'icon' => 'icon-user',
            'url' => '/settings',

             
        ];
    }



    public function toBroadcast($notifiable)
    {
        if($notifiable->type_id == 4){
            $body = sprintf('%s session request is pending . Try to message him/her! {click leads to: SESSIONS}.',
            $this->ss->title,
            
        );
        }else{
            $body = sprintf('%s session request is still pending by you. Respond soon before the chance is gone! {click leads to: SESSIONS REQUESTS}.',
            $this->ss->title,
          
        );
        }
        return new BroadcastMessage( [
            'title' => ' ',
            'body' => $body,
            'icon' => 'icon-user',
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

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Student_session;
use Illuminate\Notifications\Messages\BroadcastMessage;

class AcceptRequest extends Notification
{
    use Queueable;

    protected $sp;
    protected $mentor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Student_session $sp, User $mentor)
    {
        $this->sp = $sp;
        $this->mentor = $mentor;
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

        if($this->sp->type == "session"){
            $body = sprintf('Your %s %s request to %s has been accepted. Start a friendly chat with him/her! {click leads to: Calendar}.',
            $this->sp->type,
            $this->sp->title,
            $this->mentor->last_name,
                );
            }else{
             $body = sprintf('Your application for %s %s has been accepted by %s and now is under review. Stay tuned! {click leads to: exact project page}.',
            $this->sp->type,
            $this->sp->title,
            $this->mentor->last_name,
                );
            }
        $message =new MailMessage;
        $message->subject('accept session')
                ->line( $body)//عباره عن فقره بالرساله كل لاين فقرة
                ->action('view to session', url('/settings'))//rout('profile.session',$this->session->id)
                ->greeting('hello'.($notifiable->last_name ?? ''));
                //->from('a@a.com','name')
         return $message;
    }



    public function toDatabase($notifiable)
    {
        if($this->sp->type == "session"){
            $body = sprintf('Your %s %s request to %s has been accepted. Start a friendly chat with him/her! {click leads to: Calendar}.',
            $this->sp->type,
            $this->sp->title,
            $this->mentor->last_name,
                );
            }else{
             $body = sprintf('Your application for %s %s has been accepted by %s and now is under review. Stay tuned! {click leads to: exact project page}.',
            $this->sp->type,
            $this->sp->title,
            $this->mentor->last_name,
                );
            }
        return [
            'title' => 'accept aession',
            'body' => $body,
            'icon' => 'icon-clock-oh',
            'url' => '/settings',

             
        ];
    }



    public function toBroadcast($notifiable)
    {
        if($this->sp->type == "session"){
        $body = sprintf('Your %s %s request to %s has been accepted. Start a friendly chat with him/her! {click leads to: Calendar}.',
        $this->sp->type,
        $this->sp->title,
        $this->mentor->last_name,
            );
        }else{
         $body = sprintf('Your application for %s %s has been accepted by %s and now is under review. Stay tuned! {click leads to: exact project page}.',
        $this->sp->type,
        $this->sp->title,
        $this->mentor->last_name,
            );
        }
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

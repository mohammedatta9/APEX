<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Community_post;
use Illuminate\Notifications\Messages\BroadcastMessage;

class Newdiscussion extends Notification
{
    use Queueable;

    protected $community_post;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Community_post $community_post, User $user)
    {
        $this->community_post = $community_post;
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

        $body = sprintf('%s has started a new discussion on %s.  {click leads to: this exact new Discussion page}.',
        $this->user->last_name,
        $this->community_post->title,
    );
    $slug = $this->community_post->community->slug;
        $message =new MailMessage;
        $message->subject(' ')
                ->line( $body)//عباره عن فقره بالرساله كل لاين فقرة
                ->action('view to discussion', url('/community_profile/'.$slug))//rout('profile.session',$this->session->id)
                ->greeting('hello'.($notifiable->last_name ?? ''));
                //->from('a@a.com','name')
         return $message;
    }



    public function toDatabase($notifiable)
    {
        $body = sprintf('%s has started a new discussion on %s.  {click leads to: this exact new Discussion page}.',
        $this->user->last_name,
        $this->community_post->title,
    );
    $slug = $this->community_post->community->slug;
        return [
            'title' => ' ',
            'body' => $body,
            'icon' => 'icon-user',
            'url' => '/community_profile/'.$slug,

             
        ];
    }



    public function toBroadcast($notifiable)
    {
        $body = sprintf('%s has started a new discussion on %s.  {click leads to: this exact new Discussion page}.',
        $this->user->last_name,
        $this->community_post->title,
    );
    $slug = $this->community_post->community->slug;
        return new BroadcastMessage( [
            'title' => ' ',
            'body' => $body,
            'icon' => 'icon-user',
            'url' => '/community_profile/'.$slug,

             
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

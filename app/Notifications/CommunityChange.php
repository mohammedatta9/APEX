<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Community;

use Illuminate\Notifications\Messages\BroadcastMessage;

class CommunityChange extends Notification
{
    use Queueable;

    protected $new_community_name;
    protected $community_name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $old_community_name, Community $community)
    {
        $this->old_community_name = $old_community_name;
        $this->community = $community;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)//notifiable=> الشخص الي هبعتله الاشعار
    {

        return ['database' ,'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $body = sprintf('%s community has changed its name to %s . {click leads to: exact community profile page}',
        $this->old_community_name,
        $this->community->name,      
        );
    $slug = $this->community->slug;
        $message =new MailMessage;
        $message->subject(' ')
                ->line( $body)//عباره عن فقره بالرساله كل لاين فقرة
                ->action('view to comment', url('/community_profile/'.$slug))//rout('profile.session',$this->session->id)
                ->greeting('hello'.( $notifiable->last_name ?? ''));
                //->from('a@a.com','name')
         return $message;
    }



    public function toDatabase($notifiable)
    {
       
        $body = sprintf('%s community has changed its name to %s . {click leads to: exact community profile page}',
        $this->old_community_name,
        $this->community->name,      
        );
    $slug = $this->community->slug;
        return [
            'title' => ' ',
            'body' => $body,
            'icon' => 'icon-clock-oh',
            'url' => '/community_profile/'.$slug,

             
        ];
    }



    public function toBroadcast($notifiable)
    {
        $body = sprintf('%s community has changed its name to %s . {click leads to: exact community profile page}',
        $this->old_community_name,
        $this->community->name,      
        );
    $slug = $this->community->slug;
        return new BroadcastMessage( [
            'title' => ' ',
            'body' => $body,
            'icon' => 'icon-mentor',
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

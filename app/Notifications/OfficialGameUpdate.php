<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Notifications\Channels\LineHelper;
use Illuminate\Notifications\Notification;
use App\Notifications\Channels\LineChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use LINE\LINEBot\MessageBuilder\RawMessageBuilder;

class OfficialGameUpdate extends Notification
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [LineChannel::class];
    }

    /**
     * Get the Line representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \App\Notifications\Messages\LineMessage
     */
    public function toLine($notifiable)
    {
        // return new TextMessageBuilder($this->message->get_permalink());
        \preg_match('/<img [^>]*src="([^\s>]*)"/', $this->message->get_description(), $matches);
        $thumbnail = $matches[1] ?? null;
        $text = substr(trim(strip_tags($this->message->get_description())), 0, 159) . '...';
        $title = substr(trim(strip_tags($this->message->get_title())), 0, 39);
        $sub_text = "on " . ($this->message->get_date() ?? '') . " by " . ($this->message->get_author()->get_name() ?? '');

        $flex = LineHelper::getNewsFlex(
            "Game Update",
            $thumbnail ?? '',
            $this->message->get_permalink() ?? '',
            $title ?? '',
            $text ?? '',
            $sub_text ?? '',
            "#445c90"
        );

        return $flex;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }
}

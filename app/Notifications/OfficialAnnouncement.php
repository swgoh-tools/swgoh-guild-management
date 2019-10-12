<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Notifications\Channels\LineHelper;
use Illuminate\Notifications\Notification;
use App\Notifications\Channels\LineChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use LINE\LINEBot\MessageBuilder\RawMessageBuilder;

class OfficialAnnouncement extends Notification
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
            "Game Announcement",
            $thumbnail ?? '',
            $this->message->get_permalink() ?? '',
            $title ?? '',
            $text ?? '',
            $sub_text ?? '',
            "#ff334b"
        );

        // return new RawMessageBuilder(\json_decode($test_template, true));

        return $flex;

        // $altUri = new AltUriBuilder($this->message->get_permalink());
        // $actionBuilders = [
        //     new UriTemplateActionBuilder('goto', $this->message->get_permalink(), $altUri), // $label, $uri, AltUriBuilder $altUri = null
        // ];

        // $btb = new ButtonTemplateBuilder(
        //     $title, // $title = null, must not be longer than 40 characters
        //     $text, // $text, // phpcs:ignore must not be longer than 60 characters
        //     $thumbnail, // $thumbnailImageUrl = null,
        //     $actionBuilders, // array $actionBuilders,
        //     'rectangle', // $imageAspectRatio = null,
        //     'cover', // $imageSize = null,
        //     '#FFFFFF', // $imageBackgroundColor = null,
        //     $actionBuilders[0] // TemplateActionBuilder $defaultAction = null
        // );

        // return new TemplateMessageBuilder(
        //     'Game Announcement', // $altText,
        //     $btb, // TemplateBuilder $templateBuilder,
        //     null // QuickReplyBuilder $quickReply = null
        // );

        // return (new TextMessageBuilder())
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
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

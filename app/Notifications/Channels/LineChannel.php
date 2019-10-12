<?php

namespace App\Notifications\Channels;

use RuntimeException;
use Illuminate\Notifications\Notification;

class LineChannel
{
    /**
     * @var \NotificationChannels\Line\Line
     */
    protected $line;
    /**
     * @param \NotificationChannels\Line\Line $line
     */
    public function __construct(Line $line)
    {
        $this->line = $line;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|null
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $this->getData($notifiable, $notification);

        if (!$notifiable) {
            return $this->line->sendBroadcast($message);
        }

        $channel = $notifiable->routeNotificationFor('line');
        if (! $channel) {
            return;
        }

        return $this->line->send($channel, [
            'content' => $message->body,
            'embed' => $message->embed,
        ]);


        // return $notifiable->routeNotificationFor('line', $notification)->create($message);
    }

    /**
     * Get the data for the notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return mixed
     *
     * @throws \RuntimeException
     */
    protected function getData($notifiable, Notification $notification)
    {
        if (method_exists($notification, 'toLine')) {
            return $notification->toLine($notifiable);
        }

        if (method_exists($notification, 'toArray')) {
            return $notification->toArray($notifiable);
        }

        throw new RuntimeException('Notification is missing toArray method.');
    }
}

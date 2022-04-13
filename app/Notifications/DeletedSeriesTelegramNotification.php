<?php

namespace App\Notifications;

use App\Traits\SeriesMailTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class DeletedSeriesTelegramNotification extends Notification
{
    use Queueable;
    use SeriesMailTrait;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($series_code, $series_name, $series_seasons, $series_episodes)
    {

        $this->getMailData(
            $series_code,
            $series_name,
            $series_seasons,
            $series_episodes
        );

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content('Série deletada!' . "\n" .
                'Código da série: ' . $this->series_code . "\n" .
                'Nome da série: ' . $this->series_name . "\n" .
                'Quantidade de temporadas: ' . $this->series_seasons . "\n" .
                'Quantidade de episódios: ' . $this->series_episodes);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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

<?php

namespace App\Observers;

use App\Mail\SeriesCreate;
use App\Mail\SeriesDeleted;
use App\Mail\SeriesUpdated;
use App\Models\Historic;
use App\Models\Series;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Traits\HistoricInsertDatabaseTrait;

use NotificationChannels\Telegram\TelegramChannel;
use App\Notifications\CreateSeriesTelegramNotification;
use App\Notifications\UpdatedSeriesTelegramNotification;
use App\Notifications\DeletedSeriesTelegramNotification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;

class SeriesObserver
{
    use HistoricInsertDatabaseTrait;

    /**
     * Handle the Series "created" event.
     *
     * @param \App\Models\Series $series
     * @return void
     */
    public function created(Series $series)
    {
        Log::info('Observer created');
        $this->insertDatabaseNewObject($series);

        Mail::to('clarkbass.dev@gmail.com')->send(new SeriesCreate(
            $series->series_code,
            $series->series_name,
            $series->series_seasons,
            $series->series_episodes
        ));

        Notification::route('telegram', Config::get('services.telegram_id'))
            ->notify(new CreateSeriesTelegramNotification(
                $series->series_code,
                $series->series_name,
                $series->series_seasons,
                $series->series_episodes
            ));
    }

    /**
     * Handle the Series "updated" event.
     *
     * @param \App\Models\Series $series
     * @return void
     */
    public function updated(Series $series)
    {
        Log::info('Observer updated');
        $this->insertDatabaseUpdatedObject($series);

        Mail::to('clarkbass.dev@gmail.com')->send(new SeriesUpdated(
            $series->series_code,
            $series->series_name,
            $series->series_seasons,
            $series->series_episodes
        ));

        Notification::route('telegram', Config::get('services.telegram_id'))
            ->notify(new UpdatedSeriesTelegramNotification(
                $series->series_code,
                $series->series_name,
                $series->series_seasons,
                $series->series_episodes
            ));
    }

    /**
     * Handle the Series "deleted" event.
     *
     * @param \App\Models\Series $series
     * @return void
     */
    public function deleted(Series $series)
    {
        Log::info('Observer: deleted');
        $this->insertDatabaseDeleteObject($series);

//        Mail::to('clarkbass.dev@gmail.com')->send(new SeriesDeleted(
//            $series->series_code,
//            $series->series_name,
//            $series->series_seasons,
//            $series->series_episodes
//        ));

        Notification::route('telegram', Config::get('services.telegram_id'))
            ->notify(new DeletedSeriesTelegramNotification(
                $series->series_code,
                $series->series_name,
                $series->series_seasons,
                $series->series_episodes
            ));
    }
}

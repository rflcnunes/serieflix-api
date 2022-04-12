<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Traits\SeriesMailTrait;

class SeriesCreate extends Mailable
{
    use Queueable, SerializesModels;
    use SeriesMailTrait;
    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.create_series');
    }
}

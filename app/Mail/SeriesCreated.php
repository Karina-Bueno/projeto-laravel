<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return $void
     */
    public function __construct(
        public string $nomeSerie,
        public int $idSerie,
        public int $qtdTemporada,
        public int $episodiosPorTemporada
    )
    {
        $this->subject = "Série $nomeSerie criada";
    }
    
       /**
     * Create a new message instance.
     *
     * @return $this
     */
    

    public function build()
    {
        return $this->markdown('mail.series-created');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PerjalananDinasRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $perjalanandinas;

    public function __construct($perjalanandinas)
    {
        $this->perjalanandinas = $perjalanandinas;
    }

    public function build()
    {
        return $this->view('emails.perjalanan_dinas_rejected')
            ->subject('Perjalanan Dinas Ditolak')
            ->with(['perjalanandinas' => $this->perjalanandinas]);
    }
}

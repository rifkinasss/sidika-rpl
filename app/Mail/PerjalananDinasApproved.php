<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PerjalananDinasApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $perjalanandinas;

    public function __construct($perjalanandinas)
    {
        $this->perjalanandinas = $perjalanandinas;
    }

    public function build()
    {
        return $this->view('emails.perjalanan_dinas_approved')
            ->subject('Perjalanan Dinas Disetujui')
            ->with(['perjalanandinas' => $this->perjalanandinas]);
    }
}

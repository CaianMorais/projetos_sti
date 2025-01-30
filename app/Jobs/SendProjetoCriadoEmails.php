<?php

namespace App\Jobs;

use App\Mail\ProjetoCriadoMail;
use App\Models\Projetos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendProjetoCriadoEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $projeto;
    protected $emails;

    public function __construct(Projetos $projeto, $emails)
    {
        $this->projeto = $projeto;
        $this->emails = $emails;
    }

    public function handle()
    {
        foreach ($this->emails as $email) {
            Mail::to($email)->send(new ProjetoCriadoMail($this->projeto));
        }
    }
}

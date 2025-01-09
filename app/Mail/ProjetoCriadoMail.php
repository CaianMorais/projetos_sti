<?php

namespace App\Mail;

use AntibodiesOnline\BootstrapEmail\Compiler;
use AntibodiesOnline\BootstrapEmail\ScssCompiler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjetoCriadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $projeto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($projeto)
    {
        $this->projeto = $projeto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $scssCompiler = new ScssCompiler();
        $compiler = new Compiler($scssCompiler);
        $htmlContent = view('emails.projeto_criado')->with(['projeto' => $this->projeto])->render();
        $compiledHtml = $compiler->compileHtml($htmlContent);

        return $this->subject('STI - Novo Projeto Postado')
        ->html($compiledHtml);
    }
}

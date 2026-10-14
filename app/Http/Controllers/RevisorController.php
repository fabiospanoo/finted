<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();

        // Recupera tutti gli articoli rifiutati
        $is_rejected = Article::where('is_accepted', false)->latest()->get();

        return view('revisor.index', compact('article_to_check', 'is_rejected'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);

        return redirect()->back()->with('message', "Hai accettato l'articolo $article->title");
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);

        return redirect()->back()->with('message', "Hai rifiutato l'articolo $article->title");
    }

    public function becomeRevisor(): View
    {
        return view('revisor.request');
    }

    public function sendRevisorRequest(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => ['required', 'string', 'max:150'],
            'body' => ['required', 'string', 'max:5000'],
        ]);

        $user = $request->user();
        if (! $user instanceof User) {
            abort(403);
        }

        Mail::to('hello@example.com')->send(new BecomeRevisor(
            $user,
            $validated['subject'],
            $validated['body'],
        ));

        return redirect()->route('home')->with('message', 'La tua richiesta di diventare revisore è stata inviata con successo!');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);

        return redirect()->route('home')->with('message', "L'utente {$user->name} ora è revisore!");
    }
}

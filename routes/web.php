<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/aggiornamenti', function (Request $request) {
    $validated = $request->validate([
        'email' => ['required', 'email', 'max:255'],
    ]);

    DB::table('newsletter_subscribers')->updateOrInsert(
        ['email' => mb_strtolower($validated['email'])],
        ['updated_at' => now(), 'created_at' => now()]
    );

    return response()->json([
        'message' => 'Iscrizione ricevuta! Ti avviseremo appena ci saranno novità.',
    ]);
})->middleware('throttle:6,1')->name('newsletter.store');

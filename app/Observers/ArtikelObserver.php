<?php

namespace App\Observers;

use App\Models\Artikel;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ArtikelObserver
{
    public function created(Artikel $artikel): void
    {
        ActivityLog::create([
            'action' => 'create',
            'model' => 'Artikel',
            'description' => 'Membuat artikel: ' . $artikel->judul,
            'user_id' => Auth::id(),
        ]);
    }

    public function updated(Artikel $artikel): void
    {
        ActivityLog::create([
            'action' => 'update',
            'model' => 'Artikel',
            'description' => 'Mengubah artikel: ' . $artikel->judul,
            'user_id' => Auth::id(),
        ]);
    }

    public function deleted(Artikel $artikel): void
    {
        ActivityLog::create([
            'action' => 'delete',
            'model' => 'Artikel',
            'description' => 'Menghapus artikel: ' . $artikel->judul,
            'user_id' => Auth::id(),
        ]);
    }
}

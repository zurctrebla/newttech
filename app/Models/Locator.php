<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locator extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'percent', 'serial', 'game_id', 'partner_id', 'client_id', 'situation'];

    public function game()
    {
        return $this->BelongsTo(Game::class);
    }
}

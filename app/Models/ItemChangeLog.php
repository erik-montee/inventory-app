<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemChangeLog extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

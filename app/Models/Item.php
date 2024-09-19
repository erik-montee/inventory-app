<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Item extends Model
{
    use HasFactory;

    protected static function booted()
    {
        Model::unguard();
    }

    public function changes()
    {
        return $this->hasMany(ItemChangeLog::class);
    }

    public function renderQr()
    {
        return QrCode::size(150)->format('svg')->generate(url('/item/') . $this->id . '/update');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Item;
use App\Mail\LowStock;

class CheckLowStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-low-stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $items = Item::whereColumn('quantity', '<', 'notification_quantity')->get();
        if($items->count() > 0 ) {
            Mail::to(env('NOTIFY_EMAIL'))->send(new LowStock($items));
        }
    }
}

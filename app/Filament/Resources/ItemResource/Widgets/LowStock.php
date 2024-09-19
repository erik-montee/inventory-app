<?php

namespace App\Filament\Resources\ItemResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Item;

class LowStock extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    
    public function table(Table $table): Table
    {
        return $table
            ->query( Item::whereColumn('quantity', '<', 'notification_quantity') )
            ->defaultPaginationPageOption(5)    
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('quantity'),
            ])
            ->searchable(false);
    }
}

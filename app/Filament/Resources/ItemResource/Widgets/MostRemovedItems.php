<?php

namespace App\Filament\Resources\ItemResource\Widgets;

use App\Models\Item;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MostRemovedItems extends BaseWidget
{
    public function table(Table $table): Table
    {
                //Item::withSum('changes', 'quantity')->orderBy('changes_sum_quantity', 'desc')

        return $table
            ->query( Item::withSum(['changes' => function($q) {
                $q->where('created_at', '>', now()->subMonth());
            }], 'quantity')
            ->having('changes_sum_quantity', '>', 0))
            ->defaultPaginationPageOption(5)    
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')->wrap(),
                Tables\Columns\TextColumn::make('changes_sum_quantity')->label('Quantity Used'),
            ])
            ->searchable(false);
    }
}

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
        return $table
            ->query( Item::withSum('changes', 'quantity')->orderBy('changes_sum_quantity', 'desc'))
            ->defaultPaginationPageOption(5)    
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('changes_sum_quantity')->label('Quantity Used'),
            ])
            ->searchable(false);
    }
}

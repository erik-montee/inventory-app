<?php

namespace App\Filament\Resources\ItemResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\ItemChangeLog;
use Carbon\Carbon;

class LastUsersToGrabItems extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query( ItemChangeLog::with('item')->where('created_at', '>', now()->subMonth() ) )
            ->defaultPaginationPageOption(5)    
            ->columns([
                Tables\Columns\TextColumn::make('user_identifing_info_1')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('item.name'),
                Tables\Columns\TextColumn::make('quantity')->label('Quantity'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->label('Time Inputed'),

            ])
            ->searchable(false);
    }
}

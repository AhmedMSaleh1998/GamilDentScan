<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScanTypeResource\Pages;
use App\Models\Organization;
use App\Models\ScanType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ScanTypeResource extends Resource
{
    protected static ?string $model = ScanType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('organization_id')
                    ->label('اسم المنظمة التابع لها الفحص')
                    ->required()
                    ->options(Organization::pluck('name', 'id')),
                TextInput::make('name')
                    ->label('الاسم')
                    ->required(),
                TextInput::make('receptionist_commision')
                    ->label('كوميشن الاستقبال')
                    ->numeric()
                    ->required(),
                TextInput::make('technician_commision')
                    ->label('كوميشن الفني')
                    ->numeric()
                    ->required(),
                TextInput::make('base_recieving_time')
                    ->label('وقت الاستلام')
                    ->required(),
                TextInput::make('whatsapp_price')
                    ->label('واتساب')
                    ->numeric()
                    ->required(),
                TextInput::make('dvd_price')
                    ->label('دي في دي')
                    ->numeric()
                    ->required(),
                TextInput::make('report_price')
                    ->label('تقرير')
                    ->numeric()
                    ->required(),     
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('الاسم'),
                TextColumn::make('receptionist_commision')
                    ->label('كومشن الاستقبال'),
                TextColumn::make('technician_commision')
                    ->label('كومشن الفني')                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScanTypes::route('/'),
            'create' => Pages\CreateScanType::route('/create'),
            'edit' => Pages\EditScanType::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'ادارة الفحوصات';
    }

    public static function getNavigationLabel(): string
    {
        return 'انواع الفحوصات';
    }

    public static function getBreadcrumb() : string
    {
        return 'انواع الفحوصات';
    }
    
    public static function getModelLabel(): string
    {
        return 'انواع الفحوصات';
    }

    public static function getPluralModelLabel(): string
    {
        return 'انواع الفحوصات';
    }
}

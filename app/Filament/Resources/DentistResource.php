<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DentistResource\Pages;
use App\Filament\Resources\DentistResource\RelationManagers;
use App\Models\Dentist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DentistResource extends Resource
{
    protected static ?string $model = Dentist::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('الاسم')
                    ->required(),

                Forms\Components\TextInput::make('phone_one')
                    ->label('رقم الهاتف الأول')
                    ->required()
                    ->tel(),

                Forms\Components\TextInput::make('phone_two')
                    ->label('رقم الهاتف الثاني')
                    ->tel(),

                Forms\Components\TextInput::make('email_one')
                    ->label('البريد الإلكتروني الأول')
                    ->email(),

                Forms\Components\TextInput::make('email_two')
                    ->label('البريد الإلكتروني الثاني')
                    ->email(),

                Forms\Components\Select::make('district_id')
                        ->label('المنطقة')
                        ->required()
                        ->relationship('district', 'name')
                        ->searchable()
                        ->preload(),

                Forms\Components\TextInput::make('address_one')
                    ->required()
                    ->label('العنوان الأول'),

                Forms\Components\TextInput::make('address_two')
                    ->label('العنوان الثاني'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('المعرف')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone_one')
                    ->label('الهاتف الأول'),

                Tables\Columns\TextColumn::make('email_one')
                    ->label('البريد الإلكتروني الأول'),

                Tables\Columns\TextColumn::make('address_one')
                    ->label('العنوان الأول'),

                Tables\Columns\TextColumn::make('district.name')
                    ->label('المنطقة'),

                Tables\Columns\TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ الإنشاء')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ التحديث')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('district_id')
                    ->label('المنطقة')
                    ->relationship('district', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListDentists::route('/'),
            'create' => Pages\CreateDentist::route('/create'),
            'edit' => Pages\EditDentist::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'ادارة الاطباء';
    }

    public static function getNavigationLabel(): string
    {
        return 'الاطباء';
    }

    public static function getBreadcrumb() : string
    {
        return 'الاطباء';
    }
    
    public static function getModelLabel(): string
    {
        return 'الاطباء';
    }

    public static function getPluralModelLabel(): string
    {
        return 'الاطباء';
    }
}

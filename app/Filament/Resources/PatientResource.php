<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Filament\Resources\PatientResource\RelationManagers\ScansRelationManager;
use App\Models\Patient;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('الاسم')
                    ->required(),

                Forms\Components\DatePicker::make('birth_date')
                    ->label('تاريخ الميلاد')
                    ->required(),

                Forms\Components\TextInput::make('address')
                    ->label('العنوان'),

                Forms\Components\TextInput::make('phone_one')
                    ->label('رقم الهاتف الأول')
                    ->tel(),

                Forms\Components\TextInput::make('phone_two')
                    ->label('رقم الهاتف الثاني')
                    ->tel(),

                Forms\Components\TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('المعرف')
                    ->sortable(),

                Tables\Columns\TextColumn::make('age')
                    ->label('السن')
                    ->getStateUsing(fn ($record) => 
                        $record->birth_date 
                            ? Carbon::parse($record->birth_date)->age 
                            : null
                    ),

                Tables\Columns\TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable(),

                Tables\Columns\TextColumn::make('birth_date')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاريخ الميلاد')
                    ->date('d/m/Y'),

                Tables\Columns\TextColumn::make('address')
                    ->label('العنوان'),

                Tables\Columns\TextColumn::make('phone_one')
                    ->label('الهاتف الأول')
                    ->searchable()
                    ->url(fn ($record) => $record->phone_one ? "https://wa.me/{$record->phone_one}" : null, shouldOpenInNewTab: true)
                    ->formatStateUsing(fn ($state) => $state ?? '-') // show "-" if empty
                    ->color('success')
                    ->icon('heroicon-o-phone'),

                Tables\Columns\TextColumn::make('phone_two')
                    ->label('الهاتف الثاني')
                    ->searchable()
                    ->url(fn ($record) => $record->phone_two ? "https://wa.me/{$record->phone_two}" : null, shouldOpenInNewTab: true)
                    ->formatStateUsing(fn ($state) => $state ?? '-')
                    ->color('success')
                    ->icon('heroicon-o-phone'),

                Tables\Columns\TextColumn::make('email')
                    ->label('البريد الإلكتروني'),

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
                //
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
            ScansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
            'view' => Pages\ViewPatient::route('/{record}'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'إدارة المرضي';
    }

    public static function getNavigationLabel(): string
    {
        return 'المرضي';
    }

    public static function getBreadcrumb() : string
    {
        return 'المرضي';
    }
    
    public static function getModelLabel(): string
    {
        return 'المرضي';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المرضي';
    }
}

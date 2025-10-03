<?php

namespace App\Filament\Resources\PatientResource\RelationManagers;

use App\Models\Dentist;
use App\Models\ScanType;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ScansRelationManager extends RelationManager
{
    protected static string $relationship = 'scans';

    protected static ?string $title = 'الفحوصات';
    protected static ?string $label = 'فحص';
    protected static ?string $pluralLabel = 'الفحوصات';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('scan_type_id')
                    ->label('اسم الفحص')
                    ->required()
                    ->options(fn () =>
                        \App\Models\ScanType::with('organization')
                            ->get()
                            ->mapWithKeys(fn ($scanType) => [
                                $scanType->id => $scanType->name . ' - ' . optional($scanType->organization)->name,
                            ])
                            ->toArray()
                    )
                    ->reactive()
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        $scanType = ScanType::find($state);
                        $set('current_technician_commission' , $scanType->technician_commision);
                        $set('current_receptionist_commission' , $scanType->receptionist_commision);
                        $set('organization_id' , $scanType->organization_id);
                    }),
                Hidden::make('current_receptionist_commission')
                    ->reactive(),
                Hidden::make('current_technician_commission')
                    ->reactive(),
                Hidden::make('organization_id')
                    ->reactive(),
                Select::make('typedsd')
                    ->label('النوع')
                    ->required()
                    ->options([
                        'report' => 'تقرير',
                        'dvd' => 'دي في دي',
                        'whatsapp' => 'واتساب',
                    ])
                    ->reactive()
                    ->afterStateUpdated(function(Set $set , Get $get , $state)
                    {
                        $scanTypeId = $get('scan_type_id');
                        $scanType = ScanType::find($scanTypeId);
                        switch($state)
                        {
                            case 'report':
                                $set('current_price' , $scanType->report_price);
                                $set('total_price_after_discount' , $scanType->report_price);
                                break;
                            case 'dvd':
                                $set('current_price' , $scanType->dvd_price);
                                $set('total_price_after_discount' , $scanType->dvd_price);
                                break;
                            case 'whatsapp':
                                $set('current_price' , $scanType->whatsapp_price);
                                $set('total_price_after_discount' , $scanType->whatsapp_price);
                                break;
                            default:
                                return;
                        }
                    }
                ),
                TextInput::make('current_price')
                    ->label('السعر')
                    ->required()
                    ->reactive()
                    ->readOnly(),
                TextInput::make('total_price_after_discount')
                    ->label('السعر بعد الخصم')
                    ->required()
                    ->reactive(),
                TextInput::make('discount_reason')
                    ->label('سبب الخصم'),
                TextInput::make('paid_by_patient')
                    ->label('المدفوع من قبل العميل')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function($state ,Set $set , Get $get)
                    {
                        $remain = $get('total_price_after_discount') - $state;
                        $set('remaining' , $remain);
                    }),
                TextInput::make('remaining')
                    ->reactive()
                    ->label('الباقي'),
                Select::make('dentist_id')
                    ->label('اسم الطبيب')
                    ->required()
                    ->options(Dentist::pluck('name' , 'id')),
                Hidden::make('receptionist_id')
                    ->default(auth()->user()->id),
                Select::make('technician_id')
                    ->label('اسم الفني')
                    ->options(
                        User::role('technician')->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required(),
                TextInput::make('dicom_file_link')
                    ->label('ليك ديكوم فايل'),
                TextInput::make('recevier_name')
                    ->label('اسم المستلم')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('scan_name')
                    ->label('اسم الفحص')
                    ->getStateUsing(fn($record) => $record->scanType->name),
                Tables\Columns\TextColumn::make('receptionist_name')
                    ->label('اسم موظف الاستقبال')
                    ->getStateUsing(fn($record) => $record->receptionist->name),
                Tables\Columns\TextColumn::make('tech_name')
                    ->label('الفني')
                    ->getStateUsing(fn($record) => $record->technician->name),
                ToggleColumn::make('is_recived')
                    ->label('تم الاستلام')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('اضافة فحص جديد')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ]);
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}

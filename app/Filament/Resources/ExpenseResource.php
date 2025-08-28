<?php

namespace App\Filament\Resources;

use App\Filament\Erp\Resources\ExpenseResource\Pages;
use App\Models\ErpSetting;
use App\Models\Expense;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('expense_type_id')
                    ->label('نوع المصروف')
                    ->relationship('expenseType', 'name')
                    ->required(),

                TextInput::make('price')
                    ->label('المبلغ الصافي')
                    ->numeric()
                    ->live()
                    ->afterStateUpdated(function(Set $set , Get $get)
                    {
                        $price = $get('price');
                        $tax = $price * ErpSetting::where('key' , 'vat_percentage')->first()->value / 100;
                        $set('tax' , $tax);
                        $total_amount = $price + $tax;
                        $set('total' , $total_amount);
                    })
                    ->required(),
                
                TextInput::make('tax')
                    ->label('الضريبة')
                    ->numeric()
                    ->live()
                    ->readOnly(),

                TextInput::make('total')
                    ->label('المبلغ بالضريبة')
                    ->numeric()
                    ->readOnly(),

                Select::make('frequency')
                    ->label('التكرار')
                    ->options([
                        'once' => 'مرة واحدة',
                        'repeated' => 'متكرر',
                    ])
                    ->default('once')
                    ->required(),

                Textarea::make('description')
                    ->label('الوصف')
                    ->nullable(),

                DatePicker::make('expense_date')
                    ->label('تاريخ المصروف')
                    ->required(),
                
                
                TextInput::make('invoice_number')
                    ->required()
                    ->label('رقم الفاتورة')
                    ->required(),

                SpatieMediaLibraryFileUpload::make('attachments')
                    ->label('ايصال الدفع')
                    ->collection('expenses')
                    ->multiple()
                    ->image()
                    ->maxFiles(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('expenseType.name')
                    ->label('نوع المصروف')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('invoice_numer')
                    ->label('رقم الفاتورة')
                    ->sortable()
                    ->searchable(),

              Tables\Columns\TextColumn::make('total')
                    ->label('المبلغ')
                    ->formatStateUsing(fn ($state) => number_format($state, 2) . ' ﷼')
                    ->sortable(),
                Tables\Columns\TextColumn::make('frequency')
                    ->label('التكرار'),

                Tables\Columns\TextColumn::make('expense_date')
                    ->label('تاريخ المصروف')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(30),
            ])
            ->filters([
                    // فلتر حسب نوع المصروف
                    Tables\Filters\SelectFilter::make('expense_type_id')
                        ->label('نوع المصروف')
                        ->relationship('expenseType', 'name'),

                    // فلتر حسب التكرار
                    Tables\Filters\SelectFilter::make('frequency')
                        ->label('التكرار')
                        ->options([
                            'once' => 'مرة واحدة',
                            'repeated' => 'متكرر',
                        ]),
                    Tables\Filters\Filter::make('expense_date')
                        ->form([
                            DatePicker::make('from')->label('من تاريخ'),
                            DatePicker::make('until')->label('إلى تاريخ'),
                        ])
                        ->query(function ($query, array $data) {
                            return $query
                                ->when($data['from'], fn ($q, $date) => $q->whereDate('expense_date', '>=', $date))
                                ->when($data['until'], fn ($q, $date) => $q->whereDate('expense_date', '<=', $date));
                        }),
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
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'المصاريف';
    }

    public static function getNavigationLabel(): string
    {
        return 'المصروفات';
    }

    public static function getBreadcrumb() : string
    {
        return 'المصروفات';
    }
    
    public static function getModelLabel(): string
    {
        return 'المصروفات';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المصروفات';
    }
}

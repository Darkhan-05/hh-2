<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacancyResource\Pages;
use App\Filament\Resources\VacancyResource\RelationManagers;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\EmployementType;
use App\Models\Vacancy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('company_id')
                    ->searchable()
                    ->options(Company::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('responsibility')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('conditions')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('requirements')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('employement_type_id')
                    ->required()
                    ->options(EmployementType::all()->pluck('name', 'id')),
                Forms\Components\Select::make('country_id')
                    ->required()
                    ->searchable()
                    ->options(Country::all()->pluck('name', 'id')),
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->options(City::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('salary')
                    ->numeric(),
                Forms\Components\DatePicker::make('posted_at')
                    ->required(),
                Forms\Components\DatePicker::make('expired_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('responsibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('conditions')
                    ->searchable(),
                Tables\Columns\TextColumn::make('requirements')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employement_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('posted_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expired_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListVacancies::route('/'),
            'create' => Pages\CreateVacancy::route('/create'),
            'view' => Pages\ViewVacancy::route('/{record}'),
            'edit' => Pages\EditVacancy::route('/{record}/edit'),
        ];
    }
}

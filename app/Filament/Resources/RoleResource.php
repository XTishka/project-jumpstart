<?php

namespace App\Filament\Resources;

use App\Enums\RoleEnum;
use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use App\Filament\Resources\RoleResource\RelationManagers\PermissionsRelationManager;
use App\Filament\Resources\UserResource\Pages\ListRole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?int $navigationSort = 20;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('name')
                    ->label(__('role.form.column.name'))
                    ->inlineLabel()
                    ->unique(ignoreRecord: true)
                    ->options(RoleEnum::getKeyValues())
                    ->required(),

                Forms\Components\Select::make('permissions')
                    ->label(__('role.form.column.permissions'))
                    ->inlineLabel()
                    ->multiple()
                    ->relationship('permissions', 'name')
                    ->preload()
                    ->required(),
            ])
            ->columns([
                'sm' => 1,
                'xl' => 1,
                '2xl' => 1,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('role.table.column.name'))
                    ->formatStateUsing(fn(string $state): string => __("role.name.{$state}"))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('role.table.column.created_at'))
                    ->dateTime('d.m.Y')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRole::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament-logger::filament-logger.nav.group');
    }

    public static function getNavigationLabel(): string
    {
        return __('role.nav.label');
    }

    public static function getLabel(): string
    {
        return __('role.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return __('role.resource.label.plural');
    }
}

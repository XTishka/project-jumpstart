<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $roles = Role::all()->pluck('name', 'id')->toArray();
        $tabs = [__('users.tabs.roles.all') => Tab::make()];
        foreach ($roles as $id => $role):
             $tabs[__('users.tabs.roles.'.$role)] = Tab::make()
                ->modifyQueryUsing(function (Builder $query) use ($id) {
                    $query->whereHas('roles', function (Builder $query) use ($id) {
                        $query->where('roles.id', $id);
                    });
                });
        endforeach;


        return $tabs;
    }
}

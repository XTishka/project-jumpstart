<?php

namespace App\Filament\Resources\UserResource\Enums;

enum PermissionGroup: string
{
    case user           = 'user';
    case role           = 'role';
    case permission     = 'permission';

    public function getName(): string
    {
        return match ($this) {
            self::user           => 'User',
            self::role           => 'Role',
            self::permission     => 'Permission',
        };
    }

    public static function getKeysValues(): array
    {
        $cases = [];
        foreach (self::cases() as $case) :
            $cases[$case->value] = $case->getName();
        endforeach;
        return $cases;
    }
}


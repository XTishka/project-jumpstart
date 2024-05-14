<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMINISTRATOR = 'administrator';
    case EMPLOYER = 'employer';

    public function getName(): string
    {
        return match ($this) {
            self::ADMINISTRATOR => __('role.name.administrator'),
            self::EMPLOYER => __('role.name.employer'),
        };
    }

    public static function getKeyValues(): array
    {
        $keyValues = [];
        foreach (self::cases() as $case) {
            $keyValues[$case->value] = $case->getName();
        }
        return $keyValues;
    }
}

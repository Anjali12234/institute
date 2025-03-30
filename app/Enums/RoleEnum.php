<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Super_Admin = 'Super_Admin';
    case Admin = 'Admin';
    case User = 'User';
    
    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::Super_Admin => 'Super_Admin',
            self::Admin => 'Admin',
            self::User => 'User',
            
          
        };
    }
}
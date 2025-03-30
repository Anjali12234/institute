<?php

namespace App\Enums;

enum Gender : string
{
    case Male = 'Male';
    case Female = 'Female';
    case Other = 'Other';
    
    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::Male => 'Male',
            self::Female => 'Female',
            self::Other => 'Other',
            
          
        };
    }
}

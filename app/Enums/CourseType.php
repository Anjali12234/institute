<?php

namespace App\Enums;

enum CourseType : string
{
    case Diploma = 'Diploma';
    case Basic = 'Basic';
    
    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::Diploma => 'Diploma',
            self::Basic => 'Basic',
            
          
        };
    }
}

<?php

namespace App\Enum;

enum CourseType : string
{
    case Basic = 'Basic';
    case Diploma = 'Diploma';
    
    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::Basic => 'Basic',
            self::Diploma => 'Diploma',
            
          
        };
    }
}

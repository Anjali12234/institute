<?php

namespace App\Enums;

enum StudentType : string
{
    case Enquiry = 'Enquiry';
    case Admission = 'Admission';
    
    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::Enquiry => 'Enquiry',
            self::Admission => 'Admission',
            
          
        };
    }
}

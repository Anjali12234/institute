<?php

namespace App\Enums;

enum StudentType : string
{
    case Enquiry = 'Enquiry';
    case Admission = 'Admission';
    case All = 'All';
    
    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::Enquiry => 'Enquiry',
            self::Admission => 'Admission',
            self::All => 'All',
            
          
        };
    }
}

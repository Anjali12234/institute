<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case Cash = 'Cash';
    case Esewa = 'Esewa';
    case Bank_Transaction = 'Bank_Transaction';
    
    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::Cash => 'Cash',
            self::Esewa => 'Esewa',
            self::Bank_Transaction => 'Bank Transaction',
            
          
        };
    }
}

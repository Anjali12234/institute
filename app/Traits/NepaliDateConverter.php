<?php

namespace App\Traits;

class NepaliDateConverter
{
   
    // Mapping of English and Nepali years roughly. You can expand/adjust based on requirements.
    protected static $nepaliMonths = [30, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30];

    /**
     * Convert today's English date (AD) to Nepali date (BS).
     *
     * @param string|null $englishDate
     * @return string
     */
    public static function engToNepali($englishDate = null)
    {
        if (!$englishDate) {
            $englishDate = now()->format('Y-m-d');
        }

        // Split the English date
        [$engYear, $engMonth, $engDay] = explode('-', $englishDate);

        // This is a *VERY SIMPLE* estimation (For production, use detailed date converters)
        $nepYear = $engYear + 57;
        $nepMonth = (int) $engMonth + 8;

        if ($nepMonth > 12) {
            $nepMonth -= 12;
            $nepYear += 1;
        }

        $nepDay = (int) $engDay;

        // Adjust days roughly (optional)
        if ($nepDay > self::$nepaliMonths[$nepMonth - 1]) {
            $nepDay = $nepDay - self::$nepaliMonths[$nepMonth - 1];
            $nepMonth++;
            if ($nepMonth > 12) {
                $nepMonth = 1;
                $nepYear++;
            }
        }

        return sprintf('%04d-%02d-%02d', $nepYear, $nepMonth, $nepDay);
    }
}

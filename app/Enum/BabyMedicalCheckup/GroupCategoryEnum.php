<?php

namespace App\Enum\BabyMedicalCheckup;

use App\Enum\EnumAction;

enum GroupCategoryEnum:string
{
    use EnumAction;

    CASE BABY = 'Bayi';
    CASE TODDLER = 'Balita';
}

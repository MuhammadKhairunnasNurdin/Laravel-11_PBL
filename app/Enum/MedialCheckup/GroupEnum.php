<?php

namespace App\Enum\MedialCheckup;

use App\Enum\EnumAction;

enum GroupEnum:string
{
    use EnumAction;

    CASE BABY = 'Bayi';
    CASE ELDERLY = 'Lansia';
}

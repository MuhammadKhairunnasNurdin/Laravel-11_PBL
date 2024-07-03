<?php

namespace App\Enum\MedialCheckup;

use App\Enum\EnumAction;

enum StatusEnum:string
{
    use EnumAction;

    CASE HEALTHY = 'Sehat';
    CASE SICK = 'Sakit';
}

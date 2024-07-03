<?php

namespace App\Enum\Civilian;

use App\Enum\EnumAction;

enum GenderEnum:string
{
    use EnumAction;

    CASE MALE = 'L';
    CASE FEMALE = 'P';
}

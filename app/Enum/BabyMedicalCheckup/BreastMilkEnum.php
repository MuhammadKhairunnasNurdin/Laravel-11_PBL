<?php

namespace App\Enum\BabyMedicalCheckup;

use App\Enum\EnumAction;

enum BreastMilkEnum:string
{
    use EnumAction;

    CASE YES = 'Iya';
    CASE NO = 'Tidak';
}

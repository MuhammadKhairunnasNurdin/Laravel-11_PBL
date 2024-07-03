<?php

namespace App\Enum\Civilian;

use App\Enum\EnumAction;

enum IncomeEnum:string
{
    use EnumAction;

    CASE RANGE_1 = 'Belum Bekerja';
    CASE RANGE_2 = 'Rp 0 - Rp 500.000';
    CASE RANGE_3 = 'Rp 500.000 - Rp 1.000.000';
    CASE RANGE_4 = 'Rp 1.000.000 - Rp 2.000.000';
    CASE RANGE_5 = 'Rp 2.000.000 - Rp 3.000.000';
    CASE RANGE_6 = 'Rp 3.000.000 - Keatas';
}

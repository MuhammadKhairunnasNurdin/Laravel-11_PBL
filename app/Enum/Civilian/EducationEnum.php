<?php

namespace App\Enum\Civilian;

use App\Enum\EnumAction;

enum EducationEnum:string
{
    use EnumAction;

    CASE LEVEL_1 = 'Belum Sekolah';
    CASE LEVEL_2 = 'Tidak Terpelajar';
    CASE LEVEL_3 = 'SD';
    CASE LEVEL_4 = 'SMP';
    CASE LEVEL_5 = 'SMA';
    CASE LEVEL_6 = 'D4/S1';
    CASE LEVEL_7 = 'S2 Keatas';
}

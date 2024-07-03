<?php

namespace App\Enum\Civilian;

use App\Enum\EnumAction;

enum KinshipEnum:string
{
    use EnumAction;

   case HEAD_OF_FAMILY = 'Kepala Keluarga';
   case WIFE = 'Istri';
   Case CHILDREN = 'Anak';
}

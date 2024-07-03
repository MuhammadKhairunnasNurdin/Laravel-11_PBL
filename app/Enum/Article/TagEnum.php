<?php

namespace App\Enum\Article;

use App\Enum\EnumAction;

enum TagEnum:string
{
    use EnumAction;

    CASE INFORMATION = 'Informasi';
    CASE ACTIVITY = 'Kegiatan';
    CASE EDUCATION = 'Edukasi';
    CASE BAYI = 'Bayi';
    CASE PREGNANT_MOTHER = 'Ibu Hamil';
    CASE BREASTFEEDING_MOTHER = 'Ibu Menyusui';
}

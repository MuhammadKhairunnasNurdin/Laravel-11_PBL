<?php

namespace App\Enum\User;

use App\Enum\EnumAction;

enum RoleEnum:string
{
    use EnumAction;

    CASE MEMBER = 'Kader';
    CASE CHAIRMAN = 'Ketua';
    CASE ADMIN = 'Admin';
}

<?php

use App\Enums\CursoTypes;

if (!function_exists('getStatusSupport')) {

    function getTypesCurso(string $type): string
    {
        return CursoTypes::fromValue($type);
    }
}

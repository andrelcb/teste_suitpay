<?php

namespace App\DTO\Cursos;

use App\Enums\CursoTypes;
use App\Http\Requests\StoreUpdateCursoRequest;

class CreateStudentsDTO
{
    public function __construct(
        public string $name,
        public string $age,
        public int $date_of_birth,
    ) {
    }


    public static function makeFromRequest(StoreUpdateCursoRequest $request): self
    {
        return new self(
            $request->name,
            $request->age,
            $request->date_of_birth,
        );
    }
}

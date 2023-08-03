<?php

namespace App\DTO\Cursos;

use App\Enums\CursoTypes;
use App\Http\Requests\StoreUpdateCursoRequest;

class UpdateStudentsDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $age,
        public int $date_of_birth,
    ) {
    }


    public static function makeFromRequest(StoreUpdateCursoRequest $request, string $id): self
    {
        return new self(
            $id ?? $request->id,
            $request->name,
            $request->age,
            $request->date_of_birth,
        );
    }
}

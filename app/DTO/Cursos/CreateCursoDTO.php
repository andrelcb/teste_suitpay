<?php

namespace App\DTO\Cursos;

use App\Http\Requests\StoreUpdateCursoRequest;

class CreateCursoDTO
{
    public function __construct(
        public string $name,
        public string $type,
        public int $maximum_number__enrollments,
        public string $allowed_registration_date,
    ) {
    }


    public static function makeFromRequest(StoreUpdateCursoRequest $request): self
    {
        return new self(
            $request->name,
            $request->type,
            $request->maximum_number__enrollments,
            $request->allowed_registration_date,
        );
    }
}

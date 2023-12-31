<?php

namespace App\DTO\Cursos;

use App\Enums\CursoTypes;
use App\Http\Requests\StoreUpdateCursoRequest;

class UpdateCursoDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $type,
        public int $maximum_number__enrollments,
        public string $allowed_registration_date,
    ) {
    }


    public static function makeFromRequest(StoreUpdateCursoRequest $request, string $id): self
    {
        return new self(
            $id ?? $request->id,
            $request->name,
            $request->type,
            $request->maximum_number__enrollments,
            $request->allowed_registration_date,
        );
    }
}

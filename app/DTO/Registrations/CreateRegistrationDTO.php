<?php

namespace App\DTO\Students;

use App\Enums\CursoTypes;
use App\Http\Requests\StoreUpdateStudentsRequest;

class CreateRegistrationDTO
{
    public function __construct(
        public string $students_id,
        public int $cursos_id,
    ) {
    }


    public static function makeFromRequest(StoreUpdateStudentsRequest $request): self
    {
        return new self(
            $request->students_id,
            $request->cursos_id,
        );
    }
}

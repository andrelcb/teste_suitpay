<?php

namespace App\DTO\Registrations;

use App\Http\Requests\StoreRegistrationRequest;

class CreateRegistrationDTO
{
    public function __construct(
        public string $students_id,
        public int $cursos_id,
    ) {
    }


    public static function makeFromRequest(StoreRegistrationRequest $request): self
    {
        return new self(
            $request->students_id,
            $request->cursos_id,
        );
    }
}

<?php

namespace App\DTO\Students;

use App\Enums\CursoTypes;
use App\Http\Requests\StoreUpdateStudentsRequest;

class CreateStudentsDTO
{
    public function __construct(
        public string $name,
        public int $age,
        public string $date_of_birth,
    ) {
    }


    public static function makeFromRequest(StoreUpdateStudentsRequest $request): self
    {
        return new self(
            $request->name,
            $request->age,
            $request->date_of_birth,
        );
    }
}

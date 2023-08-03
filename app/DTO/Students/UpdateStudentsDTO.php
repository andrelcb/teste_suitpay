<?php

namespace App\DTO\Students;

use App\Enums\CursoTypes;
use App\Http\Requests\StoreUpdateStudentsRequest;

class UpdateStudentsDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public int $age,
        public string $date_of_birth,
    ) {
    }


    public static function makeFromRequest(StoreUpdateStudentsRequest $request, string $id): self
    {
        return new self(
            $id ?? $request->id,
            $request->name,
            $request->age,
            $request->date_of_birth,
        );
    }
}

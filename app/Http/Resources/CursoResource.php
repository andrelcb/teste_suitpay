<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "maximum_number__enrollments" => $this->maximum_number__enrollments,
            "allowed_registration_date" => Carbon::make($this->allowed_registration_date)->format('Y-m-d'),
        ];
    }
}

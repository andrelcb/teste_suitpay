<?php

namespace App\Repositories\Registrations;

use App\DTO\Students\CreateRegistrationDTO;
use App\Models\Registration;
use stdClass;

class RegistrationEloquentORM implements RegistrationRepositoryInterface
{
    public function __construct(
        protected Registration $model,
    ) {
    }
    public function getAll(string $filter = null): array
    {
        return $this->model
            ->get()
            ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $curso = $this->model->find($id);
        if (!$curso) {
            return null;
        }
        return (object) $curso->toArray();
    }

    public function new(CreateRegistrationDTO $dto): stdClass
    {
        $curso = $this->model->create((array) $dto);

        return (object) $curso->toArray();
    }


    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function getAllPerStudentId(string $id): array
    {
        return $this->model
            ->where(function ($query) use ($id) {
                $query->where('students_id', $id);
            })
            ->get()
            ->toArray();
    }
}

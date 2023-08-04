<?php

namespace App\Repositories\Registrations;

use App\DTO\Registrations\CreateRegistrationDTO;
use stdClass;

interface RegistrationRepositoryInterface
{

    public function getAll(string $filter = null): array;
    public function getCount(string $id): int;
    public function findOne(string $id): stdClass|null;
    public function new(CreateRegistrationDTO $dto): stdClass;
    public function delete(string $id): void;
    public function getAllPerStudentId(string $id): array;
    public function isExistStudentThisCursso(string $studentID, string $cursosId): bool;
    public function isExistThisCurso(string $cursosId): bool;
}
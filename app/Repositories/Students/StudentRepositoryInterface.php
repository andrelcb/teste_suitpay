<?php


namespace App\Repositories\Students;

use App\DTO\Students\CreateStudentsDTO;
use App\DTO\Students\UpdateStudentsDTO;
use App\Repositories\PaginationInterface;
use stdClass;

interface StudentRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateStudentsDTO $dto): stdClass;
    public function update(UpdateStudentsDTO $dto): stdClass|null;
}

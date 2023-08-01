<?php


namespace App\Repositories;

use App\DTO\CreateCursoDTO;
use App\DTO\UpdateCursoDTO;
use stdClass;

interface CursoRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateCursoDTO $dto): stdClass;
    public function update(UpdateCursoDTO $dto): stdClass|null;
}

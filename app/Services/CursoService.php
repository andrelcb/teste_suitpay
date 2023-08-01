<?php

namespace App\Services;

use App\DTO\Cursos\CreateCursoDTO;
use App\DTO\Cursos\UpdateCursoDTO;
use App\Repositories\CursoRepositoryInterface;
use App\Repositories\PaginationInterface;
use stdClass;

class CursoService
{
    public function __construct(
        protected CursoRepositoryInterface $repository,
    ) {
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate(page: $page, totalPerPage: $totalPerPage, filter: $filter);
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateCursoDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateCursoDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}

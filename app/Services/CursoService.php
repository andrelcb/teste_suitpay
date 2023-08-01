<?php

namespace App\Services;

use App\DTO\CreateCursoDTO;
use App\DTO\UpdateCursoDTO;
use App\Repositories\CursoRepositotyInterface;
use stdClass;

class CursoService
{
    public function __construct(
        protected CursoRepositotyInterface $repository,
    ) {
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

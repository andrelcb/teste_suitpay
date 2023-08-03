<?php

namespace App\Services;

use App\DTO\Students\CreateStudentsDTO;
use App\DTO\Students\UpdateStudentsDTO;
use App\Repositories\PaginationInterface;
use App\Repositories\Students\StudentRepositoryInterface;
use stdClass;

class StudentService
{
    public function __construct(
        protected StudentRepositoryInterface $repository,
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

    public function new(CreateStudentsDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateStudentsDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}

<?php

namespace App\Repositories;

use App\DTO\Cursos\CreateCursoDTO;
use App\DTO\Cursos\UpdateCursoDTO;
use App\Models\Curso;
use App\Repositories\CursoRepositoryInterface;
use stdClass;

class CursoEloquentORM implements CursoRepositoryInterface
{
    public function __construct(
        protected Curso $model,
    ) {
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('name', 'like', "{$filter}");
                    $query->orWhere('type', $filter);
                }
            })
            ->paginate($totalPerPage, ['*'], 'page', $page);
            
            return New PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('name', 'like', "{$filter}");
                    $query->orWhere('type', $filter);
                }
            })
            ->get()
            ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $curso = $this->model->with(['registrations.student'])->find($id);
        if (!$curso) {
            return null;
        }
        return (object) $curso->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateCursoDTO $dto): stdClass
    {
        $curso = $this->model->create((array) $dto);

        return (object) $curso->toArray();
    }

    public function update(UpdateCursoDTO $dto): stdClass|null
    {
        if (!$curso = $this->model->find($dto->id)) {
            return null;
        }

        $curso->update((array)$dto);

        return (object) $curso->toArray();
    }
}

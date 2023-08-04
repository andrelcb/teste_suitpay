<?php

namespace App\Services;

use App\DTO\Registrations\CreateRegistrationDTO;
use App\Repositories\CursoRepositoryInterface;
use App\Repositories\Registrations\RegistrationRepositoryInterface;
use Carbon\Carbon;
use stdClass;

class RegistrationService
{
    public function __construct(
        protected RegistrationRepositoryInterface $repository,
        protected CursoRepositoryInterface $repositoryCurso,
    ) {
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function new(CreateRegistrationDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function removeAllRegistration(string $id): void
    {
        $registrations = $this->repository->getAllPerStudentId($id);

        foreach ($registrations as $registration) {
            $this->delete($registration['id']);
        }
    }

    public function validateRegister(CreateRegistrationDTO $dto): array
    {
        $response = ["error" => ""];
        $curso = $this->repositoryCurso->findOne($dto->cursos_id);
        $total = $this->repository->getCount($dto->cursos_id);
        $exists = $this->repository->isExistStudentThisCursso($dto->students_id, $dto->cursos_id);
        if ($exists) {
            $response["error"]  = "Esse aluno ja está matriculado nesse curso.";
        }
        if ($total >= $curso->maximum_number__enrollments) {
            $response["error"] = "Esse curso excedeu o numero maximo de matriculas.";
        }
        if (Carbon::now()->format('Y-m-d') > Carbon::make($curso->allowed_registration_date)->format('Y-m-d')) {
            $response["error"] = "A data da matricula ja passou.";
        }

        return $response;
    }
}

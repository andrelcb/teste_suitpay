<?php

namespace App\Services;

use App\DTO\Students\CreateRegistrationDTO;
use App\Repositories\Registrations\RegistrationRepositoryInterface;
use stdClass;

class RegistrationService
{
    public function __construct(
        protected RegistrationRepositoryInterface $repository
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
            $this->delete($registration->id);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Students\CreateRegistrationDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function __construct(
        protected RegistrationService $service,
    ) {
    }

    public function store(StoreRegistrationRequest $request)
    {
        $this->service->new(CreateRegistrationDTO::makeFromRequest($request));

        return redirect()->route('cursos.index')->with('message', 'Cadastrado com sucesso.');
    }
}

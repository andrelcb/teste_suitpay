<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Registrations\CreateRegistrationDTO;
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

    public function index(Request $request)
    {
    }

    public function store(StoreRegistrationRequest $request)
    {
        $validate = $this->service->validateRegister(CreateRegistrationDTO::makeFromRequest($request));
        if ($validate['error'] !== "") {
            return redirect()->route('cursos.show', $request->cursos_id)->with('error', $validate['error']);
        }
        $this->service->new(CreateRegistrationDTO::makeFromRequest($request));

        return redirect()->route('cursos.show', $request->cursos_id)->with('message', "Aluno cadastrado com sucesso.");
    }
}

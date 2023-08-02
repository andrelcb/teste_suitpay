<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Cursos\CreateCursoDTO;
use App\DTO\Cursos\UpdateCursoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCursoRequest;
use App\Http\Resources\CursoResource;
use App\Services\CursoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CursoController extends Controller
{

    public function __construct(
        protected CursoService $service,
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cursos = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
        );

        return ApiAdapter::toJson($cursos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCursoRequest $request)
    {
        $curso = $this->service->new(CreateCursoDTO::makeFromRequest($request));

        return new CursoResource($curso);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$curso = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new CursoResource($curso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCursoRequest $request, string $id)
    {
        $curso = $this->service->update(UpdateCursoDTO::makeFromRequest($request, $id));

        if (!$curso) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new CursoResource($curso);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateCursoDTO;
use App\DTO\UpdateCursoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCursoRequest;
use App\Models\Curso;
use App\Services\CursoService;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function __construct(protected CursoService $service)
    {
    }

    public function index(Request $request)
    {
        $cursos = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
        );
        
        return view('admin/cursos/index', compact('cursos'));
    }

    public function show(string $id)
    {
        if (!$curso = $this->service->findOne($id)) {
            return redirect()->back();
        };

        return view('admin/cursos/show', compact('curso'));
    }

    public function create()
    {
        return view('admin/cursos/create');
    }

    public function store(StoreUpdateCursoRequest $request, Curso $curso)
    {
        $this->service->new(CreateCursoDTO::makeFromRequest($request));

        return redirect()->route('cursos.index');
    }

    public function edit(string $id)
    {
        if (!$curso = $this->service->findOne($id)) {
            return redirect()->back();
        };

        return view('admin/cursos/edit', compact('curso'));
    }

    public function update(StoreUpdateCursoRequest $request, string $id)
    {
        $curso = $this->service->update(UpdateCursoDTO::makeFromRequest($request));
        if (!$curso) {
            return redirect()->back();
        };
        return redirect()->route('cursos.index');
    }

    public function destroy(string|int $id)
    {
        $this->service->delete($id);
        return redirect()->route('cursos.index');
    }
}

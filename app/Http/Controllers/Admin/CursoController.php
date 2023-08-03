<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Cursos\CreateCursoDTO;
use App\DTO\Cursos\UpdateCursoDTO;
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
        $filters = ['filter' => $request->get('filter', '')];
        
        return view('admin/cursos/index', compact('cursos', 'filters'));
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

    public function store(StoreUpdateCursoRequest $request)
    {
        $this->service->new(CreateCursoDTO::makeFromRequest($request));

        return redirect()->route('cursos.index')->with('message', 'Cadastrado com sucesso.');
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
        $curso = $this->service->update(UpdateCursoDTO::makeFromRequest($request, $id));
        if (!$curso) {
            return redirect()->back();
        };
        return redirect()->route('cursos.index')->with('message', 'Atualizado com sucesso.');
    }

    public function destroy(string|int $id)
    {
        $this->service->delete($id);
        return redirect()->route('cursos.index')->with('message', 'Deletado com sucesso.');
    }
}

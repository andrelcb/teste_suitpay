<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Students\CreateStudentsDTO;
use App\DTO\Students\UpdateStudentsDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateStudentsRequest;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct(
        protected StudentService $service
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
        );
        $filters = ['filter' => $request->get('filter', '')];

        return view('admin/students/index', compact('students', 'filters'));
    }

    public function create()
    {
        return view('admin/students/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateStudentsRequest $request)
    {
        $this->service->new(CreateStudentsDTO::makeFromRequest($request));

        return redirect()->route('students.index')->with('message', 'Cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$student = $this->service->findOne($id)) {
            return redirect()->back();
        };

        return view('admin/students/show', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(string $id)
    {
        if (!$student = $this->service->findOne($id)) {
            return redirect()->back();
        };

        return view('admin/students/edit', compact('student'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateStudentsRequest $request, string $id)
    {
        $curso = $this->service->update(UpdateStudentsDTO::makeFromRequest($request, $id));
        if (!$curso) {
            return redirect()->back();
        };
        return redirect()->route('students.index')->with('message', 'Atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('students.index')->with('message', 'Deletado com sucesso.');
    }
}

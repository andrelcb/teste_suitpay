<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Students\CreateStudentsDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateStudentsRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\StudentResource;
use App\Services\RegistrationService;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{

    public function __construct(
        protected StudentService $service,
        protected RegistrationService $serviceRegistration
    ){
    }

    /**
     * Display a listing of the resource.
     */
    public function index(StoreUpdateStudentsRequest $request)
    {
        $students = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
        );
        $filters = ['filter' => $request->get('filter', '')];

        return ApiAdapter::toJson($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateStudentsRequest $request)
    {
        $student = $this->service->new(CreateStudentsDTO::makeFromRequest($request));

        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$student = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new DefaultResource($student );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        if (!$student = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        };

        return new StudentResource($student);
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

        $this->serviceRegistration->removeAllRegistration($id);
        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

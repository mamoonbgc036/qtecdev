<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ServiceRequest;
use App\Http\Resources\V1\Service\ServiceResource;
use App\Models\Service;
use App\Repositories\V1\ServiceRepository;

class ServiceController extends Controller
{
    private $serviceRepository;
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $services = $this->serviceRepository->getAll();
            return response()->json(['data' => ServiceResource::collection($services)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve services', 'msg' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        try {
            $service = $this->serviceRepository->create($request->validated());
            return response()->json(['data' => new ServiceResource($service)], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Service creation failed', 'msg' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = $this->serviceRepository->findById($id);
        if (! $service) {
            return response()->json(['error' => 'Service not found'], 404);
        }
        return response()->json(['data' => new ServiceResource($service)], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        try {
            $service = $this->serviceRepository->findById($id);
            if (! $service) {
                return response()->json(['error' => 'Service not found'], 404);
            }
            $updatedService = $this->serviceRepository->update($service, $request->validated());
            return response()->json(['data' => new ServiceResource($updatedService)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Service update failed', 'msg' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            $this->serviceRepository->delete($service);
            return response()->json(['message' => 'Service deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Service deletion failed', 'msg' => $e->getMessage()], 500);
        }
    }
}

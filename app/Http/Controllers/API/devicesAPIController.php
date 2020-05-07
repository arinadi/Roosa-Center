<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedevicesAPIRequest;
use App\Http\Requests\API\UpdatedevicesAPIRequest;
use App\Models\devices;
use App\Repositories\devicesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class devicesController
 * @package App\Http\Controllers\API
 */

class devicesAPIController extends AppBaseController
{
    /** @var  devicesRepository */
    private $devicesRepository;

    public function __construct(devicesRepository $devicesRepo)
    {
        $this->devicesRepository = $devicesRepo;
    }

    /**
     * Display a listing of the devices.
     * GET|HEAD /devices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $devices = $this->devicesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($devices->toArray(), 'Devices retrieved successfully');
    }

    /**
     * Store a newly created devices in storage.
     * POST /devices
     *
     * @param CreatedevicesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedevicesAPIRequest $request)
    {
        $input = $request->all();

        $devices = $this->devicesRepository->create($input);

        return $this->sendResponse($devices->toArray(), 'Devices saved successfully');
    }

    /**
     * Display the specified devices.
     * GET|HEAD /devices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var devices $devices */
        $devices = $this->devicesRepository->find($id);

        if (empty($devices)) {
            return $this->sendError('Devices not found');
        }

        return $this->sendResponse($devices->toArray(), 'Devices retrieved successfully');
    }

    /**
     * Update the specified devices in storage.
     * PUT/PATCH /devices/{id}
     *
     * @param int $id
     * @param UpdatedevicesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedevicesAPIRequest $request)
    {
        $input = $request->all();

        /** @var devices $devices */
        $devices = $this->devicesRepository->find($id);

        if (empty($devices)) {
            return $this->sendError('Devices not found');
        }

        $devices = $this->devicesRepository->update($input, $id);

        return $this->sendResponse($devices->toArray(), 'devices updated successfully');
    }

    /**
     * Remove the specified devices from storage.
     * DELETE /devices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var devices $devices */
        $devices = $this->devicesRepository->find($id);

        if (empty($devices)) {
            return $this->sendError('Devices not found');
        }

        $devices->delete();

        return $this->sendSuccess('Devices deleted successfully');
    }
}

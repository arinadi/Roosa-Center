<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdevice_dataAPIRequest;
use App\Http\Requests\API\Updatedevice_dataAPIRequest;
use App\Models\device_data;
use App\Repositories\device_dataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class device_dataController
 * @package App\Http\Controllers\API
 */

class device_dataAPIController extends AppBaseController
{
    /** @var  device_dataRepository */
    private $deviceDataRepository;

    public function __construct(device_dataRepository $deviceDataRepo)
    {
        $this->deviceDataRepository = $deviceDataRepo;
    }

    /**
     * Display a listing of the device_data.
     * GET|HEAD /deviceData
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $deviceData = $this->deviceDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($deviceData->toArray(), 'Device Data retrieved successfully');
    }

    /**
     * Store a newly created device_data in storage.
     * POST /deviceData
     *
     * @param Createdevice_dataAPIRequest $request
     *
     * @return Response
     */
    public function store(Createdevice_dataAPIRequest $request)
    {
        $input = $request->all();

        $deviceData = $this->deviceDataRepository->create($input);

        return $this->sendResponse($deviceData->toArray(), 'Device Data saved successfully');
    }

    /**
     * Display the specified device_data.
     * GET|HEAD /deviceData/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var device_data $deviceData */
        $deviceData = $this->deviceDataRepository->find($id);

        if (empty($deviceData)) {
            return $this->sendError('Device Data not found');
        }

        return $this->sendResponse($deviceData->toArray(), 'Device Data retrieved successfully');
    }

    /**
     * Update the specified device_data in storage.
     * PUT/PATCH /deviceData/{id}
     *
     * @param int $id
     * @param Updatedevice_dataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedevice_dataAPIRequest $request)
    {
        $input = $request->all();

        /** @var device_data $deviceData */
        $deviceData = $this->deviceDataRepository->find($id);

        if (empty($deviceData)) {
            return $this->sendError('Device Data not found');
        }

        $deviceData = $this->deviceDataRepository->update($input, $id);

        return $this->sendResponse($deviceData->toArray(), 'device_data updated successfully');
    }

    /**
     * Remove the specified device_data from storage.
     * DELETE /deviceData/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var device_data $deviceData */
        $deviceData = $this->deviceDataRepository->find($id);

        if (empty($deviceData)) {
            return $this->sendError('Device Data not found');
        }

        $deviceData->delete();

        return $this->sendSuccess('Device Data deleted successfully');
    }
}

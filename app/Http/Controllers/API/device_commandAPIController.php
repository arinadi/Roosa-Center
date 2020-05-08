<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdevice_commandAPIRequest;
use App\Http\Requests\API\Updatedevice_commandAPIRequest;
use App\Models\devices;
use App\Repositories\devicesRepository;
use App\Models\device_command;
use App\Repositories\device_commandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class device_commandController
 * @package App\Http\Controllers\API
 */

class device_commandAPIController extends AppBaseController
{
    /** @var  device_commandRepository */
    private $deviceCommandRepository;

    public function __construct(device_commandRepository $deviceCommandRepo, Request $request)
    {
        $this->request = $request;
        $this->deviceCommandRepository = $deviceCommandRepo;
    }

    /**
     * Display a listing of the device_command.
     * GET|HEAD /deviceCommands
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $device = $this->getDevice();
        $deviceCommands = device_command::where(
            [
                ['device_id', '=', $device['id']],
                // ['is_received', '=', 0],
            ]
        )->get();

        return $this->sendResponse($deviceCommands->toArray(), 'Device Commands retrieved successfully');
    }

    private function getDevice(){
        $secret_key = $this->request->header('secret-key');
        $device = devices::where('secret_key', $secret_key)->first();
        //dd($device);
        if (is_null($device)) {
            return $this->sendError('Device not found');
        }
        return $device;
    }

    /**
     * Store a newly created device_command in storage.
     * POST /deviceCommands
     *
     * @param Createdevice_commandAPIRequest $request
     *
     * @return Response
     */
    // public function store(Createdevice_commandAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $deviceCommand = $this->deviceCommandRepository->create($input);

    //     return $this->sendResponse($deviceCommand->toArray(), 'Device Command saved successfully');
    // }

    /**
     * Display the specified device_command.
     * GET|HEAD /deviceCommands/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var device_command $deviceCommand */
    //     $deviceCommand = $this->deviceCommandRepository->find($id);

    //     if (empty($deviceCommand)) {
    //         return $this->sendError('Device Command not found');
    //     }

    //     return $this->sendResponse($deviceCommand->toArray(), 'Device Command retrieved successfully');
    // }

    /**
     * Update the specified device_command in storage.
     * PUT/PATCH /deviceCommands/{id}
     *
     * @param int $id
     * @param Updatedevice_commandAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, Updatedevice_commandAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var device_command $deviceCommand */
    //     $deviceCommand = $this->deviceCommandRepository->find($id);

    //     if (empty($deviceCommand)) {
    //         return $this->sendError('Device Command not found');
    //     }

    //     $deviceCommand = $this->deviceCommandRepository->update($input, $id);

    //     return $this->sendResponse($deviceCommand->toArray(), 'device_command updated successfully');
    // }

    /**
     * Remove the specified device_command from storage.
     * DELETE /deviceCommands/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $device = $this->getDevice();

        /** @var device_command $deviceCommand */
        $deviceCommand = $this->deviceCommandRepository->find($id);

        if (empty($deviceCommand)) {
            return $this->sendError('Device Command not found');
        }

        $deviceCommand->delete();

        return $this->sendSuccess('Device Command deleted successfully');
    }
}

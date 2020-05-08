<?php

namespace App\Http\Controllers\API;

use App\Models\devices;
use App\Models\device_command;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class device_commandController
 * @package App\Http\Controllers\API
 */

class device_updateAPIController extends AppBaseController
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the device_command.
     * GET|HEAD /deviceCommands
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        return $this->sendError('Not Allowed');
    }

    private function getDevice()
    {
        $secret_key = $this->request->header('secret-key');
        if (is_null($secret_key)) {
            return null;
        }

        $device = devices::where('secret_key', $secret_key)->first();
        //dd($device);

        return $device;
    }

    private function getCommand($device)
    {
        $deviceCommands = device_command::where(
            [
                ['device_id', '=', $device['id']],
                // ['is_received', '=', 0],
            ]
        )->get();
        return $deviceCommands;
    }

    private function getResult($device)
    {
        $result = [];

        $deviceCommands = $this->getCommand($device);
        $result['device_command'] = $deviceCommands;

        return $result;
    }

    private function handleRequest($device)
    {
        // $input = $this->request->input();
        $input = json_decode($this->request->getContent(), 1);

        return [];
    }

    /**
     * Store a newly created device_command in storage.
     * POST /deviceCommands
     *
     * @param Createdevice_commandAPIRequest $request
     *
     * @return Response
     */
    public function store()
    {
        $device = $this->getDevice();
        if (is_null($device)) {
            return $this->sendError('Device not found');
        }

        $result = [];

        $result = $this->handleRequest($device);

        $result = array_merge($result, $this->getResult($device));

        return $this->sendResponse($result, 'Device Update retrieved successfully');
    }

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
    // public function destroy($id)
    // {
    //     $device = $this->getDevice();

    //     /** @var device_command $deviceCommand */
    //     $deviceCommand = $this->deviceCommandRepository->find($id);

    //     if (empty($deviceCommand)) {
    //         return $this->sendError('Device Command not found');
    //     }

    //     $deviceCommand->delete();

    //     return $this->sendSuccess('Device Command deleted successfully');
    // }
}

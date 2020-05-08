<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdevice_commandAPIRequest;
use App\Http\Requests\API\Updatedevice_commandAPIRequest;
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

    public function __construct(device_commandRepository $deviceCommandRepo)
    {
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
        $deviceCommands = $this->deviceCommandRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($deviceCommands->toArray(), 'Device Commands retrieved successfully');
    }

    /**
     * Store a newly created device_command in storage.
     * POST /deviceCommands
     *
     * @param Createdevice_commandAPIRequest $request
     *
     * @return Response
     */
    public function store(Createdevice_commandAPIRequest $request)
    {
        $input = $request->all();

        $deviceCommand = $this->deviceCommandRepository->create($input);

        return $this->sendResponse($deviceCommand->toArray(), 'Device Command saved successfully');
    }

    /**
     * Display the specified device_command.
     * GET|HEAD /deviceCommands/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var device_command $deviceCommand */
        $deviceCommand = $this->deviceCommandRepository->find($id);

        if (empty($deviceCommand)) {
            return $this->sendError('Device Command not found');
        }

        return $this->sendResponse($deviceCommand->toArray(), 'Device Command retrieved successfully');
    }

    /**
     * Update the specified device_command in storage.
     * PUT/PATCH /deviceCommands/{id}
     *
     * @param int $id
     * @param Updatedevice_commandAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedevice_commandAPIRequest $request)
    {
        $input = $request->all();

        /** @var device_command $deviceCommand */
        $deviceCommand = $this->deviceCommandRepository->find($id);

        if (empty($deviceCommand)) {
            return $this->sendError('Device Command not found');
        }

        $deviceCommand = $this->deviceCommandRepository->update($input, $id);

        return $this->sendResponse($deviceCommand->toArray(), 'device_command updated successfully');
    }

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
        /** @var device_command $deviceCommand */
        $deviceCommand = $this->deviceCommandRepository->find($id);

        if (empty($deviceCommand)) {
            return $this->sendError('Device Command not found');
        }

        $deviceCommand->delete();

        return $this->sendSuccess('Device Command deleted successfully');
    }
}

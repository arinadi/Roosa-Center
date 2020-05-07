<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createbot_users_pair_devicesAPIRequest;
use App\Http\Requests\API\Updatebot_users_pair_devicesAPIRequest;
use App\Models\bot_users_pair_devices;
use App\Repositories\bot_users_pair_devicesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class bot_users_pair_devicesController
 * @package App\Http\Controllers\API
 */

class bot_users_pair_devicesAPIController extends AppBaseController
{
    /** @var  bot_users_pair_devicesRepository */
    private $botUsersPairDevicesRepository;

    public function __construct(bot_users_pair_devicesRepository $botUsersPairDevicesRepo)
    {
        $this->botUsersPairDevicesRepository = $botUsersPairDevicesRepo;
    }

    /**
     * Display a listing of the bot_users_pair_devices.
     * GET|HEAD /botUsersPairDevices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($botUsersPairDevices->toArray(), 'Bot Users Pair Devices retrieved successfully');
    }

    /**
     * Store a newly created bot_users_pair_devices in storage.
     * POST /botUsersPairDevices
     *
     * @param Createbot_users_pair_devicesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createbot_users_pair_devicesAPIRequest $request)
    {
        $input = $request->all();

        $botUsersPairDevices = $this->botUsersPairDevicesRepository->create($input);

        return $this->sendResponse($botUsersPairDevices->toArray(), 'Bot Users Pair Devices saved successfully');
    }

    /**
     * Display the specified bot_users_pair_devices.
     * GET|HEAD /botUsersPairDevices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var bot_users_pair_devices $botUsersPairDevices */
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->find($id);

        if (empty($botUsersPairDevices)) {
            return $this->sendError('Bot Users Pair Devices not found');
        }

        return $this->sendResponse($botUsersPairDevices->toArray(), 'Bot Users Pair Devices retrieved successfully');
    }

    /**
     * Update the specified bot_users_pair_devices in storage.
     * PUT/PATCH /botUsersPairDevices/{id}
     *
     * @param int $id
     * @param Updatebot_users_pair_devicesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatebot_users_pair_devicesAPIRequest $request)
    {
        $input = $request->all();

        /** @var bot_users_pair_devices $botUsersPairDevices */
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->find($id);

        if (empty($botUsersPairDevices)) {
            return $this->sendError('Bot Users Pair Devices not found');
        }

        $botUsersPairDevices = $this->botUsersPairDevicesRepository->update($input, $id);

        return $this->sendResponse($botUsersPairDevices->toArray(), 'bot_users_pair_devices updated successfully');
    }

    /**
     * Remove the specified bot_users_pair_devices from storage.
     * DELETE /botUsersPairDevices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var bot_users_pair_devices $botUsersPairDevices */
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->find($id);

        if (empty($botUsersPairDevices)) {
            return $this->sendError('Bot Users Pair Devices not found');
        }

        $botUsersPairDevices->delete();

        return $this->sendSuccess('Bot Users Pair Devices deleted successfully');
    }
}

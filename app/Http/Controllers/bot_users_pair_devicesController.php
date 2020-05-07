<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createbot_users_pair_devicesRequest;
use App\Http\Requests\Updatebot_users_pair_devicesRequest;
use App\Repositories\bot_users_pair_devicesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class bot_users_pair_devicesController extends AppBaseController
{
    /** @var  bot_users_pair_devicesRepository */
    private $botUsersPairDevicesRepository;

    public function __construct(bot_users_pair_devicesRepository $botUsersPairDevicesRepo)
    {
        $this->botUsersPairDevicesRepository = $botUsersPairDevicesRepo;
    }

    /**
     * Display a listing of the bot_users_pair_devices.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->all();

        return view('bot_users_pair_devices.index')
            ->with('botUsersPairDevices', $botUsersPairDevices);
    }

    /**
     * Show the form for creating a new bot_users_pair_devices.
     *
     * @return Response
     */
    public function create()
    {
        return view('bot_users_pair_devices.create');
    }

    /**
     * Store a newly created bot_users_pair_devices in storage.
     *
     * @param Createbot_users_pair_devicesRequest $request
     *
     * @return Response
     */
    public function store(Createbot_users_pair_devicesRequest $request)
    {
        $input = $request->all();

        $botUsersPairDevices = $this->botUsersPairDevicesRepository->create($input);

        Flash::success('Bot Users Pair Devices saved successfully.');

        return redirect(route('botUsersPairDevices.index'));
    }

    /**
     * Display the specified bot_users_pair_devices.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->find($id);

        if (empty($botUsersPairDevices)) {
            Flash::error('Bot Users Pair Devices not found');

            return redirect(route('botUsersPairDevices.index'));
        }

        return view('bot_users_pair_devices.show')->with('botUsersPairDevices', $botUsersPairDevices);
    }

    /**
     * Show the form for editing the specified bot_users_pair_devices.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->find($id);

        if (empty($botUsersPairDevices)) {
            Flash::error('Bot Users Pair Devices not found');

            return redirect(route('botUsersPairDevices.index'));
        }

        return view('bot_users_pair_devices.edit')->with('botUsersPairDevices', $botUsersPairDevices);
    }

    /**
     * Update the specified bot_users_pair_devices in storage.
     *
     * @param int $id
     * @param Updatebot_users_pair_devicesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatebot_users_pair_devicesRequest $request)
    {
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->find($id);

        if (empty($botUsersPairDevices)) {
            Flash::error('Bot Users Pair Devices not found');

            return redirect(route('botUsersPairDevices.index'));
        }

        $botUsersPairDevices = $this->botUsersPairDevicesRepository->update($request->all(), $id);

        Flash::success('Bot Users Pair Devices updated successfully.');

        return redirect(route('botUsersPairDevices.index'));
    }

    /**
     * Remove the specified bot_users_pair_devices from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $botUsersPairDevices = $this->botUsersPairDevicesRepository->find($id);

        if (empty($botUsersPairDevices)) {
            Flash::error('Bot Users Pair Devices not found');

            return redirect(route('botUsersPairDevices.index'));
        }

        $this->botUsersPairDevicesRepository->delete($id);

        Flash::success('Bot Users Pair Devices deleted successfully.');

        return redirect(route('botUsersPairDevices.index'));
    }
}

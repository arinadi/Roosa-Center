<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedevicesRequest;
use App\Http\Requests\UpdatedevicesRequest;
use App\Repositories\devicesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class devicesController extends AppBaseController
{
    /** @var  devicesRepository */
    private $devicesRepository;

    public function __construct(devicesRepository $devicesRepo)
    {
        $this->devicesRepository = $devicesRepo;
    }

    /**
     * Display a listing of the devices.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $devices = $this->devicesRepository->all();

        return view('devices.index')
            ->with('devices', $devices);
    }

    /**
     * Show the form for creating a new devices.
     *
     * @return Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created devices in storage.
     *
     * @param CreatedevicesRequest $request
     *
     * @return Response
     */
    public function store(CreatedevicesRequest $request)
    {
        $input = $request->all();

        $devices = $this->devicesRepository->create($input);

        Flash::success('Devices saved successfully.');

        return redirect(route('devices.index'));
    }

    /**
     * Display the specified devices.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $devices = $this->devicesRepository->find($id);

        if (empty($devices)) {
            Flash::error('Devices not found');

            return redirect(route('devices.index'));
        }

        return view('devices.show')->with('devices', $devices);
    }

    /**
     * Show the form for editing the specified devices.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $devices = $this->devicesRepository->find($id);

        if (empty($devices)) {
            Flash::error('Devices not found');

            return redirect(route('devices.index'));
        }

        return view('devices.edit')->with('devices', $devices);
    }

    /**
     * Update the specified devices in storage.
     *
     * @param int $id
     * @param UpdatedevicesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedevicesRequest $request)
    {
        $devices = $this->devicesRepository->find($id);

        if (empty($devices)) {
            Flash::error('Devices not found');

            return redirect(route('devices.index'));
        }

        $devices = $this->devicesRepository->update($request->all(), $id);

        Flash::success('Devices updated successfully.');

        return redirect(route('devices.index'));
    }

    /**
     * Remove the specified devices from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $devices = $this->devicesRepository->find($id);

        if (empty($devices)) {
            Flash::error('Devices not found');

            return redirect(route('devices.index'));
        }

        $this->devicesRepository->delete($id);

        Flash::success('Devices deleted successfully.');

        return redirect(route('devices.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdevice_dataRequest;
use App\Http\Requests\Updatedevice_dataRequest;
use App\Repositories\device_dataRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class device_dataController extends AppBaseController
{
    /** @var  device_dataRepository */
    private $deviceDataRepository;

    public function __construct(device_dataRepository $deviceDataRepo)
    {
        $this->deviceDataRepository = $deviceDataRepo;
    }

    /**
     * Display a listing of the device_data.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $deviceData = $this->deviceDataRepository->all();

        return view('device_data.index')
            ->with('deviceData', $deviceData);
    }

    /**
     * Show the form for creating a new device_data.
     *
     * @return Response
     */
    public function create()
    {
        return view('device_data.create');
    }

    /**
     * Store a newly created device_data in storage.
     *
     * @param Createdevice_dataRequest $request
     *
     * @return Response
     */
    public function store(Createdevice_dataRequest $request)
    {
        $input = $request->all();

        $deviceData = $this->deviceDataRepository->create($input);

        Flash::success('Device Data saved successfully.');

        return redirect(route('deviceData.index'));
    }

    /**
     * Display the specified device_data.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deviceData = $this->deviceDataRepository->find($id);

        if (empty($deviceData)) {
            Flash::error('Device Data not found');

            return redirect(route('deviceData.index'));
        }

        return view('device_data.show')->with('deviceData', $deviceData);
    }

    /**
     * Show the form for editing the specified device_data.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deviceData = $this->deviceDataRepository->find($id);

        if (empty($deviceData)) {
            Flash::error('Device Data not found');

            return redirect(route('deviceData.index'));
        }

        return view('device_data.edit')->with('deviceData', $deviceData);
    }

    /**
     * Update the specified device_data in storage.
     *
     * @param int $id
     * @param Updatedevice_dataRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedevice_dataRequest $request)
    {
        $deviceData = $this->deviceDataRepository->find($id);

        if (empty($deviceData)) {
            Flash::error('Device Data not found');

            return redirect(route('deviceData.index'));
        }

        $deviceData = $this->deviceDataRepository->update($request->all(), $id);

        Flash::success('Device Data updated successfully.');

        return redirect(route('deviceData.index'));
    }

    /**
     * Remove the specified device_data from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deviceData = $this->deviceDataRepository->find($id);

        if (empty($deviceData)) {
            Flash::error('Device Data not found');

            return redirect(route('deviceData.index'));
        }

        $this->deviceDataRepository->delete($id);

        Flash::success('Device Data deleted successfully.');

        return redirect(route('deviceData.index'));
    }
}

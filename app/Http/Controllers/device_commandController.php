<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdevice_commandRequest;
use App\Http\Requests\Updatedevice_commandRequest;
use App\Repositories\device_commandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class device_commandController extends AppBaseController
{
    /** @var  device_commandRepository */
    private $deviceCommandRepository;

    public function __construct(device_commandRepository $deviceCommandRepo)
    {
        $this->deviceCommandRepository = $deviceCommandRepo;
    }

    /**
     * Display a listing of the device_command.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $deviceCommands = $this->deviceCommandRepository->all();

        return view('device_commands.index')
            ->with('deviceCommands', $deviceCommands);
    }

    /**
     * Show the form for creating a new device_command.
     *
     * @return Response
     */
    public function create()
    {
        return view('device_commands.create');
    }

    /**
     * Store a newly created device_command in storage.
     *
     * @param Createdevice_commandRequest $request
     *
     * @return Response
     */
    public function store(Createdevice_commandRequest $request)
    {
        $input = $request->all();

        $deviceCommand = $this->deviceCommandRepository->create($input);

        Flash::success('Device Command saved successfully.');

        return redirect(route('deviceCommands.index'));
    }

    /**
     * Display the specified device_command.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deviceCommand = $this->deviceCommandRepository->find($id);

        if (empty($deviceCommand)) {
            Flash::error('Device Command not found');

            return redirect(route('deviceCommands.index'));
        }

        return view('device_commands.show')->with('deviceCommand', $deviceCommand);
    }

    /**
     * Show the form for editing the specified device_command.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deviceCommand = $this->deviceCommandRepository->find($id);

        if (empty($deviceCommand)) {
            Flash::error('Device Command not found');

            return redirect(route('deviceCommands.index'));
        }

        return view('device_commands.edit')->with('deviceCommand', $deviceCommand);
    }

    /**
     * Update the specified device_command in storage.
     *
     * @param int $id
     * @param Updatedevice_commandRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedevice_commandRequest $request)
    {
        $deviceCommand = $this->deviceCommandRepository->find($id);

        if (empty($deviceCommand)) {
            Flash::error('Device Command not found');

            return redirect(route('deviceCommands.index'));
        }

        $deviceCommand = $this->deviceCommandRepository->update($request->all(), $id);

        Flash::success('Device Command updated successfully.');

        return redirect(route('deviceCommands.index'));
    }

    /**
     * Remove the specified device_command from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deviceCommand = $this->deviceCommandRepository->find($id);

        if (empty($deviceCommand)) {
            Flash::error('Device Command not found');

            return redirect(route('deviceCommands.index'));
        }

        $this->deviceCommandRepository->delete($id);

        Flash::success('Device Command deleted successfully.');

        return redirect(route('deviceCommands.index'));
    }
}

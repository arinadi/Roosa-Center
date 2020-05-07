<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdevice_data_categoriesRequest;
use App\Http\Requests\Updatedevice_data_categoriesRequest;
use App\Repositories\device_data_categoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class device_data_categoriesController extends AppBaseController
{
    /** @var  device_data_categoriesRepository */
    private $deviceDataCategoriesRepository;

    public function __construct(device_data_categoriesRepository $deviceDataCategoriesRepo)
    {
        $this->deviceDataCategoriesRepository = $deviceDataCategoriesRepo;
    }

    /**
     * Display a listing of the device_data_categories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $deviceDataCategories = $this->deviceDataCategoriesRepository->all();

        return view('device_data_categories.index')
            ->with('deviceDataCategories', $deviceDataCategories);
    }

    /**
     * Show the form for creating a new device_data_categories.
     *
     * @return Response
     */
    public function create()
    {
        return view('device_data_categories.create');
    }

    /**
     * Store a newly created device_data_categories in storage.
     *
     * @param Createdevice_data_categoriesRequest $request
     *
     * @return Response
     */
    public function store(Createdevice_data_categoriesRequest $request)
    {
        $input = $request->all();

        $deviceDataCategories = $this->deviceDataCategoriesRepository->create($input);

        Flash::success('Device Data Categories saved successfully.');

        return redirect(route('deviceDataCategories.index'));
    }

    /**
     * Display the specified device_data_categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deviceDataCategories = $this->deviceDataCategoriesRepository->find($id);

        if (empty($deviceDataCategories)) {
            Flash::error('Device Data Categories not found');

            return redirect(route('deviceDataCategories.index'));
        }

        return view('device_data_categories.show')->with('deviceDataCategories', $deviceDataCategories);
    }

    /**
     * Show the form for editing the specified device_data_categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deviceDataCategories = $this->deviceDataCategoriesRepository->find($id);

        if (empty($deviceDataCategories)) {
            Flash::error('Device Data Categories not found');

            return redirect(route('deviceDataCategories.index'));
        }

        return view('device_data_categories.edit')->with('deviceDataCategories', $deviceDataCategories);
    }

    /**
     * Update the specified device_data_categories in storage.
     *
     * @param int $id
     * @param Updatedevice_data_categoriesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedevice_data_categoriesRequest $request)
    {
        $deviceDataCategories = $this->deviceDataCategoriesRepository->find($id);

        if (empty($deviceDataCategories)) {
            Flash::error('Device Data Categories not found');

            return redirect(route('deviceDataCategories.index'));
        }

        $deviceDataCategories = $this->deviceDataCategoriesRepository->update($request->all(), $id);

        Flash::success('Device Data Categories updated successfully.');

        return redirect(route('deviceDataCategories.index'));
    }

    /**
     * Remove the specified device_data_categories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deviceDataCategories = $this->deviceDataCategoriesRepository->find($id);

        if (empty($deviceDataCategories)) {
            Flash::error('Device Data Categories not found');

            return redirect(route('deviceDataCategories.index'));
        }

        $this->deviceDataCategoriesRepository->delete($id);

        Flash::success('Device Data Categories deleted successfully.');

        return redirect(route('deviceDataCategories.index'));
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdevice_data_categoriesAPIRequest;
use App\Http\Requests\API\Updatedevice_data_categoriesAPIRequest;
use App\Models\device_data_categories;
use App\Repositories\device_data_categoriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class device_data_categoriesController
 * @package App\Http\Controllers\API
 */

class device_data_categoriesAPIController extends AppBaseController
{
    /** @var  device_data_categoriesRepository */
    private $deviceDataCategoriesRepository;

    public function __construct(device_data_categoriesRepository $deviceDataCategoriesRepo)
    {
        $this->deviceDataCategoriesRepository = $deviceDataCategoriesRepo;
    }

    /**
     * Display a listing of the device_data_categories.
     * GET|HEAD /deviceDataCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $deviceDataCategories = $this->deviceDataCategoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($deviceDataCategories->toArray(), 'Device Data Categories retrieved successfully');
    }

    /**
     * Store a newly created device_data_categories in storage.
     * POST /deviceDataCategories
     *
     * @param Createdevice_data_categoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createdevice_data_categoriesAPIRequest $request)
    {
        $input = $request->all();

        $deviceDataCategories = $this->deviceDataCategoriesRepository->create($input);

        return $this->sendResponse($deviceDataCategories->toArray(), 'Device Data Categories saved successfully');
    }

    /**
     * Display the specified device_data_categories.
     * GET|HEAD /deviceDataCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var device_data_categories $deviceDataCategories */
        $deviceDataCategories = $this->deviceDataCategoriesRepository->find($id);

        if (empty($deviceDataCategories)) {
            return $this->sendError('Device Data Categories not found');
        }

        return $this->sendResponse($deviceDataCategories->toArray(), 'Device Data Categories retrieved successfully');
    }

    /**
     * Update the specified device_data_categories in storage.
     * PUT/PATCH /deviceDataCategories/{id}
     *
     * @param int $id
     * @param Updatedevice_data_categoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedevice_data_categoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var device_data_categories $deviceDataCategories */
        $deviceDataCategories = $this->deviceDataCategoriesRepository->find($id);

        if (empty($deviceDataCategories)) {
            return $this->sendError('Device Data Categories not found');
        }

        $deviceDataCategories = $this->deviceDataCategoriesRepository->update($input, $id);

        return $this->sendResponse($deviceDataCategories->toArray(), 'device_data_categories updated successfully');
    }

    /**
     * Remove the specified device_data_categories from storage.
     * DELETE /deviceDataCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var device_data_categories $deviceDataCategories */
        $deviceDataCategories = $this->deviceDataCategoriesRepository->find($id);

        if (empty($deviceDataCategories)) {
            return $this->sendError('Device Data Categories not found');
        }

        $deviceDataCategories->delete();

        return $this->sendSuccess('Device Data Categories deleted successfully');
    }
}

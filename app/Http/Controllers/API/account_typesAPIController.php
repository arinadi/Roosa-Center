<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createaccount_typesAPIRequest;
use App\Http\Requests\API\Updateaccount_typesAPIRequest;
use App\Models\account_types;
use App\Repositories\account_typesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class account_typesController
 * @package App\Http\Controllers\API
 */

class account_typesAPIController extends AppBaseController
{
    /** @var  account_typesRepository */
    private $accountTypesRepository;

    public function __construct(account_typesRepository $accountTypesRepo)
    {
        $this->accountTypesRepository = $accountTypesRepo;
    }

    /**
     * Display a listing of the account_types.
     * GET|HEAD /accountTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $accountTypes = $this->accountTypesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($accountTypes->toArray(), 'Account Types retrieved successfully');
    }

    /**
     * Store a newly created account_types in storage.
     * POST /accountTypes
     *
     * @param Createaccount_typesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createaccount_typesAPIRequest $request)
    {
        $input = $request->all();

        $accountTypes = $this->accountTypesRepository->create($input);

        return $this->sendResponse($accountTypes->toArray(), 'Account Types saved successfully');
    }

    /**
     * Display the specified account_types.
     * GET|HEAD /accountTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var account_types $accountTypes */
        $accountTypes = $this->accountTypesRepository->find($id);

        if (empty($accountTypes)) {
            return $this->sendError('Account Types not found');
        }

        return $this->sendResponse($accountTypes->toArray(), 'Account Types retrieved successfully');
    }

    /**
     * Update the specified account_types in storage.
     * PUT/PATCH /accountTypes/{id}
     *
     * @param int $id
     * @param Updateaccount_typesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateaccount_typesAPIRequest $request)
    {
        $input = $request->all();

        /** @var account_types $accountTypes */
        $accountTypes = $this->accountTypesRepository->find($id);

        if (empty($accountTypes)) {
            return $this->sendError('Account Types not found');
        }

        $accountTypes = $this->accountTypesRepository->update($input, $id);

        return $this->sendResponse($accountTypes->toArray(), 'account_types updated successfully');
    }

    /**
     * Remove the specified account_types from storage.
     * DELETE /accountTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var account_types $accountTypes */
        $accountTypes = $this->accountTypesRepository->find($id);

        if (empty($accountTypes)) {
            return $this->sendError('Account Types not found');
        }

        $accountTypes->delete();

        return $this->sendSuccess('Account Types deleted successfully');
    }
}

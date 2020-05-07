<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createaccount_typesRequest;
use App\Http\Requests\Updateaccount_typesRequest;
use App\Repositories\account_typesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class account_typesController extends AppBaseController
{
    /** @var  account_typesRepository */
    private $accountTypesRepository;

    public function __construct(account_typesRepository $accountTypesRepo)
    {
        $this->accountTypesRepository = $accountTypesRepo;
    }

    /**
     * Display a listing of the account_types.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $accountTypes = $this->accountTypesRepository->all();

        return view('account_types.index')
            ->with('accountTypes', $accountTypes);
    }

    /**
     * Show the form for creating a new account_types.
     *
     * @return Response
     */
    public function create()
    {
        return view('account_types.create');
    }

    /**
     * Store a newly created account_types in storage.
     *
     * @param Createaccount_typesRequest $request
     *
     * @return Response
     */
    public function store(Createaccount_typesRequest $request)
    {
        $input = $request->all();

        $accountTypes = $this->accountTypesRepository->create($input);

        Flash::success('Account Types saved successfully.');

        return redirect(route('accountTypes.index'));
    }

    /**
     * Display the specified account_types.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountTypes = $this->accountTypesRepository->find($id);

        if (empty($accountTypes)) {
            Flash::error('Account Types not found');

            return redirect(route('accountTypes.index'));
        }

        return view('account_types.show')->with('accountTypes', $accountTypes);
    }

    /**
     * Show the form for editing the specified account_types.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountTypes = $this->accountTypesRepository->find($id);

        if (empty($accountTypes)) {
            Flash::error('Account Types not found');

            return redirect(route('accountTypes.index'));
        }

        return view('account_types.edit')->with('accountTypes', $accountTypes);
    }

    /**
     * Update the specified account_types in storage.
     *
     * @param int $id
     * @param Updateaccount_typesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateaccount_typesRequest $request)
    {
        $accountTypes = $this->accountTypesRepository->find($id);

        if (empty($accountTypes)) {
            Flash::error('Account Types not found');

            return redirect(route('accountTypes.index'));
        }

        $accountTypes = $this->accountTypesRepository->update($request->all(), $id);

        Flash::success('Account Types updated successfully.');

        return redirect(route('accountTypes.index'));
    }

    /**
     * Remove the specified account_types from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountTypes = $this->accountTypesRepository->find($id);

        if (empty($accountTypes)) {
            Flash::error('Account Types not found');

            return redirect(route('accountTypes.index'));
        }

        $this->accountTypesRepository->delete($id);

        Flash::success('Account Types deleted successfully.');

        return redirect(route('accountTypes.index'));
    }
}

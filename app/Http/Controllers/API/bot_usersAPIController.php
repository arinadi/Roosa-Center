<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createbot_usersAPIRequest;
use App\Http\Requests\API\Updatebot_usersAPIRequest;
use App\Models\bot_users;
use App\Repositories\bot_usersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class bot_usersController
 * @package App\Http\Controllers\API
 */

class bot_usersAPIController extends AppBaseController
{
    /** @var  bot_usersRepository */
    private $botUsersRepository;

    public function __construct(bot_usersRepository $botUsersRepo)
    {
        $this->botUsersRepository = $botUsersRepo;
    }

    /**
     * Display a listing of the bot_users.
     * GET|HEAD /botUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $botUsers = $this->botUsersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($botUsers->toArray(), 'Bot Users retrieved successfully');
    }

    /**
     * Store a newly created bot_users in storage.
     * POST /botUsers
     *
     * @param Createbot_usersAPIRequest $request
     *
     * @return Response
     */
    public function store(Createbot_usersAPIRequest $request)
    {
        $input = $request->all();

        $botUsers = $this->botUsersRepository->create($input);

        return $this->sendResponse($botUsers->toArray(), 'Bot Users saved successfully');
    }

    /**
     * Display the specified bot_users.
     * GET|HEAD /botUsers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var bot_users $botUsers */
        $botUsers = $this->botUsersRepository->find($id);

        if (empty($botUsers)) {
            return $this->sendError('Bot Users not found');
        }

        return $this->sendResponse($botUsers->toArray(), 'Bot Users retrieved successfully');
    }

    /**
     * Update the specified bot_users in storage.
     * PUT/PATCH /botUsers/{id}
     *
     * @param int $id
     * @param Updatebot_usersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatebot_usersAPIRequest $request)
    {
        $input = $request->all();

        /** @var bot_users $botUsers */
        $botUsers = $this->botUsersRepository->find($id);

        if (empty($botUsers)) {
            return $this->sendError('Bot Users not found');
        }

        $botUsers = $this->botUsersRepository->update($input, $id);

        return $this->sendResponse($botUsers->toArray(), 'bot_users updated successfully');
    }

    /**
     * Remove the specified bot_users from storage.
     * DELETE /botUsers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var bot_users $botUsers */
        $botUsers = $this->botUsersRepository->find($id);

        if (empty($botUsers)) {
            return $this->sendError('Bot Users not found');
        }

        $botUsers->delete();

        return $this->sendSuccess('Bot Users deleted successfully');
    }
}

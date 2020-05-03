<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtelegram_usersAPIRequest;
use App\Http\Requests\API\Updatetelegram_usersAPIRequest;
use App\Models\telegram_users;
use App\Repositories\telegram_usersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class telegram_usersController
 * @package App\Http\Controllers\API
 */

class telegram_usersAPIController extends AppBaseController
{
    /** @var  telegram_usersRepository */
    private $telegramUsersRepository;

    public function __construct(telegram_usersRepository $telegramUsersRepo)
    {
        $this->telegramUsersRepository = $telegramUsersRepo;
    }

    /**
     * Display a listing of the telegram_users.
     * GET|HEAD /telegramUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $telegramUsers = $this->telegramUsersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($telegramUsers->toArray(), 'Telegram Users retrieved successfully');
    }

    /**
     * Store a newly created telegram_users in storage.
     * POST /telegramUsers
     *
     * @param Createtelegram_usersAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtelegram_usersAPIRequest $request)
    {
        $input = $request->all();

        $telegramUsers = $this->telegramUsersRepository->create($input);

        return $this->sendResponse($telegramUsers->toArray(), 'Telegram Users saved successfully');
    }

    /**
     * Display the specified telegram_users.
     * GET|HEAD /telegramUsers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var telegram_users $telegramUsers */
        $telegramUsers = $this->telegramUsersRepository->find($id);

        if (empty($telegramUsers)) {
            return $this->sendError('Telegram Users not found');
        }

        return $this->sendResponse($telegramUsers->toArray(), 'Telegram Users retrieved successfully');
    }

    /**
     * Update the specified telegram_users in storage.
     * PUT/PATCH /telegramUsers/{id}
     *
     * @param int $id
     * @param Updatetelegram_usersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetelegram_usersAPIRequest $request)
    {
        $input = $request->all();

        /** @var telegram_users $telegramUsers */
        $telegramUsers = $this->telegramUsersRepository->find($id);

        if (empty($telegramUsers)) {
            return $this->sendError('Telegram Users not found');
        }

        $telegramUsers = $this->telegramUsersRepository->update($input, $id);

        return $this->sendResponse($telegramUsers->toArray(), 'telegram_users updated successfully');
    }

    /**
     * Remove the specified telegram_users from storage.
     * DELETE /telegramUsers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var telegram_users $telegramUsers */
        $telegramUsers = $this->telegramUsersRepository->find($id);

        if (empty($telegramUsers)) {
            return $this->sendError('Telegram Users not found');
        }

        $telegramUsers->delete();

        return $this->sendSuccess('Telegram Users deleted successfully');
    }
}

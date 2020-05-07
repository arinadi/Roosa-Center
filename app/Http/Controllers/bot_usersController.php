<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createbot_usersRequest;
use App\Http\Requests\Updatebot_usersRequest;
use App\Repositories\bot_usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class bot_usersController extends AppBaseController
{
    /** @var  bot_usersRepository */
    private $botUsersRepository;

    public function __construct(bot_usersRepository $botUsersRepo)
    {
        $this->botUsersRepository = $botUsersRepo;
    }

    /**
     * Display a listing of the bot_users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $botUsers = $this->botUsersRepository->all();

        return view('bot_users.index')
            ->with('botUsers', $botUsers);
    }

    /**
     * Show the form for creating a new bot_users.
     *
     * @return Response
     */
    public function create()
    {
        return view('bot_users.create');
    }

    /**
     * Store a newly created bot_users in storage.
     *
     * @param Createbot_usersRequest $request
     *
     * @return Response
     */
    public function store(Createbot_usersRequest $request)
    {
        $input = $request->all();

        $botUsers = $this->botUsersRepository->create($input);

        Flash::success('Bot Users saved successfully.');

        return redirect(route('botUsers.index'));
    }

    /**
     * Display the specified bot_users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $botUsers = $this->botUsersRepository->find($id);

        if (empty($botUsers)) {
            Flash::error('Bot Users not found');

            return redirect(route('botUsers.index'));
        }

        return view('bot_users.show')->with('botUsers', $botUsers);
    }

    /**
     * Show the form for editing the specified bot_users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $botUsers = $this->botUsersRepository->find($id);

        if (empty($botUsers)) {
            Flash::error('Bot Users not found');

            return redirect(route('botUsers.index'));
        }

        return view('bot_users.edit')->with('botUsers', $botUsers);
    }

    /**
     * Update the specified bot_users in storage.
     *
     * @param int $id
     * @param Updatebot_usersRequest $request
     *
     * @return Response
     */
    public function update($id, Updatebot_usersRequest $request)
    {
        $botUsers = $this->botUsersRepository->find($id);

        if (empty($botUsers)) {
            Flash::error('Bot Users not found');

            return redirect(route('botUsers.index'));
        }

        $botUsers = $this->botUsersRepository->update($request->all(), $id);

        Flash::success('Bot Users updated successfully.');

        return redirect(route('botUsers.index'));
    }

    /**
     * Remove the specified bot_users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $botUsers = $this->botUsersRepository->find($id);

        if (empty($botUsers)) {
            Flash::error('Bot Users not found');

            return redirect(route('botUsers.index'));
        }

        $this->botUsersRepository->delete($id);

        Flash::success('Bot Users deleted successfully.');

        return redirect(route('botUsers.index'));
    }
}

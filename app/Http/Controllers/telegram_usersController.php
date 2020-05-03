<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtelegram_usersRequest;
use App\Http\Requests\Updatetelegram_usersRequest;
use App\Repositories\telegram_usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class telegram_usersController extends AppBaseController
{
    /** @var  telegram_usersRepository */
    private $telegramUsersRepository;

    public function __construct(telegram_usersRepository $telegramUsersRepo)
    {
        $this->telegramUsersRepository = $telegramUsersRepo;
    }

    /**
     * Display a listing of the telegram_users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $telegramUsers = $this->telegramUsersRepository->all();

        return view('telegram_users.index')
            ->with('telegramUsers', $telegramUsers);
    }

    /**
     * Show the form for creating a new telegram_users.
     *
     * @return Response
     */
    public function create()
    {
        return view('telegram_users.create');
    }

    /**
     * Store a newly created telegram_users in storage.
     *
     * @param Createtelegram_usersRequest $request
     *
     * @return Response
     */
    public function store(Createtelegram_usersRequest $request)
    {
        $input = $request->all();

        $telegramUsers = $this->telegramUsersRepository->create($input);

        Flash::success('Telegram Users saved successfully.');

        return redirect(route('telegramUsers.index'));
    }

    /**
     * Display the specified telegram_users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $telegramUsers = $this->telegramUsersRepository->find($id);

        if (empty($telegramUsers)) {
            Flash::error('Telegram Users not found');

            return redirect(route('telegramUsers.index'));
        }

        return view('telegram_users.show')->with('telegramUsers', $telegramUsers);
    }

    /**
     * Show the form for editing the specified telegram_users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $telegramUsers = $this->telegramUsersRepository->find($id);

        if (empty($telegramUsers)) {
            Flash::error('Telegram Users not found');

            return redirect(route('telegramUsers.index'));
        }

        return view('telegram_users.edit')->with('telegramUsers', $telegramUsers);
    }

    /**
     * Update the specified telegram_users in storage.
     *
     * @param int $id
     * @param Updatetelegram_usersRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetelegram_usersRequest $request)
    {
        $telegramUsers = $this->telegramUsersRepository->find($id);

        if (empty($telegramUsers)) {
            Flash::error('Telegram Users not found');

            return redirect(route('telegramUsers.index'));
        }

        $telegramUsers = $this->telegramUsersRepository->update($request->all(), $id);

        Flash::success('Telegram Users updated successfully.');

        return redirect(route('telegramUsers.index'));
    }

    /**
     * Remove the specified telegram_users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $telegramUsers = $this->telegramUsersRepository->find($id);

        if (empty($telegramUsers)) {
            Flash::error('Telegram Users not found');

            return redirect(route('telegramUsers.index'));
        }

        $this->telegramUsersRepository->delete($id);

        Flash::success('Telegram Users deleted successfully.');

        return redirect(route('telegramUsers.index'));
    }
}

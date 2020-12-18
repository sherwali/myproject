<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Grade;
use App\Models\Session;
use Illuminate\Http\Request;
use Flash;
use PhpParser\Node\Stmt\Foreach_;
use Response;

class SessionController extends AppBaseController
{
    /**
     * Display a listing of the Session.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Session $sessions */
        $sessions = Session::all();

        return view('sessions.index')
            ->with('sessions', $sessions);
    }

    /**
     * Show the form for creating a new Session.
     *
     * @return Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created Session in storage.
     *
     * @param CreateSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateSessionRequest $request)
    {
        $input = $request->all();

        /** @var Session $session */
        $session = Session::create($input);

        $grades = Grade::all();

        foreach($grades as $grade){
            $session->grades()->attach($grade);
        }

        Flash::success('Session saved successfully.');

        return redirect(route('sessions.index'));
    }

    /**
     * Display the specified Session.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Session $session */
        $session = Session::find($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('sessions.index'));
        }

        return view('sessions.show')->with('session', $session);
    }

    /**
     * Show the form for editing the specified Session.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Session $session */
        $session = Session::find($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('sessions.index'));
        }

        return view('sessions.edit')->with('session', $session);
    }

    /**
     * Update the specified Session in storage.
     *
     * @param int $id
     * @param UpdateSessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSessionRequest $request)
    {
        /** @var Session $session */
        $session = Session::find($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('sessions.index'));
        }

        $session->fill($request->all());
        $session->save();

        Flash::success('Session updated successfully.');

        return redirect(route('sessions.index'));
    }

    /**
     * Remove the specified Session from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Session $session */
        $session = Session::find($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('sessions.index'));
        }

        $session->delete();

        Flash::success('Session deleted successfully.');

        return redirect(route('sessions.index'));
    }
}

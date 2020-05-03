<?php

namespace App\Http\Controllers;

use App\Club;
use App\Http\Requests\ClubStoreRequest;
use App\Http\Requests\ClubUpdateRequest;
use App\Services\ClubService;
use App\Services\UserService;

class ClubController extends Controller
{
    /**
     * @var ClubService $clubService
     */
    private $clubService;

    /**
     * @var UserService $userService
     */
    private $userService;

    /**
     * ClubController constructor.
     * @param ClubService $clubService
     * @param UserService $userService
     */
    public function __construct(ClubService $clubService, UserService $userService)
    {
        parent::__construct();
        $this->clubService = $clubService;
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = $this->clubService->findAll(self::ITEM_PER_PAGE);

        return view('dashboard.clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userService->getSelectItems();

        return view('dashboard.clubs.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClubStoreRequest $request)
    {
        $club = $this->clubService->store($request->all());

        $this->alertService->saveAlert($club);

        return redirect()->route('dm.admin.clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param string $domain
     * @param Club $club
     * @return void
     */
    public function show(string $domain, Club $club)
    {
        return view('dashboard.clubs.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $domain
     * @param Club $club
     * @return void
     */
    public function edit(string $domain, Club $club)
    {
        $users = $this->userService->getSelectItems();

        return view('dashboard.clubs.edit', compact('club', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClubUpdateRequest $request
     * @param string $domain
     * @param Club $club
     * @return \Illuminate\Http\Response
     */
    public function update(ClubUpdateRequest $request, string $domain, Club $club)
    {
        try {
            $this->clubService->update($club, $request->all());
            $this->alertService->updateAlert(true);
        } catch (\Exception $exception) {
            $this->alertService->updateAlert(false);
        }

        return redirect()->route('dm.admin.clubs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $domain
     * @param Club $club
     * @return void
     */
    public function destroy(string $domain, Club $club)
    {
        $isDeleted = $this->clubService->delete($club);

        $this->alertService->deleteAlert($isDeleted);

        return redirect()->route('dm.admin.clubs.index');
    }
}

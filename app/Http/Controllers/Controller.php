<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected const ITEM_PER_PAGE = 10;

    /**
     * @var AlertService $alertService
     */
    protected $alertService;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->alertService = App::make(AlertService::class);
    }
}

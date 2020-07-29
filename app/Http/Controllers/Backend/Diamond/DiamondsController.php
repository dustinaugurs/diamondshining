<?php

namespace App\Http\Controllers\Backend\Diamond;

use App\Models\Diamond\Diamond;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Diamond\CreateResponse;
use App\Http\Responses\Backend\Diamond\EditResponse;
use App\Repositories\Backend\Diamond\DiamondRepository;
use App\Http\Requests\Backend\Diamond\ManageDiamondRequest;

/**
 * DiamondsController
 */
class DiamondsController extends Controller
{
    /**
     * variable to store the repository object
     * @var DiamondRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param DiamondRepository $repository;
     */
    public function __construct(DiamondRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Diamond\ManageDiamondRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageDiamondRequest $request)
    {
        return new ViewResponse('backend.diamonds.index');
    }
    
}

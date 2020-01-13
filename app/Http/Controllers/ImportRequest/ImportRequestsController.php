<?php

namespace App\Http\Controllers\ImportRequest;

use App\Http\Controllers\Controller;
use App\Services\ImportRequests\ImportRequestService;
use Illuminate\Http\Request;

class ImportRequestsController extends Controller
{
    private $importRequestsService;

    /**
     * ImportRequestService using as service layer
     *
     * @param ImportRequestService $importRequestsService
     */
    public function __construct(ImportRequestService $importRequestsService)
    {
        $this->importRequestsService = $importRequestsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->importRequestsService->get();
        return view('MarsRoverPhotos.index', [
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->importRequestsService->register($request);
        return redirect()->route('import_request.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        $this->importRequestsService->truncate();
        return redirect()->route('import_request.index');
    }
}

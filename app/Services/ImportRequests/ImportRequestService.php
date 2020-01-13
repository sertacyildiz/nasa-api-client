<?php


namespace App\Services\ImportRequests;

use App\ImportRequest;
use App\MarsRoverPhoto;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

final class ImportRequestService
{
    /**
     *  Gets all import requests
     *
     * @return ImportRequest[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return ImportRequest::all();
    }

    /**
     *  Gets date period from the form on the request page and saves all import request dates to "import_requests" table
     *
     * @param Request $request
     */
    public function register(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $last = ImportRequest::max('from_to_id');
        $from_to_id = $last + 1;

        $period = CarbonPeriod::create($from, $to);

        foreach ($period as $key => $value) {
            ImportRequest::query()->insert([
                'from_to_id' => $from_to_id,
                'day' => ($key + 1),
                'earth_date' => $value->format('Y-m-d')
            ]);
        }
    }

    /**
     *  Removes all records and truncates "import_requests" and "mars_rover_photos" tables
     *
     * @param Request $request
     */
    public function truncate()
    {
        ImportRequest::truncate();
        MarsRoverPhoto::truncate();
    }
}

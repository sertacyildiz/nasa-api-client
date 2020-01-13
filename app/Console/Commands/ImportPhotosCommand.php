<?php

namespace App\Console\Commands;

use App\ImportRequest;
use App\Services\MarsRoverPhotos\MarsRoverPhotosService;
use Illuminate\Console\Command;

class ImportPhotosCommand extends Command
{
    private $mars_rover_photos_service;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Mars Rover Photos between specified dates';

    /**
     * Create a new command instance.
     *
     * @param MarsRoverPhotosService $mars_rover_photos_service
     */
    public function __construct(MarsRoverPhotosService $mars_rover_photos_service)
    {
        parent::__construct();
        $this->mars_rover_photos_service = $mars_rover_photos_service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $import_requests = ImportRequest::where('status', ImportRequest::STATUS_WAITING)->get();

        $this->info('Import process starting...');
        foreach ($import_requests as $import_request){
            $this->info('Earth Date: ' . $import_request->earth_date);

            // Import all requested photos and save to DB
            $this->mars_rover_photos_service->register($import_request);

            // Update import request status from "Waiting" to "Imported"
            ImportRequest::where(
                ['from_to_id' => $import_request->from_to_id, 'day' => $import_request->day]
            )->update(['status' => ImportRequest::STATUS_IMPORTED]);
        }
    }
}

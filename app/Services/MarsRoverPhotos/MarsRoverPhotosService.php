<?php


namespace App\Services\MarsRoverPhotos;

use App\MarsRoverPhoto;
use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;

final class MarsRoverPhotosService
{
    /**
     * Instance of the http client.
     *
     * @var HttpClient
     */
    private $client;

    /**
     * Ping constructor.
     *
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Imports mars rover photos' source with api client and saves all to "mars_rover_photos" table
     *
     * @param $import_request
     */
    public function register($import_request)
    {
        $mars_rover_photos = MarsRoverPhoto::query()->where('earth_date', $import_request->earth_date);
        if (!$mars_rover_photos->exists()) {
            // if records doesn't exist by earth_date, create new records
            $photos = $this->client($import_request->earth_date);
            foreach ($photos as $photo) {
                $array = [
                    'img_id' => $photo['id'],
                    'img_src' => $photo['img_src'],
                    'earth_date' => $photo['earth_date']
                ];

                MarsRoverPhoto::query()->insert($array);
            }

        }
    }

    /**
     * Gets mars rover photos through the nasa api by "earth_date" and "api_key
     *
     * @param $earth_date
     *
     * @return
     */
    public function client($earth_date)
    {
        $params = '?earth_date=' . $earth_date . '&api_key=' . config('services.nasa.api_key');
        $request = new Request('get', config('app.api_url') . 'rovers/curiosity/photos' . $params);
        try {
            $response = $this->client->send($request);
        } catch (Exception $e) {
            dd($e);
        }
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['photos'];
    }

}

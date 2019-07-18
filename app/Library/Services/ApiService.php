<?php


namespace App\Library\Services;


use App\Contracts\ApiServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\App;

/**
 * Class PeopleService
 * @package App\Library\Services
 */
final class ApiService implements ApiServiceInterface
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var mixed
     */
    private $requestUrl;

    /**
     * PeopleService constructor.
     */
    public function __construct()
    {
        $this->client = App::make('GuzzleHttp\Client');
        $this->requestUrl = env('SWAPI_BASE_URL');
    }

    /**
     * @param string $entity
     * @param int $page
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(string $entity = 'people', int $page = 1): Response
    {
        $res = $this->makeRequest( $this->requestUrl . $entity . '/?page=' . $page);
        return $res;
    }

    /**
     * @param string $entity
     * @param int $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $entity = 'people', int $id = 0): Response
    {
        $res = $this->makeRequest($this->requestUrl . $entity . '/' . $id);
        return $res;
    }

    /**
     * @param string $request
     * @param string $type
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function makeRequest( string $request = '', string $type = "get"): Response
    {
        return $this->client->request(strtoupper($type), $request);
    }
}
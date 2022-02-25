<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class MoviesController extends Controller {

    private $api_url;
    private $api_password;

    public function __construct() {
        $this->api_url = 'http://127.0.0.1:8012/api/movies/'; // localhost API endpoint
        $this->api_password = 'MoviesAppLorraineSenturias'; // For API Authentication and can be found on .env
    }

    public function index() {

        return view('welcome');
    }

    public function getAllItems() {
        $movies = Movies::all();

        if ( $movies ) {
            return response()->json(['movies' => $movies], 200);
        } else {
            return response()->json(['message' => 'No products found!'], 404);
        }
    }

    public function getItem( $id ) {
        $movies = Movies::find($id);

        if ( $movies ) {
            return response()->json(['movies' => $movies], 200);
        } else {
            return response()->json(['message' => 'No product found!'], 404);
        }
    }

    public function allMovies() {
        $client = new Client();
        $request = $client->get("{$this->api_url}getAllItems?api_password={$this->api_password}");
        $response = $request->getBody();
        $data = json_decode($response);

        return view('all_movies', ['movies' => $data->movies]);
    }

    public function singleMovie( $id ) {
        $client = new Client();
        $request = $client->get("{$this->api_url}{$id}/getItem?api_password={$this->api_password}");
        $response = $request->getBody();
        $data = json_decode($response);

        return view('single_movie', ['data' => $data->movies]);
    }
}

<?php

namespace App\Controllers;

use GuzzleHttp\Client;

use Symfony\Component\Routing\RouteCollection;

class ShowController
{
    // Homepage action
    public function showAction($id, RouteCollection $routes)
    {

        define('BASE_URI', 'https://pokeapi.co/api/v2/');
        $client = new Client(['verify' => false]);
        if (isset($_GET['url'])) {
            $response = $client->request('GET', $_GET['url']);
        } else {
            $response = $client->request('GET',  BASE_URI . 'pokemon/' .  $id);
        }
        $pokemon = json_decode($response->getBody()->getContents(), true);
        /*
        echo '<pre>';
        var_dump($pokemon);
        echo '</pre>';
        */
        $abilities = array();


        // echo '<pre>';
        // var_dump($pokemon['abilities']);
        // echo '</pre>';


        foreach ($pokemon['abilities'] as $ability) {
            $ability = $ability['ability'];
            $abilityUrlExplode = explode("/", $ability['url']);
            $spliced = array_splice($abilityUrlExplode, 0, -1);
            $abilityId = end($spliced);
            $abilities[$abilityId] = array('name' => $ability['name']);
        }


        $pokemonSingle = array(
            'name' => $pokemon['name'],
            'abilities' => $abilities,
            'cover' => $pokemon['sprites']['front_default'],
            'id' => $pokemon['id'],
            'abilities' => $pokemon['abilities'],
            'order' => $pokemon['order'],
            'height' => $pokemon['height'],
            'base_experience' => $pokemon['base_experience'],


        );

        require_once APP_ROOT . '/views/show.php';
    }
}

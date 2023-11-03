<?php

namespace App\Controllers;

use GuzzleHttp\Client;

use Symfony\Component\Routing\RouteCollection;

class HomeController
{
	// Homepage action
	public function indexAction(RouteCollection $routes)
	{
		define('BASE_URI','https://pokeapi.co/api/v2/');
		// Create a client with a base URI
		$client = new Client();
		// Send a request to https://foo.com/api/test
		$response = $client->request('GET', BASE_URI.'pokemon', ['query' => ['limit' => 12]]);
		
		$pokemonList = json_decode($response->getBody()->getContents(), true)['results'];
		$pokemonArray = [];
		foreach($pokemonList as $pokemon) {
			$url = $pokemon['url'];
			$pokemonDataObj= $client->request('GET', $url);
			$pokemonData = json_decode($pokemonDataObj->getBody()->getContents(), true);
			$abilities = array();
			foreach($pokemonData['abilities'] as $ability) {
				$ability = $ability['ability'];
				$abilityUrlExplode = explode("/",$ability['url']);
				
				$spliced = array_splice($abilityUrlExplode, 0,-1);
				$abilityId = end($spliced);
				$abilities[$abilityId] = array('name' => $ability['name']);
			}
			$pokemonArray[$pokemonData['id']] = array(
				'name' => $pokemonData['name'],
				'abilities' => $abilities 
			);
			
 		}
		 echo '<pre>';
		 var_dump($pokemonArray);
		 echo '</pre>';
		require_once APP_ROOT . '/views/home.php';
	}
}

<?php

namespace App\Controllers;

use GuzzleHttp\Client;

use Symfony\Component\Routing\RouteCollection;

class HomeController
{
	// Homepage action
	public function indexAction($p, RouteCollection $routes)
	{
		define('BASE_URI', 'https://pokeapi.co/api/v2/');
		// Create a client with a base URI
		$client = new Client(['verify' => false]);
		// Send a request to https://foo.com/api/test
		if (isset($_GET['url'])) {
			$response = $client->request('GET', $_GET['url']);
		} else {
			$response = $client->request('GET', BASE_URI . 'pokemon', ['query' => ['limit' => 6]]);
		}
		$responseDecoded = json_decode($response->getBody()->getContents(), true);

		$prevLink = $responseDecoded['previous'] ? "/" . --$p . '?url=' . urlencode($responseDecoded['previous']) : '#';
		$nextLink = $responseDecoded['next'] ? "/" . ++$p . '?url=' . urlencode($responseDecoded['next']) : '#';

		$pokemonList = $responseDecoded['results'];
		$pokemonArray = [];
		foreach ($pokemonList as $pokemon) {
			$url = $pokemon['url'];
			$pokemonDataObj = $client->request('GET', $url);
			$pokemonData = json_decode($pokemonDataObj->getBody()->getContents(), true);
			$abilities = array();
			foreach ($pokemonData['abilities'] as $ability) {
				$ability = $ability['ability'];
				$abilityUrlExplode = explode("/", $ability['url']);

				$spliced = array_splice($abilityUrlExplode, 0, -1);
				$abilityId = end($spliced);
				$abilities[$abilityId] = array('name' => $ability['name']);
			}
			$pokemonArray[$pokemonData['id']] = array(
				'name' => $pokemonData['name'],
				'abilities' => $abilities,
				'cover' => $pokemonData['sprites']['front_default'],
				'id' => $pokemonData['id']
			);
		}


		$pokemonAbilitySingle = [];
		foreach ($pokemonArray as $pkey => $pokemon) {
			foreach ($pokemon['abilities'] as $akey => $ability) {
				if (!in_array($akey, $pokemonAbilitySingle)) {
					$pokemonAbilitySingle[] = $akey;
				}
			}
		}
		$pokemonAbilitySingleDetails = [];

		foreach ($pokemonAbilitySingle as $ability_id) {
			$response = $client->request('GET', BASE_URI . "ability/$ability_id");
			$abilityDetail = json_decode($response->getBody()->getContents(), true);
			$pokemonAbilitySingleDetails[$ability_id] = $abilityDetail;
		}

		foreach ($pokemonArray as &$p) {
			foreach ($p['abilities'] as $ak => &$a) {
				$a = array_merge($a, $pokemonAbilitySingleDetails[$ak]);
			}
		}

		require_once APP_ROOT . '/views/home.php';
	}
}

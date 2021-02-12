<?php

//first, declare necessary class and functions to handle pokemon and API

const MAX_POKEMON = 898;
const POKEAPI_REF = 'https://pokeapi.co/api/v2';

$currentPokemon = null;


class Pokemon
{
    public string $name = 'myName';
    public int $id = 0;

    public array $moves = [];
    public array $sprites = [];

    public int $height = 0;
    public int $weight = 0;

    function __construct($pokemonApi)
    {
        //get all relevant information from the API
        $this->name = $pokemonApi['name'];
        $this->id = $pokemonApi['id'];

        for ($i = 0; $i < count($pokemonApi['moves']); $i++) {
            array_push($this->moves, $pokemonApi['moves'][$i]['move']['name']);
        }

        $this->sprites = $pokemonApi['sprites'];

        $this->height = $pokemonApi['height'];
        $this->weight = $pokemonApi['weight'];
    }

    public function getMoves(int $count = 4, bool $random = false): array
    {
        $myMoves = $this->moves;
        if ($random) shuffle($myMoves);

        return (array_slice($myMoves, 0, $count));
    }

    public function getFrontSprite(): string
    {
        return $this->sprites['front_default'];
    }

    public function getOfficialArtUrl(): string
    {
        return $this->sprites['other']['official-artwork']['front_default'];
    }

    public function getEvolutionaryChain(): array
    {
        $data = file_get_contents(POKEAPI_REF . '/pokemon-species/' . $this->id);
        $data = json_decode($data, true);

        $data = file_get_contents($data['evolution_chain']['url']);
        $data = json_decode($data, true);

        //$data now contains the full evolutionary chain data
        //next, begin parsing the array and figuring out whether there are evolutions
        if (count($data['chain']['evolves_to']) > 0) {
            //let's start putting all the data we need from the Json into a new array
            $chain = [];
            $chain[0] = [];
            $chain[0][0] = new Pokemon($data["chain"]["species"]["name"]);

            return $chain;
        } //oh no, no evolutions
        else {
            unset($data);
            return [];
        }
    }

}

function fetchPokemon($query): Pokemon
{
    $data = file_get_contents(POKEAPI_REF . '/pokemon/' . $query);
    $data = json_decode($data, true);
    $myPokemon = new Pokemon($data);
//    unset($data);
    return $myPokemon;
}

function secureValue($input) : string
{
    return htmlSpecialChars($input, ENT_NOQUOTES, 'UTF-8');
}

//get information from form
$pokeQuery = ($_GET["q"]);
if(!empty($pokeQuery))
{
    $pokeQuery = secureValue($pokeQuery);

    if ($idQuery = intval($pokeQuery)) {
        $pokeQuery = max(1, min($idQuery, MAX_POKEMON));
    }

    $currentPokemon = fetchPokemon($pokeQuery);
    $myMoves = $currentPokemon->getMoves(4, false);
}




//        var_dump($currentPokemon->getEvolutionaryChain());






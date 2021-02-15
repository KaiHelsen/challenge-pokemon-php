<?php

//first, declare necessary class and functions to handle pokemon and API

const MAX_POKEMON = 898;
const POKEAPI_REF = 'https://pokeapi.co/api/v2';


$evolutionArray = null;


class Pokemon
{
    public string $name;
    public int $id = 0;

    public array $moves = [];
    public array $sprites = [];

    public int $height = 0;
    public int $weight = 0;

    function __construct(string $name = '', int $id = 0, array $moves = [], array $sprites = [], int $height = 0, int $weight = 0)
    {
        $this->name = $name;
        $this->id = $id;
        $this->moves = $moves;
        $this->sprites = $sprites;
        $this->height = $height;
        $this->weight = $weight;
    }

    static function fetchPokemon($query): Pokemon
    {
        $data = file_get_contents(POKEAPI_REF . '/pokemon/' . $query);
        $data = json_decode($data, true);

        return new Pokemon($data['name'], $data['id'], $data['moves'], $data['sprites'], $data['height'], $data['weight']);
    }

    public function getMoves(int $moveCount = 4, bool $random = false): array
    {
        //get all moves and, if random is true, shuffle the array
        $myMoves = $this->moves;
        if ($random) shuffle($myMoves);

        //slice the array
        $newArray = array_slice($myMoves, 0, $moveCount);
        $newArray = array_map(function ($n)
        {
            return $n['move']['name'];
        }, $newArray);

        for ($i = 0; $i < $moveCount; $i++)
        {
            if (empty($myMoves[$i]))
            {
                $myMoves[$i] = 'X';
            }
        }


        return $newArray;
    }

    public function getFrontSprite(): string
    {
        if (!empty($this->sprites))
        {
            return secureValue($this->sprites['front_default']);
        } else return "";
    }

    public function getOfficialArtUrl(): string
    {
        if (!empty($this->sprites))
        {
            return secureValue($this->sprites['other']['official-artwork']['front_default']);
        } else return "";
    }

    public function getEvolutionaryChain(): array
    {
        $data = file_get_contents(POKEAPI_REF . '/pokemon-species/' . $this->id);
        $data = json_decode($data, true);

        $data = file_get_contents($data['evolution_chain']['url']);
        $data = json_decode($data, true);

        $chain = [[], [], []];
        //$data now contains the full evolutionary chain data
        //next, begin parsing the array and figuring out whether there are evolutions
        if (count($data['chain']['evolves_to']) > 0)
        {
            //let's start putting all the data we need from the Json into a new array
            //BRUTE FORCE APPROACH

            $chain[0][0] = Pokemon::fetchPokemon($data["chain"]["species"]["name"]);

            foreach ($data['chain']['evolves_to'] as $key => $element)
            {
                array_push($chain[1], Pokemon::fetchPokemon($element['species']['name']));
                foreach ($data['chain']['evolves_to'][$key]['evolves_to'] as $otherElement)
                {
                    array_push($chain[2], Pokemon::fetchPokemon($otherElement['species']['name']));
                }
            }

            //test if the chain is successful
//            echo $chain[0][0]->name;
//            echo ", ";
//            echo $chain[1][0]->name;
//            echo ", ";
//            echo $chain[2][0]->name;
            return $chain;
        } //oh no, no evolutions
        else
        {
            unset($data);
            return [];
        }
    }

}

/**
 * this function makes it so you don't have to do htmlSPecialChars ENT_NOQUOTES UTF-8 all the time.
 * @param string $input
 * @return string
 */
function secureValue(string $input): string
{
    return htmlSpecialChars($input, ENT_NOQUOTES, 'UTF-8');
}

//get information from form
if (isset($_GET["q"]))
{

    $pokeQuery = ($_GET["q"]);
    //start validating input
    //first, secure the input for the sake of safety and convenience
    $pokeQuery = secureValue($pokeQuery);

    //next
    $idQuery = (int)$pokeQuery;
    if ($idQuery != null)
    {

        $pokeQuery = max(1, min($idQuery, MAX_POKEMON));
    }

    $currentPokemon = Pokemon::fetchPokemon($pokeQuery);
    $myMoves = $currentPokemon->getMoves(4, false);
    $evolutionArray = $currentPokemon->getEvolutionaryChain();
} else
{
    $currentPokemon = new Pokemon();
//    echo("no input");
}





//        var_dump($currentPokemon->getEvolutionaryChain());






<?php
$currentPokemon = null;
$myMoves = null;
include("./resources/library/pokeDex.php");

?>

<div class="pokedex">
    <div class="left-container" id="left-container__cosmetics">
        <div class="left-container__top-section">
            <div class="top-section__green"></div>
            <div class="top-section__small-buttons">
                <div class="top-section__red" id="teamRed"></div>
                <div class="top-section__yellow" id="teamYellow"></div>
                <div class="top-section__blue" id="teamBlue"></div>
            </div>
        </div>
        <div class="left-container__main-section-container">
            <div class="left-container__main-section">
                <div class="main-section__white">
                    <div class="main-section__black">
                        <div class="main-screen hide">
                            <div class="screen__header">
                                <span class="poke-name"
                                      id="poke-display__name"><?php echo $currentPokemon->name; ?></span>
                                <span class="poke-id" id="poke-display__id"><?php echo $currentPokemon->id; ?></span>
                            </div>
                            <div class="screen__image">
                                <img src="<?php $url = $currentPokemon->getOfficialArtUrl();
                                echo !empty($url) ? $url : "" ?>" class="poke-front-image" alt="front"
                                     id="poke-display__img__front"></div>
                            <div class="screen__description">
                                <div class="stats__types">
                                    <span class="poke-type-one" id="poke__type__one"></span>
                                    <span class="poke-type-two" id="poke__type__two"></span>
                                </div>
                                <div class="screen__stats">
                                    <p class="stats__weight">
                                        weight: <span class="poke-weight"
                                                      id="poke-display__weight"><?php echo $currentPokemon->weight; ?></span>
                                    </p>
                                    <p class="stats__height">
                                        height: <span class="poke-height"
                                                      id="poke-display__height"><?php echo $currentPokemon->height; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="screen__evolutions">
                                <img src="<?php
                                echo isset($evolutionArray[0][0]) ? $evolutionArray[0][0]->getFrontSprite() : ''; ?>"
                                     class="poke-front-sprite" alt="evolution_1" id="poke-display__img__sprite_stage1">
                                <span class="poke-arrow" id="evo_arrow_1"> > </span>
                                <img src="<?php
                                echo isset($evolutionArray[1][0]) ? $evolutionArray[1][0]->getFrontSprite() : ''; ?>"
                                     class="poke-front-sprite" alt="evolution_1" id="poke-display__img__sprite_stage2">
                                <span class="poke-arrow" id="evo_arrow_2"> > </span>
                                <img src="<?php
                                    echo isset($evolutionArray[2][0]) ? $evolutionArray[2][0]->getFrontSprite() : ''; ?>"
                                     class="poke-front-sprite" alt="evolution_1" id="poke-display__img__sprite_stage3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-container__controllers">
                    <div class="controllers__d-pad">
                        <div class="d-pad__cell top"></div>
                        <div class="d-pad__cell left"></div>
                        <div class="d-pad__cell middle"></div>
                        <div class="d-pad__cell right"></div>
                        <div class="d-pad__cell bottom"></div>
                    </div>
                    <form method="get" class="controllers__buttons">
                        <button type="submit" name="q" value='<?php echo $currentPokemon->id - 1; ?>'
                                class="buttons__button" id="button-B">B
                        </button>
                        <button type="submit" name="q" value='<?php echo $currentPokemon->id + 1; ?>'
                                class="buttons__button" id="button-A">A
                        </button>
                    </form>
                </div>
            </div>
            <div class="left-container__right">
                <div class="left-container__hinge" id="left-container__hinge-top"></div>
                <div class="left-container__hinge" id="left-container__hinge-bottom"></div>
            </div>
        </div>
    </div>
    <div class="right-container" id="right-container__cosmetics">
        <div class="right-container__black">
            <form action="/index.php" method="get" class="searchbox" id="pokeForm">
                <label for="pokemon-name">Pokemon Name</label><br>
                <input type="text" name="q" id="pokemon-name" value="<?php echo $currentPokemon->name; ?>"><br>
            </form>
            <div class="movesBox">
                <label for="moves-table">Moves</label>
                <table id="moves-table">
                    <tr>
                        <td class="move"><?php echo isset($myMoves[0]) ? $myMoves[0] : ""; ?></td>
                        <td class="move"><?php echo isset($myMoves[1]) ? $myMoves[1] : ""; ?></td>
                    </tr>
                    <tr>
                        <td class="move"><?php echo isset($myMoves[2]) ? $myMoves[2] : ""; ?></td>
                        <td class="move"><?php echo isset($myMoves[3]) ? $myMoves[3] : ""; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="right-container__buttons">
            <input type="submit" form="pokeForm" class="left-button" id="search-button">
            <div class="right-button" id="reset-button">Reset</div>
        </div>
    </div>
</div>

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
                                <span class="poke-name" id="poke-display__name">Test</span>
                                <span class="poke-id" id="poke-display__id">01</span>
                            </div>
                            <div class="screen__image">
                                <img src="" class="poke-front-image" alt="front" id="poke-display__img__front"></div>
                            <div class="screen__description">
                                <div class="stats__types">
                                    <span class="poke-type-one" id="poke__type__one"></span>
                                    <span class="poke-type-two" id="poke__type__two"></span>
                                </div>
                                <div class="screen__stats">
                                    <p class="stats__weight">
                                        weight: <span class="poke-weight" id="poke-display__weight"></span>
                                    </p>
                                    <p class="stats__height">
                                        height: <span class="poke-height" id="poke-display__height"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="screen__evolutions">
                                <img src="" class="poke-front-sprite" alt="evolution_1" id="poke-display__img__sprite_stage1">
                                <span class="poke-arrow" id="evo_arrow_1"> > </span>
                                <img src="" class="poke-front-sprite" alt="evolution_1" id="poke-display__img__sprite_stage2">
                                <span class="poke-arrow" id="evo_arrow_2"> > </span>
                                <img src="" class="poke-front-sprite" alt="evolution_1" id="poke-display__img__sprite_stage3">
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
                    <div class="controllers__buttons">
                        <div class="buttons__button" id="button-B">B</div>
                        <div class="buttons__button" id="button-A">A</div>
                    </div>
                </div>
            </div>
            <div class="left-container__right">
                <div class="left-container__hinge" id = "left-container__hinge-top"></div>
                <div class="left-container__hinge" id = "left-container__hinge-bottom"></div>
            </div>
        </div>
    </div>
    <div class="right-container" id="right-container__cosmetics">
        <div class="right-container__black">
            <div class="searchbox">
                <label for="pokemon-name">Pokemon Name</label><br>
                <input type="text" id="pokemon-name"><br>
            </div>
            <div class="movesBox">
                <label for="moves-table">Moves</label>
                <table id="moves-table">
                    <tr>
                        <td class="move">move 1</td>
                        <td class="move">move 2</td>
                    </tr>
                    <tr>
                        <td class="move">move 3</td>
                        <td class="move">move 4</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="right-container__buttons">
            <div class="left-button" id="search-button">Search</div>
            <div class="right-button" id="reset-button">Reset</div>
        </div>
    </div>
</div>

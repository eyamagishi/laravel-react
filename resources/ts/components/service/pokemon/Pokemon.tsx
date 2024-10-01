import React from 'react';

import { POKEMON_NAME } from '../../../constants/labels';

const Pokemon: React.FC = () => {
    return (
        <section id="pokemon">
            <h2>{POKEMON_NAME}</h2>
            <p>ここはPokemonについてのセクションです。</p>
        </section>
    );
};

export default Pokemon;
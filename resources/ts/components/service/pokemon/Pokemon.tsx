import React from 'react';

import { POKEMON } from '../../../constants/labels';

const Pokemon: React.FC = () => {
    return (
        <section id="pokemon">
            <h2>{POKEMON}</h2>
            <p>ここはPokemonについてのセクションです。</p>
        </section>
    );
};

export default Pokemon;
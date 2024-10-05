import React, { useEffect, useState } from "react";
import axios from "axios";

import { POKEMON_NAME } from '@ts/constants/labels';
import { POKEMON_ENDPOINT } from '@ts/constants/api';
import { Pokemon } from '@ts/types/Pokemon';

const Pokemon: React.FC = () => {
    const [Pokemon, setPokemon] = useState<Pokemon[]>([]);

    const pokemonIndex = async () => {
        try {
            const res = await axios.get<Pokemon[]>(POKEMON_ENDPOINT);
            setPokemon(res.data);
        } catch (error) {
            console.error('Failed to pokemon data:', error);
            return error;
        }
    };

    useEffect(() => {
        pokemonIndex();
    }, []);

    return (
        <section id="pokemon">
            <h2>{POKEMON_NAME}</h2>
            <p>ここはPokemonについてのセクションです。</p>
        </section>
    );
};

export default Pokemon;
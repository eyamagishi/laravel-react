import React from "react";

import { MAHJONG_NAME } from '@ts/constants/labels';

const Mahjong: React.FC = () => {
    return (
        <section id="mahjong">
            <h2>{MAHJONG_NAME}</h2>
            <p>ここは麻雀についてのセクションです。</p>
        </section>
    );
};

export default Mahjong;
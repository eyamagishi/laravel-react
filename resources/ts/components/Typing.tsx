import React, { useState, useEffect } from 'react';

import TypingModal from './TypingModal';

const Typing: React.FC = () => {
    const [showModal, setShowModal] = useState(false);

    const ShowModal = () => {
        setShowModal(true);
    };

    return (
        <>
            <div>
                <div id="typing-start">
                    <h2>Typing</h2>
                    <p>下のボタンをクリックするとゲーム画面が開きます。</p>
                    <button id="open-button" type="button" onClick={ShowModal}>今すぐスタート！</button>
                    <p className="note">※スクリーンサイズの都合上、解像度(横)748px以上のデバイスでのプレイを推奨します。</p>
                    <noscript>
                        <p className="msg">本ゲームをプレイするにはJavaScriptを有効化してください。</p>
                    </noscript>
                </div>
            </div>
            <TypingModal showFlag={showModal} setShowFlag={setShowModal} />
        </>
    );
};

export default Typing;
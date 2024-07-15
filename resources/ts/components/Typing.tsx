import React, { useState, useEffect } from 'react';


const Typing: React.FC = () => {
    const [word, setWord] = useState<string>('');
    const [input, setInput] = useState<string>('');
    const [score, setScore] = useState<number>(0);
    const [timeLeft, setTimeLeft] = useState<number>(60);

    const words: string[] = ['apple', 'banana', 'cherry', 'date', 'elderberry'];

    useEffect(() => {
        const randomWord = words[Math.floor(Math.random() * words.length)];
        setWord(randomWord);
    }, []);

    useEffect(() => {
        if (timeLeft > 0) {
            const timer = setInterval(() => {
                setTimeLeft(timeLeft - 1);
            }, 1000);
            return () => clearInterval(timer);
        }
    }, [timeLeft]);

    const handleInputChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        setInput(e.target.value);
        if (e.target.value === word) {
            setScore(score + 1);
            setInput('');
            const randomWord = words[Math.floor(Math.random() * words.length)];
            setWord(randomWord);
        }
    };

    return (
        <div>
            <h2>Typing</h2>
            <h3>Word: {word}</h3>
            <input type="text" value={input} onChange={handleInputChange} />
            <h4>Score: {score}</h4>
            <h4>Time Left: {timeLeft} seconds</h4>
        </div>
    );
};

export default Typing;
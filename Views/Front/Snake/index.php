<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Snake Pro - Édition Ultime</title>
<style>
    /* Modern Animated Navbar */
        .cyber-navbar {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 25px;
            z-index: 2000;
            background: rgba(15, 25, 40, 0.85);
            backdrop-filter: blur(20px);
            padding: 15px 40px;
            border-radius: 60px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            animation: navbarSlideDown 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }

        @keyframes navbarSlideDown {
            from {
                transform: translateX(-50%) translateY(-100px);
                opacity: 0;
            }
            to {
                transform: translateX(-50%) translateY(0);
                opacity: 1;
            }
        }

        .nav-item {
            position: relative;
            padding: 12px 28px;
            text-decoration: none;
            color: #a0b3e0;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 1px;
            border-radius: 40px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid transparent;
            cursor: pointer;
            user-select: none;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, 
                rgba(102, 126, 234, 0.1) 0%, 
                rgba(118, 75, 162, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            border-radius: 40px;
        }

        .nav-item:hover {
            color: white;
            transform: translateY(-5px) scale(1.05);
            border-color: rgba(102, 126, 234, 0.3);
            box-shadow: 
                0 15px 30px rgba(102, 126, 234, 0.2),
                0 0 20px rgba(102, 126, 234, 0.1);
        }

        .nav-item:hover::before {
            opacity: 1;
        }

        .nav-item i {
            font-size: 20px;
            transition: all 0.4s ease;
        }

        .nav-item:hover i {
            transform: scale(1.2) rotate(5deg);
            color: #FCC624;
        }

        .nav-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(135deg, #FCC624, #ff9a00);
            color: #000;
            font-size: 11px;
            font-weight: 800;
            padding: 3px 8px;
            border-radius: 20px;
            animation: pulse 2s infinite;
            box-shadow: 0 0 15px rgba(252, 198, 36, 0.5);
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 15px rgba(252, 198, 36, 0.5);
            }
            50% {
                transform: scale(1.1);
                box-shadow: 0 0 25px rgba(252, 198, 36, 0.8);
            }
        }

        .nav-tooltip {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: rgba(15, 25, 40, 0.95);
            backdrop-filter: blur(20px);
            padding: 15px 25px;
            border-radius: 15px;
            color: white;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            pointer-events: none;
        }

        .nav-item:hover .nav-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(20px);
        }

        /* Particle effects */
        .nav-particle {
            position: absolute;
            pointer-events: none;
            opacity: 0;
        }

        /* Active state */
        .nav-item.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 
                0 10px 25px rgba(102, 126, 234, 0.4),
                0 0 15px rgba(102, 126, 234, 0.3);
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* Floating animation for navbar */
        @keyframes floatNavbar {
            0%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }

        .cyber-navbar {
            animation: navbarSlideDown 1s ease-out forwards, floatNavbar 6s ease-in-out infinite 1s;
        }

        /* Responsive design */
        @media (max-width: 1200px) {
            .cyber-navbar {
                gap: 15px;
                padding: 12px 30px;
            }
            
            .nav-item {
                padding: 10px 20px;
                font-size: 15px;
            }
        }

        @media (max-width: 768px) {
            .cyber-navbar {
                flex-direction: column;
                top: 10px;
                left: 10px;
                right: 10px;
                transform: none;
                animation: navbarSlideDownMobile 1s ease-out forwards;
                border-radius: 20px;
                padding: 20px;
                gap: 12px;
            }

            @keyframes navbarSlideDownMobile {
                from {
                    transform: translateY(-100px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            
            .nav-item {
                padding: 15px;
                justify-content: center;
                border-radius: 15px;
            }
            
            .nav-badge {
                top: 5px;
                right: 5px;
            }
        }
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
    color: #00aaff; /* Bleu pour tout le texte */
    min-height: 100vh;
    overflow: hidden;
    user-select: none;
}

/* Effets de fond animés */
#background-effects {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0.15;
}

#main-content {
    position: relative;
    z-index: 10;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    text-align: center;
    padding: 20px;
}

#secret-zone {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 70px;
    height: 70px;
    background: radial-gradient(circle, rgba(0, 170, 255, 0.3) 0%, transparent 70%);
    cursor: pointer;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    animation: pulse 2s infinite;
    transition: all 0.3s ease;
    box-shadow: 0 0 20px rgba(0, 170, 255, 0.3);
    z-index: 15;
}

#secret-zone:hover {
    transform: scale(1.1);
    box-shadow: 0 0 30px rgba(0, 170, 255, 0.5);
}

#secret-zone::after {
    content: "🐍";
    font-size: 24px;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

#countdown {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 120px;
    font-weight: 900;
    color: #00aaff; /* Bleu */
    z-index: 30;
    display: none;
    text-shadow: 0 0 30px #00aaff, 0 0 60px #00aaff;
    animation: countdownPop 0.5s ease-out;
}

@keyframes countdownPop {
    0% { transform: translate(-50%, -50%) scale(0); }
    80% { transform: translate(-50%, -50%) scale(1.2); }
    100% { transform: translate(-50%, -50%) scale(1); }
}

#snake-container {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 640px;
    height: 640px;
    background: rgba(15, 20, 25, 0.95);
    border: 8px solid;
    border-image: linear-gradient(45deg, #00aaff, #0066cc, #003366) 1;
    z-index: 20;
    box-shadow: 
        0 0 50px rgba(0, 170, 255, 0.4),
        0 0 100px rgba(0, 102, 204, 0.3),
        inset 0 0 50px rgba(0, 51, 102, 0.2);
    border-radius: 10px;
    overflow: hidden;
}

#game-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0.1;
}

#game-canvas-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
}

#score-container {
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 20px;
    font-weight: bold;
    color: #00aaff; /* Bleu */
    z-index: 25;
    background: rgba(0, 0, 0, 0);
    padding: 10px 20px;
    border-radius: 10px;
    border: 2px solid #00aaff;
    display: flex;
    align-items: center;
    gap: 15px;
    backdrop-filter: blur(5px);
}

#high-score {
    color: #ffcc00;
    font-size: 18px;
}

#gameover {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #ff3333;
    font-size: 70px;
    font-weight: 900;
    z-index: 40;
    text-align: center;
    text-shadow: 0 0 20px #ff0000, 0 0 40px #ff0000;
    background: rgba(10, 25, 45, 0.95);
    padding: 40px;
    border-radius: 20px;
    border: 4px solid #ff3333;
    backdrop-filter: blur(10px);
    animation: gameoverShake 0.5s ease-in-out;
}

@keyframes gameoverShake {
    0%, 100% { transform: translate(-50%, -50%) rotate(0deg); }
    25% { transform: translate(-50%, -50%) rotate(-2deg); }
    75% { transform: translate(-50%, -50%) rotate(2deg); }
}

.gameover-buttons {
    margin-top: 30px;
    display: flex;
    gap: 20px;
    justify-content: center;
}

.gameover-btn {
    padding: 15px 30px;
    font-size: 20px;
    cursor: pointer;
    border: none;
    border-radius: 10px;
    color: white;
    font-weight: bold;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    min-width: 150px;
}

#restart-btn {
    background: linear-gradient(45deg, #00aaff, #0066cc);
}

#restart-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 170, 255, 0.5);
    background: linear-gradient(45deg, #00aaff, #00aaff);
}

#menu-btn {
    background: linear-gradient(45deg, #ff3333, #cc0000);
}

#menu-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(255, 51, 51, 0.5);
    background: linear-gradient(45deg, #ff3333, #ff3333);
}

#pause-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    background: rgba(0, 170, 255, 0.2);
    border: 2px solid #00aaff;
    color: #00aaff;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
    z-index: 25;
}

#pause-btn:hover {
    background: rgba(0, 170, 255, 0.3);
    transform: scale(1.05);
}

#pause-screen {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(10, 25, 45, 0.95);
    padding: 40px;
    border-radius: 20px;
    border: 4px solid #00aaff;
    text-align: center;
    z-index: 35;
    backdrop-filter: blur(10px);
}

#pause-screen h2 {
    color: #00aaff;
    font-size: 50px;
    margin-bottom: 30px;
    text-shadow: 0 0 20px #00aaff;
}

.pause-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
}

.pause-btn {
    padding: 15px 30px;
    font-size: 18px;
    cursor: pointer;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    transition: all 0.3s ease;
    min-width: 150px;
    color: white;
}

#resume-btn {
    background: linear-gradient(45deg, #00aaff, #0066cc);
}

#menu-btn-pause {
    background: linear-gradient(45deg, #ff9900, #ff6600);
}

#mobile-controls {
    display: none;
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    gap: 10px;
    z-index: 25;
}

.control-row {
    display: flex;
    justify-content: center;
    gap: 80px;
    margin: 10px 0;
}

.control-btn {
    width: 70px;
    height: 70px;
    background: rgba(0, 170, 255, 0.2);
    border: 2px solid #00aaff;
    color: #00aaff;
    font-size: 30px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.control-btn:active {
    background: rgba(0, 170, 255, 0.4);
    transform: scale(0.95);
}

#special-food-timer {
    position: absolute;
    bottom: 20px;
    left: 20px;
    width: 200px;
    height: 10px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
    overflow: hidden;
    display: none;
    z-index: 25;
}

#special-food-progress {
    height: 100%;
    background: linear-gradient(90deg, #ffcc00, #ff9900);
    width: 0%;
    transition: width 0.3s ease;
}

#power-up-indicator {
    position: absolute;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    color: #ffcc00;
    font-weight: bold;
    background: rgba(255, 204, 0, 0.2);
    padding: 5px 15px;
    border-radius: 20px;
    display: none;
    animation: powerUpGlow 1s infinite alternate;
    border: 1px solid #ffcc00;
    z-index: 25;
}

@keyframes powerUpGlow {
    from { 
        box-shadow: 0 0 10px #ffcc00;
        background: rgba(255, 204, 0, 0.3);
    }
    to { 
        box-shadow: 0 0 20px #ffcc00;
        background: rgba(255, 204, 0, 0.5);
    }
}

#instructions {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0);
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #0066cc;
    font-size: 14px;
    max-width: 300px;
    backdrop-filter: blur(5px);
    z-index: 25;
    color: #00aaff; /* Bleu */
}

.instruction-item {
    margin: 5px 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.color-indicator {
    width: 15px;
    height: 15px;
    border-radius: 3px;
}

#speed-indicator {
    position: absolute;
    bottom: 20px;
    left: 250px;
    background: rgba(10, 25, 45, 0.9);
    padding: 10px 15px;
    border-radius: 10px;
    border: 1px solid #00cccc;
    font-size: 14px;
    color: #00cccc;
    display: flex;
    align-items: center;
    gap: 10px;
    backdrop-filter: blur(5px);
    z-index: 25;
}

.speed-bar {
    width: 100px;
    height: 10px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
    overflow: hidden;
}

.speed-fill {
    height: 100%;
    background: linear-gradient(90deg, #00cccc, #0066cc);
    width: 0%;
    transition: width 0.3s ease;
}

.snake-type-selector {
    position: absolute;
    top: 80px;
    left: 20px;
    background: rgba(10, 25, 45, 0.9);
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #0066cc;
    backdrop-filter: blur(5px);
    z-index: 25;
    color: #00aaff; /* Bleu */
}

.snake-type-selector select {
    background: #0a192d;
    color: #00aaff; /* Bleu */
    border: 1px solid #0066cc;
    border-radius: 5px;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
}

.snake-type-selector select:focus {
    outline: none;
    border-color: #00aaff;
}

/* Pop-up de succès - Guide Linux */
#success-modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(10, 25, 45, 0.98);
    padding: 40px;
    border-radius: 20px;
    border: 4px solid #00aaff;
    z-index: 100;
    width: 90%;
    max-width: 800px;
    max-height: 90vh;
    overflow-y: auto;
    backdrop-filter: blur(10px);
    animation: modalFadeIn 0.5s ease-out;
    color: #00aaff; /* Bleu */
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
}

#success-modal h2 {
    color: #00aaff;
    font-size: 40px;
    margin-bottom: 20px;
    text-align: center;
}

#success-modal h3 {
    color: #00aaff;
    margin: 20px 0 10px 0;
    border-bottom: 2px solid #00aaff;
    padding-bottom: 5px;
}

.linux-steps {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin: 20px 0;
}

.step {
    background: rgba(0, 170, 255, 0.1);
    border-left: 4px solid #00aaff;
    padding: 15px;
    border-radius: 0 8px 8px 0;
}

.step-number {
    background: #00aaff;
    color: black;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 10px;
}

.code-block {
    background: #1a1a2e;
    color: #00aaff;
    padding: 15px;
    border-radius: 8px;
    font-family: 'Courier New', monospace;
    margin: 10px 0;
    overflow-x: auto;
    border: 1px solid #333;
}

.code-block code {
    color: #00aaff;
}

.distros-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin: 20px 0;
}

.distro-card {
    background: rgba(0, 102, 204, 0.1);
    border: 1px solid #0066cc;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    transition: all 0.3s ease;
}

.distro-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 102, 204, 0.3);
}

.distro-card h4 {
    color: #0066cc;
    margin-bottom: 10px;
}

.close-modal {
    position: absolute;
    top: 15px;
    right: 15px;
    background: none;
    border: none;
    color: #ff3333;
    font-size: 30px;
    cursor: pointer;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.close-modal:hover {
    background: rgba(255, 51, 51, 0.1);
    transform: scale(1.1);
}

#continue-btn {
    background: linear-gradient(45deg, #00aaff, #0066cc);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    margin-top: 20px;
    transition: all 0.3s ease;
}

#continue-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 170, 255, 0.5);
}

@media (max-width: 700px) {
    #snake-container {
        width: 95vw;
        height: 95vw;
        max-width: 500px;
        max-height: 500px;
    }
    
    #game-canvas-container canvas {
        width: 100% !important;
        height: 100% !important;
    }
    
    #mobile-controls {
        display: block;
    }
    
    #gameover, #pause-screen, #success-modal {
        font-size: 50px;
        padding: 20px;
        width: 95%;
    }
    
    .gameover-buttons, .pause-buttons {
        flex-direction: column;
        gap: 10px;
    }
    
    #instructions, #speed-indicator, .snake-type-selector {
        display: none;
    }
    
    .distros-grid {
        grid-template-columns: 1fr;
    }
}

#main-title {
    font-size: 3em;
    text-align: center;
    color: #00aaff;
    text-shadow: 
        0 0 10px #00aaff,
        0 0 20px #00aaff,
        0 0 40px #0066cc,
        0 0 80px #0066cc;
    animation: titleGlow 3s infinite alternate;
    margin-bottom: 20px;
}

@keyframes titleGlow {
    0%, 100% { 
        opacity: 1;
        text-shadow: 
            0 0 10px #00aaff,
            0 0 20px #00aaff,
            0 0 40px #0066cc,
            0 0 80px #0066cc;
    }
    50% { 
        opacity: 0.9;
        text-shadow: 
            0 0 5px #00aaff,
            0 0 10px #00aaff,
            0 0 20px #0066cc,
            0 0 40px #0066cc;
    }
}

.features-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 40px 0;
    max-width: 900px;
    position: relative;
    z-index: 10;
}

.feature-item {
    background: rgba(0, 170, 255, 0.1);
    border: 1px solid rgba(0, 170, 255, 0.3);
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-10px);
    background: rgba(0, 170, 255, 0.2);
    box-shadow: 0 10px 30px rgba(0, 170, 255, 0.3);
}

.feature-icon {
    font-size: 2.5em;
    margin-bottom: 15px;
}

.feature-title {
    color: #00aaff;
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 10px;
}

.feature-desc {
    font-size: 0.95em;
    color: #aaa;
    line-height: 1.5;
}

.welcome-text {
    font-size: 1.1em;
    color: #aaa;
    max-width: 800px;
    line-height: 1.8;
    margin: 20px 0;
    text-align: center;
}

.achievement-badge {
    position: fixed;
    bottom: 30px;
    left: 30px;
    background: rgba(255, 204, 0, 0.9);
    color: black;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    display: none;
    z-index: 15;
    animation: badgeBounce 1s ease;
}

@keyframes badgeBounce {
    0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
    40% {transform: translateY(-30px);}
    60% {transform: translateY(-15px);}
}

/* Instruction pour double-clic */
#double-click-hint {
    position: fixed;
    bottom: 110px;
    right: 30px;
    background: rgba(0, 170, 255, 0.2);
    color: #00aaff;
    padding: 10px 15px;
    border-radius: 10px;
    font-size: 14px;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(0, 170, 255, 0.3);
    animation: hintPulse 2s infinite;
    z-index: 15;
}

@keyframes hintPulse {
    0%, 100% { opacity: 0.8; }
    50% { opacity: 1; }
}
</style>
</head>
<body>


   <!-- Modern Animated Navbar -->
    <nav class="cyber-navbar">
        <div class="nav-item" data-url="loading2.html">
            <i class="fas fa-robot"></i>
            <span>ChatBot AI</span>
            <div class="nav-badge">Nouveau</div>
            <div class="nav-tooltip">Assistant IA intelligent pour vous guider</div>
            <div class="notification-dot"></div>
        </div>
        
        <div class="nav-item" data-url="../Main/loading3.html">
            <i class="fas fa-gamepad"></i>
            <span>Snack Game</span>
            <div class="nav-tooltip">Jeu rétro Snake avec un twist moderne</div>
        </div>
        
        <div class="nav-item" data-url="../Main/loading4.html">
            <i class="fas fa-ghost"></i>
            <span>Retro Zone</span>
            <div class="nav-badge">8-bit</div>
            <div class="nav-tooltip">Collection de jeux rétro classiques</div>
        </div>
    </nav>

    <!-- Floating Particles Background -->
    <div class="floating-particles" id="particles-container"></div>

    <!-- This info panel will be hidden by default and shown on hover -->
    <div id="info-panel" class="hidden">
        <div id="component-info">
            <h2 id="component-name"></h2>
            <p id="component-description"></p>
        </div>
    </div>

    <div id="3d-container"></div>

    <!-- The Three.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    
    <!-- The GLTFLoader to load our .glb file -->
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>

    <!-- The OrbitControls for camera interaction -->
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

    <!-- Our main script -->
    <script src="main.js"></script>

    <!-- Navbar Interactions Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating particles
            createParticles();
            
            // Navbar items
            const navItems = document.querySelectorAll('.nav-item');
            
            // Add click handlers with animations
            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Get the URL from data attribute
                    const redirectUrl = this.getAttribute('data-url');
                    if (!redirectUrl) {
                        alert('Cette fonctionnalité sera bientôt disponible!');
                        return;
                    }
                    
                    // Remove active class from all items
                    navItems.forEach(nav => nav.classList.remove('active', 'glitch'));
                    
                    // Add active class to clicked item
                    this.classList.add('active');
                    
                    // Add glitch effect
                    this.classList.add('glitch');
                    setTimeout(() => {
                        this.classList.remove('glitch');
                    }, 300);
                    
                    // Create particle burst
                    createParticleBurst(this);
                    
                    // Show loading simulation
                    const icon = this.querySelector('i');
                    const originalIcon = icon.className;
                    icon.className = 'fas fa-spinner fa-spin';
                    
                    // Simulate loading and redirect
                    setTimeout(() => {
                        icon.className = originalIcon;
                        
                        // Show transition effect
                        showTransitionEffect(() => {
                            // Redirect to the specific file
                            window.location.href = redirectUrl;
                        });
                    }, 800);
                });
                
                // Add hover particle effects
                item.addEventListener('mouseenter', function() {
                    createHoverParticles(this);
                });
            });
            
            // Create background floating particles
            function createParticles() {
                const container = document.getElementById('particles-container');
                const particleCount = 30;
                
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    
                    // Random position
                    particle.style.left = `${Math.random() * 100}%`;
                    particle.style.top = `${Math.random() * 100}%`;
                    
                    // Random size
                    const size = 1 + Math.random() * 3;
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    
                    // Random animation delay
                    particle.style.animationDelay = `${Math.random() * 15}s`;
                    
                    // Random color variation
                    const hue = 40 + Math.random() * 20; // Yellow-ish range
                    particle.style.background = `hsla(${hue}, 100%, 60%, ${0.3 + Math.random() * 0.4})`;
                    
                    container.appendChild(particle);
                }
            }
            
            // Create particle burst effect
            function createParticleBurst(element) {
                const rect = element.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                
                for (let i = 0; i < 15; i++) {
                    setTimeout(() => {
                        const particle = document.createElement('div');
                        particle.className = 'particle';
                        particle.style.position = 'fixed';
                        particle.style.left = `${centerX}px`;
                        particle.style.top = `${centerY}px`;
                        particle.style.width = '4px';
                        particle.style.height = '4px';
                        particle.style.zIndex = '1000';
                        particle.style.animation = 'none';
                        
                        // Random color based on which item was clicked
                        const colors = ['#667eea', '#764ba2', '#FCC624', '#48bb78'];
                        const color = colors[Math.floor(Math.random() * colors.length)];
                        particle.style.background = color;
                        particle.style.boxShadow = `0 0 15px ${color}`;
                        
                        document.body.appendChild(particle);
                        
                        // Animate burst
                        const angle = Math.random() * Math.PI * 2;
                        const speed = 2 + Math.random() * 3;
                        const distance = 50 + Math.random() * 100;
                        
                        let progress = 0;
                        const duration = 800;
                        
                        function animate() {
                            progress += 16; // ~60fps
                            
                            if (progress < duration) {
                                const t = progress / duration;
                                const currentDistance = distance * (1 - Math.pow(1 - t, 2));
                                const x = Math.cos(angle) * currentDistance;
                                const y = Math.sin(angle) * currentDistance;
                                const scale = 1 - t;
                                const opacity = 1 - t;
                                
                                particle.style.transform = `translate(${x}px, ${y}px) scale(${scale})`;
                                particle.style.opacity = opacity;
                                
                                requestAnimationFrame(animate);
                            } else {
                                particle.remove();
                            }
                        }
                        
                        requestAnimationFrame(animate);
                    }, i * 30);
                }
            }
            
            // Create hover particles
            function createHoverParticles(element) {
                const rect = element.getBoundingClientRect();
                
                for (let i = 0; i < 5; i++) {
                    setTimeout(() => {
                        const particle = document.createElement('div');
                        particle.className = 'particle';
                        particle.style.position = 'fixed';
                        particle.style.left = `${rect.left + Math.random() * rect.width}px`;
                        particle.style.top = `${rect.top + Math.random() * rect.height}px`;
                        particle.style.width = '2px';
                        particle.style.height = '2px';
                        particle.style.zIndex = '1000';
                        particle.style.animation = 'none';
                        particle.style.background = '#FCC624';
                        particle.style.boxShadow = '0 0 10px #FCC624';
                        
                        document.body.appendChild(particle);
                        
                        // Animate upward float
                        let progress = 0;
                        const duration = 600;
                        
                        function animate() {
                            progress += 16;
                            
                            if (progress < duration) {
                                const t = progress / duration;
                                const y = -30 * t;
                                const opacity = 1 - t;
                                
                                particle.style.transform = `translateY(${y}px)`;
                                particle.style.opacity = opacity;
                                
                                requestAnimationFrame(animate);
                            } else {
                                particle.remove();
                            }
                        }
                        
                        requestAnimationFrame(animate);
                    }, i * 50);
                }
            }
            
            // Transition effect
            function showTransitionEffect(callback) {
                const overlay = document.createElement('div');
                overlay.style.position = 'fixed';
                overlay.style.top = '0';
                overlay.style.left = '0';
                overlay.style.width = '100%';
                overlay.style.height = '100%';
                overlay.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                overlay.style.zIndex = '9999';
                overlay.style.opacity = '0';
                overlay.style.transition = 'opacity 0.5s ease';
                
                document.body.appendChild(overlay);
                
                // Fade in
                setTimeout(() => {
                    overlay.style.opacity = '1';
                }, 10);
                
                // Execute callback and fade out
                setTimeout(() => {
                    if (callback) callback();
                    
                    setTimeout(() => {
                        overlay.style.opacity = '0';
                        setTimeout(() => {
                            overlay.remove();
                        }, 500);
                    }, 500);
                }, 1000);
            }
            
            // Add keyboard navigation
            document.addEventListener('keydown', function(e) {
                const navItemsArray = Array.from(navItems);
                const currentIndex = navItemsArray.findIndex(item => item.classList.contains('active'));
                
                if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                    e.preventDefault();
                    const nextIndex = (currentIndex + 1) % navItemsArray.length;
                    navItemsArray[nextIndex].click();
                } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prevIndex = (currentIndex - 1 + navItemsArray.length) % navItemsArray.length;
                    navItemsArray[prevIndex].click();
                } else if (e.key >= '1' && e.key <= '4') {
                    e.preventDefault();
                    const index = parseInt(e.key) - 1;
                    if (index < navItemsArray.length) {
                        navItemsArray[index].click();
                    }
                }
            });
            
            // Add active item on page load
            navItems[0].classList.add('active');
            
            // Add mouse move effect to navbar
            const navbar = document.querySelector('.cyber-navbar');
            navbar.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 50;
                const rotateX = (centerY - y) / 50;
                
                this.style.transform = `translateX(-50%) perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });
            
            navbar.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(-50%) perspective(1000px) rotateX(0) rotateY(0)';
            });
            
            // Add periodic notification animation
            setInterval(() => {
                const notificationDot = document.querySelector('.notification-dot');
                if (notificationDot) {
                    notificationDot.style.animation = 'none';
                    setTimeout(() => {
                        notificationDot.style.animation = 'blink 2s infinite';
                    }, 10);
                }
            }, 5000);
            
            // Check if files exist before redirecting (optional feature)
            async function checkFileExists(url) {
                try {
                    const response = await fetch(url, { method: 'HEAD' });
                    return response.ok;
                } catch (error) {
                    return false;
                }
            }
            
            // You can add this check before redirecting
            navItems.forEach(item => {
                item.addEventListener('click', async function(e) {
                    e.preventDefault();
                    
                    const redirectUrl = this.getAttribute('data-url');
                    
                    // Optional: Check if file exists
                    const fileExists = await checkFileExists(redirectUrl);
                    if (!fileExists) {
                        alert('Le fichier n\'existe pas encore. Veuillez le créer dans le dossier: ' + redirectUrl);
                        return;
                    }
                    
                    // ... rest of the click handler code
                });
            });
        });
    </script>
    
<!-- Canvas pour les effets de fond -->
<canvas id="background-effects"></canvas>

<div id="main-content">
    <div id="main-title">🐍 SNAKE PRO - ÉDITION ULTIME</div>
    
    <p class="welcome-text">
        Bienvenue dans la version ultime du jeu Snake. Un jeu classique revisité avec des graphismes modernes, 
        des mécaniques de jeu avancées et un système de récompenses unique. Atteignez un score de 100 points 
        pour débloquer un guide exclusif d'installation de Linux !
    </p>
    
    <div class="features-list">
        <div class="feature-item">
            <div class="feature-icon">🎯</div>
            <div class="feature-title">PRÉCISION EXTREME</div>
            <div class="feature-desc">Contrôles ultra-réactifs et physique réaliste pour une expérience de jeu optimale</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon">⚡</div>
            <div class="feature-title">PERFORMANCES</div>
            <div class="feature-desc">Optimisé pour 60 FPS constant sur tous les appareils, même mobiles</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon">🎮</div>
            <div class="feature-title">GAMEPLAY ÉVOLUÉ</div>
            <div class="feature-desc">Power-ups, nourriture spéciale et progression de difficulté intelligente</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon">🏆</div>
            <div class="feature-title">SYSTÈME DE RÉCOMPENSES</div>
            <div class="feature-desc">Débloquez des guides exclusifs en atteignant des scores élevés</div>
        </div>
    </div>
    
    
    
    <div id="secret-zone" ></div>
    <div id="double-click-hint"></div>
</div>

<!-- Badge d'achievement -->
<div class="achievement-badge" id="achievement-badge">🎉 NOUVEAU RECORD !</div>

<div id="countdown"></div>

<div id="snake-container">
    <canvas id="game-background"></canvas>
    
    <div id="game-canvas-container">
        <canvas id="snake-game"></canvas>
    </div>
    
    <div id="score-container">
        <span id="score">Score: 0</span>
        <span id="high-score">Record: 0</span>
        <span id="length">Longueur: 1</span>
    </div>
    
    <div class="snake-type-selector">
        <label for="snake-type" style="color: #00aaff; font-size: 12px;">Apparence:</label>
        <select id="snake-type">
            <option value="classic">Classique</option>
            <option value="advanced">Avancé</option>
            <option value="elite">Élite</option>
            <option value="master">Maître</option>
            <option value="legend">Légende</option>
        </select>
    </div>
    
    <button id="pause-btn">Pause</button>
    <div id="power-up-indicator">PUISSANCE ACTIVÉE!</div>
    
    <div id="gameover">
        PARTIE TERMINÉE<br>
        <span id="final-score" style="font-size: 40px; color: #00aaff; display: block; margin: 20px 0;"></span>
        <div class="gameover-buttons">
            <button id="restart-btn" class="gameover-btn" onclick="restartGame()">Rejouer</button>
            <button id="menu-btn" class="gameover-btn" onclick="returnToMenu()">Menu</button>
        </div>
    </div>
    
    <div id="pause-screen">
        <h2>PAUSE</h2>
        <div class="pause-buttons">
            <button id="resume-btn" class="pause-btn" onclick="togglePause()">Reprendre</button>
            <button id="menu-btn-pause" class="pause-btn" onclick="returnToMenu()">Menu</button>
        </div>
    </div>
    
    <div id="mobile-controls">
        <div class="control-row">
            <div class="control-btn" data-direction="up">↑</div>
        </div>
        <div class="control-row">
            <div class="control-btn" data-direction="left">←</div>
            <div class="control-btn" data-direction="down">↓</div>
            <div class="control-btn" data-direction="right">→</div>
        </div>
    </div>
    
    <div id="special-food-timer">
        <div id="special-food-progress"></div>
    </div>
    
    <div id="instructions">
        <div class="instruction-item">
            <div class="color-indicator" style="background: #ff4444;"></div>
            <span>Nourriture: +10 pts</span>
        </div>
        <div class="instruction-item">
            <div class="color-indicator" style="background: #ffcc00;"></div>
            <span>Nourriture spéciale: +50 pts + Bonus</span>
        </div>
        <div class="instruction-item">
            <span>Flèches: Déplacement</span>
        </div>
        <div class="instruction-item">
            <span>P/Espace: Pause</span>
        </div>
        <div class="instruction-item">
            <span>R: Redémarrer</span>
        </div>
    </div>
    
    <div id="speed-indicator">
        <span>Vitesse:</span>
        <div class="speed-bar">
            <div id="speed-fill" class="speed-fill"></div>
        </div>
    </div>
</div>

<!-- Modal de succès - Guide Linux -->
<div id="success-modal">
    <button class="close-modal" onclick="closeSuccessModal()">×</button>
    <h2>🎉 FÉLICITATIONS ! 🎉</h2>
    <p style="text-align: center; font-size: 1.2em; margin: 20px 0; color: #00aaff;">
        Vous avez atteint 100 points ! Voici votre récompense exclusive :
    </p>
    
    <h3>📚 GUIDE COMPLET D'INSTALLATION DE LINUX</h3>
    
    <div class="linux-steps">
        <!-- Contenu du guide Linux reste identique -->
        <div class="step">
            <h4 style="display: flex; align-items: center;">
                <span class="step-number">1</span> Préparation du support d'installation
            </h4>
            <p>Téléchargez l'ISO de votre distribution Linux préférée :</p>
            <div class="distros-grid">
                <div class="distro-card">
                    <h4>Ubuntu</h4>
                    <p>Recommandé pour débutants</p>
                    <small>ubuntu.com/download</small>
                </div>
                <div class="distro-card">
                    <h4>Fedora</h4>
                    <p>Stable et moderne</p>
                    <small>getfedora.org</small>
                </div>
                <div class="distro-card">
                    <h4>Debian</h4>
                    <p>Extrêmement stable</p>
                    <small>debian.org</small>
                </div>
            </div>
        </div>
        
        <div class="step">
            <h4 style="display: flex; align-items: center;">
                <span class="step-number">2</span> Création de la clé USB bootable
            </h4>
            <p>Utilisez l'un de ces outils selon votre système actuel :</p>
            <div class="code-block">
                <code>
                    # Sous Windows : Rufus<br>
                    # Sous macOS : balenaEtcher<br>
                    # Sous Linux : dd ou Etcher<br><br>
                    # Commande dd (Linux/macOS) :<br>
                    sudo dd if=nom_du_fichier.iso of=/dev/sdX bs=4M status=progress
                </code>
            </div>
            <p><strong style="color: #ff4444;">Attention :</strong> Remplacez sdX par votre périphérique USB (ex: sdb)</p>
        </div>
        
        <div class="step">
            <h4 style="display: flex; align-items: center;">
                <span class="step-number">3</span> Configuration du BIOS/UEFI
            </h4>
            <ul style="margin: 10px 0 10px 20px; color: #aaa;">
                <li>Redémarrez votre ordinateur</li>
                <li>Accédez au BIOS/UEFI (touche F2, F10, F12 ou Suppr)</li>
                <li>Désactivez Secure Boot</li>
                <li>Priorisez le démarrage sur USB</li>
                <li>Sauvegardez et quittez</li>
            </ul>
        </div>
        
        <div class="step">
            <h4 style="display: flex; align-items: center;">
                <span class="step-number">4</span> Installation de Linux
            </h4>
            <ol style="margin: 10px 0 10px 20px; color: #aaa;">
                <li>Démarrez sur la clé USB</li>
                <li>Choisissez "Try Linux" pour tester sans installer</li>
                <li>Cliquez sur "Install Linux" sur le bureau</li>
                <li>Sélectionnez votre langue et fuseau horaire</li>
                <li>Choisissez le type d'installation (recommandé : effacer le disque)</li>
                <li>Créez votre compte utilisateur</li>
                <li>Attendez la fin de l'installation</li>
                <li>Redémarrez et retirez la clé USB</li>
            </ol>
        </div>
        
        <div class="step">
            <h4 style="display: flex; align-items: center;">
                <span class="step-number">5</span> Configuration post-installation
            </h4>
            <div class="code-block">
                <code>
                    # Mettre à jour le système<br>
                    sudo apt update && sudo apt upgrade<br><br>
                    # Installer des paquets essentiels<br>
                    sudo apt install git curl wget vim build-essential<br><br>
                    # Installer les drivers graphiques (NVIDIA)<br>
                    sudo ubuntu-drivers autoinstall<br><br>
                    # Configurer le pare-feu<br>
                    sudo ufw enable<br>
                    sudo ufw default deny incoming<br>
                    sudo ufw default allow outgoing
                </code>
            </div>
        </div>
    </div>
    
    <h3>🛠️ Commandes Linux essentielles</h3>
    <div class="code-block">
        <code>
            # Navigation<br>
            pwd                    # Afficher le répertoire courant<br>
            ls -la                 # Lister les fichiers avec détails<br>
            cd /chemin/vers/dossier # Changer de dossier<br><br>
            
            # Gestion des fichiers<br>
            cp source destination  # Copier<br>
            mv source destination  # Déplacer/renommer<br>
            rm fichier             # Supprimer<br>
            mkdir dossier          # Créer un dossier<br><br>
            
            # Gestion des processus<br>
            ps aux                 # Lister les processus<br>
            top                    # Moniteur système<br>
            kill PID               # Terminer un processus<br><br>
            
            # Gestion des paquets (Ubuntu/Debian)<br>
            sudo apt search mot    # Rechercher un paquet<br>
            sudo apt install paquet # Installer<br>
            sudo apt remove paquet # Désinstaller
        </code>
    </div>
    
    <div style="text-align: center; margin-top: 30px;">
        <p style="color: #ffcc00; font-size: 1.1em;">
            💡 <strong>Astuce :</strong> Commencez par Ubuntu si vous débutez, puis explorez d'autres distributions !
        </p>
        <a href="../Tuto/tuto.php" id="continue-btn">Accéder au tuto </a>
    </div>
</div>

<script>
// ============================
// CLASSE EFFETS DE FOND
// ============================
class BackgroundEffects {
    constructor(canvas) {
        this.canvas = canvas;
        this.ctx = canvas.getContext('2d');
        this.particles = [];
        this.time = 0;
        this.resize();
        window.addEventListener('resize', () => this.resize());
        this.initParticles();
    }
    
    resize() {
        this.canvas.width = this.canvas.clientWidth;
        this.canvas.height = this.canvas.clientHeight;
        this.initParticles();
    }
    
    initParticles() {
        this.particles = [];
        const particleCount = Math.floor((this.canvas.width * this.canvas.height) / 10000);
        
        for (let i = 0; i < particleCount; i++) {
            this.particles.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                size: Math.random() * 2 + 1,
                speedX: (Math.random() - 0.5) * 0.3,
                speedY: (Math.random() - 0.5) * 0.3,
                color: `rgba(0, ${Math.floor(Math.random() * 100 + 156)}, ${Math.floor(Math.random() * 100 + 156)}, ${Math.random() * 0.2 + 0.1})`,
                orbitRadius: Math.random() * 50 + 20,
                orbitSpeed: Math.random() * 0.02 + 0.01,
                angle: Math.random() * Math.PI * 2
            });
        }
    }
    
    update(deltaTime) {
        this.time += deltaTime * 0.001;
        
        for (const p of this.particles) {
            // Mouvement orbital
            p.angle += p.orbitSpeed;
            p.x += Math.cos(p.angle) * 0.1 + p.speedX;
            p.y += Math.sin(p.angle) * 0.1 + p.speedY;
            
            // Rebond sur les bords
            if (p.x < 0 || p.x > this.canvas.width) p.speedX *= -1;
            if (p.y < 0 || p.y > this.canvas.height) p.speedY *= -1;
            
            // Garder dans les limites
            p.x = Math.max(0, Math.min(this.canvas.width, p.x));
            p.y = Math.max(0, Math.min(this.canvas.height, p.y));
        }
    }
    
    draw() {
        this.ctx.fillStyle = 'rgba(10, 10, 20, 0.05)';
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
        
        for (const p of this.particles) {
            this.ctx.beginPath();
            this.ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
            this.ctx.fillStyle = p.color;
            this.ctx.fill();
            
            // Dessiner des lignes entre particules proches
            for (const p2 of this.particles) {
                const dx = p.x - p2.x;
                const dy = p.y - p2.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 100) {
                    this.ctx.beginPath();
                    this.ctx.moveTo(p.x, p.y);
                    this.ctx.lineTo(p2.x, p2.y);
                    this.ctx.strokeStyle = `rgba(0, 200, 200, ${0.1 * (1 - distance/100)})`;
                    this.ctx.lineWidth = 0.5;
                    this.ctx.stroke();
                }
            }
        }
    }
}

// ============================
// CLASSE PRINCIPALE DU JEU
// ============================
class SnakeProGame {
    constructor() {
        this.canvas = document.getElementById('snake-game');
        this.ctx = this.canvas.getContext('2d');
        this.grid = 24;
        this.snake = [];
        this.dx = this.grid;
        this.dy = 0;
        this.food = null;
        this.specialFood = null;
        this.gameOver = false;
        this.score = 0;
        this.highScore = localStorage.getItem('snakeProHighScore') || 0;
        this.baseSpeed = 150;
        this.currentSpeed = this.baseSpeed;
        this.paused = false;
        this.powerUpActive = false;
        this.powerUpEndTime = 0;
        this.specialFoodTimer = 0;
        this.specialFoodDuration = 10000;
        this.lastUpdate = 0;
        this.particles = [];
        this.snakeType = 'classic';
        this.successShown = false; // Pour le message à 100 points
        
        this.resizeCanvas();
        window.addEventListener('resize', () => this.resizeCanvas());
        
        this.init();
    }
    
    resizeCanvas() {
        const container = document.getElementById('snake-container');
        this.canvas.width = container.clientWidth;
        this.canvas.height = container.clientHeight;
    }
    
    init() {
        this.snake = [
            {x: this.canvas.width/2, y: this.canvas.height/2}
        ];
        this.dx = this.grid;
        this.dy = 0;
        this.food = this.placeFood();
        this.specialFood = null;
        this.gameOver = false;
        this.score = 0;
        this.currentSpeed = this.baseSpeed;
        this.powerUpActive = false;
        this.particles = [];
        this.successShown = false;
        this.updateDisplay();
        this.updateHighScoreDisplay();
        this.spawnSpecialFood();
        this.updateSpeedIndicator();
        
        const typeSelect = document.getElementById('snake-type');
        this.snakeType = typeSelect.value;
        typeSelect.addEventListener('change', () => {
            this.snakeType = typeSelect.value;
        });
    }
    
    getSnakeStyle() {
        switch(this.snakeType) {
            case 'advanced':
                return {
                    headColor: '#00aaff',
                    bodyColor: '#0088cc',
                    eyeColor: '#ffffff',
                    pattern: '#006699'
                };
            case 'elite':
                return {
                    headColor: '#00ccff',
                    bodyColor: '#00aacc',
                    eyeColor: '#ffffff',
                    pattern: '#0088aa'
                };
            case 'master':
                return {
                    headColor: '#0066ff',
                    bodyColor: '#0055cc',
                    eyeColor: '#ffffff',
                    pattern: '#004499'
                };
            case 'legend':
                return {
                    headColor: '#00ffcc',
                    bodyColor: '#00ccaa',
                    eyeColor: '#ffffff',
                    pattern: '#00aa88'
                };
            default: // classic
                return {
                    headColor: '#00aaff',
                    bodyColor: '#0088cc',
                    eyeColor: '#ffffff',
                    pattern: '#006699'
                };
        }
    }
    
    placeFood() {
        let food;
        let valid = false;
        let attempts = 0;
        
        while (!valid && attempts < 100) {
            food = {
                x: Math.floor(Math.random() * (this.canvas.width / this.grid)) * this.grid,
                y: Math.floor(Math.random() * (this.canvas.height / this.grid)) * this.grid
            };
            
            valid = true;
            for (let segment of this.snake) {
                if (segment.x === food.x && segment.y === food.y) {
                    valid = false;
                    break;
                }
            }
            attempts++;
        }
        
        return food;
    }
    
    spawnSpecialFood() {
        if (this.specialFoodTimer) {
            clearTimeout(this.specialFoodTimer);
        }
        
        this.specialFoodTimer = setTimeout(() => {
            if (!this.gameOver && !this.paused && this.snake.length > 3) {
                let valid = false;
                let food;
                let attempts = 0;
                
                while (!valid && attempts < 100) {
                    food = {
                        x: Math.floor(Math.random() * (this.canvas.width / this.grid)) * this.grid,
                        y: Math.floor(Math.random() * (this.canvas.height / this.grid)) * this.grid,
                        type: 'special'
                    };
                    
                    valid = true;
                    for (let segment of this.snake) {
                        if (segment.x === food.x && segment.y === food.y) {
                            valid = false;
                            break;
                        }
                    }
                    if (this.food && food.x === this.food.x && food.y === this.food.y) {
                        valid = false;
                    }
                    attempts++;
                }
                
                if (valid) {
                    this.specialFood = food;
                    this.startSpecialFoodTimer();
                }
            }
        }, 5000 + Math.random() * 10000);
    }
    
    startSpecialFoodTimer() {
        const startTime = Date.now();
        document.getElementById('special-food-timer').style.display = 'block';
        
        const updateTimer = () => {
            if (!this.specialFood || this.gameOver || this.paused) {
                document.getElementById('special-food-timer').style.display = 'none';
                return;
            }
            
            const elapsed = Date.now() - startTime;
            const remaining = Math.max(0, this.specialFoodDuration - elapsed);
            const percentage = (remaining / this.specialFoodDuration) * 100;
            
            document.getElementById('special-food-progress').style.width = percentage + '%';
            
            if (remaining > 0) {
                requestAnimationFrame(updateTimer);
            } else {
                this.specialFood = null;
                document.getElementById('special-food-timer').style.display = 'none';
                this.spawnSpecialFood();
            }
        };
        
        updateTimer();
    }
    
    update(deltaTime) {
        if (this.gameOver || this.paused || !this.lastUpdate) {
            this.lastUpdate = performance.now();
            return;
        }

        const delta = performance.now() - this.lastUpdate;
        
        if (delta > this.currentSpeed) {
            this.moveSnake();
            this.lastUpdate = performance.now();
        }
        
        this.updateParticles();
    }
    
    moveSnake() {
        const head = {x: this.snake[0].x + this.dx, y: this.snake[0].y + this.dy};

        // Gestion des murs
        if (head.x < 0) head.x = this.canvas.width - this.grid;
        if (head.x >= this.canvas.width) head.x = 0;
        if (head.y < 0) head.y = this.canvas.height - this.grid;
        if (head.y >= this.canvas.height) head.y = 0;

        // Collision avec soi-même
        for (let i = 0; i < this.snake.length; i++) {
            const segment = this.snake[i];
            if (segment.x === head.x && segment.y === head.y) {
                this.gameOver = true;
                this.handleGameOver();
                return;
            }
        }

        this.snake.unshift(head);

        // Nourriture normale
        if (head.x === this.food.x && head.y === this.food.y) {
            this.food = this.placeFood();
            this.score += 10;
            
            // Vérifier si le joueur atteint 100 points
            if (this.score >= 100 && !this.successShown) {
                this.successShown = true;
                this.showSuccessMessage();
            }
            
            // Augmenter progressivement la vitesse
            if (this.currentSpeed > 70) {
                this.currentSpeed -= 2;
                this.updateSpeedIndicator();
            }
            
            this.createParticles(head.x + this.grid/2, head.y + this.grid/2, '#ff4444', 8);
            this.updateDisplay();
        } 
        // Nourriture spéciale
        else if (this.specialFood && head.x === this.specialFood.x && head.y === this.specialFood.y) {
            this.score += 50;
            this.powerUpActive = true;
            this.powerUpEndTime = Date.now() + 5000;
            
            // Vérifier si le joueur atteint 100 points
            if (this.score >= 100 && !this.successShown) {
                this.successShown = true;
                this.showSuccessMessage();
            }
            
            // Ajouter 3 segments
            for (let i = 0; i < 3; i++) {
                this.snake.push({...this.snake[this.snake.length - 1]});
            }
            
            document.getElementById('power-up-indicator').style.display = 'block';
            
            setTimeout(() => {
                this.powerUpActive = false;
                document.getElementById('power-up-indicator').style.display = 'none';
            }, 5000);
            
            this.specialFood = null;
            document.getElementById('special-food-timer').style.display = 'none';
            this.spawnSpecialFood();
            this.createParticles(head.x + this.grid/2, head.y + this.grid/2, '#ffcc00', 12);
            this.updateDisplay();
        } 
        else {
            this.snake.pop();
        }
    }
    
    createParticles(x, y, color, count) {
        for (let i = 0; i < count; i++) {
            this.particles.push({
                x: x,
                y: y,
                size: Math.random() * 3 + 1,
                speedX: Math.random() * 6 - 3,
                speedY: Math.random() * 6 - 3,
                color: color,
                life: 25,
                decay: 0.1
            });
        }
    }
    
    updateParticles() {
        for (let i = this.particles.length - 1; i >= 0; i--) {
            const p = this.particles[i];
            p.x += p.speedX;
            p.y += p.speedY;
            p.life -= p.decay * 10;
            p.size *= 0.95;
            
            if (p.life <= 0 || p.size < 0.5) {
                this.particles.splice(i, 1);
            }
        }
    }
    
    updateDisplay() {
        document.getElementById('score').textContent = `Score: ${this.score}`;
        document.getElementById('length').textContent = `Longueur: ${this.snake.length}`;
        
        if (this.score > this.highScore) {
            this.highScore = this.score;
            localStorage.setItem('snakeProHighScore', this.highScore);
            document.getElementById('high-score').textContent = `Record: ${this.highScore} 🏆`;
            this.showAchievementBadge();
        } else {
            document.getElementById('high-score').textContent = `Record: ${this.highScore}`;
        }
    }
    
    showAchievementBadge() {
        const badge = document.getElementById('achievement-badge');
        badge.style.display = 'block';
        setTimeout(() => {
            badge.style.display = 'none';
        }, 3000);
    }
    
    updateHighScoreDisplay() {
        document.getElementById('high-score').textContent = `Record: ${this.highScore}`;
    }
    
    updateSpeedIndicator() {
        const speedPercent = ((this.baseSpeed - this.currentSpeed) / (this.baseSpeed - 70)) * 100;
        document.getElementById('speed-fill').style.width = Math.min(100, Math.max(0, speedPercent)) + '%';
    }
    
    showSuccessMessage() {
        document.getElementById('success-modal').style.display = 'block';
    }
    
    handleGameOver() {
        document.getElementById('final-score').textContent = `Score: ${this.score}`;
        document.getElementById('gameover').style.display = 'block';
        
        if (this.score > this.highScore) {
            document.getElementById('final-score').innerHTML += `<br><span style="color: #ffcc00; font-size: 30px;">🏆 NOUVEAU RECORD ! 🏆</span>`;
        }
    }
    
    draw() {
        // Fond transparent
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        // Dessiner les particules
        for (const p of this.particles) {
            this.ctx.globalAlpha = p.life / 30;
            this.ctx.fillStyle = p.color;
            this.ctx.beginPath();
            this.ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
            this.ctx.fill();
        }
        this.ctx.globalAlpha = 1;

        // Dessiner la nourriture - AMÉLIORATION ICI
        this.drawFood();
        
        // Dessiner le serpent
        this.drawSnake();
    }
    
    drawSnake() {
        const style = this.getSnakeStyle();
        
        for (let i = 0; i < this.snake.length; i++) {
            const segment = this.snake[i];
            const isHead = (i === 0);
            const progress = i / this.snake.length;
            
            // Calculer la couleur en fonction de la position
            const colorIntensity = 0.5 + progress * 0.5;
            const segmentColor = isHead ? style.headColor : 
                `rgb(${Math.floor(parseInt(style.bodyColor.slice(1,3), 16) * colorIntensity)}, 
                     ${Math.floor(parseInt(style.bodyColor.slice(3,5), 16) * colorIntensity)}, 
                     ${Math.floor(parseInt(style.bodyColor.slice(5,7), 16) * colorIntensity)})`;
            
            this.ctx.fillStyle = segmentColor;
            this.ctx.fillRect(segment.x, segment.y, this.grid, this.grid);
            
            // Bordures
            this.ctx.strokeStyle = style.pattern;
            this.ctx.lineWidth = 2;
            this.ctx.strokeRect(segment.x + 1, segment.y + 1, this.grid - 2, this.grid - 2);
            
            // Tête avec yeux
            if (isHead) {
                this.ctx.fillStyle = style.eyeColor;
                
                // Calculer la position des yeux selon la direction
                const eyeOffsetX = this.dx !== 0 ? (this.dx > 0 ? this.grid - 8 : 8) : this.grid / 2;
                const eyeOffsetY = this.dy !== 0 ? (this.dy > 0 ? this.grid - 8 : 8) : this.grid / 2;
                
                this.ctx.beginPath();
                this.ctx.arc(segment.x + eyeOffsetX, segment.y + 8, 3, 0, Math.PI * 2);
                this.ctx.fill();
                
                this.ctx.beginPath();
                this.ctx.arc(segment.x + eyeOffsetX, segment.y + this.grid - 8, 3, 0, Math.PI * 2);
                this.ctx.fill();
            }
        }
    }
    
    drawFood() {
        const time = Date.now() * 0.001;
        const pulse = 0.8 + Math.sin(time * 3) * 0.2;
        
        // NOURRITURE NORMALE - AMÉLIORATION SIGNIFICATIVE
        const foodSize = this.grid * 0.4 * pulse; // Taille augmentée (40% de la grille)
        
        // Effet de glow
        this.ctx.shadowBlur = 15;
        this.ctx.shadowColor = '#ff4444';
        
        // Cœur principal
        this.ctx.fillStyle = '#ff4444';
        this.ctx.beginPath();
        this.ctx.arc(
            this.food.x + this.grid / 2,
            this.food.y + this.grid / 2,
            foodSize,
            0, Math.PI * 2
        );
        this.ctx.fill();
        
        // Centre lumineux
        this.ctx.fillStyle = '#ff6666';
        this.ctx.beginPath();
        this.ctx.arc(
            this.food.x + this.grid / 2,
            this.food.y + this.grid / 2,
            foodSize * 0.6,
            0, Math.PI * 2
        );
        this.ctx.fill();
        
        // Point central brillant
        this.ctx.fillStyle = '#ffffff';
        this.ctx.beginPath();
        this.ctx.arc(
            this.food.x + this.grid / 2 - foodSize * 0.2,
            this.food.y + this.grid / 2 - foodSize * 0.2,
            foodSize * 0.2,
            0, Math.PI * 2
        );
        this.ctx.fill();
        
        this.ctx.shadowBlur = 0;
        
        // NOURRITURE SPÉCIALE - AMÉLIORÉE AUSSI
        if (this.specialFood) {
            const rotation = time * 2;
            const specialPulse = 0.7 + Math.sin(time * 4) * 0.3;
            const specialSize = this.grid * 0.45 * specialPulse;
            
            this.ctx.save();
            this.ctx.translate(
                this.specialFood.x + this.grid / 2,
                this.specialFood.y + this.grid / 2
            );
            this.ctx.rotate(rotation);
            
            // Effet de glow doré
            this.ctx.shadowBlur = 20;
            this.ctx.shadowColor = '#ffcc00';
            
            // Étoile à 8 branches
            this.ctx.fillStyle = '#ffcc00';
            this.ctx.beginPath();
            
            for (let i = 0; i < 8; i++) {
                const angle = (i * Math.PI) / 4;
                const radius = i % 2 === 0 ? specialSize : specialSize * 0.5;
                const x = Math.cos(angle) * radius;
                const y = Math.sin(angle) * radius;
                
                if (i === 0) this.ctx.moveTo(x, y);
                else this.ctx.lineTo(x, y);
            }
            
            this.ctx.closePath();
            this.ctx.fill();
            
            // Centre brillant
            this.ctx.fillStyle = '#ffff00';
            this.ctx.beginPath();
            this.ctx.arc(0, 0, specialSize * 0.3, 0, Math.PI * 2);
            this.ctx.fill();
            
            this.ctx.restore();
            this.ctx.shadowBlur = 0;
        }
    }
}

// ============================
// GESTION GLOBALE DU JEU
// ============================

let game = null;
let backgroundEffects = null;
let gameBackground = null;
let gameAnimationId = null;
let backgroundAnimationId = null;
let gameActive = false;
let lastTime = 0;
let clickCount = 0;
let clickTimeout = null;

// Éléments DOM
const secretZone = document.getElementById('secret-zone');
const snakeContainer = document.getElementById('snake-container');
const countdown = document.getElementById('countdown');
const doubleClickHint = document.getElementById('double-click-hint');

// Initialiser les effets de fond au chargement
window.addEventListener('load', initBackgroundEffects);

function initBackgroundEffects() {
    const backgroundCanvas = document.getElementById('background-effects');
    backgroundEffects = new BackgroundEffects(backgroundCanvas);
    
    function animateBackground(currentTime) {
        if (!lastTime) lastTime = currentTime;
        const deltaTime = currentTime - lastTime;
        lastTime = currentTime;
        
        backgroundEffects.update(deltaTime);
        backgroundEffects.draw();
        
        backgroundAnimationId = requestAnimationFrame(animateBackground);
    }
    
    lastTime = performance.now();
    backgroundAnimationId = requestAnimationFrame(animateBackground);
}

// Système de double-clic
secretZone.addEventListener('click', function() {
    clickCount++;
    
    if (clickCount === 1) {
        // Premier clic - changement visuel
        secretZone.style.background = 'radial-gradient(circle, rgba(255, 170, 0, 0.5) 0%, transparent 70%)';
        secretZone.style.boxShadow = '0 0 30px rgba(255, 170, 0, 0.5)';
        secretZone.style.transform = 'scale(1.2)';
        
        // Message d'aide
        doubleClickHint.textContent = "Encore un clic !";
        doubleClickHint.style.background = 'rgba(255, 170, 0, 0.3)';
        
        // Reset après 1 seconde
        clickTimeout = setTimeout(() => {
            clickCount = 0;
            secretZone.style.background = 'radial-gradient(circle, rgba(0, 170, 255, 0.3) 0%, transparent 70%)';
            secretZone.style.boxShadow = '0 0 20px rgba(0, 170, 255, 0.3)';
            secretZone.style.transform = 'scale(1)';
            doubleClickHint.textContent = "Double-cliquez sur le serpent";
            doubleClickHint.style.background = 'rgba(0, 170, 255, 0.2)';
        }, 1000);
    } else if (clickCount === 2) {
        // Double-clic détecté
        clearTimeout(clickTimeout);
        clickCount = 0;
        doubleClickHint.style.display = 'none';
        startGame();
    }
});

// Démarrer le jeu
function startGame() {
    secretZone.style.display = 'none';
    countdown.style.display = 'block';
    
    let timer = 3;
    countdown.innerText = timer;
    
    const countdownInterval = setInterval(() => {
        timer--;
        countdown.innerText = timer;
        
        if (timer === 0) {
            clearInterval(countdownInterval);
            countdown.style.display = 'none';
            snakeContainer.style.display = 'block';
            
            // Initialiser le jeu
            game = new SnakeProGame();
            
            // Initialiser le fond du jeu
            const gameCanvas = document.getElementById('game-background');
            gameBackground = new BackgroundEffects(gameCanvas);
            
            gameActive = true;
            
            // Démarrer la boucle de jeu
            startGameLoop();
        }
    }, 1000);
}

// Boucle de jeu principale
function gameLoop(currentTime) {
    if (!gameActive) return;
    
    const deltaTime = currentTime - lastTime;
    lastTime = currentTime;
    
    // Mettre à jour le fond du jeu
    if (gameBackground) {
        gameBackground.update(deltaTime);
        gameBackground.draw();
    }
    
    // Mettre à jour le jeu
    if (game) {
        game.update(deltaTime);
        game.draw();
    }
    
    gameAnimationId = requestAnimationFrame(gameLoop);
}

function startGameLoop() {
    if (gameAnimationId) {
        cancelAnimationFrame(gameAnimationId);
    }
    lastTime = performance.now();
    gameAnimationId = requestAnimationFrame(gameLoop);
}

// Contrôles clavier
document.addEventListener('keydown', (e) => {
    if (!game || game.gameOver || !gameActive) return;
    
    switch(e.key.toLowerCase()) {
        case 'arrowup':
        case 'w':
        case 'z':
            if (game.dy === 0) {
                game.dx = 0;
                game.dy = -game.grid;
            }
            e.preventDefault();
            break;
        case 'arrowdown':
        case 's':
            if (game.dy === 0) {
                game.dx = 0;
                game.dy = game.grid;
            }
            e.preventDefault();
            break;
        case 'arrowleft':
        case 'a':
        case 'q':
            if (game.dx === 0) {
                game.dx = -game.grid;
                game.dy = 0;
            }
            e.preventDefault();
            break;
        case 'arrowright':
        case 'd':
            if (game.dx === 0) {
                game.dx = game.grid;
                game.dy = 0;
            }
            e.preventDefault();
            break;
        case ' ':
        case 'p':
            togglePause();
            e.preventDefault();
            break;
        case 'r':
            if (game.gameOver) {
                restartGame();
            }
            e.preventDefault();
            break;
        case 'escape':
            if (game.paused) {
                togglePause();
            } else if (!game.gameOver) {
                togglePause();
            }
            e.preventDefault();
            break;
    }
});

// Contrôles mobiles
document.querySelectorAll('.control-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        if (!game || game.gameOver || !gameActive || game.paused) return;
        
        const direction = btn.dataset.direction;
        switch(direction) {
            case 'up':
                if (game.dy === 0) {
                    game.dx = 0;
                    game.dy = -game.grid;
                }
                break;
            case 'down':
                if (game.dy === 0) {
                    game.dx = 0;
                    game.dy = game.grid;
                }
                break;
            case 'left':
                if (game.dx === 0) {
                    game.dx = -game.grid;
                    game.dy = 0;
                }
                break;
            case 'right':
                if (game.dx === 0) {
                    game.dx = game.grid;
                    game.dy = 0;
                }
                break;
        }
    });
});

// Bouton pause
document.getElementById('pause-btn').addEventListener('click', togglePause);

function togglePause() {
    if (!game || game.gameOver || !gameActive) return;
    
    game.paused = !game.paused;
    document.getElementById('pause-btn').textContent = game.paused ? 'Reprendre' : 'Pause';
    document.getElementById('pause-screen').style.display = game.paused ? 'block' : 'none';
    
    if (game.paused) {
        // Arrêter l'animation
        cancelAnimationFrame(gameAnimationId);
        gameAnimationId = null;
    } else {
        // Reprendre l'animation
        lastTime = performance.now();
        startGameLoop();
    }
}

// Redémarrer le jeu
function restartGame() {
    document.getElementById('gameover').style.display = 'none';
    document.getElementById('pause-screen').style.display = 'none';
    document.getElementById('success-modal').style.display = 'none';
    gameActive = true;
    
    game = new SnakeProGame();
    
    // Redémarrer la boucle
    lastTime = performance.now();
    startGameLoop();
}

// Retour au menu
function returnToMenu() {
    snakeContainer.style.display = 'none';
    document.getElementById('gameover').style.display = 'none';
    document.getElementById('pause-screen').style.display = 'none';
    document.getElementById('success-modal').style.display = 'none';
    secretZone.style.display = 'flex';
    doubleClickHint.style.display = 'block';
    gameActive = false;
    
    if (gameAnimationId) {
        cancelAnimationFrame(gameAnimationId);
        gameAnimationId = null;
    }
    
    game = null;
    gameBackground = null;
}

// Fermer le modal de succès
function closeSuccessModal() {
    document.getElementById('success-modal').style.display = 'none';
}

// Prévenir le défilement avec les touches fléchées
window.addEventListener('keydown', function(e) {
    if(['ArrowUp','ArrowDown','ArrowLeft','ArrowRight',' ','p','r'].includes(e.key)) {
        e.preventDefault();
    }
}, false);

// Détection mobile
if (/Mobi|Android|iPhone|iPad|iPod/.test(navigator.userAgent)) {
    document.getElementById('mobile-controls').style.display = 'block';
}
</script>
</body>
</html>
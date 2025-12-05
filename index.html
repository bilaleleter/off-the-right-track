<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Défi 3D - Le Village Numérique Résistant</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts for Cyberpunk style -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
         html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            background: black;
            overflow: auto;
        }

        .spline-viewer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1;
        }

        /* Welcome Message Container */
        .welcome-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
            text-align: center;
            width: 90%;
            max-width: 1200px;
            pointer-events: none;
        }

        /* Main Welcome Text */
        .welcome-text {
            font-family: 'Orbitron', sans-serif;
            font-size: 8vw;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 8px;
            margin: 0;
            line-height: 1;
            text-shadow: 
                0 0 10px rgba(255, 255, 255, 0.8),
                0 0 20px rgba(102, 126, 234, 0.8),
                0 0 30px rgba(102, 126, 234, 0.6),
                0 0 40px rgba(102, 126, 234, 0.4),
                0 0 50px rgba(102, 126, 234, 0.2);
            animation: neonGlow 3s ease-in-out infinite alternate;
            background: linear-gradient(135deg,
                #FCC624 0%,
                #FF8C00 25%,
                #667EEA 50%,
                #764BA2 75%,
                #48BB78 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            background-size: 300% 300%;
            animation: neonGlow 3s ease-in-out infinite alternate, 
                      gradientFlow 8s ease-in-out infinite;
        }

        /* Subtitle */
        .subtitle {
            font-family: 'Rajdhani', sans-serif;
            font-size: 2.5vw;
            font-weight: 600;
            color: #a0b3e0;
            margin-top: 20px;
            letter-spacing: 4px;
            text-transform: uppercase;
            text-shadow: 
                0 0 5px rgba(160, 179, 224, 0.5),
                0 0 10px rgba(160, 179, 224, 0.3);
            animation: subtitleGlow 4s ease-in-out infinite alternate;
        }

        /* Tagline */
        .tagline {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.2vw;
            color: #88c0d0;
            margin-top: 15px;
            letter-spacing: 2px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            text-shadow: 0 0 5px rgba(136, 192, 208, 0.5);
            animation: fadeInOut 5s ease-in-out infinite;
        }

        /* Glowing Border */
        .welcome-border {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            border: 3px solid transparent;
            border-radius: 20px;
            background: linear-gradient(135deg, 
                rgba(252, 198, 36, 0.3),
                rgba(102, 126, 234, 0.3),
                rgba(118, 75, 162, 0.3),
                rgba(72, 187, 120, 0.3));
            background-size: 400% 400%;
            animation: borderGlow 6s ease-in-out infinite;
            z-index: -1;
            filter: blur(10px);
            opacity: 0.7;
        }

        /* Holographic Effect */
        .holographic-effect {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                45deg,
                transparent 0%,
                rgba(255, 255, 255, 0.1) 50%,
                transparent 100%
            );
            background-size: 200% 200%;
            animation: hologram 3s ease-in-out infinite;
            mix-blend-mode: overlay;
            z-index: -1;
            border-radius: 20px;
        }

        /* Glowing Particles */
        .glowing-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #FCC624;
            border-radius: 50%;
            box-shadow: 0 0 10px #FCC624, 0 0 20px #FCC624;
            animation: particleFloat 5s linear infinite;
            z-index: -1;
        }

        /* Animations */
        @keyframes neonGlow {
            0% {
                text-shadow: 
                    0 0 10px rgba(255, 255, 255, 0.8),
                    0 0 20px rgba(102, 126, 234, 0.8),
                    0 0 30px rgba(102, 126, 234, 0.6),
                    0 0 40px rgba(102, 126, 234, 0.4),
                    0 0 50px rgba(102, 126, 234, 0.2);
            }
            100% {
                text-shadow: 
                    0 0 15px rgba(255, 255, 255, 1),
                    0 0 25px rgba(252, 198, 36, 0.9),
                    0 0 35px rgba(252, 198, 36, 0.7),
                    0 0 45px rgba(252, 198, 36, 0.5),
                    0 0 55px rgba(252, 198, 36, 0.3);
            }
        }

        @keyframes gradientFlow {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes subtitleGlow {
            0% {
                text-shadow: 
                    0 0 5px rgba(160, 179, 224, 0.5),
                    0 0 10px rgba(160, 179, 224, 0.3);
            }
            100% {
                text-shadow: 
                    0 0 8px rgba(252, 198, 36, 0.6),
                    0 0 15px rgba(252, 198, 36, 0.4),
                    0 0 20px rgba(252, 198, 36, 0.2);
            }
        }

        @keyframes fadeInOut {
            0%, 100% {
                opacity: 0.7;
            }
            50% {
                opacity: 1;
            }
        }

        @keyframes borderGlow {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes hologram {
            0% {
                background-position: 0% 0%;
            }
            100% {
                background-position: 200% 200%;
            }
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(100px) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .welcome-text {
                font-size: 12vw;
                letter-spacing: 4px;
            }
            
            .subtitle {
                font-size: 4vw;
                letter-spacing: 2px;
                margin-top: 10px;
            }
            
            .tagline {
                font-size: 3vw;
                max-width: 90%;
                letter-spacing: 1px;
            }
            
            .welcome-border {
                top: -10px;
                left: -10px;
                right: -10px;
                bottom: -10px;
            }
        }

        @media (max-width: 480px) {
            .welcome-text {
                font-size: 15vw;
                letter-spacing: 2px;
            }
            
            .subtitle {
                font-size: 5vw;
            }
            
            .tagline {
                font-size: 4vw;
            }
        }

        /* Cyber Grid Background for Text */
        .cyber-grid {
            position: absolute;
            top: -50px;
            left: -50px;
            right: -50px;
            bottom: -50px;
            background-image: 
                linear-gradient(rgba(252, 198, 36, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(252, 198, 36, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            animation: gridScan 20s linear infinite;
            z-index: -2;
            opacity: 0.3;
        }

        @keyframes gridScan {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 30px 30px;
            }
        }

        /* Modern Animated Navbar - Your existing styles */
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

        /* Background grid effect */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: -1;
            opacity: 0.5;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            from {
                background-position: 0 0;
            }
            to {
                background-position: 50px 50px;
            }
        }

        /* Floating particles in background */
        .floating-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: rgba(252, 198, 36, 0.6);
            border-radius: 50%;
            box-shadow: 0 0 10px #FCC624;
            animation: floatParticle 15s linear infinite;
        }

        @keyframes floatParticle {
            0% {
                transform: translateY(100vh) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Glitch effect on hover */
        .nav-item.glitch {
            animation: glitch 0.3s infinite;
        }

        @keyframes glitch {
            0% {
                transform: translateY(-5px) scale(1.05);
                filter: hue-rotate(0deg);
            }
            20% {
                transform: translateY(-5px) scale(1.05) translateX(2px);
                filter: hue-rotate(90deg);
            }
            40% {
                transform: translateY(-5px) scale(1.05) translateX(-2px);
                filter: hue-rotate(180deg);
            }
            60% {
                transform: translateY(-5px) scale(1.05) translateX(1px);
                filter: hue-rotate(270deg);
            }
            80% {
                transform: translateY(-5px) scale(1.05) translateX(-1px);
                filter: hue-rotate(360deg);
            }
            100% {
                transform: translateY(-5px) scale(1.05);
                filter: hue-rotate(0deg);
            }
        }

        /* Notification dot */
        .notification-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: #ff4757;
            border-radius: 50%;
            animation: blink 2s infinite;
            box-shadow: 0 0 10px #ff4757;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
    </style>
</head>
<body>
    <div class="spline-viewer">
        <spline-viewer url="https://prod.spline.design/BK83Flm76SwRJlHz/scene.splinecode"></spline-viewer>
    </div>

    <!-- Welcome Message Container -->
    <div class="welcome-container">
        <div class="cyber-grid"></div>
        <div class="welcome-border"></div>
        <div class="holographic-effect"></div>
        
        <h1 class="welcome-text">BYTEBACK</h1>
        <p class="subtitle">LE VILLAGE NUMÉRIQUE RÉSISTANT</p>
        <p class="tagline">Explorez l'avenir de la résilience numérique à travers nos expériences immersives</p>
        
        <!-- Glowing particles -->
        <div class="glowing-particle" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
        <div class="glowing-particle" style="top: 40%; right: 15%; animation-delay: 1s;"></div>
        <div class="glowing-particle" style="top: 70%; left: 20%; animation-delay: 2s;"></div>
        <div class="glowing-particle" style="top: 30%; right: 25%; animation-delay: 3s;"></div>
        <div class="glowing-particle" style="top: 80%; left: 30%; animation-delay: 4s;"></div>
    </div>

    <!-- Modern Animated Navbar -->
    <nav class="cyber-navbar">
        <div class="nav-item" data-url="Main/loading2.html">
            <i class="fas fa-robot"></i>
            <span>ChatBot AI</span>
            <div class="nav-tooltip">Assistant IA intelligent pour vous guider</div>
            <div class="notification-dot"></div>
        </div>
        
        <div class="nav-item" data-url="Main/loading3.html">
            <i class="fas fa-gamepad"></i>
            <span>Snack Game</span>
            <div class="nav-tooltip">Jeu rétro Snake avec un twist moderne</div>
        </div>
        
        <div class="nav-item" data-url="Main/loading4.html">
            <i class="fas fa-ghost"></i>
            <span>Retro Zone</span>
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
        <script type="module" src="https://unpkg.com/@splinetool/viewer@1.12.6/build/spline-viewer.js"></script>

    <!-- Navbar Interactions Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating particles
            createParticles();
            
            // Create additional glowing particles for welcome message
            createWelcomeParticles();
            
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
            
            // Create particles for welcome message
            function createWelcomeParticles() {
                const container = document.querySelector('.welcome-container');
                const particleCount = 8;
                
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'glowing-particle';
                    
                    // Random position around the welcome text
                    const left = 5 + Math.random() * 90;
                    const top = 5 + Math.random() * 90;
                    const delay = Math.random() * 5;
                    
                    particle.style.left = `${left}%`;
                    particle.style.top = `${top}%`;
                    particle.style.animationDelay = `${delay}s`;
                    
                    // Random color from gradient palette
                    const colors = ['#FCC624', '#667EEA', '#764BA2', '#48BB78'];
                    const color = colors[Math.floor(Math.random() * colors.length)];
                    particle.style.background = color;
                    particle.style.boxShadow = `0 0 10px ${color}, 0 0 20px ${color}`;
                    
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
        });
    </script>
    <script>
        window.onload = () => {
            const viewer = document.querySelector("spline-viewer");
            if (viewer && viewer.shadowRoot) {
                const shadow = viewer.shadowRoot;
                const logo = shadow.querySelector("#logo");
                if (logo) logo.remove();
            }
        };
    </script>
</body>
</html>


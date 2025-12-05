<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Défi 3D - Le Village Numérique Résistant</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Floating Sign-up Container */
        #signup-container {
            position: fixed;
            top: 50%;
            left: 40px;
            transform: translateY(-50%);
            z-index: 1000;
            width: 400px;
            pointer-events: none;
        }

        .signup-wrapper {
            pointer-events: all;
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            max-height: 85vh;
            overflow-y: auto;
        }

        .signup-card {
            padding: 40px;
            position: relative;
            transition: transform 0.3s ease;
        }

        .card-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 32px;
            color: white;
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.5);
        }

        .signup-card h1 {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: #666;
            font-size: 16px;
            font-weight: 500;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .mode-switch {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .mode-btn {
            background: none;
            border: none;
            color: #999;
            font-size: 15px;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .mode-btn.active {
            color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }

        .mode-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 20px;
            right: 20px;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 1px;
        }

        /* Floating Input Groups */
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group.floating {
            position: relative;
        }

        .input-group.floating input,
        .input-group.floating select {
            width: 100%;
            padding: 20px 20px 10px 50px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 16px;
            background: #f8f9fa;
            transition: all 0.3s ease;
            color: #333;
            height: 60px;
            box-sizing: border-box;
            appearance: none;
        }

        .input-group.floating select {
            padding-right: 40px;
        }

        .input-group.floating input:focus,
        .input-group.floating select:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.15);
        }

        .input-group.floating label {
            position: absolute;
            top: 20px;
            left: 50px;
            color: #888;
            font-size: 16px;
            font-weight: 500;
            pointer-events: none;
            transition: all 0.3s ease;
            transform-origin: left top;
        }

        .input-group.floating.focused label,
        .input-group.floating input:not(:placeholder-shown) + label,
        .input-group.floating select:valid + label {
            top: 10px;
            font-size: 12px;
            color: #667eea;
            transform: translateY(0);
        }

        .icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 18px;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .input-group.floating.focused .icon {
            color: #667eea;
        }

        .toggle-password {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #667eea;
        }

        .select-arrow {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 16px;
            pointer-events: none;
        }

        .focus-border {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: width 0.4s ease;
            border-radius: 2px;
        }

        .input-group.floating.focused .focus-border {
            width: 100%;
        }

        /* Form Options */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .checkbox-custom {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
            color: #555;
            font-size: 14px;
            font-weight: 500;
        }

        .checkbox-custom input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            width: 20px;
            height: 20px;
            border: 2px solid #ddd;
            border-radius: 6px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            background: white;
        }

        .checkmark i {
            color: white;
            font-size: 12px;
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s ease;
        }

        .checkbox-custom input:checked ~ .checkmark {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
        }

        .checkbox-custom input:checked ~ .checkmark i {
            opacity: 1;
            transform: scale(1);
        }

        .forgot-link {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .forgot-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Buttons */
        .btn-gradient {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn-gradient:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.8s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 35px rgba(102, 126, 234, 0.5);
        }

        .btn-gradient:hover:before {
            left: 100%;
        }

        .btn-gradient:active {
            transform: translateY(-1px);
        }

        .btn-gradient:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .btn-gradient.success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            box-shadow: 0 10px 25px rgba(72, 187, 120, 0.4);
        }

        .btn-outline {
            width: 100%;
            padding: 17px;
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
        }

        .btn-outline:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        /* Progress indicator */
        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin: 25px 0;
            position: relative;
        }

        .progress-steps:before {
            content: '';
            position: absolute;
            top: 12px;
            left: 0;
            right: 0;
            height: 3px;
            background: #eee;
            z-index: 1;
        }

        .progress-steps:after {
            content: '';
            position: absolute;
            top: 12px;
            left: 0;
            width: 50%;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            z-index: 2;
            transition: width 0.5s ease;
        }

        .step {
            width: 27px;
            height: 27px;
            border-radius: 50%;
            background: white;
            border: 3px solid #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: #999;
            position: relative;
            z-index: 3;
            transition: all 0.3s ease;
        }

        .step.active {
            border-color: #667eea;
            color: #667eea;
            transform: scale(1.1);
        }

        .step.completed {
            background: #667eea;
            border-color: #667eea;
            color: white;
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #999;
            font-size: 14px;
            font-weight: 500;
        }

        .divider:before,
        .divider:after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #eee;
        }

        .divider span {
            padding: 0 15px;
        }

        /* Social Login */
        .social-login {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            background: white;
            color: #555;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .social-btn.google:hover {
            border-color: #DB4437;
            color: #DB4437;
        }

        .social-btn.github:hover {
            border-color: #333;
            color: #333;
        }

        /* Card Footer */
        .card-footer {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
            color: #777;
            font-size: 13px;
            font-weight: 500;
        }

        .card-footer i {
            margin-right: 8px;
            color: #667eea;
        }

        /* Message System */
        .message {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            opacity: 1;
            transition: opacity 0.3s ease;
            z-index: 100;
            animation: slideDown 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        @keyframes slideDown {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .message.success {
            background: rgba(72, 187, 120, 0.9);
            color: white;
            box-shadow: 0 10px 25px rgba(72, 187, 120, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .message.error {
            background: rgba(245, 101, 101, 0.9);
            color: white;
            box-shadow: 0 10px 25px rgba(245, 101, 101, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .message.info {
            background: rgba(66, 153, 225, 0.9);
            color: white;
            box-shadow: 0 10px 25px rgba(66, 153, 225, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .message.warning {
            background: rgba(237, 137, 54, 0.9);
            color: white;
            box-shadow: 0 10px 25px rgba(237, 137, 54, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Hide forms initially */
        .form-container {
            display: none;
        }

        .form-container.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Password strength indicator */
        .password-strength {
            height: 4px;
            background: #eee;
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            background: #f56565;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .strength-bar.weak { width: 25%; background: #f56565; }
        .strength-bar.fair { width: 50%; background: #ed8936; }
        .strength-bar.good { width: 75%; background: #48bb78; }
        .strength-bar.strong { width: 100%; background: #38a169; }

        /* Adjust 3D container */
        #3d-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            #signup-container {
                left: 20px;
                width: 380px;
            }
        }

        @media (max-width: 768px) {
            #signup-container {
                position: relative;
                top: auto;
                left: auto;
                transform: none;
                width: 100%;
                max-width: 500px;
                margin: 30px auto;
                padding: 0 15px;
            }
            
            .signup-wrapper {
                margin: 0 auto;
                max-height: none;
            }
            
            #3d-container {
                position: relative;
                height: 500px;
            }
        }

        /* Glass morphism effect on hover */
        .signup-wrapper:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 
                0 35px 70px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(-50%) translateX(0);
            }
            50% {
                transform: translateY(-50%) translateX(-8px);
            }
        }

        #signup-container {
            animation: float 8s ease-in-out infinite;
        }
    </style>
</head>
<body>

    <!-- This info panel will be hidden by default and shown on hover -->
    <div id="info-panel" class="hidden">
        <div id="component-info">
            <h2 id="component-name"></h2>
            <p id="component-description"></p>
        </div>
    </div>

    <!-- Floating Sign-up container -->
    <div id="signup-container">
        <div class="signup-wrapper">
            <div class="signup-card">
                <div class="card-header">
                         <img src="byteback.jpg" alt="ByteBack Logo" class="logo">
                    </div>
                    <h1>ByteBack</h1>
                    <p class="subtitle">Rejoignez le Village Numérique Résistant</p>
                    
                    <div class="mode-switch">
                        <button class="mode-btn active" id="signupModeBtn">S'inscrire</button>
                        <button class="mode-btn" id="loginModeBtn">Se Connecter</button>
                    </div>
                    
                    <div class="progress-steps">
                        <div class="step completed">1</div>
                        <div class="step active">2</div>
                        <div class="step">3</div>
                    </div>
                </div>
                
                <!-- Sign-up Form -->
                <form id="signup-form" class="form-container active" action="signup.php" method="POST">
                    <div class="input-group floating">
                        <i class="fas fa-user icon"></i>
                        <input type="text" id="username" name="username" placeholder=" " required>
                        <label>Nom d'utilisateur</label>
                        <span class="focus-border"></span>
                    </div>
                    
                    <div class="input-group floating">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" id="email" name="email" placeholder=" " required>
                        <label>Adresse Email</label>
                        <span class="focus-border"></span>
                    </div>
                    
                    <div class="input-group floating">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="password" name="password" placeholder=" " required minlength="8">
                        <label>Mot de Passe</label>
                        <button type="button" class="toggle-password" data-target="password">
                            <i class="fas fa-eye"></i>
                        </button>
                        <span class="focus-border"></span>
                        <div class="password-strength">
                            <div class="strength-bar" id="password-strength-bar"></div>
                        </div>
                    </div>
                    
                    <div class="input-group floating">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder=" " required>
                        <label>Confirmer le Mot de Passe</label>
                        <button type="button" class="toggle-password" data-target="confirm_password">
                            <i class="fas fa-eye"></i>
                        </button>
                        <span class="focus-border"></span>
                    </div>
                    
                    <div class="input-group floating">
                        <i class="fas fa-venus-mars icon"></i>
                        <select id="gender" name="gender">
                            <option value="" selected disabled></option>
                            <option value="male">Homme</option>
                            <option value="female">Femme</option>
                            <option value="other">Autre</option>
                            <option value="prefer_not_to_say">Préfère ne pas dire</option>
                        </select>
                        <label>Genre</label>
                        <i class="fas fa-chevron-down select-arrow"></i>
                        <span class="focus-border"></span>
                    </div>
                    
                    <div class="form-options">
                        <label class="checkbox-custom">
                            <input type="checkbox" id="terms" name="terms" required>
                            <span class="checkmark">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="label-text">J'accepte les <a href="#" class="forgot-link">conditions d'utilisation</a></span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-gradient" id="signup-submit">
                        <i class="fas fa-user-plus"></i>
                        Créer mon compte
                    </button>
                    
                    <div class="divider">
                        <span>Ou continuez avec</span>
                    </div>
                    
                    <div class="social-login">
                        <button type="button" class="social-btn google">
                            <i class="fab fa-google"></i>
                            Google
                        </button>
                        <button type="button" class="social-btn github">
                            <i class="fab fa-github"></i>
                            GitHub
                        </button>
                    </div>
                </form>
                
                <!-- Login Form -->
                <form id="login-form" class="form-container" action="login.php" method="POST">
                    <div class="input-group floating">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" id="login_email" name="email" placeholder=" " required>
                        <label>Adresse Email</label>
                        <span class="focus-border"></span>
                    </div>
                    
                    <div class="input-group floating">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="login_password" name="password" placeholder=" " required>
                        <label>Mot de Passe</label>
                        <button type="button" class="toggle-password" data-target="login_password">
                            <i class="fas fa-eye"></i>
                        </button>
                        <span class="focus-border"></span>
                    </div>
                    
                    <div class="form-options">
                        <label class="checkbox-custom">
                            <input type="checkbox" id="remember" name="remember">
                            <span class="checkmark">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="label-text">Se souvenir de moi</span>
                        </label>
                        <a href="#" class="forgot-link">Mot de passe oublié?</a>
                    </div>
                    
                    <button type="submit" class="btn-gradient" id="login-submit">
                        <i class="fas fa-sign-in-alt"></i>
                        Se Connecter
                    </button>
                    
                    <div class="divider">
                        <span>Pas encore de compte?</span>
                    </div>
                    
                    <button type="button" class="btn-outline" id="switchToSignup">
                        <i class="fas fa-user-plus"></i>
                        Créer un compte
                    </button>
                </form>
                
                <div class="card-footer">
                    <p><i class="fas fa-shield-alt"></i> Vos données sont cryptées et sécurisées</p>
                </div>
            </div>
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
    
    <!-- Sign-up/Login functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mode switching
            const signupModeBtn = document.getElementById('signupModeBtn');
            const loginModeBtn = document.getElementById('loginModeBtn');
            const signupForm = document.getElementById('signup-form');
            const loginForm = document.getElementById('login-form');
            const switchToSignupBtn = document.getElementById('switchToSignup');
            const progressSteps = document.querySelectorAll('.step');
            
            function switchToSignup() {
                signupModeBtn.classList.add('active');
                loginModeBtn.classList.remove('active');
                signupForm.classList.add('active');
                loginForm.classList.remove('active');
                
                // Update progress steps
                progressSteps[0].classList.add('completed');
                progressSteps[1].classList.add('active');
                progressSteps[2].classList.remove('active');
                document.querySelector('.progress-steps').style.setProperty('--progress-width', '50%');
            }
            
            function switchToLogin() {
                loginModeBtn.classList.add('active');
                signupModeBtn.classList.remove('active');
                loginForm.classList.add('active');
                signupForm.classList.remove('active');
            }
            
            signupModeBtn.addEventListener('click', switchToSignup);
            loginModeBtn.addEventListener('click', switchToLogin);
            switchToSignupBtn.addEventListener('click', switchToSignup);
            
            // Password toggle functionality
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    
                    if (targetInput.type === 'password') {
                        targetInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        targetInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
            
            // Password strength checker
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('password-strength-bar');
            
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                // Check password strength
                if (password.length >= 8) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;
                
                // Update strength bar
                strengthBar.className = 'strength-bar';
                if (password.length === 0) {
                    strengthBar.style.width = '0%';
                } else if (strength === 1) {
                    strengthBar.classList.add('weak');
                } else if (strength === 2) {
                    strengthBar.classList.add('fair');
                } else if (strength === 3) {
                    strengthBar.classList.add('good');
                } else if (strength >= 4) {
                    strengthBar.classList.add('strong');
                }
            });
            
            // Form validation and submission
            const signupSubmitBtn = document.getElementById('signup-submit');
            const loginSubmitBtn = document.getElementById('login-submit');
            
            document.getElementById('signup-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const username = document.getElementById('username').value;
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm_password').value;
                const gender = document.getElementById('gender').value;
                const terms = document.getElementById('terms').checked;
                
                // Validation
                if (!username || !email || !password || !confirmPassword || !gender || !terms) {
                    showMessage('Veuillez remplir tous les champs obligatoires', 'error');
                    return;
                }
                
                if (password !== confirmPassword) {
                    showMessage('Les mots de passe ne correspondent pas', 'error');
                    return;
                }
                
                if (password.length < 8) {
                    showMessage('Le mot de passe doit contenir au moins 8 caractères', 'error');
                    return;
                }
                
                // Show loading state
                const originalText = signupSubmitBtn.innerHTML;
                signupSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Création du compte...';
                signupSubmitBtn.disabled = true;
                
                // Submit form via AJAX
                const formData = new FormData(this);
                
                fetch('signup.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showMessage(data.message, 'success');
                        // Update progress steps
                        progressSteps[1].classList.remove('active');
                        progressSteps[1].classList.add('completed');
                        progressSteps[2].classList.add('active');
                        document.querySelector('.progress-steps').style.setProperty('--progress-width', '100%');
                        
                        // Redirect after successful signup
                        setTimeout(() => {
                            window.location.href = 'loading.html';
                        }, 2000);
                    } else {
                        showMessage(data.message, 'error');
                        signupSubmitBtn.innerHTML = originalText;
                        signupSubmitBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('Une erreur est survenue. Veuillez réessayer.', 'error');
                    signupSubmitBtn.innerHTML = originalText;
                    signupSubmitBtn.disabled = false;
                });
            });
            
            document.getElementById('login-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const email = document.getElementById('login_email').value;
                const password = document.getElementById('login_password').value;
                
                if (!email || !password) {
                    showMessage('Veuillez remplir tous les champs', 'error');
                    return;
                }
                
                // Show loading state
                const originalText = loginSubmitBtn.innerHTML;
                loginSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Connexion...';
                loginSubmitBtn.disabled = true;
                
                // Submit form via AJAX
                const formData = new FormData(this);
                
                fetch('login.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showMessage(data.message, 'success');
                        
                        // Redirect after successful login
                        setTimeout(() => {
                            window.location.href = 'dashboard.php';
                        }, 1500);
                    } else {
                        showMessage(data.message, 'error');
                        loginSubmitBtn.innerHTML = originalText;
                        loginSubmitBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('Une erreur est survenue. Veuillez réessayer.', 'error');
                    loginSubmitBtn.innerHTML = originalText;
                    loginSubmitBtn.disabled = false;
                });
            });
            
            // Floating labels
            document.querySelectorAll('.floating input, .floating select').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value && !(this.tagName === 'SELECT' && this.value)) {
                        this.parentElement.classList.remove('focused');
                    }
                });
                
                // Initialize floating labels for selects
                if (input.tagName === 'SELECT' && input.value) {
                    input.parentElement.classList.add('focused');
                }
            });
            
            // Social buttons
            document.querySelectorAll('.social-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const provider = this.classList.contains('google') ? 'Google' : 'GitHub';
                    showMessage(`Connexion avec ${provider} - À implémenter`, 'info');
                });
            });
            
            // Forgot password link
            document.querySelectorAll('.forgot-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (!this.href.includes('#')) {
                        e.preventDefault();
                        showMessage('Fonctionnalité de récupération à implémenter', 'info');
                    }
                });
            });
            
            // Helper function to show messages
            function showMessage(text, type) {
                // Remove existing messages
                const existingMessages = document.querySelectorAll('.message');
                existingMessages.forEach(msg => msg.remove());
                
                // Create new message
                const messageEl = document.createElement('div');
                messageEl.className = `message ${type}`;
                messageEl.textContent = text;
                document.querySelector('.signup-card').prepend(messageEl);
                
                // Remove after 4 seconds
                setTimeout(() => {
                    messageEl.style.opacity = '0';
                    setTimeout(() => {
                        if (messageEl.parentNode) {
                            messageEl.parentNode.removeChild(messageEl);
                        }
                    }, 300);
                }, 4000);
            }
            
            // 3D card effect
            const card = document.querySelector('.signup-card');
            if (card) {
                card.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateY = (x - centerX) / 30;
                    const rotateX = (centerY - y) / 30;
                    
                    this.style.transform = `perspective(1200px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.01)`;
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'perspective(1200px) rotateX(0) rotateY(0) scale(1)';
                });
            }
        });
    </script>

</body>
</html>
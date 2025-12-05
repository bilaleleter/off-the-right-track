<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linux Tutor - Interactive Terminal Learning</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Ubuntu Mono', 'Courier New', monospace;
        }

        :root {
            --primary-blue: #0073e6;
            --dark-blue: #0056b3;
            --light-blue: #4da8ff;
            --terminal-bg: #0a1929;
            --terminal-header: #132f4c;
            --terminal-text: #ffffff;
            --command-green: #00cc66;
            --path-cyan: #00d4ff;
            --error-red: #ff4d4d;
            --success-green: #00cc88;
            --lesson-bg: #ffffff;
            --lesson-border: #e6f2ff;
            --sidebar-bg: #f0f8ff;
            --text-dark: #1a365d;
            --text-light: #4a5568;
            --highlight-blue: #e6f2ff;
        }

        body {
            background: linear-gradient(135deg, #e6f2ff 0%, #cce5ff 100%);
            color: var(--text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 30px;
            border-bottom: 3px solid var(--primary-blue);
            background: white;
            border-radius: 10px;
            padding: 20px 30px;
            box-shadow: 0 4px 12px rgba(0, 115, 230, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo i {
            font-size: 2.5rem;
            color: var(--primary-blue);
            background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo h1 {
            font-size: 2.2rem;
            background: linear-gradient(to right, var(--primary-blue), var(--light-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .progress-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 5px;
        }

        .progress-text {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .progress-bar {
            width: 200px;
            height: 12px;
            background: var(--sidebar-bg);
            border-radius: 6px;
            overflow: hidden;
            border: 1px solid var(--lesson-border);
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-blue), var(--light-blue));
            width: 0%;
            transition: width 0.5s ease;
            border-radius: 6px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
            color: white;
            border: 1px solid var(--primary-blue);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 115, 230, 0.2);
        }

        /* Main Layout */
        .main-content {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 30px;
            height: calc(100vh - 180px);
        }

        /* Sidebar - Lessons */
        .sidebar {
            background: var(--sidebar-bg);
            border-radius: 12px;
            padding: 25px;
            overflow-y: auto;
            border: 2px solid var(--lesson-border);
            box-shadow: 0 4px 12px rgba(0, 115, 230, 0.08);
        }

        .sidebar h2 {
            color: var(--primary-blue);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--lesson-border);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar h2 i {
            background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .lesson-category {
            margin-bottom: 25px;
            background: white;
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--lesson-border);
        }

        .category-title {
            color: var(--dark-blue);
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 8px 0;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .category-title i {
            color: var(--primary-blue);
            transition: transform 0.3s;
        }

        .lesson-list {
            list-style: none;
            display: block;
        }

        .lesson-item {
            padding: 12px 15px;
            margin: 8px 0;
            background: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            border-left: 4px solid var(--lesson-border);
            border: 1px solid var(--lesson-border);
        }

        .lesson-item:hover {
            background: var(--highlight-blue);
            transform: translateX(5px);
            border-left-color: var(--primary-blue);
        }

        .lesson-item.active {
            border-left-color: var(--primary-blue);
            background: var(--highlight-blue);
            box-shadow: 0 2px 8px rgba(0, 115, 230, 0.1);
        }

        .lesson-item.completed {
            border-left-color: var(--success-green);
        }

        .lesson-item i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            color: var(--primary-blue);
        }

        .lesson-content {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .lesson-title {
            font-weight: 600;
            color: var(--text-dark);
        }

        .lesson-desc {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        /* Terminal Container */
        .terminal-container {
            background: var(--terminal-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 2px solid var(--terminal-header);
        }

        /* Terminal Header */
        .terminal-header {
            background: linear-gradient(135deg, var(--terminal-header), #1a3d66);
            padding: 18px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgba(0, 212, 255, 0.2);
        }

        .terminal-title {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .terminal-title i {
            color: var(--path-cyan);
        }

        .window-controls {
            display: flex;
            gap: 12px;
        }

        .window-control {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            transition: transform 0.2s;
        }

        .window-control:hover {
            transform: scale(1.1);
        }

        .close { background: #ff5f56; }
        .minimize { background: #ffbd2e; }
        .maximize { background: #27ca3f; }

        /* Terminal Content */
        .terminal-content {
            flex: 1;
            padding: 25px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            background: linear-gradient(160deg, #0a1929 0%, #0d2038 100%);
        }

        .terminal-output {
            flex: 1;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .output-line {
            margin-bottom: 8px;
            white-space: pre-wrap;
            word-break: break-all;
            font-size: 1rem;
        }

        .command { 
            color: var(--command-green);
            font-weight: 600;
        }
        .path { 
            color: var(--path-cyan);
            font-weight: 600;
        }
        .error { 
            color: var(--error-red);
            font-weight: 600;
        }
        .success { 
            color: var(--success-green);
            font-weight: 600;
        }
        .output { 
            color: var(--terminal-text);
        }
        .comment { 
            color: #88aacc;
            font-style: italic;
        }
        .highlight { 
            color: var(--light-blue);
            font-weight: 600;
        }

        /* Input Area */
        .input-area {
            display: flex;
            align-items: center;
            background: rgba(19, 47, 76, 0.6);
            border-radius: 8px;
            padding: 12px 15px;
            border: 2px solid rgba(0, 212, 255, 0.3);
            margin-top: 10px;
            transition: border-color 0.3s;
        }

        .input-area:focus-within {
            border-color: var(--path-cyan);
        }

        .prompt {
            color: var(--path-cyan);
            margin-right: 12px;
            white-space: nowrap;
            font-weight: 600;
            font-size: 1rem;
        }

        #command-input {
            background: transparent;
            border: none;
            color: white;
            font-size: 1rem;
            flex: 1;
            outline: none;
            font-family: 'Ubuntu Mono', monospace;
            font-weight: 500;
        }

        /* Help Panel */
        .help-panel {
            background: rgba(19, 47, 76, 0.8);
            border-radius: 8px;
            padding: 20px;
            margin-top: 25px;
            border-left: 4px solid var(--path-cyan);
            border-top: 1px solid rgba(0, 212, 255, 0.2);
        }

        .help-title {
            color: var(--path-cyan);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .command-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 12px;
            margin-top: 12px;
        }

        .command-help {
            background: rgba(255, 255, 255, 0.08);
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 0.9rem;
            border: 1px solid rgba(0, 212, 255, 0.1);
            transition: all 0.3s;
        }

        .command-help:hover {
            background: rgba(0, 212, 255, 0.1);
            transform: translateY(-2px);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 25, 41, 0.9);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(3px);
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            padding: 35px;
            max-width: 500px;
            width: 90%;
            border: 3px solid var(--primary-blue);
            box-shadow: 0 15px 40px rgba(0, 115, 230, 0.2);
        }

        .modal h2 {
            color: var(--primary-blue);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
        }

        .modal p {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border: 2px solid var(--lesson-border);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
            box-shadow: 0 8px 20px rgba(0, 115, 230, 0.1);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
                height: auto;
            }
            
            .sidebar {
                height: 400px;
            }
            
            .header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .user-info {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .command-list {
                grid-template-columns: 1fr;
            }
            
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Animations */
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        .cursor {
            display: inline-block;
            width: 8px;
            height: 18px;
            background: var(--path-cyan);
            vertical-align: middle;
            margin-left: 3px;
            animation: blink 1s infinite;
        }

        .typewriter {
            overflow: hidden;
            border-right: 3px solid var(--path-cyan);
            white-space: nowrap;
            margin: 0;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: var(--path-cyan) }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 212, 255, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(0, 212, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 212, 255, 0); }
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--sidebar-bg);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-blue), var(--light-blue));
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--dark-blue);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <i class="fab fa-ubuntu"></i>
                <h1>Linux Tutor</h1>
            </div>
            <div class="user-info">
                <div class="progress-container">
                    <span class="progress-text">Learning Progress</span>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progress-fill"></div>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="showResetModal()">
                    <i class="fas fa-redo"></i> Reset
                </button>
                <button class="btn btn-secondary" onclick="showStats()">
                    <i class="fas fa-chart-line"></i> Stats
                </button>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="stats-cards" id="stats-cards" style="display: none;">
            <div class="stat-card">
                <div class="stat-number" id="completed-lessons">0</div>
                <div class="stat-label">Lessons Completed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="commands-executed">0</div>
                <div class="stat-label">Commands Executed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="accuracy-rate">0%</div>
                <div class="stat-label">Accuracy Rate</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="time-spent">0m</div>
                <div class="stat-label">Time Learning</div>
            </div>
        </div>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Sidebar with Lessons -->
            <aside class="sidebar">
                <h2><i class="fas fa-graduation-cap"></i> Linux Curriculum</h2>
                
                <div class="lesson-category">
                    <div class="category-title" onclick="toggleCategory('beginner')">
                        <span><i class="fas fa-play-circle"></i> Beginner Level</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="lesson-list" id="beginner-lessons">
                        <!-- Lessons populated by JavaScript -->
                    </ul>
                </div>

                <div class="lesson-category">
                    <div class="category-title" onclick="toggleCategory('intermediate')">
                        <span><i class="fas fa-cogs"></i> Intermediate Level</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="lesson-list" id="intermediate-lessons">
                        <!-- Lessons populated by JavaScript -->
                    </ul>
                </div>

                <div class="lesson-category">
                    <div class="category-title" onclick="toggleCategory('advanced')">
                        <span><i class="fas fa-rocket"></i> Advanced Level</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="lesson-list" id="advanced-lessons">
                        <!-- Lessons populated by JavaScript -->
                    </ul>
                </div>

                <div class="lesson-category">
                    <div class="category-title" onclick="toggleCategory('projects')">
                        <span><i class="fas fa-project-diagram"></i> Practical Projects</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="lesson-list" id="project-lessons">
                        <!-- Lessons populated by JavaScript -->
                    </ul>
                </div>
            </aside>

            <!-- Terminal -->
            <section class="terminal-container">
                <div class="terminal-header">
                    <div class="terminal-title">
                        <i class="fas fa-terminal pulse"></i>
                        <span>linux-tutor-terminal</span>
                    </div>
                    <div class="window-controls">
                        <div class="window-control close" onclick="clearTerminal()" title="Clear terminal"></div>
                        <div class="window-control minimize" onclick="toggleHelpPanel()" title="Toggle help"></div>
                        <div class="window-control maximize" onclick="fullscreenTerminal()" title="Fullscreen"></div>
                    </div>
                </div>

                <div class="terminal-content">
                    <div class="terminal-output" id="output">
                        <!-- Terminal output will appear here -->
                        <div class="output-line typewriter">Welcome to Linux Tutor - Interactive Learning Platform</div>
                        <div class="output-line"><span class="highlight">Type 'help'</span> for available commands, <span class="highlight">'start'</span> to begin tutorial</div>
                        <div class="output-line comment"># This is a safe environment to practice Linux commands</div>
                        <div class="output-line path">student@linux-tutor:~$</div>
                    </div>

                    <div class="input-area">
                        <span class="prompt">student@linux-tutor:~$</span>
                        <input type="text" id="command-input" autofocus placeholder="Type command and press Enter...">
                        <span class="cursor"></span>
                    </div>

                    <!-- Help Panel -->
                    <div class="help-panel" id="help-panel">
                        <div class="help-title">
                            <i class="fas fa-info-circle"></i>
                            <span>Available Commands</span>
                        </div>
                        <div class="command-list" id="command-list">
                            <!-- Commands populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Reset Progress Modal -->
    <div class="modal" id="reset-modal">
        <div class="modal-content">
            <h2><i class="fas fa-exclamation-triangle"></i> Reset Progress</h2>
            <p>Are you sure you want to reset all your progress? This action cannot be undone.</p>
            <p>You'll lose all completed lessons and statistics.</p>
            <div class="modal-buttons">
                <button class="btn btn-secondary" onclick="hideResetModal()">Cancel</button>
                <button class="btn btn-primary" onclick="resetProgress()">Reset All Progress</button>
            </div>
        </div>
    </div>

    <script>
        // Global State
        const state = {
            currentLesson: 1,
            currentPath: '~',
            progress: {
                completedLessons: [],
                currentStep: 0,
                commandsExecuted: 0,
                correctCommands: 0,
                startTime: Date.now(),
                totalTime: 0
            },
            fileSystem: {
                '~': {
                    type: 'directory',
                    contents: ['Desktop', 'Documents', 'Downloads', 'tutorial', 'scripts']
                },
                '~/tutorial': {
                    type: 'directory',
                    contents: ['welcome.txt']
                },
                '~/Documents': {
                    type: 'directory',
                    contents: ['notes.txt', 'report.md']
                },
                '~/scripts': {
                    type: 'directory',
                    contents: ['backup.sh']
                }
            }
        };

        // Linux Lessons Data
        const lessons = {
            beginner: [
                {
                    id: 1,
                    title: "Getting Started",
                    description: "Basic Linux introduction",
                    icon: "fa-play-circle",
                    steps: [
                        { command: "whoami", description: "Display current user", expected: "whoami" },
                        { command: "pwd", description: "Print working directory", expected: "pwd" },
                        { command: "ls", description: "List directory contents", expected: "ls" }
                    ]
                },
                {
                    id: 2,
                    title: "Navigation Basics",
                    description: "Learn to navigate directories",
                    icon: "fa-folder-open",
                    steps: [
                        { command: "cd Documents", description: "Change to Documents directory", expected: "cd Documents" },
                        { command: "cd ..", description: "Go to parent directory", expected: "cd .." },
                        { command: "ls -la", description: "List all files including hidden", expected: "ls -la" }
                    ]
                },
                {
                    id: 3,
                    title: "File Operations",
                    description: "Create and manage files",
                    icon: "fa-file-alt",
                    steps: [
                        { command: "mkdir projects", description: "Create a new directory", expected: "mkdir projects" },
                        { command: "touch readme.md", description: "Create an empty file", expected: "touch readme.md" },
                        { command: "cp readme.md readme_backup.md", description: "Copy a file", expected: "cp readme.md readme_backup.md" }
                    ]
                }
            ],
            intermediate: [
                {
                    id: 4,
                    title: "File Permissions",
                    description: "Understand Linux permissions",
                    icon: "fa-lock",
                    steps: [
                        { command: "chmod 755 script.sh", description: "Change file permissions", expected: "chmod 755" },
                        { command: "chown user file.txt", description: "Change file ownership", expected: "chown user" },
                        { command: "ls -l", description: "View permissions in detail", expected: "ls -l" }
                    ]
                },
                {
                    id: 5,
                    title: "Process Management",
                    description: "Manage system processes",
                    icon: "fa-cogs",
                    steps: [
                        { command: "ps aux", description: "View all processes", expected: "ps aux" },
                        { command: "kill -9 [PID]", description: "Terminate a process", expected: "kill -9" },
                        { command: "top", description: "Monitor system processes", expected: "top" }
                    ]
                }
            ],
            advanced: [
                {
                    id: 6,
                    title: "Shell Scripting",
                    description: "Write basic shell scripts",
                    icon: "fa-code",
                    steps: [
                        { command: "nano hello.sh", description: "Create a shell script", expected: "nano" },
                        { command: "chmod +x hello.sh", description: "Make script executable", expected: "chmod +x" },
                        { command: "./hello.sh", description: "Run the script", expected: "./hello.sh" }
                    ]
                },
                {
                    id: 7,
                    title: "Networking",
                    description: "Basic network commands",
                    icon: "fa-network-wired",
                    steps: [
                        { command: "ping google.com", description: "Test network connectivity", expected: "ping" },
                        { command: "ifconfig", description: "Display network interfaces", expected: "ifconfig" },
                        { command: "netstat -tulpn", description: "Show network connections", expected: "netstat" }
                    ]
                }
            ],
            projects: [
                {
                    id: 8,
                    title: "Web Server Setup",
                    description: "Setup Apache web server",
                    icon: "fa-server",
                    steps: [
                        { command: "sudo apt update", description: "Update package list", expected: "sudo apt update" },
                        { command: "sudo apt install apache2", description: "Install Apache", expected: "sudo apt install apache2" },
                        { command: "sudo systemctl status apache2", description: "Check Apache status", expected: "sudo systemctl status apache2" }
                    ]
                },
                {
                    id: 9,
                    title: "Git Repository",
                    description: "Create and manage Git repo",
                    icon: "fa-git-alt",
                    steps: [
                        { command: "git init", description: "Initialize git repository", expected: "git init" },
                        { command: "git add .", description: "Stage all files", expected: "git add ." },
                        { command: "git commit -m 'Initial commit'", description: "Commit changes", expected: "git commit" }
                    ]
                },
                {
                    id: 10,
                    title: "Docker Basics",
                    description: "Container management",
                    icon: "fa-docker",
                    steps: [
                        { command: "docker ps", description: "List running containers", expected: "docker ps" },
                        { command: "docker images", description: "List available images", expected: "docker images" },
                        { command: "docker run hello-world", description: "Run a test container", expected: "docker run hello-world" }
                    ]
                }
            ]
        };

        // Available commands
        const commands = {
            help: {
                description: "Show available commands",
                category: "System",
                execute: () => showHelp()
            },
            start: {
                description: "Start the tutorial",
                category: "Learning",
                execute: () => startTutorial()
            },
            clear: {
                description: "Clear terminal screen",
                category: "System",
                execute: () => clearTerminal()
            },
            ls: {
                description: "List directory contents",
                category: "File System",
                execute: (args) => listDirectory(args)
            },
            cd: {
                description: "Change directory",
                category: "File System",
                execute: (args) => changeDirectory(args)
            },
            pwd: {
                description: "Print working directory",
                category: "File System",
                execute: () => printWorkingDirectory()
            },
            whoami: {
                description: "Display current user",
                category: "System",
                execute: () => showCurrentUser()
            },
            mkdir: {
                description: "Create directory",
                category: "File System",
                execute: (args) => makeDirectory(args)
            },
            touch: {
                description: "Create empty file",
                category: "File System",
                execute: (args) => createFile(args)
            },
            cat: {
                description: "Display file contents",
                category: "File System",
                execute: (args) => displayFile(args)
            },
            cp: {
                description: "Copy files",
                category: "File System",
                execute: (args) => copyFile(args)
            },
            mv: {
                description: "Move/rename files",
                category: "File System",
                execute: (args) => moveFile(args)
            },
            rm: {
                description: "Remove files",
                category: "File System",
                execute: (args) => removeFile(args)
            },
            echo: {
                description: "Display message",
                category: "Text",
                execute: (args) => echoMessage(args)
            },
            grep: {
                description: "Search text",
                category: "Text",
                execute: (args) => grepText(args)
            },
            find: {
                description: "Find files",
                category: "File System",
                execute: (args) => findFiles(args)
            },
            lessons: {
                description: "Show available lessons",
                category: "Learning",
                execute: () => showLessons()
            },
            progress: {
                description: "Show learning progress",
                category: "Learning",
                execute: () => showProgress()
            },
            next: {
                description: "Go to next lesson",
                category: "Learning",
                execute: () => nextLesson()
            },
            prev: {
                description: "Go to previous lesson",
                category: "Learning",
                execute: () => previousLesson()
            },
            stats: {
                description: "Show learning statistics",
                category: "Learning",
                execute: () => showStats()
            },
            date: {
                description: "Show current date/time",
                category: "System",
                execute: () => showDate()
            },
            cal: {
                description: "Show calendar",
                category: "System",
                execute: () => showCalendar()
            }
        };

        // DOM Elements
        const output = document.getElementById('output');
        const commandInput = document.getElementById('command-input');
        const progressFill = document.getElementById('progress-fill');
        const helpPanel = document.getElementById('help-panel');
        const commandList = document.getElementById('command-list');
        const statsCards = document.getElementById('stats-cards');

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            initializeApp();
            renderLessons();
            updateProgressBar();
            setupCommandHelp();
            
            // Focus on input
            commandInput.focus();
            
            // Handle command input
            commandInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    processCommand(commandInput.value.trim());
                    commandInput.value = '';
                }
            });

            // Command history
            let commandHistory = [];
            let historyIndex = -1;

            commandInput.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    if (commandHistory.length > 0) {
                        if (historyIndex === -1) {
                            historyIndex = commandHistory.length - 1;
                        } else if (historyIndex > 0) {
                            historyIndex--;
                        }
                        commandInput.value = commandHistory[historyIndex];
                    }
                } else if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    if (commandHistory.length > 0) {
                        if (historyIndex < commandHistory.length - 1) {
                            historyIndex++;
                            commandInput.value = commandHistory[historyIndex];
                        } else {
                            historyIndex = -1;
                            commandInput.value = '';
                        }
                    }
                }
            });

            // Save command to history
            window.saveCommand = function(cmd) {
                commandHistory.push(cmd);
                if (commandHistory.length > 50) {
                    commandHistory.shift();
                }
                historyIndex = -1;
            };
        });

        // Initialize application
        function initializeApp() {
            // Load saved progress
            const savedProgress = localStorage.getItem('linuxTutorProgress');
            if (savedProgress) {
                const parsed = JSON.parse(savedProgress);
                state.progress = { ...state.progress, ...parsed };
                state.progress.startTime = Date.now() - (parsed.totalTime || 0);
            }
            
            // Welcome message
            addOutputLine('<span class="command">Welcome to Linux Tutor</span> - Interactive Learning Platform', 'output');
            addOutputLine('Type <span class="highlight">help</span> for available commands', 'output');
            addOutputLine('Type <span class="highlight">start</span> to begin the tutorial', 'output');
            addOutputLine('Type <span class="highlight">lessons</span> to see available lessons', 'output');
            addOutputLine('');
            addOutputLine('<span class="comment"># Blue theme terminal ready for learning Linux commands</span>', 'output');
            showPrompt();
        }

        // Render lessons in sidebar
        function renderLessons() {
            for (const category in lessons) {
                const listElement = document.getElementById(`${category}-lessons`);
                if (listElement) {
                    listElement.innerHTML = '';
                    lessons[category].forEach(lesson => {
                        const li = document.createElement('li');
                        li.className = 'lesson-item';
                        li.dataset.id = lesson.id;
                        
                        if (state.progress.completedLessons.includes(lesson.id)) {
                            li.classList.add('completed');
                        }
                        if (lesson.id === state.currentLesson) {
                            li.classList.add('active');
                        }
                        
                        li.innerHTML = `
                            <i class="fas ${lesson.icon}"></i>
                            <div class="lesson-content">
                                <div class="lesson-title">${lesson.title}</div>
                                <div class="lesson-desc">${lesson.description}</div>
                            </div>
                        `;
                        
                        li.addEventListener('click', () => selectLesson(lesson.id));
                        listElement.appendChild(li);
                    });
                }
            }
        }

        // Process user command
        function processCommand(input) {
            if (!input) {
                showPrompt();
                return;
            }

            // Save to history
            window.saveCommand(input);

            // Add user command to output
            addOutputLine(`<span class="path">student@linux-tutor:${state.currentPath}$</span> ${input}`, 'command');

            // Update stats
            state.progress.commandsExecuted++;

            // Parse command and arguments
            const parts = input.split(' ');
            const cmd = parts[0].toLowerCase();
            const args = parts.slice(1);

            // Execute command
            if (commands[cmd]) {
                commands[cmd].execute(args);
            } else {
                addOutputLine(`Command not found: ${cmd}. Type 'help' for available commands`, 'error');
                showPrompt();
            }

            // Save progress
            saveProgress();

            // Scroll to bottom
            output.scrollTop = output.scrollHeight;
        }

        // Command implementations
        function showHelp() {
            addOutputLine('<span class="highlight">Available commands:</span>', 'output');
            addOutputLine('', 'output');
            
            const categories = {};
            Object.entries(commands).forEach(([cmd, info]) => {
                if (!categories[info.category]) {
                    categories[info.category] = [];
                }
                categories[info.category].push({ cmd, info });
            });
            
            for (const [category, cmds] of Object.entries(categories)) {
                addOutputLine(`<span class="path">${category}:</span>`, 'output');
                cmds.forEach(({ cmd, info }) => {
                    addOutputLine(`  <span class="command">${cmd.padEnd(12)}</span> - ${info.description}`, 'output');
                });
                addOutputLine('', 'output');
            }
            
            addOutputLine('For detailed tutorial, type <span class="highlight">start</span>', 'output');
            showPrompt();
        }

        function startTutorial() {
            state.currentLesson = 1;
            loadLesson(state.currentLesson);
        }

        function clearTerminal() {
            output.innerHTML = '';
            addOutputLine('<span class="comment"># Terminal cleared</span>', 'output');
            showPrompt();
        }

        function listDirectory(args) {
            const showAll = args.includes('-a') || args.includes('-la');
            const showLong = args.includes('-l') || args.includes('-la');
            const path = args[0] || state.currentPath;
            
            let targetPath = path;
            if (path === '.') targetPath = state.currentPath;
            else if (path === '..') targetPath = '~';
            else if (!path.startsWith('~')) targetPath = state.currentPath;
            
            const dir = getDirectory(targetPath);
            
            if (dir && dir.type === 'directory') {
                let contents = dir.contents;
                if (!showAll) {
                    contents = contents.filter(item => !item.startsWith('.'));
                }
                
                if (showLong) {
                    contents.forEach(item => {
                        const isDir = getDirectory(item)?.type === 'directory';
                        const perm = isDir ? 'drwxr-xr-x' : '-rw-r--r--';
                        const size = isDir ? '4096' : Math.floor(Math.random() * 1000);
                        const date = 'Mar 15 09:30';
                        addOutputLine(`${perm} 1 student student ${size.toString().padStart(6)} ${date} ${item}`, 'output');
                    });
                } else {
                    addOutputLine(contents.join('  '), 'output');
                }
                
                // Update stats for lesson progress
                if (path === '' || path === '.') {
                    checkLessonProgress('ls');
                }
            } else {
                addOutputLine(`ls: cannot access '${path}': No such file or directory`, 'error');
            }
            showPrompt();
        }

        function changeDirectory(args) {
            if (!args[0]) {
                state.currentPath = '~';
                addOutputLine('', 'output');
            } else if (args[0] === '..') {
                if (state.currentPath !== '~') {
                    state.currentPath = '~';
                }
            } else if (args[0] === 'Documents') {
                state.currentPath = '~/Documents';
                addOutputLine('', 'output');
            } else if (args[0] === 'tutorial') {
                state.currentPath = '~/tutorial';
                addOutputLine('', 'output');
            } else if (args[0] === 'scripts') {
                state.currentPath = '~/scripts';
                addOutputLine('', 'output');
            } else {
                addOutputLine(`cd: ${args[0]}: No such file or directory`, 'error');
            }
            checkLessonProgress('cd');
            showPrompt();
        }

        function printWorkingDirectory() {
            addOutputLine(state.currentPath, 'output');
            checkLessonProgress('pwd');
            showPrompt();
        }

        function showCurrentUser() {
            addOutputLine('student', 'output');
            checkLessonProgress('whoami');
            showPrompt();
        }

        function makeDirectory(args) {
            if (!args[0]) {
                addOutputLine('mkdir: missing operand', 'error');
            } else {
                const dirName = args[0];
                const currentDir = getDirectory(state.currentPath);
                
                if (currentDir && !currentDir.contents.includes(dirName)) {
                    currentDir.contents.push(dirName);
                    addOutputLine(`Directory '${dirName}' created successfully`, 'success');
                    
                    // Update file system
                    state.fileSystem[`${state.currentPath}/${dirName}`] = {
                        type: 'directory',
                        contents: []
                    };
                    
                    checkLessonProgress('mkdir');
                } else {
                    addOutputLine(`mkdir: cannot create directory '${dirName}': File exists`, 'error');
                }
            }
            showPrompt();
        }

        function createFile(args) {
            if (!args[0]) {
                addOutputLine('touch: missing file operand', 'error');
            } else {
                const fileName = args[0];
                const currentDir = getDirectory(state.currentPath);
                
                if (currentDir && !currentDir.contents.includes(fileName)) {
                    currentDir.contents.push(fileName);
                    addOutputLine(`File '${fileName}' created successfully`, 'success');
                    checkLessonProgress('touch');
                } else {
                    addOutputLine(`touch: cannot create file '${fileName}': File exists`, 'error');
                }
            }
            showPrompt();
        }

        function copyFile(args) {
            if (args.length < 2) {
                addOutputLine('cp: missing file operand', 'error');
            } else {
                const [src, dest] = args;
                addOutputLine(`Copied '${src}' to '${dest}' successfully`, 'success');
                checkLessonProgress('cp');
            }
            showPrompt();
        }

        function echoMessage(args) {
            if (args.length > 0) {
                addOutputLine(args.join(' '), 'output');
            }
            showPrompt();
        }

        function grepText(args) {
            if (args.length < 1) {
                addOutputLine('grep: missing pattern', 'error');
            } else {
                const pattern = args[0];
                const files = ['welcome.txt', 'notes.txt', 'report.md'];
                const matches = files.filter(f => f.includes(pattern));
                if (matches.length > 0) {
                    matches.forEach(file => {
                        addOutputLine(`Found '${pattern}' in ${file}`, 'success');
                    });
                } else {
                    addOutputLine(`No matches found for '${pattern}'`, 'output');
                }
            }
            showPrompt();
        }

        function showDate() {
            const now = new Date();
            addOutputLine(now.toLocaleString(), 'output');
            showPrompt();
        }

        function showCalendar() {
            const now = new Date();
            const month = now.toLocaleString('default', { month: 'long' });
            const year = now.getFullYear();
            
            addOutputLine(`     ${month} ${year}`, 'output');
            addOutputLine('Su Mo Tu We Th Fr Sa', 'output');
            addOutputLine(' 1  2  3  4  5  6  7', 'output');
            addOutputLine(' 8  9 10 11 12 13 14', 'output');
            addOutputLine('15 16 17 18 19 20 21', 'output');
            addOutputLine('22 23 24 25 26 27 28', 'output');
            addOutputLine('29 30 31', 'output');
            showPrompt();
        }

        // Helper functions
        function addOutputLine(content, type = 'output') {
            const line = document.createElement('div');
            line.className = `output-line ${type}`;
            line.innerHTML = content;
            output.appendChild(line);
        }

        function showPrompt() {
            const promptLine = document.createElement('div');
            promptLine.className = 'output-line';
            promptLine.innerHTML = `<span class="path">student@linux-tutor:${state.currentPath}$</span>`;
            output.appendChild(promptLine);
            
            // Scroll to bottom
            setTimeout(() => {
                output.scrollTop = output.scrollHeight;
            }, 10);
        }

        function getDirectory(path) {
            if (path === '~') return state.fileSystem['~'];
            return state.fileSystem[path] || null;
        }

        function updateProgressBar() {
            const totalLessons = Object.values(lessons).flat().length;
            const completed = state.progress.completedLessons.length;
            const percentage = (completed / totalLessons) * 100;
            progressFill.style.width = `${percentage}%`;
        }

        function setupCommandHelp() {
            commandList.innerHTML = '';
            Object.entries(commands).slice(0, 12).forEach(([cmd, info]) => {
                const div = document.createElement('div');
                div.className = 'command-help';
                div.innerHTML = `<span class="command">${cmd}</span><br><small>${info.description}</small>`;
                div.addEventListener('click', () => {
                    commandInput.value = cmd;
                    commandInput.focus();
                });
                commandList.appendChild(div);
            });
        }

        // Lesson management
        function selectLesson(lessonId) {
            state.currentLesson = lessonId;
            loadLesson(lessonId);
            
            // Update active lesson in sidebar
            document.querySelectorAll('.lesson-item').forEach(item => {
                item.classList.remove('active');
                if (parseInt(item.dataset.id) === lessonId) {
                    item.classList.add('active');
                    item.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        }

        function loadLesson(lessonId) {
            clearTerminal();
            
            // Find lesson
            let lesson = null;
            
            for (const category of Object.values(lessons)) {
                const found = category.find(l => l.id === lessonId);
                if (found) {
                    lesson = found;
                    break;
                }
            }
            
            if (!lesson) {
                addOutputLine('Lesson not found', 'error');
                return;
            }
            
            // Display lesson info
            addOutputLine(`<span class="highlight">📚 Lesson ${lessonId}: ${lesson.title}</span>`, 'output');
            addOutputLine(`<span class="comment">${lesson.description}</span>`, 'output');
            addOutputLine('', 'output');
            addOutputLine('<span class="path">Learning Objectives:</span>', 'output');
            
            lesson.steps.forEach((step, index) => {
                const status = state.progress.currentStep > index ? '✅' : '📝';
                addOutputLine(`  ${status} <span class="command">${step.command}</span> - ${step.description}`, 'output');
            });
            
            addOutputLine('', 'output');
            addOutputLine('<span class="comment"># Type the commands exactly as shown above</span>', 'output');
            addOutputLine('<span class="comment"># Type "next" to skip to next step, "prev" to go back</span>', 'output');
            showPrompt();
        }

        function checkLessonProgress(command) {
            // Find current lesson
            let currentLesson = null;
            for (const category of Object.values(lessons)) {
                const lesson = category.find(l => l.id === state.currentLesson);
                if (lesson) {
                    currentLesson = lesson;
                    break;
                }
            }
            
            if (currentLesson) {
                const currentStep = currentLesson.steps[state.progress.currentStep];
                if (currentStep && command.startsWith(currentStep.expected)) {
                    state.progress.currentStep++;
                    state.progress.correctCommands++;
                    
                    if (state.progress.currentStep >= currentLesson.steps.length) {
                        // Lesson completed
                        if (!state.progress.completedLessons.includes(state.currentLesson)) {
                            state.progress.completedLessons.push(state.currentLesson);
                        }
                        
                        addOutputLine('', 'output');
                        addOutputLine('<span class="success">🎉 Lesson completed successfully!</span>', 'output');
                        addOutputLine('<span class="comment"># Type "next" to continue to next lesson</span>', 'output');
                        addOutputLine('<span class="comment"># Type "progress" to see your achievements</span>', 'output');
                        
                        // Save progress
                        saveProgress();
                        updateProgressBar();
                        
                        // Update sidebar
                        renderLessons();
                        
                        // Show confetti effect
                        showConfetti();
                    }
                }
            }
        }

        function nextLesson() {
            const allLessons = Object.values(lessons).flat();
            const currentIndex = allLessons.findIndex(l => l.id === state.currentLesson);
            
            if (currentIndex < allLessons.length - 1) {
                state.currentLesson = allLessons[currentIndex + 1].id;
                state.progress.currentStep = 0;
                loadLesson(state.currentLesson);
                
                // Update sidebar
                renderLessons();
            } else {
                addOutputLine('🎊 <span class="success">Congratulations! You have completed all lessons!</span>', 'output');
                addOutputLine('<span class="comment"># Type "progress" to see your achievements</span>', 'output');
                addOutputLine('<span class="comment"># Type "stats" to view detailed statistics</span>', 'output');
                showPrompt();
            }
        }

        function previousLesson() {
            const allLessons = Object.values(lessons).flat();
            const currentIndex = allLessons.findIndex(l => l.id === state.currentLesson);
            
            if (currentIndex > 0) {
                state.currentLesson = allLessons[currentIndex - 1].id;
                state.progress.currentStep = 0;
                loadLesson(state.currentLesson);
                
                // Update sidebar
                renderLessons();
            }
        }

        function showLessons() {
            clearTerminal();
            addOutputLine('<span class="highlight">📚 Available Lessons:</span><br>', 'output');
            
            for (const [category, lessonList] of Object.entries(lessons)) {
                addOutputLine(`<br><span class="path">${category.toUpperCase()}:</span>`, 'output');
                lessonList.forEach(lesson => {
                    const status = state.progress.completedLessons.includes(lesson.id) ? '✅' : '📝';
                    addOutputLine(`  ${status} <span class="command">${lesson.id.toString().padStart(2)}.</span> ${lesson.title}`, 'output');
                });
            }
            
            addOutputLine('<br>', 'output');
            addOutputLine('<span class="comment"># Type "start [lesson_number]" to begin a lesson</span>', 'output');
            addOutputLine('<span class="comment"># Example: Type "start 3" to begin File Operations</span>', 'output');
            showPrompt();
        }

        function showProgress() {
            clearTerminal();
            const total = Object.values(lessons).flat().length;
            const completed = state.progress.completedLessons.length;
            const percentage = Math.round((completed / total) * 100);
            
            addOutputLine('<span class="highlight">📊 Your Learning Progress:</span><br>', 'output');
            addOutputLine(`Completed: <span class="command">${completed}/${total}</span> lessons (<span class="highlight">${percentage}%</span>)`, 'output');
            
            // Progress bar in terminal
            const barLength = 30;
            const filled = Math.round((completed / total) * barLength);
            const progressBar = '█'.repeat(filled) + '░'.repeat(barLength - filled);
            addOutputLine(`[${progressBar}]`, 'output');
            
            addOutputLine('<br><span class="path">Completed Lessons:</span>', 'output');
            if (completed === 0) {
                addOutputLine('  No lessons completed yet. Type "start" to begin!', 'output');
            } else {
                state.progress.completedLessons.forEach(lessonId => {
                    // Find lesson name
                    for (const category of Object.values(lessons)) {
                        const lesson = category.find(l => l.id === lessonId);
                        if (lesson) {
                            addOutputLine(`  ✅ ${lesson.title}`, 'success');
                            break;
                        }
                    }
                });
            }
            
            addOutputLine('<br>', 'output');
            addOutputLine('<span class="comment"># Type "stats" for detailed statistics</span>', 'output');
            showPrompt();
        }

        function showStats() {
            const completed = state.progress.completedLessons.length;
            const total = Object.values(lessons).flat().length;
            const accuracy = state.progress.commandsExecuted > 0 
                ? Math.round((state.progress.correctCommands / state.progress.commandsExecuted) * 100)
                : 0;
            
            const timeSpent = Math.floor((Date.now() - state.progress.startTime) / 60000);
            
            // Update stats cards
            document.getElementById('completed-lessons').textContent = `${completed}/${total}`;
            document.getElementById('commands-executed').textContent = state.progress.commandsExecuted;
            document.getElementById('accuracy-rate').textContent = `${accuracy}%`;
            document.getElementById('time-spent').textContent = `${timeSpent}m`;
            
            // Show/hide stats cards
            statsCards.style.display = statsCards.style.display === 'none' ? 'grid' : 'none';
            
            // Also show in terminal
            if (statsCards.style.display === 'grid') {
                addOutputLine('<span class="comment"># Statistics panel displayed above</span>', 'output');
                showPrompt();
            }
        }

        function saveProgress() {
            // Calculate total time
            state.progress.totalTime = Date.now() - state.progress.startTime;
            
            // Save to localStorage
            const progressToSave = {
                completedLessons: state.progress.completedLessons,
                commandsExecuted: state.progress.commandsExecuted,
                correctCommands: state.progress.correctCommands,
                totalTime: state.progress.totalTime
            };
            
            localStorage.setItem('linuxTutorProgress', JSON.stringify(progressToSave));
        }

        // Modal functions
        function showResetModal() {
            document.getElementById('reset-modal').style.display = 'flex';
        }

        function hideResetModal() {
            document.getElementById('reset-modal').style.display = 'none';
        }

        function resetProgress() {
            state.progress = {
                completedLessons: [],
                currentStep: 0,
                commandsExecuted: 0,
                correctCommands: 0,
                startTime: Date.now(),
                totalTime: 0
            };
            
            state.currentLesson = 1;
            state.currentPath = '~';
            
            localStorage.removeItem('linuxTutorProgress');
            updateProgressBar();
            renderLessons();
            clearTerminal();
            
            addOutputLine('<span class="success">Progress has been reset successfully</span>', 'output');
            addOutputLine('<span class="comment"># Type "start" to begin your Linux learning journey</span>', 'output');
            showPrompt();
            
            hideResetModal();
        }

        function toggleCategory(categoryId) {
            const list = document.getElementById(`${categoryId}-lessons`);
            const icon = list.parentElement.querySelector('.fa-chevron-down, .fa-chevron-up');
            
            if (list.style.display === 'none' || list.style.display === '') {
                list.style.display = 'block';
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                list.style.display = 'none';
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        }

        function toggleHelpPanel() {
            helpPanel.style.display = helpPanel.style.display === 'none' ? 'block' : 'none';
        }

        function fullscreenTerminal() {
            const terminal = document.querySelector('.terminal-container');
            if (!document.fullscreenElement) {
                terminal.requestFullscreen().catch(err => {
                    console.log(`Error attempting to enable fullscreen: ${err.message}`);
                });
            } else {
                document.exitFullscreen();
            }
        }

        function showConfetti() {
            // Simple confetti effect with emojis
            const emojis = ['🎉', '🎊', '✅', '🌟', '🚀', '💻', '🐧'];
            for (let i = 0; i < 10; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.style.position = 'fixed';
                    confetti.style.left = `${Math.random() * 100}vw`;
                    confetti.style.top = '-50px';
                    confetti.style.fontSize = '24px';
                    confetti.style.zIndex = '9999';
                    confetti.textContent = emojis[Math.floor(Math.random() * emojis.length)];
                    confetti.style.animation = `fall ${Math.random() * 2 + 1}s linear forwards`;
                    
                    document.body.appendChild(confetti);
                    
                    setTimeout(() => {
                        confetti.remove();
                    }, 2000);
                }, i * 100);
            }
            
            // Add CSS for animation
            if (!document.querySelector('#confetti-style')) {
                const style = document.createElement('style');
                style.id = 'confetti-style';
                style.textContent = `
                    @keyframes fall {
                        0% { transform: translateY(0) rotate(0deg); opacity: 1; }
                        100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
                    }
                `;
                document.head.appendChild(style);
            }
        }

        // Export state for debugging
        window.getState = () => state;
        window.getStats = () => {
            const timeSpent = Math.floor((Date.now() - state.progress.startTime) / 60000);
            return {
                completedLessons: state.progress.completedLessons.length,
                totalLessons: Object.values(lessons).flat().length,
                commandsExecuted: state.progress.commandsExecuted,
                correctCommands: state.progress.correctCommands,
                timeSpent: `${timeSpent} minutes`,
                accuracy: state.progress.commandsExecuted > 0 
                    ? Math.round((state.progress.correctCommands / state.progress.commandsExecuted) * 100)
                    : 0
            };
        };
    </script>
</body>
</html>
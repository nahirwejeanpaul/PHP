<?php
// Start session
session_start();

// Simple login handling
$login_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($email === 'demo@example.com' && $password === 'password123') {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_name'] = 'John Doe';
        $_SESSION['user_email'] = $email;
    } else {
        $login_error = 'Wrong email or password';
    }
}

// Simple signup handling
$signup_error = '';
$signup_success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if (empty($name) || empty($email) || empty($password)) {
        $signup_error = 'All fields are required';
    } elseif ($password !== $confirm_password) {
        $signup_error = 'Passwords do not match';
    } else {
        $signup_success = 'Account created! You can now login.';
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ?page=home');
    exit;
}

// Get current page
$page = $_GET['page'] ?? 'home';
$logged_in = $_SESSION['logged_in'] ?? false;
$user_name = $_SESSION['user_name'] ?? '';

// YouTube links for courses
$youtube_links = [
    'python' => 'https://www.youtube.com/watch?v=rfscVS0vtbw',
    'javascript' => 'https://www.youtube.com/watch?v=W6NZfCO5SIk',
    'datascience' => 'https://www.youtube.com/watch?v=ua-CiDNNj30',
    'ios' => 'https://www.youtube.com/watch?v=8p7a0tR9I-s',
    'unity' => 'https://www.youtube.com/watch?v=Lu0sD9N8Y1U',
    'webdesign' => 'https://www.youtube.com/watch?v=1Rs2ND1ryYc',
    'java' => 'https://www.youtube.com/watch?v=eIrMbAQSU34',
    'react' => 'https://www.youtube.com/watch?v=w7ejDZ8SWv8',
    'angular' => 'https://www.youtube.com/watch?v=3qBXWUpoPHo',
    'php' => 'https://www.youtube.com/watch?v=OK_JCtrrv-c',
    'mysql' => 'https://www.youtube.com/watch?v=5OdVJbNCSso',
    'csharp' => 'https://www.youtube.com/watch?v=GhQdlIFylQ8',
    'cpp' => 'https://www.youtube.com/watch?v=vLnPwxZdW4Y',
    'ruby' => 'https://www.youtube.com/watch?v=t_ispmWmdjY',
    'go' => 'https://www.youtube.com/watch?v=YS4e4q9oBaU',
    'rust' => 'https://www.youtube.com/watch?v=zF34dRivLOw',
    'kotlin' => 'https://www.youtube.com/watch?v=5flXf8nuq60',
    'flutter' => 'https://www.youtube.com/watch?v=VPvVD8t02U8',
    'docker' => 'https://www.youtube.com/watch?v=3c-iBn73dDE',
    'aws' => 'https://www.youtube.com/watch?v=3hLmDS179YE',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding Courses - Learn to Code for Free</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Slideshow Styles */
        .slideshow-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            animation: slideShow 30s infinite;
        }

        .slide:nth-child(1) {
            background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            animation-delay: 0s;
        }

        .slide:nth-child(2) {
            background-image: url('https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            animation-delay: 6s;
        }

        .slide:nth-child(3) {
            background-image: url('https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&auto=format&fit=crop&w=2069&q=80');
            animation-delay: 12s;
        }

        .slide:nth-child(4) {
            background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            animation-delay: 18s;
        }

        .slide:nth-child(5) {
            background-image: url('https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            animation-delay: 24s;
        }

        @keyframes slideShow {
            0% { opacity: 0; }
            8% { opacity: 1; }
            17% { opacity: 1; }
            25% { opacity: 0; }
            100% { opacity: 0; }
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .home-content {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 30px;
            margin: 20px 0;
            backdrop-filter: blur(10px);
        }

        /* Blur effect for courses section */
        .courses-section {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin: 30px 0;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .courses-section h2 {
            color: #333;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);
        }

        /* Auth pages background */
        .auth-page {
            background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .auth-page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .auth-page main {
            position: relative;
            z-index: 1;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        /* Course Cards */
        .course-card {
            background: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .course-card img {
            height: 160px;
            object-fit: cover;
            width: 100%;
        }

        .course-card .card-body {
            padding: 1.5rem;
        }

        .course-card .badge {
            font-size: 0.8rem;
            padding: 0.5rem 0.8rem;
        }

        .youtube-btn {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .youtube-btn:hover {
            background-color: #cc0000;
            color: white;
            transform: scale(1.05);
        }

        .category-tag {
            display: inline-block;
            padding: 0.3rem 1rem;
            background: #e9ecef;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #495057;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .category-tag:hover {
            background: #007bff;
            color: white;
        }

        .category-tag.active {
            background: #007bff;
            color: white;
        }

        footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
            padding: 40px 0;
            margin-top: auto;
        }

        /* Dashboard Styles */
        .dashboard-stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 2rem;
        }

        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }

        .continue-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="<?php echo ($page === 'login' || $page === 'signup') ? 'auth-page' : ''; ?>">

<!-- Slideshow Background (only on home page) -->
<?php if ($page === 'home'): ?>
<div id="slideshow-container">
    <div class="slide"></div>
    <div class="slide"></div>
    <div class="slide"></div>
    <div class="slide"></div>
    <div class="slide"></div>
</div>
<div class="overlay"></div>
<?php endif; ?>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="?page=home">
                <i class="fas fa-code me-2"></i>E-Learning Platform for Coding
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page === 'home' ? 'active' : ''; ?>" href="?page=home">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    
                    <?php if ($logged_in): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $page === 'dashboard' ? 'active' : ''; ?>" href="?page=dashboard">
                                <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i><?php echo $user_name; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="?logout=1"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $page === 'login' ? 'active' : ''; ?>" href="?page=login">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $page === 'signup' ? 'active' : ''; ?>" href="?page=signup">
                                <i class="fas fa-user-plus me-1"></i>Sign Up
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Main Content -->
<main class="py-4">
    <div class="container">
        
        <?php if ($page === 'login'): ?>
            <!-- Login Page -->
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card auth-card">
                        <div class="card-header bg-transparent text-center pt-4">
                            <h3 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Welcome Back</h3>
                            <p class="text-muted mt-2">Please login to your account</p>
                        </div>
                        <div class="card-body p-4">
                            <?php if ($login_error): ?>
                                <div class="alert alert-danger"><?php echo $login_error; ?></div>
                            <?php endif; ?>
                            
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary w-100 py-2">Login</button>
                            </form>
                            
                            <div class="mt-4 text-center">
                                <div class="alert alert-info py-2">
                                    <small><i class="fas fa-info-circle me-1"></i> Demo: demo@example.com / password123</small>
                                </div>
                                <p class="mb-0">Don't have an account? <a href="?page=signup" class="text-primary">Sign up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($page === 'signup'): ?>
            <!-- Sign Up Page -->
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card auth-card">
                        <div class="card-header bg-transparent text-center pt-4">
                            <h3 class="mb-0"><i class="fas fa-user-plus me-2"></i>Create Account</h3>
                            <p class="text-muted mt-2">Join our coding community</p>
                        </div>
                        <div class="card-body p-4">
                            <?php if ($signup_error): ?>
                                <div class="alert alert-danger"><?php echo $signup_error; ?></div>
                            <?php endif; ?>
                            
                            <?php if ($signup_success): ?>
                                <div class="alert alert-success"><?php echo $signup_success; ?></div>
                            <?php endif; ?>
                            
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" name="confirm_password" class="form-control" required>
                                    </div>
                                </div>
                                <button type="submit" name="signup" class="btn btn-primary w-100 py-2">Sign Up</button>
                            </form>
                            
                            <div class="mt-4 text-center">
                                <p class="mb-0">Already have an account? <a href="?page=login" class="text-primary">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($page === 'dashboard' && $logged_in): ?>
            <!-- Dashboard -->
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold"><i class="fas fa-tachometer-alt me-2 text-primary"></i>Dashboard</h2>
                    <p class="text-muted">Welcome back, <?php echo $user_name; ?>! Here's your learning progress.</p>
                </div>
            </div>

            <!-- Stats -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="dashboard-stats d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-white-50 mb-2">Enrolled</h6>
                            <h2 class="text-white mb-0">6</h2>
                        </div>
                        <i class="fas fa-book-open stat-icon"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-stats d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div>
                            <h6 class="text-white-50 mb-2">Completed</h6>
                            <h2 class="text-white mb-0">3</h2>
                        </div>
                        <i class="fas fa-check-circle stat-icon"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-stats d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div>
                            <h6 class="text-white-50 mb-2">Hours</h6>
                            <h2 class="text-white mb-0">128</h2>
                        </div>
                        <i class="fas fa-clock stat-icon"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-stats d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <div>
                            <h6 class="text-white-50 mb-2">Points</h6>
                            <h2 class="text-white mb-0">2,450</h2>
                        </div>
                        <i class="fas fa-star stat-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Continue Learning -->
            <div class="row g-4">
                <div class="col-12">
                    <h4 class="mb-3"><i class="fas fa-play-circle me-2 text-danger"></i>Continue Learning</h4>
                </div>
                <div class="col-md-6">
                    <div class="continue-card">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-python fa-3x text-primary me-3"></i>
                            <div class="flex-grow-1">
                                <h5 class="mb-1">Python Programming</h5>
                                <p class="text-muted small mb-2">Progress: 75%</p>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $youtube_links['python']; ?>" target="_blank" class="btn youtube-btn w-100 mt-3">
                            <i class="fab fa-youtube"></i> Continue Watching
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="continue-card">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-js fa-3x text-warning me-3"></i>
                            <div class="flex-grow-1">
                                <h5 class="mb-1">JavaScript</h5>
                                <p class="text-muted small mb-2">Progress: 45%</p>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: 45%"></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $youtube_links['javascript']; ?>" target="_blank" class="btn youtube-btn w-100 mt-3">
                            <i class="fab fa-youtube"></i> Continue Watching
                        </a>
                    </div>
                </div>
            </div>

        <?php elseif ($page === 'dashboard' && !$logged_in): ?>
            <!-- Not logged in -->
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="alert alert-warning p-5">
                        <i class="fas fa-exclamation-triangle fa-4x mb-3"></i>
                        <h4>Access Denied</h4>
                        <p class="mb-4">Please login to view your dashboard.</p>
                        <a href="?page=login" class="btn btn-primary">Go to Login</a>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <!-- Home Page -->
            <div class="home-content">
                <!-- Hero Section -->
                <div class="row align-items-center mb-5">
                    <div class="col-lg-12 text-center">
                        <h1 class="display-3 fw-bold mb-4">Learn to Code for Free</h1>
                        <p class="lead mb-4">Access 20+ high-quality programming courses on YouTube. Start your coding journey today!</p>
                        
                        <!-- Search Bar -->
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="Search courses...">
                                    <button class="btn btn-primary btn-lg" type="button">Search</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Category Tags -->
                        <div class="mb-4">
                            <span class="category-tag active">All</span>
                            <span class="category-tag">Python</span>
                            <span class="category-tag">JavaScript</span>
                            <span class="category-tag">Web Dev</span>
                            <span class="category-tag">Mobile</span>
                            <span class="category-tag">Data Science</span>
                            <span class="category-tag">Game Dev</span>
                            <span class="category-tag">DevOps</span>
                        </div>
                        
                        <?php if (!$logged_in): ?>
                        <div class="mt-4">
                            <a href="?page=signup" class="btn btn-primary btn-lg me-2"><i class="fas fa-user-plus me-2"></i>Sign Up Free</a>
                            <a href="?page=login" class="btn btn-outline-primary btn-lg"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Popular Courses - Now with blur effect -->
                <div class="courses-section">
                    <h2 class="text-center mb-4 fw-bold">Popular Courses</h2>
                    <div class="row g-4 mb-5">
                        <!-- Row 1 -->
                        <div class="col-md-4">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1526379095098-d400fd0bf935?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Python">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title">Python Programming</h5>
                                        <span class="badge bg-primary">Free</span>
                                    </div>
                                    <p class="card-text text-muted small">Complete Python course from beginner to advanced. 42 hours.</p>
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge bg-secondary">Beginner</span>
                                        <span class="badge bg-secondary">42 hours</span>
                                    </div>
                                    <a href="<?php echo $youtube_links['python']; ?>" target="_blank" class="btn youtube-btn w-100">
                                        <i class="fab fa-youtube"></i> Watch on YouTube
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1579468118864-1b9ea3c0db4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="JavaScript">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title">JavaScript Full Stack</h5>
                                        <span class="badge bg-primary">Free</span>
                                    </div>
                                    <p class="card-text text-muted small">React, Node.js, MongoDB. Build complete web apps. 68 hours.</p>
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge bg-secondary">Intermediate</span>
                                        <span class="badge bg-secondary">68 hours</span>
                                    </div>
                                    <a href="<?php echo $youtube_links['javascript']; ?>" target="_blank" class="btn youtube-btn w-100">
                                        <i class="fab fa-youtube"></i> Watch on YouTube
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Data Science">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title">Data Science & ML</h5>
                                        <span class="badge bg-primary">Free</span>
                                    </div>
                                    <p class="card-text text-muted small">Python, pandas, scikit-learn, TensorFlow. 72 hours.</p>
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge bg-secondary">Advanced</span>
                                        <span class="badge bg-secondary">72 hours</span>
                                    </div>
                                    <a href="<?php echo $youtube_links['datascience']; ?>" target="_blank" class="btn youtube-btn w-100">
                                        <i class="fab fa-youtube"></i> Watch on YouTube
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- More Courses - Also with blur effect -->
                    <h2 class="text-center mb-4 fw-bold">More Courses</h2>
                    <div class="row g-4">
                        <!-- Row 2 -->
                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="iOS">
                                <div class="card-body">
                                    <h6 class="card-title">iOS Development</h6>
                                    <p class="card-text small">SwiftUI, 48 hours</p>
                                    <a href="<?php echo $youtube_links['ios']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Unity">
                                <div class="card-body">
                                    <h6 class="card-title">Unity Game Dev</h6>
                                    <p class="card-text small">C#, 60 hours</p>
                                    <a href="<?php echo $youtube_links['unity']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Web Design">
                                <div class="card-body">
                                    <h6 class="card-title">Web Design</h6>
                                    <p class="card-text small">HTML/CSS, 35 hours</p>
                                    <a href="<?php echo $youtube_links['webdesign']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Java">
                                <div class="card-body">
                                    <h6 class="card-title">Java Programming</h6>
                                    <p class="card-text small">Spring, 55 hours</p>
                                    <a href="<?php echo $youtube_links['java']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="React">
                                <div class="card-body">
                                    <h6 class="card-title">React.js</h6>
                                    <p class="card-text small">Frontend, 40 hours</p>
                                    <a href="<?php echo $youtube_links['react']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="PHP">
                                <div class="card-body">
                                    <h6 class="card-title">PHP & MySQL</h6>
                                    <p class="card-text small">Backend, 45 hours</p>
                                    <a href="<?php echo $youtube_links['php']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="C++">
                                <div class="card-body">
                                    <h6 class="card-title">C++ Programming</h6>
                                    <p class="card-text small">50 hours</p>
                                    <a href="<?php echo $youtube_links['cpp']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="C#">
                                <div class="card-body">
                                    <h6 class="card-title">C#/.NET</h6>
                                    <p class="card-text small">48 hours</p>
                                    <a href="<?php echo $youtube_links['csharp']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Ruby">
                                <div class="card-body">
                                    <h6 class="card-title">Ruby on Rails</h6>
                                    <p class="card-text small">40 hours</p>
                                    <a href="<?php echo $youtube_links['ruby']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Go">
                                <div class="card-body">
                                    <h6 class="card-title">Go Language</h6>
                                    <p class="card-text small">35 hours</p>
                                    <a href="<?php echo $youtube_links['go']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Rust">
                                <div class="card-body">
                                    <h6 class="card-title">Rust Programming</h6>
                                    <p class="card-text small">30 hours</p>
                                    <a href="<?php echo $youtube_links['rust']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1526379095098-d400fd0bf935?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Kotlin">
                                <div class="card-body">
                                    <h6 class="card-title">Kotlin</h6>
                                    <p class="card-text small">38 hours</p>
                                    <a href="<?php echo $youtube_links['kotlin']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Flutter">
                                <div class="card-body">
                                    <h6 class="card-title">Flutter</h6>
                                    <p class="card-text small">42 hours</p>
                                    <a href="<?php echo $youtube_links['flutter']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1667372393119-3d4c48d07fc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Docker">
                                <div class="card-body">
                                    <h6 class="card-title">Docker</h6>
                                    <p class="card-text small">25 hours</p>
                                    <a href="<?php echo $youtube_links['docker']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="AWS">
                                <div class="card-body">
                                    <h6 class="card-title">AWS Cloud</h6>
                                    <p class="card-text small">40 hours</p>
                                    <a href="<?php echo $youtube_links['aws']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="course-card">
                                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Angular">
                                <div class="card-body">
                                    <h6 class="card-title">Angular</h6>
                                    <p class="card-text small">45 hours</p>
                                    <a href="<?php echo $youtube_links['angular']; ?>" target="_blank" class="btn youtube-btn btn-sm w-100">
                                        <i class="fab fa-youtube"></i> Watch
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="row mt-5 text-center">
                    <div class="col-md-3">
                        <h3 class="fw-bold text-primary">20+</h3>
                        <p>Free Courses</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="fw-bold text-primary">1000+</h3>
                        <p>Hours of Content</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="fw-bold text-primary">50k+</h3>
                        <p>Students</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="fw-bold text-primary">100%</h3>
                        <p>Free Forever</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5><i class="fas fa-code me-2 text-primary"></i>CodeMaster</h5>
                <p class="text-white-50">Free coding courses for everyone. Learn at your own pace.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="?page=home" class="text-white-50 text-decoration-none">Home</a></li>
                    <li><a href="#courses" class="text-white-50 text-decoration-none">Courses</a></li>
                    <li><a href="?page=login" class="text-white-50 text-decoration-none">Login</a></li>
                    <li><a href="?page=signup" class="text-white-50 text-decoration-none">Sign Up</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-end">
                <p class="text-white-50 mb-0">&copy; <?php echo date("Y"); ?> CodeMaster</p>
                <p class="text-white-50">All courses are free on YouTube</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
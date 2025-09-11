<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'ইউনিয়ন পরিষদ নাগরিক সেবা')</title>

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Noto Sans Bengali', Arial, sans-serif;
            background-color: #f8f9fa;
            font-size: 14px;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-right: 2px solid #e9ecef;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .logo {
            background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 2px 10px rgba(139, 195, 74, 0.3);
        }

        .sidebar .nav-link {
            color: #495057;
            padding: 1rem 1.5rem;
            border-radius: 0;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
            color: white;
            border-left-color: #689f38;
            transform: translateX(5px);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
        }

        .main-content {
            min-height: 100vh;
        }

        .header {
            background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
            color: white;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(139, 195, 74, 0.3);
        }

        .profile-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #e9ecef;
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
            color: white;
            padding: 2rem;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .progress-circle-container {
            position: relative;
            width: 120px;
            height: 120px;
        }

        .progress-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(#8bc34a 0deg,
                    #8bc34a var(--progress),
                    #e9ecef var(--progress),
                    #e9ecef 360deg);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 5px 20px rgba(139, 195, 74, 0.3);
        }

        .progress-circle::before {
            content: '';
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: white;
            position: absolute;
        }

        .progress-text {
            position: relative;
            z-index: 1;
            font-size: 1.5rem;
            font-weight: 700;
            color: #8bc34a;
        }

        .progress-step {
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.5rem;
        }

        .progress-step:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .step-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 1rem;
            transition: all 0.3s ease;
        }

        .step-completed {
            background: linear-gradient(135deg, #4caf50 0%, #388e3c 100%);
            color: white;
            box-shadow: 0 3px 10px rgba(76, 175, 80, 0.3);
        }

        .step-incomplete {
            background: linear-gradient(135deg, #dee2e6 0%, #ced4da 100%);
            color: #6c757d;
        }

        .alert-custom {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border: 1px solid #ffeaa7;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(255, 193, 7, 0.2);
        }

        .btn-complete {
            background: linear-gradient(135deg, #8e44ad 0%, #7d3c98 100%);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(142, 68, 173, 0.3);
            transition: all 0.3s ease;
        }

        .btn-complete:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(142, 68, 173, 0.4);
        }

        .services-section {
            background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
            margin: 0 -15px;
            padding: 2rem 2rem 1rem;
            color: white;
        }

        .search-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 1.5rem;
        }

        .search-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.5);
        }

        .service-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: #8bc34a;
        }

        .service-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%);
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 5px 20px rgba(139, 195, 74, 0.3);
        }

        .service-card h5 {
            color: #343a40;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .service-card p {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .stats-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            margin-bottom: 1rem;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: #8bc34a;
            display: block;
        }

        .stats-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .progress-circle-container {
                margin-bottom: 2rem;
            }

            .services-section {
                margin: 0;
                border-radius: 15px;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .menu-notification {
            position: relative;
        }
    </style>


</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">

                @include('user.partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 px-0">
                @yield('content')
            </div>

        </div>
    </div>


</body>

</html>
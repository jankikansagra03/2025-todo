<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(10px);
        }

        .hero {
            text-align: center;
            padding: 30px 20px;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .btn-custom {
            background: white;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: #ff5a91;
            color: white
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .feature-box {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            width: 100%;
            max-width: 320px;
            transition: 0.3s;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .footer {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .btn-custom {
                padding: 10px 20px;
            }

            .features {
                flex-direction: column;
                align-items: center;
            }


        }

        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            max-width: 900px;
            border-radius: 10px;
            overflow: hidden;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-image {
            background: url({{ URL::to('/') }}/images/1.jpg) no-repeat center center;
            background-size: cover;
        }

        .login-form {
            padding: 3rem;
        }

        .signup-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-card {
            max-width: 900px;
            border-radius: 10px;
            overflow: hidden;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .signup-image {
            background: url({{ URL::to('/') }}/images/register.jpg) no-repeat center center;
            background-size: cover;
        }

        .signup-form {
            padding: 3rem;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
        }

        li.nav-item.user-nav a.nav-link {
            color: white;
            margin: 5px;
            padding: 8px;
            border: 2px solid white;
            border-radius: 10px;
        }

        li.nav-item.user-nav a.nav-link:hover {
            color: white;
            background-color: #ff5a91;
            margin: 5px;
            padding: 10px;
            border: 2px solid white;
            border-radius: 10px;
        }

        .user-nav1 {
            color: white;
            margin: 5px;
            padding: 10px;
            border: 2px solid white;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    @if (session('user'))
        <nav class="navbar navbar-expand-lg navbar-dark px-4">
            <div class="container-fluid">
                <a class="navbar-brand text-white fw-bold" href="{{ URL::to('/') }}/userDashboard">
                    @if (session('username'))
                        {{ session('username') }}
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavUser"
                    aria-controls="navbarNavUser" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavUser">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item user-nav"><a class="nav-link" href="{{ URL::to('/') }}/userTaskList">My
                                Tasks</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link"
                                href="{{ URL::to('/') }}/userCompletedTask">Completed
                                Tasks</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link" href="{{ URL::to('/') }}/userProfile">My
                                Profile</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link"
                                href="{{ URL::to('/') }}/userChangePassword">Change
                                Password</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link"
                                href="{{ URL::to('/') }}/UserLogout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @elseif (session('admin'))
        <nav class="navbar navbar-expand-lg navbar-dark px-4">
            <div class="container-fluid">
                <a class="navbar-brand text-white fw-bold" href="#">Admin Panel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin"
                    aria-controls="navbarNavAdmin" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAdmin">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item user-nav"><a class="nav-link" href="{{ URL::to('/') }}/index">Manage Users
                            </a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link" href="{{ URL::to('/') }}/about">Manage
                                Task</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link" href="{{ URL::to('/') }}/about">Manage
                                Inquiry</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link" href="{{ URL::to('/') }}/about">Site
                                Settings</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link" href="{{ URL::to('/') }}/contact">My
                                Profile</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link" href="{{ URL::to('/') }}/login">Change
                                Password</a>
                        </li>
                        <li class="nav-item user-nav"><a class="nav-link"
                                href="{{ URL::to('/') }}/adminLogout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @else
        {{ '' }}

    @endif
    <nav class="navbar navbar-expand-lg navbar-dark px-4">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">To-Do App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ URL::to('/') }}/index">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ URL::to('/') }}/about">About</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ URL::to('/') }}/contact">Contact</a>
                    </li>
                    @if (!session('user') && !session('admin'))
                        <li class="nav-item"><a class="nav-link text-white" href="{{ URL::to('/') }}/login">Login</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white"
                                href="{{ URL::to('/') }}/register">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show bg-white text-success" role="alert"
                        style="border:4px solid">
                        <strong>Success!!
                        </strong>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success alert-dismissible fade show bg-white text-danger" role="alert"
                        style="border:4px solid">
                        <strong>Error!!
                        </strong>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div>
        @yield('content')

    </div>
    <br>

    <footer class="footer">
        <p>&copy; 2025 To-Do App. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

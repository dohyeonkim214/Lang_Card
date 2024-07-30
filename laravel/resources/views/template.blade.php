<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .deck-card {
            width: 150px;
            height: 100px;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
        }
    </style>
</head>
<body>
    <header class="bg-light p-3 mb-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Flashcards</h1>
                <nav>
                    <a href="/" class="btn btn-link">Home</a>
                    <a href="/login" class="btn btn-link">Login</a>
                </nav>
            </div>
        </div>
    </header>
    
    <main class="container">
        @yield('content')
    </main>

    <footer class="bg-light p-3 mt-4 text-center">
        <p>&copy; 2024 LangCard</p>
    </footer>
</body>
</html>

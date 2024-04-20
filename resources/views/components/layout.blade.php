<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#e8ac76",
                        },
                    },
                },
            };
        </script>
        <title>LaraJobs</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="/favicon.ico" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold">
                        Logged in as {{auth()->user()->name}}
                    </span>
                </li>
                <li>
                    <a href="/{{ auth()->user()->id}}/profile" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Your Account
                    </a>
                </li>
                <li>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed">Logout</i>
                        </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
    <main>
    @yield('content')
    </main>
    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-12 mt-12 opacity-90 md:justify-center">
    <p class="ml-2">
        <span style="vertical-align: middle;">{{ date("Y") }},</span>
        <a href="https://github.com/gitnjole/lara-jobs" target="_blank" style="display: inline-block; vertical-align: middle;">
            <img src="{{ asset('images/github-mark.png') }}" width="20" height="20" alt="GitHub Mark">
        </a>
    </p>      
    <a
        href="/listings/create"
        class="absolute right-10 bg-black text-white py-2 px-5"
        >Post Job</a
    >
</footer>
<x-flash-message/>
</body>
</html>
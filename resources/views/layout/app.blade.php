<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <header class="bg-gray-800 text-white flex items-center justify-between px-6 py-4">
        <div class="text-lg font-bold">
            My Application

            @if(in_array(request()->segment(1), ['dashboard']))
                <a href="{{ route('cities.index') }}" class="ml-2 text-gray-400 font-light">City</a>
            @endif
            @if(in_array(request()->segment(1), ['dashboard']))
                <a href="{{ route('users.index') }}" class="ml-2 text-gray-400 font-light">Users</a>
            @endif
        </div>

        @if(in_array(request()->segment(1), ['dashboard']))
            <a href="{{ route('logout') }}" class="text-sm text-gray-300 hover:underline">Logout</a>
        @endif

        @if(in_array(request()->segment(1), ['create-user']))
            <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:underline">Cancel</a>
        @endif
    </header>

    @if(request()->segment(1) === 'dashboard'&&  isset($breadcrumb))
        <div class="bg-gray-400 px-6 py-3 text-sm text-white">
            <nav class="flex space-x-1">
                @foreach($breadcrumb as $name => $url)
                    <span>
                        @if($url)
                            <a href="{{ $url }}" class="text-blue-200 hover:underline">{{ $name }}</a>
                        @else
                            <span>{{ $name }}</span>
                        @endif
                    </span>
                    @if(!$loop->last)<span>/</span>@endif
                @endforeach
            </nav>
        </div>
    @endif

    <main class="flex-grow px-6 py-4">
        @yield('content')
    </main>

    <footer class="bg-gray-800 border-t">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
            <div class="text-white">
                © ATURA 2025
            </div>
            <div class="flex space-x-4">
                <p href="" class="text-white">Introduction</p>
                <p href="" class="text-green-300">ATURA</p>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables CSS + JS -->

    <script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

    @stack('scripts')
</body>
</html>




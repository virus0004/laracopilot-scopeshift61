<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Byclica Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white flex-shrink-0 flex flex-col">
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-2">
                    <span class="text-2xl">🚲</span>
                    <div>
                        <div class="font-bold text-green-400 text-lg">Byclica</div>
                        <div class="text-xs text-gray-400">Painel Administrativo</div>
                    </div>
                </div>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition-colors">
                    <span>📊</span><span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('admin.bicicletas.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.bicicletas.*') ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition-colors">
                    <span>🚲</span><span class="font-medium">Bicicletas</span>
                </a>
                <a href="{{ route('admin.categorias.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.categorias.*') ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition-colors">
                    <span>🏷️</span><span class="font-medium">Categorias</span>
                </a>
                <a href="{{ route('admin.reservas.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.reservas.*') ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition-colors">
                    <span>📅</span><span class="font-medium">Reservas</span>
                </a>
                <a href="{{ route('admin.clientes.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.clientes.*') ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition-colors">
                    <span>👥</span><span class="font-medium">Clientes</span>
                </a>
                <a href="{{ route('admin.pagamentos.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.pagamentos.*') ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition-colors">
                    <span>💳</span><span class="font-medium">Pagamentos</span>
                </a>
                <div class="pt-4 border-t border-gray-700">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-800 transition-colors">
                        <span>🌐</span><span class="font-medium">Ver Site</span>
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-red-700 transition-colors">
                            <span>🚪</span><span class="font-medium">Sair</span>
                        </button>
                    </form>
                </div>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <div class="text-xs text-gray-400">Sessão activa:</div>
                <div class="text-sm text-green-400 font-medium">{{ session('admin_user', 'Admin') }}</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                <div class="text-sm text-gray-500">{{ now()->format('d/m/Y H:i') }}</div>
            </div>
            <div class="p-6">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6 flex items-center">
                    <span class="mr-2">✅</span> {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
                    ❌ {{ session('error') }}
                </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Byclica - Aluguer de Bicicletas')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <span class="text-2xl">🚲</span>
                    <span class="text-2xl font-bold text-green-600">Byclica</span>
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-green-600 font-medium transition-colors">Início</a>
                    <a href="{{ route('public.frota') }}" class="text-gray-600 hover:text-green-600 font-medium transition-colors">A Nossa Frota</a>
                    <a href="{{ route('public.reservar') }}" class="text-gray-600 hover:text-green-600 font-medium transition-colors">Reservar</a>
                    <a href="{{ route('public.sobre') }}" class="text-gray-600 hover:text-green-600 font-medium transition-colors">Sobre Nós</a>
                    <a href="{{ route('public.contacto') }}" class="text-gray-600 hover:text-green-600 font-medium transition-colors">Contacto</a>
                    <a href="{{ route('admin.login') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors font-medium">Área Admin</a>
                </div>
                <button class="md:hidden p-2" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t px-4 py-4 space-y-3">
            <a href="{{ route('home') }}" class="block text-gray-600 hover:text-green-600 font-medium">Início</a>
            <a href="{{ route('public.frota') }}" class="block text-gray-600 hover:text-green-600 font-medium">A Nossa Frota</a>
            <a href="{{ route('public.reservar') }}" class="block text-gray-600 hover:text-green-600 font-medium">Reservar</a>
            <a href="{{ route('public.sobre') }}" class="block text-gray-600 hover:text-green-600 font-medium">Sobre Nós</a>
            <a href="{{ route('public.contacto') }}" class="block text-gray-600 hover:text-green-600 font-medium">Contacto</a>
        </div>
    </nav>

    @if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 p-4 mx-4 mt-4 rounded">
        <p class="text-green-700 font-medium">✅ {{ session('success') }}</p>
    </div>
    @endif

    @yield('content')

    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <span class="text-2xl">🚲</span>
                    <span class="text-xl font-bold text-green-400">Byclica</span>
                </div>
                <p class="text-gray-400 text-sm">A melhor experiência de aluguer de bicicletas em Portugal. Explore a cidade de forma sustentável.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-4 text-green-400">Navegação</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Início</a></li>
                    <li><a href="{{ route('public.frota') }}" class="hover:text-white transition-colors">A Nossa Frota</a></li>
                    <li><a href="{{ route('public.reservar') }}" class="hover:text-white transition-colors">Fazer Reserva</a></li>
                    <li><a href="{{ route('public.sobre') }}" class="hover:text-white transition-colors">Sobre Nós</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4 text-green-400">Contactos</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li>📧 info@byclica.com</li>
                    <li>📞 +351 210 000 000</li>
                    <li>📍 Lisboa, Portugal</li>
                    <li>🕐 Seg-Dom: 8h - 20h</li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4 text-green-400">Horários</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li>Segunda a Sexta: 8h - 19h</li>
                    <li>Sábado: 9h - 18h</li>
                    <li>Domingo: 10h - 17h</li>
                    <li>Feriados: 10h - 16h</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 py-6 text-center text-sm text-gray-500">
            <p>© {{ date('Y') }} Byclica. Todos os direitos reservados.</p>
            <p class="mt-2">Made with ❤️ by <a href="https://laracopilot.com/" target="_blank" class="text-green-400 hover:underline">LaraCopilot</a></p>
        </div>
    </footer>
</body>
</html>

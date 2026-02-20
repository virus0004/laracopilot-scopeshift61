<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Byclica Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="text-6xl mb-4">🚲</div>
            <h1 class="text-3xl font-bold text-white">Byclica</h1>
            <p class="text-green-200 mt-2">Painel de Administração</p>
        </div>
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Entrar</h2>
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                {{ $errors->first() }}
            </div>
            @endif
            <form action="/admin/login" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="admin@byclica.com">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="••••••••">
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                    Entrar no Painel
                </button>
            </form>
            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                <p class="text-xs font-semibold text-gray-600 mb-2">🔑 Credenciais de Acesso:</p>
                <div class="space-y-1 text-xs text-gray-500">
                    <p><strong>Admin:</strong> admin@byclica.com / byclica2024</p>
                    <p><strong>Gestor:</strong> gestor@byclica.com / gestor123</p>
                    <p><strong>Operador:</strong> operador@byclica.com / operador123</p>
                </div>
            </div>
        </div>
        <p class="text-center text-green-200 text-sm mt-6">
            <a href="{{ route('home') }}">← Voltar ao site</a>
        </p>
    </div>
</body>
</html>

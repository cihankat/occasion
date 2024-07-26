<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-white font-bold">Dashboard</a>
            <a href="{{ route('voertuigen.create') }}" class="text-white">Add Voertuig</a>
        </div>
    </nav>
    
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-8 text-center">Dashboard</h1>
        
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-6 shadow-md">
                {{ session('error') }}
            </div>
        @endif

        <!-- Statistics Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Total Cars</h2>
                <p class="text-3xl font-semibold text-gray-900">{{ $totalCars }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Total Cost (Ingekocht)</h2>
                <p class="text-3xl font-semibold text-gray-900">€{{ number_format($totalCost, 2) }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Total Value (Te Koop)</h2>
                <p class="text-3xl font-semibold text-gray-900">€{{ number_format($totalValue, 2) }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($voertuigen as $voertuig)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold">{{ $voertuig->kenteken }}</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('voertuigen.edit', $voertuig->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('voertuigen.destroy', $voertuig->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this voertuig?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                    <p class="text-gray-700"><strong>Merk:</strong> {{ $voertuig->merk }}</p>
                    <p class="text-gray-700"><strong>Type:</strong> {{ $voertuig->type }}</p>
                    <p class="text-gray-700"><strong>Bouwdatum:</strong> {{ $voertuig->bouwdatum }}</p>
                    <p class="text-gray-700"><strong>Prijs Ingekocht:</strong> {{ $voertuig->prijs_ingekocht }}</p>
                    <p class="text-gray-700"><strong>Prijs Te Koop:</strong> {{ $voertuig->prijs_te_koop }}</p>
                    <p class="text-gray-700"><strong>Categorie:</strong> {{ $voertuig->categorie }}</p>
                    @if ($voertuig->foto_path)
                        <img src="{{ asset('storage/' . $voertuig->foto_path) }}" alt="Foto" class="w-full h-48 object-cover mt-4 rounded-lg">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

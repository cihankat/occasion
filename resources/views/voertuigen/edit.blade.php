<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Voertuig</title>
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
        <h1 class="text-3xl font-bold mb-8 text-center">Edit Voertuig</h1>
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

        <form action="{{ route('voertuigen.update', $voertuig->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="kenteken" class="block text-sm font-medium text-gray-700">Kenteken:</label>
                <input type="text" name="kenteken" id="kenteken" value="{{ $voertuig->kenteken }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="merk" class="block text-sm font-medium text-gray-700">Merk:</label>
                <input type="text" name="merk" id="merk" value="{{ $voertuig->merk }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type:</label>
                <input type="text" name="type" id="type" value="{{ $voertuig->type }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="bouwdatum" class="block text-sm font-medium text-gray-700">Bouwdatum:</label>
                <input type="date" name="bouwdatum" id="bouwdatum" value="{{ $voertuig->bouwdatum }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="prijs_ingekocht" class="block text-sm font-medium text-gray-700">Prijs ingekocht:</label>
                <input type="number" step="0.01" name="prijs_ingekocht" id="prijs_ingekocht" value="{{ $voertuig->prijs_ingekocht }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="prijs_te_koop" class="block text-sm font-medium text-gray-700">Prijs te koop:</label>
                <input type="number" step="0.01" name="prijs_te_koop" id="prijs_te_koop" value="{{ $voertuig->prijs_te_koop }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="categorie_id" class="block text-sm font-medium text-gray-700">Categorie:</label>
                <select name="categorie_id" id="categorie_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $voertuig->categorie_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto:</label>
                <input type="file" name="foto" id="foto" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" accept="image/*">
                @if ($voertuig->foto_path)
                    <img src="{{ asset('storage/' . $voertuig->foto_path) }}" alt="Foto" class="w-16 h-16 mt-2 rounded-lg">
                @endif
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Update Voertuig</button>
        </form>
    </div>
</body>
</html>

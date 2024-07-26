<!-- resources/views/voertuigen/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voertuig Toevoegen</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Voertuig Toevoegen</h1>
        <form action="{{ route('voertuigen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="kenteken" class="block text-sm font-medium text-gray-700">Kenteken:</label>
                <input type="text" name="kenteken" id="kenteken" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="merk" class="block text-sm font-medium text-gray-700">Merk:</label>
                <input type="text" name="merk" id="merk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type:</label>
                <input type="text" name="type" id="type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="bouwdatum" class="block text-sm font-medium text-gray-700">Bouwdatum:</label>
                <input type="date" name="bouwdatum" id="bouwdatum" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="prijs_ingekocht" class="block text-sm font-medium text-gray-700">Prijs ingekocht:</label>
                <input type="number" step="0.01" name="prijs_ingekocht" id="prijs_ingekocht" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="prijs_te_koop" class="block text-sm font-medium text-gray-700">Prijs te koop:</label>
                <input type="number" step="0.01" name="prijs_te_koop" id="prijs_te_koop" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="categorie" class="block text-sm font-medium text-gray-700">Categorie:</label>
                <input type="text" name="categorie" id="categorie" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto:</label>
                <input type="file" name="foto" id="foto" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" accept="image/*">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Add Voertuig</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Upload File</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Upload File (Vulnerable)</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="/upload" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <input type="file" name="file" class="block w-full border rounded p-2" />

            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Upload
            </button>
        </form>
    </div>
</body>
</html>

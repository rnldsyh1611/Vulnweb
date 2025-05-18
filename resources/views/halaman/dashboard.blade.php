<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Daftar Users</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 p-6 min-h-screen">

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-3xl font-bold mb-6">Dashboard - Daftar Users</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Username</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->username }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="/delete/{{ $user->id }}"
                           onclick="return confirm('Yakin ingin menghapus user ini?')"
                           class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                            Hapus
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-6 text-gray-500">Tidak ada user ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>

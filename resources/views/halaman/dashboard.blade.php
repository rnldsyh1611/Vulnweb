<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded shadow text-center">
    <h2 class="text-2xl font-bold mb-4">Welcome, {{ $username }}!</h2>

    @if($password)
      <p class="text-gray-700 text-lg">Your password: <strong>{{ $password }}</strong></p>
    @else
      <p class="text-red-500">Password not found in session.</p>
    @endif

    <div class="mt-4">
      <a href="/login" class="text-blue-600 hover:underline">Logout</a>
    </div>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Link to Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <section class="h-screen flex items-center justify-center">
    <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>

      <!-- Registration Form -->
      <form action="/registrasi" method="POST">
        @csrf
        <div class="mb-4">
          <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
          <input
            type="text"
            id="username"
            name="username"
            required
            class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter your username"
          />
        </div>

        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            required
            class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter your password"
          />
        </div>
        <div class="flex items-center justify-between mb-6">
          <div class="flex items-center">
            <input
              type="checkbox"
              id="agree"
              name="agree"
              required
              class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
            />
            <label for="agree" class="ml-2 text-sm text-gray-600">I agree to the terms and conditions</label>
          </div>
        </div>

        <button
          type="submit"
          class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none"
        >
          Register
        </button>

        <div class="my-4 text-center text-sm text-gray-600">
          Already have an account?
          <a href="/login" class="text-blue-600 hover:text-blue-500">Login here</a>
        </div>
      </form>
    </div>
  </section>

</body>
</html>

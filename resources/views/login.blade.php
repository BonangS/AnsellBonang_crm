<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-green-100 text-gray-800">

  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

      <h2 class="text-2xl font-bold mb-6 text-center text-green-600">Login PT.SMART</h2>

      @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center">
            {{ session('error') }}
        </div>
      @endif

      <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded px-4 py-2 mt-2" required>
        </div>

        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded px-4 py-2 mt-2" required>
        </div>

        <div class="flex justify-between items-center mb-4">
          <label for="remember" class="text-sm text-gray-600">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            Remember me
          </label>
          <a href="" class="text-sm text-green-600 hover:underline">Forgot Password?</a>
        </div>

        <div class="flex justify-center">
          <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 w-full">
            Login
          </button>
        </div>

      </form>

    </div>
  </div>

</body>

</html>

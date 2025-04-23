<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  @vite('resources/css/app.css')
  <style>
    
    .header {
      background: linear-gradient(45deg, #4CAF50, #8BC34A); 
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      border-radius: 0 0 20px 20px; 
      transition: all 0.3s ease-in-out;
      position: sticky;
      top: 0; 
      z-index: 100;
    }

    .header:hover {
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .logo {
      font-size: 2.5rem;
      font-weight: 700;
      color: white;
      text-transform: uppercase;
      letter-spacing: 2px;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .logo:hover {
      color: #f3f4f6;
      transform: scale(1.1); 
    }

    nav a {
      color: white;
      font-size: 1.125rem;
      padding: 12px 20px; 
      border-radius: 25px; 
      text-transform: capitalize;
      transition: color 0.3s ease, background-color 0.3s ease, transform 0.3s ease;
    }

    nav a:hover {
      color: #4CAF50; 
      background-color: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px); 
    }

    nav ul {
      display: flex;
      gap: 2rem; 
      align-items: center;
    }

    
    .logout-btn {
      padding: 12px 24px;
      background-color: #f44336; 
      color: white;
      border-radius: 25px; 
      font-weight: 600;
      text-transform: uppercase;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .logout-btn:hover {
      background-color: #d32f2f;
      transform: scale(1.05); 
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header id="header" class="header py-6">
    <div class="container mx-auto flex justify-between items-center px-6">
     
      <a href="{{ route('dashboard') }}" class="logo hover:text-blue-300">PT. Smart</a>
      <!-- Navigation menu -->
      <nav>
        <ul class="flex space-x-8"> 
          <li>
            <a href="{{ route('leads.index') }}" class="hover:text-blue-300 transition-all duration-300">Lead</a>
          </li>
          <li>
            <a href="{{ route('layanan.index') }}" class="hover:text-blue-300 transition-all duration-300">Layanan</a>
          </li>
          @if(Auth::check() && Auth::user()->role === 'MANAGER')
            <li>
              <a href="{{ route('projects.index') }}" class="hover:text-blue-300 transition-all duration-300">Project</a>
            </li>
          @endif
          <li>
            <a href="{{ route('customer.index') }}" class="hover:text-blue-300 transition-all duration-300">Customer</a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="logout-btn hover:bg-red-600">Logout</button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="mt-24">
  </div>

</body>

</html>

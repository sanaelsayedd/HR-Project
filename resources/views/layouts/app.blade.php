<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
      .theme-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 30px;
      }

      .theme-switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        border-radius: 30px;
        transition: background-color 0.4s;
      }

      .slider::before {
        position: absolute;
        content: "";
        height: 24px;
        width: 24px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        border-radius: 50%;
        transition: transform 0.4s;
      }

      .slider::after {
        content: "🌙";
        position: absolute;
        left: 4px;
        top: 46%;
        transform: translateY(-50%);
        font-size: 18px;
        opacity: 1;
        transition: 0.4s;
      }

      input:checked + .slider {
        background-color: #0fbcf9;
      }

      input:checked + .slider::before {
        transform: translateX(26px);
      }

      input:checked + .slider::after {
        content: "☀️";
        left: 31px;
        top: 46%;
        opacity: 1;
      }

      /* Light and Dark Theme Styles */
      body.light-theme {
        background-color: #ffffff;
        color: #000000;
      }

      body.dark-theme {
        background-color: #343a40;
        color: #ffffff;
      }

      .navbar.light-theme {
        background-color: #f8f9fa !important;
      }

      .navbar.light-theme .nav-link,
      .navbar.light-theme .navbar-brand {
        color: #000000 !important;
      }

      /* Ensure navbar toggler icon is visible in light theme */
      .navbar.light-theme .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 0, 0, 0.55)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
      }
    </style>
  </head>
  <body>
    

<nav class="navbar navbar-expand-lg bg-body-tertiary"data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HR-mangment</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          
          <a class="nav-link active" aria-current="page" href="{{route('Users.index')}}"><span class="icon">
            <i class="fa-solid fa-house" style="color: white;">

            </i>
            Home 
          </a>
          </span>
        
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('Users.vacation')}}">Vacation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('Users.permission')}}">Permissions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
        
      </ul>
      <ul class="navbar-nav ms-auto">
        
        <li class="nav-item">
          <div class="container">
            <label class="theme-switch">
              <input type="checkbox"
              id="theme Toggle">
              <span class="slider"></span>
            </label>

          </div>
        </li>

        <li class="nav-item">
          
          <a class="nav-link active" aria-current="page" href="{{route('Users.profile')}}"><span class="icon">
            <i class="fa-solid fa-user" style="color: white;">

            </i>
            name 
          </a>
          </span>
        
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-5s3fA7cC6l0Y+JeU0i5bNwgY6e1oQ0rE3pS7V0i7l3eK6X5f3u3j4k5l6m7n8o9"
      crossorigin="anonymous"
    ></script>
    <!-- Theme Switch JavaScript with LocalStorage -->
    <script>
      const themeToggle = document.getElementById('theme-toggle');

      // Check saved theme
      const savedTheme = localStorage.getItem('theme');
      if (savedTheme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
        themeToggle.checked = true;
      } else {
        document.documentElement.setAttribute('data-theme', 'light');
        themeToggle.checked = false;
      }

      // Toggle logic
      themeToggle.addEventListener('change', function () {
        if (themeToggle.checked) {
          document.documentElement.setAttribute('data-theme', 'dark');
          localStorage.setItem('theme', 'dark');
          document.querySelector('.navbar').setAttribute('data-bs-theme', 'dark');
        } else {
          document.documentElement.setAttribute('data-theme', 'light');
          localStorage.setItem('theme', 'light');
          document.querySelector('.navbar').setAttribute('data-bs-theme', 'light');
        }
      });
    </script>
      </ul>
    </div>
  </div>
</nav> <div class="container mt-4">

  @yield('content')
  
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
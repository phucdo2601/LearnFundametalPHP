<nav class="navbar navbar-expand-sm bg-dark">
    <div class="container-fluid">
      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a 
            class="nav-link {{ request() -> is('/') ? 'active' : '' }}" 
            href="/">Home
          </a>
        </li>
        <li class="nav-item">
          <a 
          class="nav-link {{ request() -> is('about') ? 'active' : '' }}" 
            href="about">
            About
          </a>
        </li>

        <li class="nav-item">
          <a 
          class="nav-link {{ request() -> is('posts') ? 'active' : '' }}" 
            href="posts">
            Posts
          </a>
        </li>

        <li class="nav-item">
          <a 
          class="nav-link {{ request() -> is('foods') ? 'active' : '' }}" 
            href="foods">
            Foods
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="porfolio">Porfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact">Contact</a>
        </li>
      </ul>
    </div>      
  </nav>
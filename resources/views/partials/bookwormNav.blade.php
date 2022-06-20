<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Content here -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="{{route('book.vAllbook')}}">BookWorm</a>
      <ul class="navbar-nav mr-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Book
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('book.vAllbook')}}">View All</a>
            <a class="dropdown-item" href="{{route('book.newBook')}}">New Book</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Publishers
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">View All</a>
            <a class="dropdown-item" href="#">New Publisher </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Format
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">View All</a>
            <a class="dropdown-item" href="#">View Format</a>
          </div>
        </li>
      </ul>

    </nav>

  </div>

</nav>

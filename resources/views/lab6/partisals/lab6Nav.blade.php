<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Content here -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" >Menu</a>
      <ul class="navbar-nav mr-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            CLASSROOM
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('class.index')}}" >View All CLASSROOM</a>
            <a class="dropdown-item" href="{{route('class.create')}}" >Create CLASSROOM</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            TEACHER
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('teacher.index')}}">View All TEACHER</a>
            <a class="dropdown-item" href="{{route('teacher.create')}}">Create TEACHER</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            STUDENT
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('student.index')}}">View All STUDENT</a>
            <a class="dropdown-item" href="{{route('student.create')}}">Create STUDENT</a>
          </div>
        </li>
      </ul>

    </nav>

  </div>

</nav>

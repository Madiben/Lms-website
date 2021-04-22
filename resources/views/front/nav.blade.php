<nav class="navbar is-transparent">
    <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
        <img src="{{url('images/logo.jpg')}}" width="112" height="45">
      </a>
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    @if (Route::has('login'))
    @auth
    <div id="navbarBasicExample" class="navbar-menu">

        @if (Auth::user()->is_teacher)
        <div class="navbar-start">
        <a class="navbar-item" href="{{route('mysubject.list.t')}}">
            My subjects
          </a>

          <a class="navbar-item" href="{{route('subject.create')}}">
            New subject
          </a>
        @else
        <div class="navbar-start">
        <a class="navbar-item" href="{{route('mysubject.list.s')}}">
            My subjects
          </a>

          <a class="navbar-item" href="{{route('subject.list')}}">
            Take a subject
          </a>
          <a class="navbar-item" href="{{route('grades')}}">
            My Grades
          </a>
        @endif
            <a class="navbar-item" href="{{route('contact')}}">
                Contact
              </a>
              <a class="navbar-item"  href="{{route('about')}}">
                About
              </a>
        </div>
        <div class="navbar-end"  >
            <a class="navbar-item"  href="#">
                {{Auth::user()->name}}
              </a>
              <div class="navbar-item">
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="button is-light">
                           {{ __('Log out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{route('login')}}">
              My subjects
            </a>

            <a class="navbar-item" href="{{route('login')}}">
              New subject
            </a>

            <a class="navbar-item" href="{{route('contact')}}">
                Contact
              </a>
              <a class="navbar-item"  href="{{route('about')}}">
                About
              </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <a class="button is-light" href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))

                    <a class="button is-primary" href="{{ route('register') }}"><strong>Register</strong></a>
                @endif
            </div>
        </div>
    </div>
    @endauth
    @endif
  </nav>

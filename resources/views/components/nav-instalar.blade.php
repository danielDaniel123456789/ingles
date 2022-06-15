<ul class="mostrarNav d-flex justify-content-center ">
  <!-- Authentication Links -->
  @guest
      @if (Route::has('login'))
          <li class="nav-item ">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
      @endif

      @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif
  @else
      <li class="nav-link "  >
          <a id="navbarDropdown"  href="#" role="button" class="tituloNav" >
              {{ Auth::user()->name }}
          </a>

      </li>
      <li class="nav-link " >
          <a  href="{{ route('logout') }}" class="tituloNav"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           Cerrar Sesion
       </a>


       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
       </form>

      </li>
  @endguest
</ul>
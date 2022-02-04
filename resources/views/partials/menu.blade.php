<nav class="navbar navbar-expand-lg pr-4 pl-4 menu">
    <a class="navbar-brand" href="https://academiacentralstation.com/">
        <img src="{{asset('image/logo2.png')}}" height="50" alt="">
    </a>
    <button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-end pr-2" id="navbarNavDropdown">
        @if (Auth::user())
            @if (Auth::user()->tipo != 1)
                <ul class="navbar-nav ">
                    <li class="nav-item pl-4 text-center">
                        <a class="nav-link" href="https://us02web.zoom.us/j/6392517574?pwd=TWR1a1o4R1ZLS3pxSTVGSHc0QU5qQT09" style="display: flex;justify-content: center;align-items: center;"><img class="icono-menu" src="{{asset('image/monitor.png')}}" style="display: block;float: left;">Clases en</br>Directo</a>
                    </li>
                    <li class="nav-item pl-4 text-center">
                        <a class="nav-link {{ (strpos(Request::path(), 'control/estadisticas')!== false) ? 'active' : '' }}" href="estadisticas" style="text-align: center;display: flex;justify-content: center;align-items: center;"><img class="icono-menu" src="{{asset('image/4.png')}}" style="display: block;float: left;"></i>Estadísticas</br>Evolución</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link {{ (strpos(Request::path(), 'control/ranking')!== false) ? 'active' : '' }}" href="ranking"><img class="icono-menu" src="{{asset('image/3.png')}}">Tu posición</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link {{ (strpos(Request::path(), 'control/test')!== false) ? 'active' : '' }}" href="test"><img class="icono-menu" src="{{asset('image/1.png')}}">Test</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link {{ (strpos(Request::path(), 'control/documentos')!== false) ? 'active' : '' }}" href="documentos"><img class="icono-menu" src="{{asset('image/5.png')}}">Archivos</a>
                    </li>
                    <li class="nav-item dropdown pl-4">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="icono-menu" src="{{asset('image/2.png')}}">Más
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mas" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item {{ (strpos(Request::path(), 'control/perfil')!== false) ? 'active' : '' }}" href="perfil"><img class="icono-menu" src="{{asset('image/6.png')}}">Perfil</a>
                            <!--<a class="dropdown-item" href="#"><img class="icono-menu" src="{{asset('image/10.png')}}">Mejorar plan</a>-->
                            <a class="dropdown-item" href="comentadas"><img class="icono-menu" src="{{asset('image/7.png')}}">Preguntas comentadas</a>
                            <!--<a class="dropdown-item" href="#"><i class="fas fa-question icono-menu"></i>Preguntas Guardadas</a>-->
                            <!--<a class="dropdown-item" href="#"><i class="fas fa-question-circle icono-menu"></i>Dudas</a>-->
                            <hr style="height: 1px; width: 100%; background-color: #e9ecef;margin: .5rem 0;">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt icono-menu"></i>Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown pl-4">
                        <a class="nav-link dropdown-toggle 
                            {{ (strpos(Request::path(), 'administrador/test/temas')!== false) ? 'active' : '' }}
                            {{ (strpos(Request::path(), 'administrador/test/preguntas')!== false) ? 'active' : '' }}
                        " href="#" id="testMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="icono-menu" src="{{asset('image/1.png')}}">Test
                        </a>
                        <div class="dropdown-menu mas" aria-labelledby="testMenu">
                            <a class="dropdown-item {{ (strpos(Request::path(), 'administrador/test/temas')!== false) ? 'active' : '' }}" href="/administrador/test/temas"><i class="fas fa-ad icono-menu"></i>Temas</a>
                            <a class="dropdown-item {{ (strpos(Request::path(), 'administrador/test/preguntas')!== false) ? 'active' : '' }}" href="/administrador/test/preguntas"><i class="fas fa-question-circle icono-menu"></i>Preguntas</a>
                        </div>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link {{ (strpos(Request::path(), 'administrador/documentos')!== false) ? 'active' : '' }}" href="/administrador/documentos"><img class="icono-menu" src="{{asset('image/5.png')}}">Documentos</a>
                    </li>
                    <!--<li class="nav-item pl-4">
                        <a class="nav-link {{ (strpos(Request::path(), 'administrador/dudas')!== false) ? 'active' : '' }}" href="/administrador/dudas"><i class="fas fa-question-circle icono-menu"></i>Dudas</a>
                    </li>-->
                    <li class="nav-item pl-4">
                        <a class="nav-link {{ (strpos(Request::path(), 'administrador/comentarios')!== false) ? 'active' : '' }}" href="/administrador/comentarios"><i class="fas fa-comments icono-menu"></i>Comentarios</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link {{ (strpos(Request::path(), 'administrador/usuarios')!== false) ? 'active' : '' }}" href="/administrador/usuarios"><img class="icono-menu" src="{{asset('image/group.png')}}">Usuarios</a>
                    </li>
                    <li class="nav-item dropdown pl-4">
                        <a class="nav-link dropdown-toggle
                            {{ (strpos(Request::path(), 'administrador/perfil')!== false)? 'active' : '' }}
                        " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="icono-menu" src="{{asset('image/2.png')}}">Más
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mas" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item {{ (strpos(Request::path(), 'administrador/perfil')!== false)? 'active' : '' }}" href="/administrador/perfil"><i class="fas fa-user icono-menu"></i>Perfil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt icono-menu"></i>Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            @endif
        @else
            <ul class="navbar-nav "> 
                <li class="nav-item pl-4">
                    <a class="nav-link" href="#"><img class="icono-menu" src="{{asset('image/12.png')}}"></i>Inicio</a>
                </li>
            </ul>
        @endif
    </div>
  </nav>
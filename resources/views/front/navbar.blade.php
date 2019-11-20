<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
   <div class="container">
       <a class="navbar-brand size" href="{{ url('/') }}">
           {{ config('app.name') }}
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
           <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Left Side Of Navbar -->
           <ul class="navbar-nav mr-auto">

           </ul>
           <!-- Center Side Of Navbar -->
           <ul class="navbar-nav mr-auto">

           </ul>

           <!-- Right Side Of Navbar -->
           <ul class="navbar-nav ml-auto">
                   <li class="nav-item {{Request::is('/') ? 'active':''}}">
                      <a class="nav-link" href="{{ route('home') }}">Home </a>
                   </li>       
                   <li class="nav-item {{Request::is('about') ? 'active':''}}">
                      <a class="nav-link" href="{{ route('about') }}">About us </a>
                   </li>   
                   <li class="nav-item {{Request::is('courses') ? 'active':''}}">
                      <a class="nav-link" href="{{ route('courses') }}">Courses </a>
                   </li>   
                   <li class="nav-item {{Request::is('contacts') ? 'active':''}}">
                      <a class="nav-link" href="{{ route('contacts') }}">Contacts </a>
                   </li>                                                                
                   <!-- Authentication Links -->
                   @guest
                     <li class="nav-item {{Request::is('login') ? 'active':''}}">
                         <a class="nav-link" href="{{ route('login') }}"><span class="gold">{{ __('Administration') }}</span></a>
                     </li>
                     <!-- 
                     <li class="nav-item">
                         <a class="nav-link" href=""></a> --> <!-- href=" route('register') ">{{ __('Register') }}</a>  -->
                     <!-- </li> -->
                   @else
                   <li class="nav-item dropdown">
                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }} <span class="caret"></span>
                       </a>

                       <div class="dropdown-menu dropdown-menu-right size" aria-labelledby="navbarDropdown">
                           @auth
                              <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                           @endauth
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>
                       </div>
                   </li>
                   @endguest
           </ul>
       </div>
   </div>
  </nav>
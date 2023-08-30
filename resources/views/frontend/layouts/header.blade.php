<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{url('/home')}}">Award Voting System</a></h1>
   
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{url('/home')}}">Home</a></li>
          @if(Auth::user())
          
          <li class="dropdown"><a href="javascript:;"><span>{{Auth::user()->name ?? "User"}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{url('voter/edit-profile')}}/{{base64_encode(Auth::user()->id)}}">Profile</a></li>
              <li><a href="{{url('voter/change-password')}}/{{base64_encode(Auth::user()->id)}}">Change Password</a></li>
             
            </ul>
          </li>

          <li class="dropdown"><a href="{{url('voter/logout')}}"><span>logout</span> <i class="bi bi-chevron-down"></i></a></li>
          @else
          <li class="dropdown"><a href="#"><span>SignUp</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{url('voter/register')}}">Voter Register</a></li>
              <li><a href="{{url('candidate/index')}}">Nominations Page</a></li>
             
            </ul>
          </li>
         
          <li ><a href="{{url('voter/login')}}"><span>login</span></a>
           
          </li>
         @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
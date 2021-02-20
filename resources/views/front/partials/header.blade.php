<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html"><span>League Hockey</span>  U13</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('home') }}">Home</a></li>

          <li class="drop-down"><a href="">U13</a>
            <ul>
              <li><a href="{{ route('classement') }}">Classement</a></li>
              <li><a href="{{ route('equipes') }}">Equipes</a></li>
              <li><a href="{{ route('stat') }}">Statistique</a></li>
              <li><a href="{{ route('blog') }}">Comptes-Rendus</a></li>
              <li><a href="{{ route('compet') }}">Matches</a></li>

              
            </ul>
          </li>
         
          <li><a href="/">backend</a></li>
         
      
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="{{ route('shop.product') }}">Boutique</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
         
          @auth()
            
       
          @php
                    $user = DB::table('users')->where('id', Auth::user()->id)->first();
                @endphp
                <!-- User Account-->
                <li class="dropdown" style="margin-top: -16px;">
                    <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown"
                        title="User">
                        <img src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg')  }}" style="width: 40px">
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                          <a  class="dropdown-item" href="{{ route('customer.show', $user->id) }}">Profil</a>
                          <a  class="dropdown-item" href="{{ route('order') }}">Commandes</a>
                           
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                @else
                <li>
                  <a href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li>
                      <a href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
                @endauth 

        </ul>
        

      </nav><!-- .nav-menu -->

      <div class="header-social-links" style="margin-top: -16px;">
        <a href="{{ route('show.cart') }}"><span><i class="icofont-shopping-cart"></i>({{ session()->has('cart')?session()->get('cart')->totalQty : "" }})</span></a>
        
      </div>

    </div>
  </header><!-- End Header -->
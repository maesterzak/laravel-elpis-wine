<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >
    {{-- <link rel="stylesheet" href={{ asset('static/fontawesome-free/css/all.min.css') }} /> --}}
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <link rel="stylesheet" href={{ asset('static/styles.css') }}>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Elpis Wine</title>
</head>
<body>
    
    <header class="row g-0 ">
        <div class=" col-1 d-md-none d-flex align-items-center justify-content-center">
            
              <button type="button" data-bs-toggle="modal" data-bs-target="#modalNav" class="btn">
              <i style="color:#A90020;font-size:x-large" class="fas fa-bars"></i>
              </button>
              
        </div>
        <div class="col-2 col-lg-1  ">
            <img src={{ asset('images/image1.png') }} />
        </div>
        <div class="col-3 col-lg-2  d-flex align-items-center justify-content-center  ">
            <span class="header-name">Elpis Wine</span>
        </div>
        <div class="col-lg-5 col-6 order-md-12 d-flex align-self-center d-none d-lg-block ">
            
            <form class="row g-0 searchform">
                <div class="col-9">
                <input class="p-2" placeholder="I'm shopping for......"/>
                </div>
                <div class="col-3">
                    <button class="search-btn">search</button>
                </div>
            </form>
            
        </div>
        <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
            <div style="width: 50%; height:50%;margin-right:13px" class="position-relative d-flex align-items-center">
            <img  src={{ asset('images/cart.png') }} />
            <div class="position-absolute cart-counter d-flex justify-content-center align-items-center">
                <span class="text-light">1</span>
            </div>
            </div>
        </div>
        <div class="col-3 col-lg-2 d-flex align-items-center justify-content-around ">
            @guest
            <button onclick="window.location.href='{{ route('login') }}'" class="login-btn">Login</button>
            <button onclick="window.location.href='{{ route('register') }}'" class="register-btn">Register</button>
            @else
            <button onclick="window.location.href='{{ route('home') }}'" class="register-btn">Dashboard</button>
            <button class="login-btn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
            </button>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            @endguest
        </div>
        <div class="col-12 d-flex align-self-center justify-content-end d-lg-none mb-3">
            
            <form style="width: 70%" class="row g-0 searchform">
                <div class="col-9">
                <input class="p-2" placeholder="I'm shopping for......" />
                </div>
                <div class="col-3">
                    <button style="padding-left: 1em;padding-right:1em" class="search-btn">search</button>
                </div>
            </form>
            
        </div>
        
    </header>
    
    <div style="top:0" class="d-none d-lg-block position-sticky">
        {{-- <x-navbar: data="{{$categories}}" /> --}}
        @component('components.navbar', ['categories'=>$categories, 'tags'=>$tags])
            
        @endcomponent
    </div>
    <div>
        
        <img src={{ asset('images/image3.png') }} />
    </div>
    @if($tags->first())
    <div id="{{$tags->first()['name']}}" class="section-x-d color-1 d-flex justify-content-center align-items-center">
        
        <div class="section-x-2">
            
            <div style="height: auto; border-bottom:rgb(149, 140, 140) solid 2px">
            <h4 class="text-center">{{$tags->first()['name']}}</h4>
            </div>
            
            
            <div style="height:50%;width:100%">
                <x-slide2 data="{{$tags->first()->id}}" />
            </div>
            
            

        </div>
        {{-- @endforeach --}}

    </div>
    @endif
    @if($wine)
    <div style="height: 8vh;border-bottom:#736F70 solid 10px" class="d-flex align-items-end justify-content-center">
        <h4 class="text-center">NEW PRODUCTS</h4>
    </div>
    <div style="border-bottom:#46050A solid 14px" class="section-x">
        {{-- <x-wine_slider /> --}}
        @component('components.wine_slider', ['latest'=>$latest])
            
        @endcomponent

    </div>
    @endif
    @if($categories)
    @foreach ($categories as $item)
    <div id="{{$item['name']}}" style="height: 8vh;border-bottom:#736F70 solid 10px" class="d-flex align-items-end justify-content-center">
        <h4 class="text-center">{{$item['name']}}</h4>
    </div>
    <div style="border-bottom:#46050A solid 14px" class="section-x">
        <x-slide data="{{$item->id}}" />
        
        
    </div>
    @endforeach
    @endif
    <div style="border-bottom:#46050A solid 14px" class="section-x-3 row g-0">
        <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center position-relative order-2 order-lg-1">
            <div class="section-x-5 p-2 d-grid justify-content-center">
                    <span class="text-light" style="font-size: large">Enjoy our various recipes of <br> Coctails mixed by Professionals</span>
                    <div class="d-flex justify-content-center"><button class="button-2 ">Explore <img style="width: 1.3em" src={{ asset('images/arrow.svg') }} /></button></div>
            </div>
        </div>
        <div class="col-12 col-lg-8 section-x-6 order-1 order-lg-2">
            <img src={{ asset('images/image11.png') }} />
        </div>
        
    </div>
    @if($tags)
    @foreach ($tags->slice(1) as $item)
    <div id="{{$item['name']}}" style="height: 8vh;border-bottom:#736F70 solid 10px" class="d-flex align-items-end justify-content-center">
        <h4 class="text-center">{{$item['name']}}</h4>
    </div>
    <div style="border-bottom:#46050A solid 14px" class="section-x">
        <x-slide2 data="{{$item->id}}" />
        
        <br>

    </div>
    @endforeach
    @endif
    <div style="border-bottom:#46050A solid 14px " class="section-x-4 position-relative d-flex justify-content-center">
        <img src={{ asset('images/image9.png') }} />
        <div class="position-absolute text-light d-flex justify-content-center flex-wrap align-items-center" style="top:0;width:80%;height:100%">
            <div>
            <h2 class="text-2 text-center" >Hangovers are temporary.
            </h2>
            <h2 class="text-2 text-center">Drunk stories are forever.</h2>
            <span class="text-3">Shop all kinds of Alcoholic wine to enjoy with friends</span>
            
            <div class="d-flex justify-content-center mt-3"><button class="button-3 ">Shop now <img style="width: 1.3em" src={{ asset('images/arrow.svg') }} /></button></div>
            </div>
        </div>
    </div>
    <div style="height: 8vh">
    </div>
    <div style="border-bottom:#46050A solid 14px" class="section-x-4 position-relative d-flex justify-content-center">
        <img src={{ asset('images/image10.png') }} />
        <div class="position-absolute text-light d-flex justify-content-center flex-wrap align-items-center" style="top:0;width:80%;height:100%">
            <div>
            <h2 class="text-2 text-center" >Innovative Ideas.Quality 
            </h2>
            <h2 class="text-2 text-center">Taste.Unlimited Options.</h2>
            
            
            <div class="d-flex justify-content-center mt-5"><button class="button-3 ">Shop now <img style="width: 1.3em" src={{ asset('images/arrow.svg') }} /></button></div>
            </div>
        </div>

        <div style="height: 8vh">
        </div>
    </div>
    
    <div class="" style="height: 17vh">
        <h4 class="text-center">Follow us on:</h4>
        <div class="d-flex justify-content-center">
            <div class="d-flex justify-content-between socials-sec" >
                <img style="width: 2.5em" src={{ asset('images/twitter.svg') }} />
                <img style="width: 2.5em" src={{ asset('images/facebook.svg') }} />
                <img style="width: 2.5em" src={{ asset('images/instagram.svg') }} />
                <img style="width: 2.5em" src={{ asset('images/linkdn.svg') }} />
            </div>
        </div>
    </div>

    <!-- Modal nav -->
<div class="modal fade" id="modalNav" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content mobile-nav">
        <div class="modal-header">
          
          <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div style="font-size: large" class="modal-body d-grid justify-content-center">
            <a href="#">HOME</a>
            @if($categories)
            @foreach ($categories as $item)
            <a href="#{{$item['name']}}"  href="#">{{$item['name']}}</a>
            @endforeach
            @foreach ($tags as $item)
            <a href="#{{$item['name']}}"  href="#">{{$item['name']}}</a>
            @endforeach
            @endif
        </div>
        
      </div>
    </div>
  </div>




    
    <div style="width: 100vw">
        <x-footer />
    </div>
    
</body>
</html>
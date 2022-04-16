<nav class="d-flex justify-content-around">
    <a href="#">HOME</a>
    
        @foreach ($categories as $item)
        <a href="#{{$item['name']}}" class="nav-links" href="#">{{$item['name']}}</a>
        @endforeach
        @foreach ($tags as $item)
        <a href="#{{$item['name']}}" class="nav-links" href="#">{{$item['name']}}</a>
        @endforeach
        {{-- <a class="nav-links" href="#">DEALS OF THE WEEK<img style="width: 0.9em" src={{ asset('images/angle.svg') }} /></a>
        <a class="nav-links" href="#">NEW PRODUCTS<img style="width: 0.9em" src={{ asset('images/angle.svg') }} /></a> --}}
        {{-- <a class="nav-links" href="#">NON-ALCOHOLIC<img style="width: 0.9em" src={{ asset('images/angle.svg') }} /></a>
        <a class="nav-links" href="#">ALCOHOL<img style="width: 0.9em" src={{ asset('images/angle.svg') }} /></a>
        <a class="nav-links" href="#">COCKTAIL MIXERS<img style="width: 0.9em" src={{ asset('images/angle.svg') }} /></a>
        <a class="nav-links" href="#">BIG BOYS<img style="width: 0.9em" src={{ asset('images/angle.svg') }} /></a> --}}
        
        {{-- <a class="nav-links" href="#">SOCIALS<img style="width: 0.9em" src={{ asset('images/angle.svg') }} /></a> --}}
</nav>
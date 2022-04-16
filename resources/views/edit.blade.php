@extends('layouts.app')

@section('content')
<div class="row h-100 d-flex justify-content-center">
    <div class="col-10 col-md-8 bg-info">
        <div class="p-3">
            <h1 class="text-center"> Updating {{$wine["name"]}}</h1>
            <form class="d-flex justify-content-center flex-wrap" action="/update" method="POST" enctype="multipart/form-data">
              @csrf
              <input name="id" type="hidden" value="{{$wine["id"]}}" class="d-none" type="text" />
              <input value="{{$wine["name"]}}" class="mb-3 p-2" type="text" name="name" placeholder="enter wine name" />
              <input value="{{$wine['price']}}" class="mb-3 p-2" type="number" name="price" placeholder="enter wine price" />
              <input value="{{$wine['quantity']}}" class="mb-3 p-2" type="number" name="quantity" placeholder="enter wine quantity" />
              <div class="mb-3 w-100">
                <span>Select category: </span>
                @foreach ($categories as $item)
                <div class="form-check form-check-inline">
                 
                  <input @checked(
                      $wine->category_id == $item->id  
                  )
                  
                  class="form-check-input" type="radio" id={{$item['id']}} name="category"" value="{{$item->id}}">
                  <label class="form-check-label" for={{$item['id']}}>{{$item['name']}}</label> 
                </div>
                
                @endforeach
              </div>
              <div class="mb-3 w-100">
                <span>Select Tags: </span>
                <?php
                $i = 1;
                ?>
                @foreach ($tags as $item)
                <div class="form-check form-check-inline">
                  <input @checked(
                    // $wine->tags->has($item->id)
                    in_array($item->id, $wine->tags)
                )
                 class="form-check-input" type="checkbox" id={{$item['id']}} name="tag{{$i++}}"" value="{{$item->id}}">
                  <label class="form-check-label" for={{$item['id']}}>{{$item['name']}}</label> 
                </div>
                @endforeach
              </div><br>
              <span>Leave blank if you do not want to change the image</span>
              <input type="file" name="image" class="form-control mb-3">
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
    </div>

</div>


@endsection
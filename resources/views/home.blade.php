@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">Add wine</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Category</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Add Tag</button>

                    </div>
                    @if (session('status'))
                      <h6 class="alert alert-success">{{session('status')}}</h6>
                    @endif
                    <hr>
                    <div class="table-responsive"> 
                        <table class="table ">
                            <thead>
                                <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Price</td>
                                <td>quantity</td>
                                <td>category</td>
                                
                                <td>Tags</td>
                                <td>Update</td>
                                <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if($wine)
                                @foreach ($wine as $item)
                                <tr>
                                <td>
                                  <div >
                                      <img style="max-width: 3em" src="images/wine_image/{{$item['image']}}" />
                                  </div>
                                </td>
                                <td>{{$item['name']}}</td>
                                <td >{{$item['price']}}</td>
                                <td>{{$item['quantity']}}</td>
                                <td>{{$item['category_id']}}</td>
                                <td>
                                  @foreach ($item['tags'] as $item2)
                                    <span>{{$item2}},</span>
                                  @endforeach
                                </td>
                          
                                <td>
                                  <a href={{"edit/".$item['id']}}>
                                  <button type="button" class="btn btn-warning text-light">Update</button>
                                  </a>  
                                </td>

                                <td>
                                  <a href={{"delete/".$item['id']}}>
                                  <button type="button" class="btn btn-danger">Delete</button>
                                  </a>
                                </td>
                              </tr>
                                @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal category -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="d-flex justify-content-center flex-wrap" action="category" method="POST">
            @csrf
              <input class="mb-3 p-2" type="text" name="category_name" placeholder="enter category name" />
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Modal tag -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel2">Modal tag</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="d-flex justify-content-center flex-wrap" action="tag" method="POST">
                @csrf
                <input class="mb-3 p-2" type="text" name="tag_name" placeholder="enter tag name" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        
      </div>
    </div>
  </div>

  <!-- Modal wine -->
<div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel3">Modal wine</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="d-flex justify-content-center flex-wrap" action="wine" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="mb-3 p-2" type="text" name="name" placeholder="enter wine name" />
            <input class="mb-3 p-2" type="number" name="price" placeholder="enter wine price" />
            <input class="mb-3 p-2" type="number" name="quantity" placeholder="enter wine quantity" />
            <div class="mb-3 w-100">
              <span>Select category: </span>
              @foreach ($categories as $item)
              <div class="form-check form-check-inline">
               
                <input class="form-check-input" type="radio" id={{$item['id']}} name="category"" value="{{$item->id}}">
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
               
                <input class="form-check-input" type="checkbox" id={{$item['id']}} name="tag{{$i++}}"" value="{{$item->id}}">
                <label class="form-check-label" for={{$item['id']}}>{{$item['name']}}</label> 
              </div>
              @endforeach
              
              
            </div><br>
            <input type="file" name="image" class="form-control mb-3">


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="modal-footer">
          <span>This Modal is for adding Wine </span>
        </div>
      </div>
    </div>
  </div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
  <br>
  <div class="container-fliud"> 
   <div class="wrapper row"> 
    <div class="preview col-md-6">
      <img src="{{ $roomCategories->getImage() }}" alt="{{ $roomCategories->name }}" class="imaged">
    </div> 
    <div class="details col-md-3"> 
     <h3 class="">Category: {{$roomCategories->category_name}}</h3> 
     <div class="rating"> 
      <div class="stars"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> 
      </div>
    </div>
    <br>
    <h4>Description</h2>
     <p class="product-description">{{$roomCategories->description}}</p>
     <br>
     <h4 class="price">Price for 1 day: {{$roomCategories->price}}$</h4> 
     <a href="{{route('categories.select', $roomCategories->id)}}"><button type="button" class="btn btn-danger">Order</button></a>
    </div> 
   </div> 
  </div> 
</div> 
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Room Categories {{$roomCategories->id}}</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Images</th>
                            <th scope="col">Price</th>
                            @client
                            <th scope="col">Action</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$roomCategories->id}}</th>
                                <td>{{$roomCategories->category_name}}</td>
                                <td>{{$roomCategories->description}}</td>
                                <td><img src="{{ $roomCategories->getImage() }}" alt="{{ $roomCategories->name }}" class="image-show"></td>
                                <td>{{$roomCategories->price}}</td>
                                <td>
                                <a href="{{route('categories.select', $roomCategories->id)}}"><button type="button" class="btn btn-danger">Order</button></a>
                                </td>
                              </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection

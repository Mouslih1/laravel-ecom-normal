@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-right">
        <div class="col-md-8">
            <div class="card" style="width:60%">
               <h3 class="card-header"><p>{{ $product->title }}</p></h3>
                                <div class="card-image-top">
                                    <img class="img-fluid w-100" src="/storage/{{ $product->image }}" alt="{{ $product->title }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <p class="text-dark font-weight-bold">
                                        {{ $product->category->title }}
                                    </p>
                                    <p class="d-flex flex-now justify-content-between align-items-center">
                                        <span class="text-muted">
                                            {{ $product->price }} DH
                                        </span>
                                        <span class="text-danger">
                                            <strike> {{ $product->old_price }} DH</strike> 
                                        </span>
                                    </p>
                                    <p class="card-text">
                                        {{ $product->description }}
                                    </p>
                                    <p class="font-weight-blod">
                                        @if($product->in_stock > 0)
                                            <span class="text-success"> Disponible </span> 
                                        @else
                                            <span class="text-danger"> Indisponible </span> 
                                        @endif 
                                    </p>
                                </div>              
            </div>
        </div>
        <div class="col-md-4">
            <form action="{{ route('add.cart', $product->slug)}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <div class="mb-1">                    
                        <label for="qty" class="label-input">Quantité :</label>
                    </div>
                    <input type="number" name="qty" id="qty" value="1" class="form-control" max="{{ $product->in_stock }}" min="1">
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn text-white btn-block bg-dark form-control"  >
                        <i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

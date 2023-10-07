@props(['product','randomProducts','comments'])
<x-layout>
    <div class="row justify-content-center align-items-center text-light m-0 mt-5 mb-5 mx-2">
        <div class="col-lg-6 col-md-10 col-sm-10 bg-white rounded" id="detail">
            <img src="{{{asset('storage/'.$product->image)}}}" class="card-img-top" alt="detail" loading="lazy">
            <div class="card-body ps-2">
                <h5 class="card-title fs-4 text-muted">{{$product->name}}</h5>
                <p class="text-warning">${{ $product->price }}</p>
            </div>
        </div> 
        <div class="col-lg-6 col-md-10 col-sm-10 mt-5" id="detailRight">
            <h4 class="fs-3">{{$product->name}}</h4>
            <p class="text-warning m-0">${{$product->price}}</p>
            <p class="text-light">{{$product->category->name}}</p>
            <p class="">{{ $product->description }}</p>
            <a href="/products/{{$product->id}}/AddToCart" class="btn btn-primary"><i class="fa-solid fa-cart-shopping me-1"></i>Add to cart</a>
        </div>
    </div>

    <x-questionComments :product="$product" :comments="$comments"/>

    <x-randomProducts  :randomProducts="$randomProducts"></x-randomProducts>
    
    </div>
</x-layout>
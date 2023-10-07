@props(['selectCategory','categories','products'])

<x-layout>
    <x-hero-section></x-hero-section>
    <div class="mb-3 m-0">
        <form action="/" class="d-flex gap-1 justify-content-center">
            <input type="text" class="form-control w-50" name="search" placeholder="search products" value="{{request('search')}}" >
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>

    <x-categoryDropdown></x-categoryDropdown>

    <div class="row gap-5 justify-content-center text-light mt-5 m-0">
        @foreach ($products as $product)
            <div class="col-2 w-25 border border-primary-subtle p-0">
                <img src="{{{asset($product->image)}}}" class="card-img-top" alt="">
                <div class="card-body ps-2">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="text-warning m-0">{{$product->price}}</p>
                    <a href="/products/categories/{{$product->category->slug}}" class="text-light  link-underline-primary">{{$product->category->name}}</a>
                </div>
                <div class="card-action text-center mb-1" >
                    <a href="/products/detail/{{$product->name}}" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div> 
        @endforeach
    </div>

    <x-footer></x-footer>
</x-layout>
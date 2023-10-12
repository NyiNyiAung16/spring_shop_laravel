@props(['products'])


<div class="row gap-2 justify-content-center m-0 mx-2">
    @forelse ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 p-0 bg-white rounded" id="card">
            <img src="{{{asset('storage/'.$product->image)}}}" class="card-img-top" loading="lazy">
            <div class="card-body ps-2">
                <h5 class="card-title text-muted">{{$product->name}}</h5>
                <p class="text-warning m-0">${{$product->price}}</p>
                <a href="/?category={{$product->category->slug}}" class="text-primary  link-underline-primary">{{$product->category->name}}</a>
            </div>
            <div class="card-action text-center mb-1" >
                <a href="/products/detail/{{$product->name}}" class="btn btn-sm btn-primary">Read More</a>
            </div>
        </div> 
    @empty
        <div class="mt-4">
            <img src="/images/nothingSearch.jpg" alt="nothingsearch" class="d-block rounded mx-auto" style="max-width: 200px;">
            <p class="text-danger fs-4 text-center">Nothing to search!</p>
        </div>
    @endforelse
    {{ $products->links() }}
</div>
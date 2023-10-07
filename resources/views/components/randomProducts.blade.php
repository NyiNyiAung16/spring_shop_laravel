<div class="row mt-5 m-0 gap-5 justify-content-center text-light">
    @foreach ($randomProducts as $randomProduct)
    <div class="col-lg-2 col-md-3 col-sm-6 border border-primary-subtle p-0 bg-white rounded" style="width: 300px;">
        <img src="{{{asset('storage/'.$randomProduct->image)}}}" class="card-img-top" alt="" style="max-height: 200px;object-fit:contain;">
        <div class="card-body ps-2">
            <h5 class="card-title text-muted">{{$randomProduct->name}}</h5>
            <p class="text-warning ">${{$randomProduct->price}}</p>
        </div>
        <div class="card-action text-center mb-1" >
            <a href="/products/detail/{{$randomProduct->name}}" class="btn btn-sm btn-primary">Read More</a>
        </div>
    </div> 
@endforeach
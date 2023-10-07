@props(['cartProducts','totalPrice'])

<x-layout>

    <table class="table table-secondary table-hover mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th colspan="2">action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cartProducts as $product)
                <tr>
                    <td>
                        <p>{{$loop->index }}</p>
                    </td>
                    <td>
                        <p>{{$product->name}}</p>
                    </td>
                    <td>
                        <p>${{$product->price}}</p>
                    </td>
                    <td>
                        <p>{{$product->description}}</p>
                    </td>
                    <td>
                        <a href="/removeCart/{{ $product->id }}" class="btn btn-sm btn-danger">remove</a>
                    </td>
                    <td>
                        <a href="/products/detail/{{$product->name}}"  class="btn btn-sm btn-warning">detail</a>
                    </td>
                </tr>
                @empty
                <p class="text-danger fs-4 text-center">Nothing in the cart!</p>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-end">Total :</th>
                <td>${{$totalPrice}}</td>
            </tr>
        </tfoot>
    </table>
</x-layout>
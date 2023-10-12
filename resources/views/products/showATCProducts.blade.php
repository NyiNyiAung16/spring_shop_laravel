@props(['cartProducts','totalPrice'])
<x-layout>

    <table class="table table-sm table-secondary table-hover mt-3 ms-1 m-0" style="max-width: 98%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th class="d-none d-sm-table-cell">Description</th>
                <th  class="col-4 col-sm-2">action</th>
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
                    <td class="d-none d-sm-table-cell">
                        <p>{{$product->description}}</p>
                    </td>
                    <td>
                        <a href="/removeCart/{{ $product->id }}" class="btn btn-sm btn-danger mb-1">remove</a>
                        <a href="/products/detail/{{$product->name}}"  class="btn btn-sm btn-warning">detail</a>
                    </td>
                </tr>
                @empty
                <p class="text-danger fs-4 text-center">Nothing in the cart!</p>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="col-4">
                <th class="text-end d-none d-sm-table-cell" colspan="4">Total :</th>
                <th class="text-end d-table-cell d-sm-none" colspan="3">Total :</th>
                <td>${{$totalPrice}}</td>
            </tr>
        </tfoot>
    </table>
</x-layout>
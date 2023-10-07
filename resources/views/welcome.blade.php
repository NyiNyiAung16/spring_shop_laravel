<x-layout>
    @if (session()->has('success'))
        <p class="py-2 text-center fs-4 text-white bg-primary">{{ session('success') }}</p>
    @endif
    <x-hero-section></x-hero-section>
    <div class="mb-3 m-0">
        <form action="/" class="d-flex gap-1 justify-content-center">
            @if (request('category'))
                <input type="text" name="category" value="{{request('category')}}" class="d-none">
            @endif
            <input type="text" class="form-control w-50" name="search" placeholder="search products" value="{{request('search')}}" >
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>

    <x-categoryDropdown></x-categoryDropdown>
    <x-single-cart :products="$products"></x-single-cart>
    <x-subscriber></x-subscriber>
</x-layout>
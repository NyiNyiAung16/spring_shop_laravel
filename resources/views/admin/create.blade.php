@props(['categories'])

<x-layout>
    <div class="row m-0 mt-3">
        <div class="col-lg-2 ms-5">
            <x-dashboard-link></x-dashboard-link>
        </div>
        <div class="col-1"></div>
        <div class="col-lg-8">
            <form action="/admin/store" method="POST" class="px-1 py-2 rounded" style="background: #e2e3e5;" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="name" class="text-muted lead">Product Name</label>
                    <input type="text" name="name"  placeholder="Enter your product name" class="form-control" autocomplete="off">
                </div>
                @error('name')
                    <p class="text-danger m-0">{{ $message }}</p>
                @enderror
                <div class="form-group mb-2">
                    <label for="price" class="lead">Price</label>
                    <input type="text" name="price" placeholder="Enter your price"  class="form-control">
                </div>
                @error('price')
                    <p class="text-danger m-0">{{ $message }}</p>
                @enderror
                <div class="form-group mb-2">
                    <label for="image" class="lead">Image</label>
                    <input type="file" name="image"  accept="image/*" class="form-control">
                </div>
                @error('image')
                    <p class="text-danger m-0">{{ $message }}</p>
                @enderror
                <div class="form-group mb-2">
                    <label for="description" class="lead">Description</label>
                    <textarea name="description" id="description" placeholder="Enter your description" cols="20" rows="4" class="form-control"></textarea>
                </div>
                @error('description')
                    <p class="text-danger m-0">{{ $message }}</p>
                @enderror
                <div class="form-group mb-2">
                    <label for="category" class="lead">Category</label>
                    <select name="category_id" id="category" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                    <p class="text-danger m-0">{{ $message }}</p>
                @enderror
                <button class="btn btn-primary mt-1">Create</button>
            </form>
        </div>
    </div>
</x-layout>
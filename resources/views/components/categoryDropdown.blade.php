@props(['categories','selectCategory'])

<div class="dropdown text-center my-3 m-0">
    <button class="btn btn-primary dropdown-toggle px-4 py-2" data-bs-toggle="dropdown">
    {{ isset($selectCategory) ? $selectCategory->name : 'Filter By Category' }}
    </button>
    <ul class="dropdown-menu">
        <li><a href="/" class="dropdown-item">All</a></li>
        @foreach ($categories as $category)
            <li><a href="/?category={{$category->slug}} {{request('search') ? '&search='.request('search') : ''}}" class="dropdown-item">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
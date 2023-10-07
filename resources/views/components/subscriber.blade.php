<div class="container mt-5 mb-3" id="subscriber">
    <h3 class="text-center text-light pb-2">Subscribe For New Products</h3>
    <form action="/subscriber" method="POST" class="form-group mx-auto mt-1" style="max-width: 600px;">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Enter your email for subscribe">
        @error('email')
            <p class="text-danger text-center lead">{{ $message }}</p>
        @enderror
        @if (auth()->user()->is_subscribe ?? null)
            <button type="submit" class="d-block mx-auto btn btn-danger mt-1">Unsubscribe</button>
        @else
            <button type="submit" class="d-block mx-auto btn btn-primary mt-1">Subscribe</button>
        @endif
    </form>
</div>
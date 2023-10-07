<x-layout>

    <form action="/login" method="post" class="login px-3 py-3 mt-5 border-0 rounded">
        @csrf
        <h3 class="text-center text-light">Login</h3>
        <div class="mb-3">
            <label class="text-light fs-6 mb-1 fw-bold" for="email" style="letter-spacing: 1px">Email address</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" value="{{old('email')}}"> 
        </div>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label class="text-light fs-6 mb-1 fw-bold" for="password" style="letter-spacing: 1px">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password">    
        </div>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <button class="btn btn-primary d-block mx-auto">Login</button>
    </form>

</x-layout>
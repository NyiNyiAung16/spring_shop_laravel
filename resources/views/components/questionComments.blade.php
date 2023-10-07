@props(['product','comments'])

<div style="max-width: 500px;margin:auto;">
    <div class="mx-3">
        <h3 class="text-light">Ask a Questions</h3>
        <form action="/{{ $product->name }}/comments" class="form-group" method="POST">
            @csrf
            <textarea name="body" id="" cols="50" rows="5" class="form-control" placeholder="Enter your questions" ></textarea>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <button class="btn btn-primary mt-1" type="submit">Submit</button>
        </form>
    </div>     
    @auth
        <div class="mt-5 mx-3">
            <h4 class="text-light">Comments({{$comments->count()}})</h4>
        @foreach ($comments as $comment)
                <div class="px-3 py-2 border-0 rounded m-2 " style="background:#cbd5e1; ">
                    <div class="d-flex justify-content-between align-items-center py-1 ">
                        <div class="d-flex gap-1 align-items-center ">
                            <img src="/{{$comment->user->image}}" alt="alt" style="width: 12%;clip-path:circle()">
                            <p class="m-0 fw-bold text-uppercase">{{ $comment->user->name }}</p>
                        </div>
                        @if (auth()->user()->id === $comment->user->id)
                            <div class="d-flex flex-column gap-2 position-relative">
                                <i class="fa-solid fa-ellipsis-vertical fs-4" id="ellipsis" onclick="ellipsis('{{$comment->id}}')"></i>
                                <div class="d-none position-absolute p-2 border-0 rounded" id="commentOptions{{$comment->id}}" style="bottom: -63px;left:-20px;background:#94a3b8;">
                                    <form action="/comments/{{$comment->id}}/delete" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="border-0 bg-transparent">
                                            <i class="fa-solid fa-trash"  id="trash"></i>
                                        </button>
                                    </form>
                                    <button class="border-0 bg-transparent" onclick="editClick(event,'{{$comment->id}}')">
                                        <i class="fa-solid fa-pen"  id="edit"></i>
                                    </button>   
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="mt-3">
                        <p id="commentBody{{$comment->id}}">{{ $comment->body }}</p>
                        <form action="/comments/{{$comment->id}}/update" method="POST" class="d-none d-flex flex-column" id="EditComment{{$comment->id}}">
                            @csrf
                            @method('patch')
                            <input type="text" name="body" class="d-block border-0 p-1 rounded" value="{{$comment->body}}" id="newInput{{$comment->id}}" style="outline: none;width:100%;" autocomplete="off">
                            <button type="submit" class="mt-1 btn btn-sm btn-light" style="max-width: 60px">save</button>
                        </form>
                    </div>
                </div>
        @endforeach
        </div>
    @endauth
</div>
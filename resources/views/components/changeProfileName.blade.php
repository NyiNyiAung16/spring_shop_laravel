@props(['user'])

<div>
    <button class="btn btn-secondary" onclick="showEditName()">Edit Username</button>
    <div class="mt-3 d-none" id="editName">
        <form action="/updateProfileName" id="nameForm" method="POST">
            @csrf
            @method('patch')
            <input type="text" name="name" class="form-control" placeholder="Edit your username" value="{{$user->name}}" autofocus oninput="EditInput()">
            <button type="submit" class="btn btn-sm btn-info mt-3" disabled id="EditNamebutton">Save Name</button>
        </form>
    </div>
</div>
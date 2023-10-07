@props(['user'])

<div>
    <button class="btn btn-secondary" onclick="showEditPhoto()">
        <span id="span">Edit Photo</span>
    </button>
    <ul class="d-flex gap-2 align-items-center mt-3 p-0 d-none" id="photo">
        <div class="d-flex flex-column gap-2" >
            <li onclick="changePhoto('/images/profile2.jpg')">
                <img src="/images/profile1.jpg" alt="profileimg" class="profileImg">
            </li>
            <li onclick="changePhoto('/images/profile2.jpg')">
                <img src="/images/profile2.jpg" alt="profileimg" class="profileImg">
            </li>
            <li onclick="changePhoto('/images/profile3.jpg')">
                <img src="/images/profile3.jpg" alt="profileimg" class="profileImg">
            </li>
        </div>
        <div class="d-flex flex-column gap-2">
            <li onclick="changePhoto('/images/profile4.jpg')">
                <img src="/images/profile4.jpg" alt="profileimg" class="profileImg">
            </li>
            <li onclick="changePhoto('/images/profile5.jpg')">
                <img src="/images/profile5.jpg" alt="profileimg" class="profileImg">
            </li>
        </div>
        <div class="d-flex flex-column align-items-center ms-3">
            <img src="/{{$user->image}}" alt="" style="width: 100px;height:100px;border-radius:50%;object-fit:cover;"  id="ProfilePhoto">
            <form action="/updateProfilePhoto" method="POST" id="form">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-sm btn-info mt-2"  id="savePhoto" disabled>Save Photo</button>
            </form>
        </div>
    </ul>
</div>
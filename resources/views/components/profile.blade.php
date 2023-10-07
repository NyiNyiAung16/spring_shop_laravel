@props(['user'])

<div onclick="showProfile()" id="profileImg">
    <img src="/{{ $user->image }}" alt="profileImg" class="profileImg">
</div>

<div class="d-none" id="profile">
    <ul>
        <li>
            <span class="text-light" style="cursor: pointer" onclick="showSlideBar()">My Profile</span>
        </li>
        <li>
            <a href="/logout" class="text-light" style="text-decoration: none">Logout</a>  
        </li>
    </ul>
</div>

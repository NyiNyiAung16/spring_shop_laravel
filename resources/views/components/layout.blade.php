<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spring Shop</title>
    <link rel="icon" href="{{asset('/images/logo2.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body style="background-color: #333"> 
    <x-navbar ></x-navbar>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-d6b5691d-b655-4abd-b708-c019a85140d3"></div>
    {{$slot}}
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>

        function ellipsis(id){
            const commentOptions = document.querySelector(`#commentOptions${id}`);
            commentOptions.classList.toggle("d-none");
        }

        //edit setup
        function editClick(e,id){
            const EditComment = document.querySelector(`#EditComment${id}`);
            const newInput = document.querySelector(`#newInput${id}`);
            const commentBody = document.querySelector(`#commentBody${id}`);
            commentBody.classList.add('d-none');
            EditComment.classList.remove('d-none');
            EditComment.classList.add('d-block');
            // // Set the cursor position to the end of the input
            newInput.selectionStart = newInput.value.length;
            newInput.selectionEnd = newInput.value.length;
            // Focus on the input to bring the cursor to the end
            newInput.focus();
            console.log(newInput.selectionStart,newInput.selectionEnd)

            EditComment.addEventListener('submit',function(){
                setTimeout(() => {
                    EditComment.classList.remove('d-block');
                    EditComment.classList.add('d-none');
                    commentBody.classList.remove('d-none');
                }, 1000);
            });
        };

        //profile
        const profile = document.getElementById('profile');
        const showProfile = () => {
            profile.classList.toggle('d-none');
        }

        //slidebar
        const slideBar = document.getElementById('slideBar');
        const showSlideBar = () => {
            slideBar.classList.add('end-0');
        }
        const closeSlideBar = () => {
            slideBar.classList.remove('end-0');
        }
        //change photo
        const ProfilePhoto = document.getElementById('ProfilePhoto');
        const photo = document.getElementById('photo');
        const span = document.getElementById('span');
        const savePhoto = document.getElementById('savePhoto');
        const form = document.getElementById('form');
        const changePhoto = (url) => {
            savePhoto.removeAttribute('disabled');
            ProfilePhoto.src = url;
            form.addEventListener('submit',function(e){
                form.action = `updateProfilePhoto${url}`;
            });
        }
        const showEditPhoto = () => {
            photo.classList.toggle('d-none')
        }   

        //change username
        const editName = document.getElementById('editName');
        const EditNamebutton = document.getElementById('EditNamebutton');
        const nameForm = document.getElementById('nameForm');
        const showEditName = () => {
            editName.classList.toggle('d-none')
        }
        const EditInput = () => {
            EditNamebutton.removeAttribute('disabled');
        }
    
    </script>
</body>
</html>
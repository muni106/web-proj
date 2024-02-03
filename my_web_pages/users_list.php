<?php

function show_users($users) {
?>
    <ul class="list-unstyled m-2">
<?php
    foreach ($users as $user):
?>
        <li class="border-bottom align-middle">
            <img src="./show_image.php?image=<?php echo $user["profile_image_path"] ?>" alt="" class="col-2 m-1 rounded-circle" />
            <a href="./userProfile.php?user_id=<?php echo $user["id"] ?>" class="m-1"><?php echo $user["username"] ?></a>
        </li>   
<?php
    endforeach;
?>
    </ul>
<?php
}
?>
function follow_user(followed_id) {
    $.ajax({
        url: "follow_user.php",
        type: "post",
        data: { "followed_id": followed_id },
        success: (num_of_followers) => {
            document.getElementById("num_followers").textContent = num_of_followers;
        },
    });
}
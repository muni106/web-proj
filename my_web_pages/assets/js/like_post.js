function like_post(post_id) {
    $.ajax({
        url: "like_post.php",
        type: "post",
        data: { "post_id": post_id },
        success: (num_of_likes) => {
            document.getElementById("like").textContent = " " + num_of_likes;
        },
    });
}
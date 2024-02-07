<?php
require_once("get_feed.php");
require_once("get_user_info.php");

function show_posts(Array $posts) {
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./assets/js/like_post.js"></script>
<?php
    foreach ($posts as $post):
        $author = get_user_info($post["author"]);
?>
<article class="row border-bottom py-3 w-100 px-4 m-1">
    <img src="show_image.php?image=<?php echo $author["profile_image_path"] ?>" alt="" id="profileMini" class="col-2 img-fluid p-0" />
    <section class="col-10 d-grid gap-2">
        <a rel="author" href="./userProfile.php?user_id=<?php echo $author["id"] ?>" class="text-decoration-none text-reset fw-bold"><?php echo $author["username"]; ?></a>
        <p class="text-wrap text-truncate">
            <?php echo $post["body"]; ?>
            <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium quam architecto quaerat amet obcaecati voluptatem nobis soluta magni libero ea nostrum eaque ducimus, distinctio natus adipisci modi neque blanditiis id! -->
        </p>
        <code class="d-block p-2 text-wrap text-truncate">
            <?php echo $post["code"]; ?>
            <!-- print("hello world") -->
            <!-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum deserunt necessitatibus, quasi a quis perspiciatis impedit, consequuntur officiis accusamus, odio minima nesciunt vitae adipisci. Eligendi deserunt sit perspiciatis itaque quam. -->
        </code>
        <?php if ($post["image_path"] != NULL): ?>
            <img src="show_image.php?image=<?php echo $post["image_path"]; ?>" alt="" class="w-100">
        <?php endif; ?>
        <div>
            <form class="d-inline">
                <label for="like" class="d-none">Click here to like this post</label>
                <button id="like" type="button" onclick="like_post(<?php echo $post['id'] ?>);" class="bg-transparent border-0 bi bi-heart-fill"> <?php echo $post["likes"] ?></button>
            </form>
            <form action="process_save_post.php" method="post" class="d-inline">
                <input type="hidden" name="post_id" value="<?php echo $post["id"]; ?>">
                <input type="hidden" name="username" value="<?php echo $post["author"]; ?>">
                <button type="submit" id="save_post" class="bi bi-bookmark bg-transparent border-0"></button>
            </form>
            <form action="show_comments_of_post.php" method="get" class="d-inline">
                <label for="comments" class="d-none">Click here to go to the comments</label>
                <button type="submit" id="comments" class="bg-transparent border-0 bi bi-chat-right-fill text-decoration-none">
                    <?php echo get_comments_number($post["id"]); ?>
                </button>
                <input type="hidden" name="post_id" value="<?php echo $post["id"]; ?>">
            </form>
            <form action="write_post.php" method="get" class="d-inline">
                <input type="hidden" name="reply" value="<?php echo $post["id"]; ?>">
                <button type="submit" id="reply_post" class="bi bi-send bg-transparent border-0"></button>
            </form>
        </div>
    </section>
    <section>
    </section>
</article>

<?php
    endforeach;
}
?>
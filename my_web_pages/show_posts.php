<?php
require_once("get_feed.php");

function show_posts(Array $posts) {
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./assets/js/like_post.js"></script>
<?php
    foreach ($posts as $post):
?>
<article class="row border-bottom py-3 w-100">
    <div class="col-2 text-center">PH</div>
    <section class="col-10 d-grid gap-2">
        <a rel="author" href="" class="text-decoration-none text-reset fw-bold"><?php echo $post["author"]; ?></a>
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
            <img src="show_image.php?image=<?php echo $post["image_path"]; ?>" alt="" class="w-25">
        <?php endif; ?>
        <form>
            <label for="like" class="d-none">Click here to like this post</label>
            <button id="like" type="button" onclick="like_post(<?php echo $post['id'] ?>);" class="border-0 bg-white bi bi-heart-fill"> <?php echo $post["likes"] ?></button>
            <label for="comments" class="d-none">Click here to go to the comments</label>
            <a href="show_comments_of_post.php?post_id=<?php echo $post["id"] ?>" id="comments" class="border-0 bg-white bi bi-chat-right-fill"> 5</a>
        </form>
    </section>
    <section>
    </section>
</article>

<?php
    endforeach;
}
?>
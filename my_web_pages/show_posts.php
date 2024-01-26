<?php
function show_posts(Array $posts) {
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
    </section>
</article>

<?php
    endforeach;
}
?>
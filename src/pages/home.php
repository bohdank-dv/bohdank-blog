<section title="Recently Published Posts">
    <h2>Recently Published Posts</h2>
    <div class="post-list">
        <?php foreach ($data as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <a href="/post-1" title="<?= $post['name'] ?>"><?= $post['name'] ?></a>
                <span>Author: <?= $post['author_name'] ?></span>
                <span> - <?= $post['publication_date'] ?></span>
                <button type="button">Read</button>
            </div>
        <?php endforeach; ?>
    </div>
</section>
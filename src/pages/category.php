<section title="Posts">
    <h1><?= $data['name'] ?></h1>
    <div class="post-list">
        <?php foreach (blogGetCategoryPost($data['category_id']) as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>"><?= $post['name'] ?></a>
                <span>Author: <?= $post['author_name'] ?></span>
                <span><?= $post['publication_date'] ?></span>
                <button type="button">Read</button>
            </div>
        <?php endforeach; ?>
    </div>
</section>
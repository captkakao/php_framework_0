<div class="container">
    MAIN INDEX view
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['model_name'] ?></h5>
                    <p class="card-text"><?= $post['carcass_type'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<div class="container">
    MAIN INDEX view
    <button type="button" class="btn btn-primary" id="send">Primary</button>
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

<script src="/js/test.js"></script>

<script>
    $(function () {
        $('#send').click(function () {
            $.ajax({
                url: '/main/test',
                type: 'post',
                data: {'id': 2},
                success: function (res) {
                    console.log(res);
                },
                error: function () {
                    alert('Error!');
                }
            });
        });
    });
</script>
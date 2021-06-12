<div class="container">
    MAIN INDEX view
    <div id="answer"></div>
    <button type="button" class="btn btn-primary" id="send">Primary</button>
    <br>
<!--    To enable cache set cache as key and true as value,-->
<!--    then set cacheTime in seconds like 3600,-->
<!--    then set cacheKey to store it in tmp as filename-->
<!--    example below-->
<!--    -->
<!--    'cache' => true,-->
<!--    'cacheTime' => 3600 * 2,-->
<!--    'cacheKey' => 'fw_widget_name'-->
    <?php new \fw\widgets\menu\Menu([
            'tpl' => WWW . '/menu/select.php',
            'container' => 'select',
            'table' => 'categories'
    ]); ?>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['model_name'] ?></h5>
                    <p class="card-text"><?= $post['carcass_type'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="text-center">
            <p>Posts: <?= count($posts); ?> from <?= $total; ?> </p>
            <?php if ($pagination->countPages > 1): ?>
                <?= $pagination; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    $(function () {
        $('#send').click(function () {
            $.ajax({
                url: '/main/test',
                type: 'post',
                data: {'id': 2},
                success: function (res) {
                    // console.log(res);
                    // var data = JSON.parse(res);
                    // $('#answer').html('<p>Answer: ' + data.answer + 'Code: ' + data.code + '</p>');
                    $('#answer').html(res);
                },
                error: function () {
                    alert('Error!');
                }
            });
        });
    });
</script>
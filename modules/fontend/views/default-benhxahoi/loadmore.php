<?php foreach ($newscategory as $key => $value) { ?>
    <div class="col-related col-md-6 col-xs-12">
        <div class="media">
            <div class="media-left">
                <a title="<?= $value['post_title'] ?>"
                   href="<?= $value['post_name'] ?>.html">
                    <img
                        src="<?= \app\components\helpers\UploadImage::Image('news', $value['image'], 140, $value['created_at']) ?>"
                        class="attachment-featured_thumbnail size-featured_thumbnail wp-post-image"
                        alt="<?= $value['post_title'] ?>">
                </a>
            </div>
            <div class="media-body">
                <h4>
                    <a href="<?= $value['post_name'] ?>.html"
                       title="<?= $value['post_title'] ?>"><?= $value['post_title'] ?>

                    </a>
                </h4>
                <div class="entry-desc">
                    <?php
                    $string = $value['description'];
                    echo mb_substr($string, 0, 150, "utf-8");
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
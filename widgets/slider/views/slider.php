<div class="container-fluid">
    <div class="row">
        <div class="slider-new">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($slider as $key => $value) { ?>
                        <div class="item <?= $key < 1 ? "active" : '' ?> ">
                                <a href="<?= $value->link ?>">
                                    <img class="lazy" data-src="<?= $value->image ?>">
                                </a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
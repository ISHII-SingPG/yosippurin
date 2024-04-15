<?php
    $productsStatus = 1;
    if(!get_field("is-sales-now")){
        $productsStatus = 0;
    }
?>
<?php if($productsStatus == 1): ?>
    <div class="card__img">
<?php else: ?>
    <div class="card__img card__img--stop">
<?php endif; ?>
    <?php if (has_post_thumbnail()) : ?>
        <?php custom_the_post_thumbnail('full'); ?>
    <?php else : ?>
        <img src="<?php echo esc_url(get_theme_file_uri( "/images/products/products-noimage.jpg" )); ?>)" class="news-post__thumbnail" alt="NoImage画像" />
    <?php endif ; ?>
    <?php if($productsStatus == 1): ?>
        <div class="card__status card__status--sale">
            <p class="card__status-text card__status-text--sale">販売中</p>
        </div>
    <?php else: ?>
        <div class="card__status card__status--stop">
            <p class="card__status-text card__status-text--stop">販売停止中</p>
        </div>
    <?php endif; ?>
</div>
<div class="card__body">
    <h3 class="products-card__title"><?php the_title(); ?></h3>
    <p class="products-card__text">
    <?php 
        // カスタムフィールドの値を取得
        $products_text = get_field('products-text');
        // 文字数制限
        $max_length = 50;
        if (mb_strlen($products_text) > $max_length) {
            $products_text = mb_substr($products_text, 0, $max_length) . '…';
        }
        echo $products_text;
    ?>
    </p>
    <div class="products-card__link-wrapper">
    <a href="<?php the_permalink(); ?>" class="products-card__link">詳細を見る</a>
    </div>
</div>
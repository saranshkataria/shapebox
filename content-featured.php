<?php $format = get_post_format(); ?>

<div class="featured-item-outer group">
	<div class="featured-item-wrap group">
		<div class="featured-item">

			<?php if (has_post_format("video") && !is_sticky()) {
       echo '<span class="thumb-icon small"><i class="fas fa-play"></i></span>';
   } ?>
			<?php if (has_post_format("audio") && !is_sticky()) {
       echo '<span class="thumb-icon small"><i class="fas fa-volume-up"></i></span>';
   } ?>
			<?php if (is_sticky()) {
       echo '<span class="thumb-icon small"><i class="fas fa-star"></i></span>';
   } ?>
			<?php if (
       !is_sticky() &&
       !has_post_format("audio") &&
       !has_post_format("video")
   ): ?>
			<?php
   $large_image_url = wp_get_attachment_image_src(
       get_post_thumbnail_id(),
       "shapebox-large"
   );
   $medium_image_url = wp_get_attachment_image_src(
       get_post_thumbnail_id(),
       "shapebox-medium"
   );
   $small_image_url = wp_get_attachment_image_src(
       get_post_thumbnail_id(),
       "shapebox-small"
   );
   ?>

			<picture>
				<source srcset="<?php echo $large_image_url[0]; ?> 2x" media="(min-width: 1200px)">
				<source srcset="<?php echo $medium_image_url[0]; ?> 1.5x" media="(min-width: 768px)">
				<source srcset="<?php echo $small_image_url[0]; ?> 1x" media="(max-width: 767px)">
				<img src="<?php echo esc_url(
        $large_image_url[0]
    ); ?>" alt="<?php the_title(); ?>" style="width:100%;height:auto;">
			</picture>
			<?php endif; ?>

			<?php if (comments_open() && get_theme_mod("comment-count", "on") == "on"): ?>
			<a class="blog-card-comments" href="<?php comments_link(); ?>"><i class="fas fa-comment"></i><span><?php comments_number(
    "0",
    "1",
    "%"
); ?></span></a>
			<?php endif; ?>

			<a class="featured-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

			<div class="featured-content">
				<h2 class="featured-title"><?php the_title(); ?></h2>
			</div>

		</div>
		<div class="featured-item-bottom group">

			<?php if (get_theme_mod("author-avatar", "on") == "on"): ?>
			<div class="blog-card-author">
				<a href="<?php echo get_author_posts_url(
        get_the_author_meta("ID")
    ); ?>"><?php echo get_avatar(
    get_the_author_meta("user_email"),
    "128"
); ?></a>
			</div>
			<?php endif; ?>

			<?php if (get_theme_mod("more-button", "on") == "on"): ?>
			<a class="blog-card-more-link" href="<?php the_permalink(); ?>"><?php esc_html_e(
    "More",
    "shapebox"
); ?> <i class="fas fa-chevron-right"></i></a>
			<?php endif; ?>

			<ul class="blog-card-meta group">
				<li class="blog-card-date"><i class="far fa-calendar"></i><?php the_time(
        get_option("date_format")
    ); ?></li>
			</ul>

			<div class="blog-card-category group"><?php the_category(" "); ?></div>

		</div>
	</div>
</div>
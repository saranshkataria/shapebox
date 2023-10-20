<?php get_header(); ?>

<div class="content">

	<div class="content-inner">

		<?php while ( have_posts() ): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single-wrap'); ?>>

				<div class="blog-single group">

					<?php if ( has_post_format( array( 'audio', 'gallery', 'video' ) ) ): ?>

						<div class="blog-single-format">
							<div class="entry-media">
								<?php if( get_post_format() ) { get_template_part('inc/post-formats'); } ?>
							</div>
							<div class="blog-single-format-title">
								<h1><?php the_title(); ?></h1>
								<?php do_action( 'alx_ext_sharrre' ); ?>
							</div>
						</div>

					<?php else: ?>

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

<div class="blog-single-inner">
  <picture>
    <source srcset="<?php echo $large_image_url[0]; ?> 2x" media="(min-width: 1200px)">
    <source srcset="<?php echo $medium_image_url[0]; ?> 1.5x" media="(min-width: 768px)">
    <source srcset="<?php echo $small_image_url[0]; ?> 1x" media="(max-width: 767px)">
    <img src="<?php echo esc_url(
        $large_image_url[0]
    ); ?>" alt="<?php the_title(); ?>" width="920" height="518">
  </picture>

  <?php if ( comments_open() && ( get_theme_mod( 'comment-count', 'on' ) =='on' ) ): ?>
    <a class="blog-card-comments" href="<?php comments_link(); ?>"><i class="fas fa-comment"></i><span><?php comments_number( '0', '1', '%' ); ?></span></a>
  <?php endif; ?>

  <div class="blog-single-inner-inner">
    <h1 class="blog-single-title"><?php the_title(); ?></h1>
    <?php do_action( 'alx_ext_sharrre' ); ?>
  </div>
</div>

					<?php endif; ?>

					<div class="blog-single-bottom group">

						<?php if ( get_theme_mod( 'author-avatar', 'on' ) =='on' ): ?>
							<div class="blog-single-author">
								<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" aria-label="<?php echo "Posts by " . get_the_author_meta( 'display_name' ); ?>">
									<?php echo get_avatar(get_the_author_meta('user_email'),'64'); ?>
								</a>
							</div>
						<?php endif; ?>

						<ul class="blog-single-meta group">
							<li class="blog-single-date"><i class="far fa-calendar"></i><?php the_time( get_option('date_format') ); ?></li>
							<li class="blog-single-byline"><i class="far fa-user"></i><?php the_author_posts_link(); ?></li>
						</ul>
						<div class="blog-single-category group"><?php the_category(' '); ?></div>
					</div>

				</div>

				<div class="entry-content">
					<div class="entry themeform">
						<?php the_content(); ?>
						<?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','shapebox'),'after'=>'</div>')); ?>
						<div class="clear"></div>
					</div><!--/.entry-->
				</div>

				<div class="entry-footer group">

					<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','shapebox').'</span> ','','</p>'); ?>

					<div class="clear"></div>

					<?php if ( ( get_theme_mod( 'author-bio', 'on' ) == 'on' ) && get_the_author_meta( 'description' ) ): ?>
						<div class="author-bio">
							<div class="bio-avatar">
								<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" aria-label="<?php echo "Posts by " . get_the_author_meta( 'display_name' ); ?>">
									<?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?>
								</a>
							</div>
							<p class="bio-name">
								<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" aria-label="<?php echo "Posts by " . get_the_author_meta( 'display_name' ); ?>">
									<?php the_author_meta('display_name'); ?>
								</a>
							</p>
							<p class="bio-desc"><?php the_author_meta('description'); ?></p>
							<div class="clear"></div>
						</div>
					<?php endif; ?>

					<?php do_action( 'alx_ext_sharrre_footer' ); ?>

					<?php if ( get_theme_mod( 'post-nav', 'sidebar' ) == 'content' ) { get_template_part('inc/post-nav'); } ?>

					<?php if ( get_theme_mod( 'related-posts', 'categories' ) != 'disable' ) { get_template_part('inc/related-posts'); } ?>

					<?php if ( comments_open() || get_comments_number() ) :	comments_template( '/comments.php', true ); endif; ?>

				</div>



			</article><!--/.post-->

		<?php endwhile; ?>

	</div>

</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
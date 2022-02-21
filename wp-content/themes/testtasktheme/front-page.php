<?php get_header(); ?>
    <section class="header">
        <div class="header-content">
		<?php $header_block = new WP_Query(array(
			'pagename' => get_theme_mod('test_task_page_header_custom'),
		)); ?>
		<?php if ( $header_block->have_posts() ) : while ( $header_block->have_posts() ) : $header_block->the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
			<?php $txtbtn = get_post_meta( $header_block->post->ID, 'button_text', true); $custom_link = get_post_meta( $header_block->post->ID, 'custom_link', true); ?>
            <a href="<?php echo $custom_link; ?>" class="link"><?php echo $txtbtn; ?></a>
        </div>
        <div class="header-img">
            <?php the_post_thumbnail(); ?>
        </div>
		<?php endwhile; wp_reset_postdata();?>
		<?php else: ?>
		<?php endif; ?>
    </section>
    <section class="content">
        <div class="content-block">
		<?php $content_block = new WP_Query(array(
			'pagename' => get_theme_mod('test_task_about_custom'),
		)); ?>
		<?php if ( $content_block->have_posts() ) : while ( $content_block->have_posts() ) : $content_block->the_post(); ?>
            <div class="content-block-post">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
            <div class="content-block-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
		<?php endwhile; wp_reset_postdata();?>
		<?php else: ?>
		<?php endif; ?>
        </div>
    </section>
    <section class="testimonials">
        <div class="testimonials-wrapper">
			
            <div class="testimonials-header">
			<?php $testimonials_block = new WP_Query(array(
				'category_name' => get_theme_mod('test_task_testimonial_custom'),
			)); ?>
                <h3>
				<?php
					$category = get_the_category($testimonials_block->post->ID);
					foreach ($category as $cat) {
						echo $cat->name;
					}
				?>
				</h3>
                <div class="testimonials-header-buttons"></div>
            </div>
            <div class="testimonials-content owl-carousel owl-loaded owl-theme">
			
			<?php if ( $testimonials_block->have_posts() ) : while ( $testimonials_block->have_posts() ) : $testimonials_block->the_post(); ?>
                <div class="testimonials-content-review">
                    <?php the_post_thumbnail(); ?>
                    <div class="testimonials-content-review-post">
                        <?php the_content(); ?>
                        <h4><?php the_title(); ?></h4>
						<?php $iter_pos = get_post_meta( $testimonials_block->post->ID, 'position', true); ?>
                        <p class="position"><?php echo $iter_pos; ?></p>
                    </div>
                </div>
				<?php endwhile; wp_reset_postdata();?>
				<?php else: ?>

				<?php endif; ?>
            </div>
        </div>
    </section>
    <section class="contacts">
        <div class="contacts-wrapper">
            <div class="contacts-info">
			<?php $contact_block = new WP_Query(array(
				'pagename' => get_theme_mod('test_task_getintouch_custom'),
			)); ?>
			<?php if ( $contact_block->have_posts() ) : while ( $contact_block->have_posts() ) : $contact_block->the_post(); ?>
                <h3><?php the_title(); ?></h3>
                <div class="contacts-info-footer">
				<?php $mail = get_post_meta( $contact_block->post->ID, 'mail', true); $btnsbmt = get_post_meta( $contact_block->post->ID, 'btn_submit_txt', true); ?>
                    <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
                    <?php the_content(); ?>
                </div>
            </div>
			<?php endwhile; ?>
			
            <div class="contacts-form">
                <form method="post" class="ajaxform" id="ajaxform">
                    <input type="text" name="name" class="name" placeholder="Name" >
                    <input type="email" name="email" class="email" placeholder="Email" >
                    <textarea name="text" class="text" placeholder="Write something..." ></textarea>
                    <button type="submit" class="link"><svg class="submit-svg" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.818176 1.85279L8.39603 8.58867C8.74047 8.89484 9.25952 8.89484 9.60396 8.58867L17.1818 1.85279V12.4547C17.1818 12.9567 16.7748 13.3637 16.2727 13.3637H1.72727C1.22519 13.3637 0.818176 12.9567 0.818176 12.4547V1.85279ZM2.1865 0.636475H15.8134L8.99995 6.69288L2.1865 0.636475Z" fill="white"/>
                        </svg>
                        <?php echo $btnsbmt; ?></button>
                </form>
            </div>
			<?php else: ?>
			<?php endif; wp_reset_postdata(); ?>
        </div>
    </section>
<?php get_footer(); ?>
    
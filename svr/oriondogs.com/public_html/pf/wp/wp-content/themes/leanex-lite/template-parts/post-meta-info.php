		<ul class="post-meta">
			<li class="meta-author">
				<?php printf( esc_html__( 'By ', 'leanex-lite' ) ); the_author_posts_link(); ?>
			</li>

		<?php
			$categories_list = get_the_category_list(', ');
				if ( 'post' == get_post_type() && $categories_list ) : ?>
			<li class="meta-cat">
				<?php printf( esc_html__( 'In ', 'leanex-lite' ) ); echo esc_html( $categories_list ); ?>
			</li>
		<?php
				endif; ?>

			<li class="meta-num-comm">
				<a href="<?php the_permalink() ?>#comments"><i class="fa fa-comment"></i><?php comments_number( '', '1', '%'); ?></a>
			</li>
		</ul>
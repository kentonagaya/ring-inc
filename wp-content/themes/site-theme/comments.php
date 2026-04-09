<div id="comments_block">
<?php if(have_comments()): ?>
	<ul class="comments">
		<?php  wp_list_comments(); ?>
	</ul>
<?php endif; ?>
<?php if(get_comment_pages_count() > 1) : ?>
	<div>
		<span><?php previous_comments_link('前のコメント'); ?></span>
		<span><?php next_comments_link('次のコメント'); ?></span>
	</div>
<?php endif; ?>
<?php comment_form(); ?>
</div>
<?php

/**
 * content-sitemap.php
 * Template for sitemap content - thanks to https://yoast.com/html-sitemap-wordpress/
 */

?>

<article class="container">
<div class="row">
	<div class="grid-half">
		<h2 id="pages">Pages</h2>
		<ul>
		<?php
		// Add pages you'd like to exclude in the exclude here
		wp_list_pages(
		  array(
		    'exclude' => '',
		    'title_li' => '',
		  )
		);
		?>
		</ul>

		<?php
		foreach( get_post_types( array('public' => true) ) as $post_type ) {
		  if ( in_array( $post_type, array('post','page','attachment') ) )
		    continue;

		  $pt = get_post_type_object( $post_type );

		  echo '<h2>'.$pt->labels->name.'</h2>';
		  echo '<ul>';

		  query_posts('post_type='.$post_type.'&posts_per_page=-1');
		  while( have_posts() ) {
		    the_post();
		    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
		  }

		  echo '</ul>';
		}
		?>

	</div>
	<div class="grid-half">
		<h2 id="posts">Posts</h2>
		<ul>
		<?php
		// Add categories you'd like to exclude in the exclude here
		$cats = get_categories('exclude=');
		foreach ($cats as $cat) {
		  echo "<li><h3>".$cat->cat_name."</h3>";
		  echo "<ul>";
		  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
		  while(have_posts()) {
		    the_post();
		    $category = get_the_category();
		    // Only display a post link once, even if it's in multiple categories
		    if ($category[0]->cat_ID == $cat->cat_ID) {
		      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
		    }
		  }
		  echo "</ul>";
		  echo "</li>";
		}
		?>
		</ul>

		<h2 id="authors">Authors</h2>
		<ul>
		<?php
		wp_list_authors(
		  array(
		    'exclude_admin' => false,
		  )
		);
		?>
		</ul>
	</div>
</div>
</article>

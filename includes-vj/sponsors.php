<?php
/* harbour Sponsor Type Example
This page walks you through creating
a Sponsor type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for Sponsor types
add_action( 'after_switch_theme', 'harbour_flush_rewrite_rules' );

// Flush your rewrite rules
function harbour_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the Sponsor
function custom_post_sponsors() {
	// creating (registering) the Sponsor
	register_post_type( 'custom_type_sponsors', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this Sponsor
		array( 'labels' => array(
			'name' => __( 'Sponsors', 'harbour' ), /* This is the Title of the Group */
			'singular_name' => __( 'Sponsor', 'harbour' ), /* This is the individual type */
			'all_items' => __( 'All Sponsors', 'harbour' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'harbour' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Sponsor', 'harbour' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'harbour' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Sponsors', 'harbour' ), /* Edit Display Title */
			'new_item' => __( 'New Sponsor', 'harbour' ), /* New Display Title */
			'view_item' => __( 'View Sponsor', 'harbour' ), /* View Display Title */
			'search_items' => __( 'Search Sponsor', 'harbour' ), /* Search Sponsor Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'harbour' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'harbour' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage Sponsors', 'harbour' ), /* Sponsor Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 20, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-awards', /* the icon for the Sponsor type menu */
			'rewrite'	=> array( 'slug' => 'sponsors', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'sponsors', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail')
		) /* end of options */
	); /* end of register Sponsor */

	/* this adds your post categories to your Sponsor type */
	// register_taxonomy_for_object_type( 'category', 'custom_type_sponsors' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_sponsors');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add Sponsor Categories (these act like categories)
	register_taxonomy( 'custom_cat',
		array('custom_type_sponsors'), /* if you change the name of register_post_type( 'custom_type_sponsors', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Sponsor Categories', 'harbour' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Sponsor Category', 'harbour' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Sponsor Categories', 'harbour' ), /* search title for taxomony */
				'all_items' => __( 'All Sponsor Categories', 'harbour' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Sponsor Category', 'harbour' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Sponsor Category:', 'harbour' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Sponsor Category', 'harbour' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Sponsor Category', 'harbour' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Sponsor Category', 'harbour' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Sponsor Category Name', 'harbour' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'sponsor-category' ),
		)
	);

	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/

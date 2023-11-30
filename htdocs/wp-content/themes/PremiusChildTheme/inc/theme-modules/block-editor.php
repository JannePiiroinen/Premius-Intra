<?php

/**
 * Block editor (/Gutenberg) specific functions
 */

/* Disable editor block directory search */
add_action( 'admin_init', function() {
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' ); // Disable in Gutenberg plugin
} );
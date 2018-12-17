<?php
/*
Plugin Name: Music Album
Description: Stores songs and music
Version:1.0.0
Author:Deep Rahman
*/

// Set up the post type
add_action('init', 'boj_music_collection_register_post_types');

// Register post types
function boj_music_collection_register_post_types(){
    // Set up the arguments for the 'music_album' post type
    $album_args =[
        'public' => true,
        'query_var' => 'music_album',
        'rewrite' => [
            'slug' => 'music/albums',
            'with_front' => false
        ],
        'supports' => ['title', 'thumbnail', 'custom-fields'],
        'labels' => [
            'name' => 'Albums',
            'singular_name' => 'Album',
            'add_new'=>'Add New Album',
            'add_new_item' => 'Add New Album',
            'edit_item' => 'Edit Album',
            'new_item' => 'New Album',
            'view_item' => 'View Album',
            'search_items' => 'Search Albums',
            'not_found' => 'No Album Found',
            'not_found_in_trash' => 'No Album Found In Trash',
        ],
        // 'taxonomies' => ['post_tag'],
        // 'capabilities' =>[
        //     'edit_post' => 'edit_album',
        //     'edit_posts' => 'edit_albums',
        //     'edit_other_posts' => 'publish_albums',
        //     'read_post' => 'read_album',
        //     'read_private_posts' => 'read_private_albums',
        //     'delete_post' => 'delete_album'
        // ]
    ];
    // Register the music album post type
    register_post_type('music_album', $album_args);

}


// Setup Taxonomies
add_action(
    'init',
    'boj_music_collection_register_taxonomies'
);

// Register Taxonomies
function boj_music_collection_register_taxonomies(){

    // setup the artist taxonomies arguments
    $artist_args =[
        'hierarchical' => false,
        'query_var' => 'album_artist',
        'show_tagcloud' => true,
        'rewrite' => [
            'slug' => 'music/artists',
            'with_front' => false
        ],
        'labels' => [
            'name' => 'Artists',
            'singular_name' => 'Artist',
            'edit_item' => 'Edit Artist',
            'update_item' => 'Update Artist',
            'add_new_item' => 'Add New Artist',
            'new_item_name' => 'New Artist Name',
            'all_items' => 'All Artists',
            'popular_items' => 'Popular Artists',
            'separate_items_with_commas' => 'Separate Artists with commas',
            'add_or_remove_items' => 'Add or Remove Artists',
            'choose_from_the_most_used' => 'Choose from the most popular artists'
        ]
    ];

    // Setup the genre taxonomy arguments
    $genre_args =[
        'hierarchical' => true,
        'query_var' => 'album_genre',
        'show_tagcloud' => true,
        'rewrite' => [
            'slug' => 'music/genres',
            'with_front' => false
        ],
        'labels' => [
            'name' => 'Genres',
            'singular_name' => 'Genre',
            'edit_item' => 'Edit Genre',
            'update_item' => 'Update Genre',
            'add_new_item' => 'Add New Genre',
            'new_item_name' => 'New Genre name',
            'all_items' => 'All Genres',
            'search_items' => 'Search Genres',
            'parent_item' => 'Parent Genre',
            'parent_item_colon' => 'Parent Genre'
        ]
    ];

    // Register the album artist taxonomy
    register_taxonomy('album_artist',['music_album'], $artist_args);

    // Register the album genre taxonomy
    register_taxonomy('album_gener', ['music_album'], $genre_args);
}

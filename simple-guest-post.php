<?php
/*
Plugin Name: Really Simple Guest Post Plugin
Plugin URI: http://freebloggingtricks.com/really-simple-guest-post-plugin/
Description: Really Simple Guest Post Plugin allow your visitors to submit posts without registration from anywhere on your site.
Version: 1.0.1
Author: Ataul Ghani
Author URI: http://freebloggingtricks.com/
Requires at least: 3.0
Tested Up to: 3.6
Stable Tag: trunk
License: GPL v2
*/



function reallysimpleguestpost_shortcode( $atts ) {
    extract ( shortcode_atts (array(
        'cat' => '1',
        'author' => '1',
        'redirect' => get_bloginfo('home'),
    ), $atts ) );

    return '<form class="fbt-simple-guest-post" action="'. plugin_dir_url("simple-guest-post.php") .'really-simple-guest-post/simple-guest-post-submit.php" method="post">
<p>The (*) marked fields are mandatory.</p>

<strong>' . __('Your Name:*', 'fbt-simple-guest-post') . '</strong><br>
            <input type="text" name="author" size="60" required="required" placeholder="' . __('Put your name', 'fbt-simple-guest-post') . '"><br><br>
        <strong>' . __('Email Address:*', 'fbt-simple-guest-post') . '</strong><br>
            <input type="email" name="email" size="60" required="required" placeholder="' . __('Enter your email', 'fbt-simple-guest-post') . '"><br><br>
        <strong>' . __('Website url:', 'fbt-simple-guest-post') . '</strong><br>
            <input type="text" name="site" size="60" placeholder="' . __('Your website url', 'fbt-simple-guest-post') . '"><br><br>
        <strong>' . __('Post Title</strong> (120 Characters maximum)<strong>:*', 'fbt-simple-guest-post') . '</strong><br>
            <input type="text" name="title" size="60" maxlength="120" required="required" placeholder="' . __('Enter title here', 'fbt-simple-guest-post') . '"><br><br>
        <strong>' . __('Description:*', 'fbt-simple-guest-post') . '</strong>
        '. wp_nonce_field() .'
            <textarea rows="15" cols="72" required="required" name="description" placeholder="' . __('Start writing from here', 'fbt-simple-guest-post') . '"></textarea><br>
        <strong>' . __('Keyword Tags:', 'fbt-simple-guest-post') . '</strong><br>
            <input type="text" name="tags" size="60" placeholder="' . __('Separate tags with commas', 'fbt-simple-guest-post') . '"><br><br><br>
        <input type="hidden" value="'. $cat .'" name="category"><input type="hidden" value="'. $author .'" name="authorid">
        <input type="hidden" value="'. $redirect .'" name="redirect">
        <input type="hidden" value="'. str_replace('/wp-content/themes', '', get_theme_root()) .'/wp-blog-header.php" name="rootpath">
        <input type="submit" value="' . __('✓ Submit Your Post', 'really-simple-guest-post') . '"> <input type="reset" value="' . __('Reset', 'fbt-simple-guest-post') . '"><br>
        </form>
        ';
    }
add_shortcode( 'mag-simple-guest-post', 'reallysimpleguestpost_shortcode' );

?>
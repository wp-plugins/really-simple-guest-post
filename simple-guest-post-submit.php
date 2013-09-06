<?php
/*
An Important part of Really Simple Guest Post Plugin for WordPress.
*/

//Get Really Simple Guest Post submitted form
ob_start();
require_once($_POST["rootpath"]);
$title = $_POST["title"];
$description = $_POST["description"];
$tags = $_POST["tags"];
$author = $_POST["author"];
$email = $_POST["email"];
$site = $_POST["site"];
$authorid = $_POST["authorid"];
$category = $_POST["category"];
$redirecturl = $_POST["redirect"];
$path = $_POST["rootpath"];
$nonce=$_POST["_wpnonce"];

//Load WordPress
//require($path);

//Verify the form fields
if (! wp_verify_nonce($nonce) ) die('Security check'); 

   //Post Properties
    $new_post = array(
            'post_title'    => $title,
            'post_content'  => $description,
            'post_category' => $category,  // Usable for custom taxonomies too
            'tags_input'    => $tags,
            'post_status'   => 'pending',           // Choose: publish, preview, future, draft, etc.
            'post_type' => 'post',  //'post',page' or use a custom post type if you want to
            'post_author' => $authorid //Author ID
    );
    //save the new post
    $pid = wp_insert_post($new_post);
     
    /* Insert Form data into Custom Fields */
    add_post_meta($pid, 'author', $author, true);
    add_post_meta($pid, 'author-email', $email, true);
    add_post_meta($pid, 'author-website', $site, true);

header("Location: $redirecturl");
?>

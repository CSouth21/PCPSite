<?php
/**
 * @package SHUHello
 * @version 0.001
 */
/*
Plugin Name: SHUHello
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Callum South
Version: 0.0000000001
Author URI: http://ma.tt/
*/

function hello_SHU_get_lyric() {
	/** These are the lyrics to Hello SHU */
	$lyrics = "Hello, SHU
NEW: Well, hello, SHU
NEW: It's so nice to have you back where you belong
You're lookin' swell, SHU
I can tell, SHU
You're still glowin', you're still crowin'
You're still goin' strong
NEW: I feel the room swayin'
NEW: While the band's playin'
NEW: One of our old favorite songs from way back when
NEW:So, take her wrap, fellas
SHU'll, never go away again
Hello, SHU
Well, hello, SHU
NEW: It's so nice to have you back where you belong
You're lookin' swell, SHU
I can tell, SHU
NEW: You're still glowin', you're still crowin'
NEW: You're still goin' strong
NEW: I feel the room swayin'
NEW: While the band's playin'
NEW: One of our old favorite songs from way back when
NEW: So, golly, gee, fellas
NEW: Have a little faith in me, fellas
SHU, never go away
NEW: Promise, you'll never go away
SHU'll never go away again";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_SHU() {
	$chosen = hello_SHU_get_lyric();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="SHU"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hello SHU song, by Jerry Herman:' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_SHU' );

// We need some CSS to position the paragraph.
function SHU_css() {
	echo "
	<style type='text/css'>
	#SHU {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 15px;
		line-height: 1.6666;
	}
	.rtl #SHU {
		float: left;
	}
	.block-editor-page #SHU {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#SHU,
		.rtl #SHU {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'SHU_css' );

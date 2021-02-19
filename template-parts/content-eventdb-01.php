<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package epitech
 */

global $wpdb, $post;
$pluginprefix = "iem14";
$dbEcoles = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $pluginprefix . "_ecoles", ARRAY_A);
$eventdbpost_array = [];

foreach ($dbEcoles as $dbEcole) {
	foreach (json_decode($dbEcole["posts"], true) as $dbEcole_post) {
		if (intval($dbEcole_post["wp_post_id"]) == intval($post->ID)) {
			$eventdbpost_array["date"] = $dbEcole_post["eventdb_date"];
			$eventdbpost_array["datefin"] = $dbEcole_post["eventdb_datefin"];
			$eventdbpost_array["horaire"] = $dbEcole_post["eventdb_horaire"];
		}
	}
}

$postdate = join(".", array_reverse(explode("/", $eventdbpost_array["date"])));
$postdatefin = join(".", array_reverse(explode("/", $eventdbpost_array["datefin"])));
$ville = wp_get_post_terms(get_the_ID(), 'eventdb_ville');
?>

<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
	<div class="event-inline">
		<div class="location"><?php echo $ville[0]->name; ?></div>
		<div class="date-hours"><?php echo $postdate; ?> / <?php echo $eventdbpost_array["horaire"]; ?></div>
		<div class="resume">
			<?php the_excerpt(); ?>
			
			<?php if ($postdatefin !== "") { ?><br><p><i>Fin le <?php echo $postdatefin; ?></i></p><?php } ?>
		</div>
		<div class="calendar"> </div>
	</div>
<!-- </article> -->

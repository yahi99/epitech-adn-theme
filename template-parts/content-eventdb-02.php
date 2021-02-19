<?php
/**
 * Template part for displaying eventdb posts
 *
 * Author : Elisa THENG
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * to insert in wp-content/themes/epitech/template-parts folder
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
$ecole = wp_get_post_terms(get_the_ID(), 'eventdb_ecole');
$ville = wp_get_post_terms(get_the_ID(), 'eventdb_ville');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="news-elm">
		<!--
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="news-link">
			<?php the_post_thumbnail('event-news'); ?>
		</a>
		-->

		<header class="entry-header">
			<div>
				<span class="map"><?php echo ((count($dbEcoles) > 1) ? $ecole[0]->name : "") . " " . $ville[0]->name; ?></span>
				<span class="date">- <?php echo $postdate; ?></span>
				<span class="date">- <?php echo $eventdbpost_array["horaire"]; ?></span>
			</div>

			<?php
			if (is_single()) : the_title('<h1 class="entry-title">', '</h1>');
			else : the_title('<h2 class="entry-title">', '</h2>');
			endif;
			?>

			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>

			<div class="entry-footer">
				<?php if ($postdatefin !== "") { ?><div><p><i>Fin le <?php echo $postdatefin; ?></i></p></div><?php } ?>
				
				<div class="social-share">
					<div class="social-share-ctn">
						<ul>
							<li>Partager</li>
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank"><img src="/wp-content/uploads/sites/2/2017/06/logo-facebook.png" alt="" width="24" height="24"></a></li>
							<li><a href="https://twitter.com/home?status=<?php echo esc_url( get_permalink() ); ?>  via @epitech" onclick="return !window.open(this.href, 'Facebook', 'width=500,height=500')" target="_blank"><img src="/wp-content/uploads/sites/2/2017/06/logo-twitter.png" alt="" width="24" height="24"></a></li>
						</ul>
					</div>
				</div>
			</div>
			
		</header>
	</div>
</article>

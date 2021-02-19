<?php
$date_in = get_gmt_from_date(get_field('date_in'), 'Ymd').'T'.str_replace(':', '', get_field('hour_in')).'00Z';
$date_out = get_gmt_from_date(get_field('date_out'), 'Ymd').'T'.str_replace(':', '', get_field('hour_out')).'00Z';
$address = get_field('address') . ' ' . get_field('address2').' ' . get_field('zipcode').' ' . get_field('city');
?>

<div class="calendar-share">
	<div class="calendar-share-ctn">
		<ul>
			<li>Calendrier</li>
			<li>
				<a href="https://google.com/calendar/event?action=TEMPLATE&text=<?php echo get_the_title(); ?>&dates=<?php echo $date_in; ?>/<?php echo $date_out; ?>&location=<?php echo $address; ?>" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/google-calendar.png" alt="" width="27">
				</a>
			</li>
			<li>
				<a href="http://calendar.live.com/calendar/calendar.aspx?rru=addevent&summary=<?php the_title(); ?>&location=<?php echo $address; ?>&dtstart=<?php echo $date_in; ?>&dtend=<?php echo $date_outx; ?>" class="outlook" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/outlook.png" alt="" width="27">
				</a>
			</li>
		</ul>
	</div>
</div>

<div id="fanart" style="background-image: url(images/tv-background/<?php echo $tv_data['background']; ?>)">
	<div class="summary-background">
		<div class="summary-overlay"> 
		<div class="summary-width">
			
			<div class="row width summary-content margin-null-auto">
				<div class="large-2 columns">
					<img class="poster" src="images/tv-poster/<?php echo $tv_data['poster'];  ?>">
				</div>
				<div class="large-6 info-height info-margin-left columns">
					<div class="row">
					<div class="large-6 columns">
						<?php 
							//$movie_rating = rating_for_movie($movie_data['ID'], $pdo)

							//foreach ($movie_rating as $key => $value) {
							//}
							//print_r($tv_data);
						 ?>
					</div>
					<div class="large-6 columns">
						rate
					</div>
					</div>
					<div class="row">
						<div class="large-12 summary-description columns">
							<?php echo $tv_data['description']; ?>
						</div>
					</div>
					
				</div>
				<div class="large-4 summary-side columns">
					<p><span class="color-blue">Release year</span> <a href=""><?php echo $tv_data['tv_year']; ?></a></p>
					<p><span class="color-blue">Country</span> <?php echo $tv_data['ctCode'] . ' (' . get_country_from_tv($tv_data['ctCode'], $pdo) . ')'; ?></p>
					<p><span class="color-blue">Age Restriction</span> <a href=""><?php echo get_tv_ageLimit($tv_data['ID'], $pdo); ?></a></p>
					<p><span class="color-blue">Genre</span> 
					<?php 
						$genre = get_genre_for_tv($tv_data['ID'], $pdo);
						foreach ($genre as $key => $value) { ?>
							<a href="" class=""><?php echo $value[0]; ?></a>

						<?php }

					 ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
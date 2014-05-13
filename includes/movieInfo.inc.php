<div id="fanart" style="background-image: url(images/movie-background/<?php echo $movie_data['background']; ?>)">
	<div class="summary-background">
		<div class="summary-overlay"> 
		<div class="summary-width">
			
			<div class="row width summary-content margin-null-auto">
				<div class="large-2 columns">
					<img class="poster" src="images/movie-poster/<?php echo $movie_data['poster'];  ?>">
				</div>
				<div class="large-6 info-height info-margin-left columns">
					<div class="row">
					<div class="large-6 columns">
						<?php 
							$movie_rating = rating_for_movie($movie_data['ID'], $pdo);
						 ?>
						 rating
					</div>
					<div class="large-6 columns">
						rate movie
					</div>
					</div>
					<div class="row">
						<div class="large-12 summary-description columns">
							<?php echo $movie_data['description']; ?>
						</div>
					</div>
					
				</div>
				<div class="large-4 summary-side columns">
					<p><strong class="color-blue">Release year</strong> <a href=""><?php echo $movie_data['movie_year']; ?></a></p>
					<p><strong class="color-blue">Country</strong> <?php echo $movie_data['CtCode'] . ' (' . get_country_from_movie($movie_data['CtCode'], $pdo) . ')'; ?></p>
					<p><strong class="color-blue">Age Restriction</strong> <?php echo get_movie_ageLimit($movie_data['ID'], $pdo); ?></p>
					<p>
					<strong class="color-blue">Genre</strong>
					<?php 
						$genre = get_genre_for_movie($movie_data['ID'], $pdo);
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
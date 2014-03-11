<div class="background-color-white">
	<div class="row index-random-wrapper">
		<h2 class="h2-section large-12 columns"><span class="h2-section-text">Random Movies</span><a href="Movies.php" class="h2-section-link">more</a></h2>
	<div class="large-12 columns">
		<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6 ">
		<?php 
			
				$random_movie[1] = random_movie($pdo);
				while (count(array_unique($random_movie)) < 6) {
					$i = (count(array_unique($random_movie)) + 1);
					$random_movie[$i] = random_movie($pdo);
					array_unique($random_movie);
				}
			foreach ($random_movie as $key => $value) {
				$movie_data = movie_data($value, 'ID', 'movie_name', 'movie_year', 'poster'); ?>
				<li class="text-center">
					<a href="Movies?m=<?php echo $movie_data['ID']; ?>" class="color-black name-font-size">
						<img title="<?= $movie_data['movie_name'] . ' (' . $movie_data['movie_year'] . ')'; ?>" src="images/movie-poster/<?= $movie_data['poster']; ?>" alt="Poster of <?= $movie_data['movie_name']; ?>">
						
					</a>
				</li>
			<?php } ?>
		
		</ul>
	</div>
		<h2 class="h2-section large-12 columns"><span class="h2-section-text">Random TV shows</span><a href="TV.php" class="h2-section-link">more</a></h2>
	<div class="large-12 columns">
		<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
			<?php 
				$random_tv[1] = random_tv($pdo);
				while (count(array_unique($random_tv)) < 6) {
					$i = (count(array_unique($random_tv)) + 1);
					$random_tv[$i] = random_tv($pdo);
					array_unique($random_tv);
				}

				foreach ($random_tv as $key => $value) {
					$tv_data = tv_data($value, 'ID', 'tv_name', 'tv_year', 'poster'); ?>
					<li class="text-center">
						<a href="TV?t=<?php echo $tv_data['ID']; ?>" class="color-black name-font-size">
							<img title="<?= $tv_data['tv_name'] . ' (' . $tv_data['tv_year'] . ')'; ?>" src="images/tv-poster/<?= $tv_data['poster']; ?>" alt="Poster of <?= $tv_data['tv_name']; ?>">
							
						</a>
					</li>
				<?php } ?>
		</ul>
	</div>
	</div>
</div>
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

<div class="photo-outer-border-container">
	<div class="photo-inner-border-container width">
		<h2 class="h2-section large-12 columns"><span class="h2-section-text">Photos</span><?php if (logged_in()) { ?><a href="#" title="Upload Images" data-reveal-id="upload-img" class="margin-left upload-image"> <?php } ?></a><a href="TV.php" class="h2-section-link">more</a></h2>
		<div class="large-12 columns">
			<ul class="clearing-thumbs" data-clearing>
				<?php 
					$imgs = get_images_from_show($tv_data['ID']);
					
					foreach ($imgs as $key => $value) { ?>
						<li><a href="<?php echo $value['path']; ?>"><img class="photo-height" src="<?php echo $value['path'] ?>"></a></li>
					<?php } ?>
			</ul>
		</div>
	</div>
</div>

<?php 
	// uploadar myndum
	$max = 18388608;
	if (isset($_POST['submit'])) {
		$path = 'images/show';
		$folder = $tv_data['tv_name'];
		try {
			$upload = new Upload($path,$folder,'show',$user_data['ID']);
			$upload->setMaxSize($max);
			$upload->addPermittedTypes(array('image/jpg','image/png', 'image/jpeg'));
			$upload->move(false);
			$result = $upload->getMessages();
		} catch (Exception $e) {
			echo $e->getMessage();
		}

		if (isset($result)) {
			$count=0;
			foreach ($result as $message) {
				$count++;
				echo '<p class="subheader">'.$count . ". " .$message.'</p>';
			}
		}
	}
?>

<!-- reveal modal for uploading images -->
<!-- <div id="upload-img" class="reveal-modal" data-reveal> -->
<div class="photo-outer-border-container">
<div class="photo-inner-border-container width">
  <h2>Add images to <?php echo $tv_data['tv_name']; ?></h2>
  
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="file[]" multiple>
		<input type="submit" name="submit" class="button small">
	</form>

  <!-- <a class="close-reveal-modal">&#215;</a> -->
</div>
</div>

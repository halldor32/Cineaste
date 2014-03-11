<div class="ad">
	<?php
    $dir = 'images/banners';
    $images = preg_grep('/^([^.])/', scandir($dir));
    shuffle($images);
    $source =  'images/banners/'.$images[0];
    ?>
    <style type="text/css">
    .ad-container{
            background-image: url(<?=$source?>);
    }
    </style>

	<div class="width ad-container">

    <?php
    $header = array('Tis be random','Tis is header');
    $para = array('Tis be text','Be more text');

    shuffle($header);
    shuffle($para);
    ?>
    <h1 class="ad-text">
            
            <?=$header[0]?>
    </h1>
    <p class="ad-p">
            
            <?=$para[0]?>
    </p>
	</div>
</div>
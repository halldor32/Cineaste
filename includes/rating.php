<div class="TitleRating">
  <ul>
    <li><div class="Right hide-for-small" id="notLoggedIn"><span class="moveRight"><?php

      if (logged_in() === true)
      {
       if (rated_before($user_data['userID'], $movie_data['movieID'], $pdo) === true)
       {
        echo 'Þú gafst þessari mynd: ' . rating_from_user($user_data['userID'], $movie_data['movieID'], $pdo) . '/10';
      }
      else
      {
        echo 'Endilega gefðu þessari mynd einkunn';
      }
    }
    else
    {
     echo 'Skráðu þig inn til að gefa einkunn';
   } ?></span></div></li>
   <li><h3 class="inline"><?php
    echo $movie_data['name']; ?></h3></li>
    <!--  -->
    <li class="Right" id="inline">
      <!-- Rating System -->

      

      <?php
   if (logged_in() === true)
       { ?>
     <div id="check"></div>
     <?php
   } ?>


   <div class="rating-container hide-for-small">
  
    
    <?php 
      $rating = 0.5;
      for($i = 1; $i <= 20; $i++) {
        $img = ($i%2 == 0) ? array('star_empty_right.png','star_right.png') : array('star_empty_left.png','star_left.png') ;
        ?>
        <a title="<?php echo $rating ?> " class="inline hide-for-small rating <?php echo ($i%2==0) ? 's_right' : '' ?>" href="movie.php?rate=<?php echo $rating; ?>&movieID=<?php echo $movie_data['movieID'] ?>">
          <img class="star" data-empty-src="<?php echo $img[0] ?>"  data-src="<?php echo $img[1] ?>" src="img/<?php echo $rating <= $movie_data['rating'] ? $img[1] : $img[0] ?>" />
        </a>
        <?php
        $rating += 0.5;
      }
    ?>
       
    <p class="inline goDown"><?php echo round($movie_data['rating'], 1); ?></p>


    
    </div>

    </li>
  </ul>
</div>
<?php if (logged_in() === true && rated_before($user_data['userID'], $movie_data['movieID'], $pdo) === true) {   ?>
        <h3>Skrifa nýja umsögn</h3>
        <form id="reviewForm" method="post">
        <input type="hidden" name="postid" value="<?php echo $movie_data['movieID']?>">
      <label>
        <textarea name="comment" id="comment" cols="20" rows="10" placeholder="Skrifaðu umsögnina þína hér...." required></textarea>
      </label>
      <input type="submit" id="commentSubmit" class="button buttonSlider" value="Skrá umsögn">
    </form>
    <?php } else { ?> <h4>Gefðu myndinni einkunn til þess að geta skrifað umsögn</h4> <?php } ?>

        <div class="large-12 columns Heading"><h5>Umsagnir</h5></div>
        <div class="large-12 columns">
        
    <!-- <h2>Umsagnir.....</h2> -->
    <div class="comment-block">
   
       <?php $review = review_for_movie($movie_data['movieID'], $pdo);
    foreach ($review as $comment) { ?>
        <?php if (reviewed_before($comment['userID'], $movie_data['movieID'], $pdo) === false) { ?>
          <div class="comment-item">
        <div class="comment-post">

        <!--<?php// if ($comment['userID'] == $user_data['userID']): ?>
            <p>asdasdasdasd</p>
        <?php// endif ?>-->

          <h3><?php echo $comment['first_name'] . ' ' . $comment['last_name']; ?> <small>sagði....</small></h3>
          <p><?php echo $comment['review']; ?></p>
        </div>
      </div><hr/>
    <?php } } ?> 
    
    </div>
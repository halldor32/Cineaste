<div class="small-6 columns NoPadding">
            <div class="large-12 columns Heading">
              <h5>topp 10 í flokknum <?php $random_genre = random_genre($pdo); echo $random_genre; ?></h5>
            </div>
            <div class="large-12 columns Something paddingTop">
              <ol>
              <?php 
                $data = top_movies_in_random_genre($random_genre, $pdo); 
                foreach ($data as $row) {
                  $name = $row['name'];
                  $movieID = $row['movieID'];
                  echo '<li class="toplist"><a href="movie.php?movieID=' . $movieID . '">' . $name . '</a></li><hr/>';
                }
               ?>
              </ol>
            </div>
        </div>
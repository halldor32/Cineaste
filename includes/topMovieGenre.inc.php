          <div class="large-12 columns Heading marginTop">
            <h5>Topp myndir í sama flokki</h5>
          </div>
          <div class="large-12 columns NoPadding LeftPadding">
            <ol>
              <?php 
                $data = top_movies_from_genre($movie_data['genre'], $pdo); 
                $counter = 0;
                  foreach ($data as $row) {
                    $name = $row['name'];
                    $rating = $row['rating'];
                    $movieID = $row['movieID'];
                    $counter += 1;
                    if ($counter <= 10) {
                      $movie = $name . ' - ' . $rating;
                      echo '<li class="toplist"><a href="movie.php?movieID=' . $movieID . '">' . $name . '</a></li><hr/>';
                    }
                  }
              ?>
            </ol>
          </div>
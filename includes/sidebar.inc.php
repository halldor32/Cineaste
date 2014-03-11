<aside class="large-3 columns hide-for-small NoPadding LeftPadding">
      <div class="row RowMargin">
        <div class="large-12 columns Heading">
          <h5>Topp 25</h5>
        </div>
        <div class="large-12 columns">
          <ol>
            <?php 
              $data = top_movies($pdo); 
              $counter = 0;
                foreach ($data as $row) {
                  $name = $row['name'];
                  $movieID = $row['movieID'];
                  $counter += 1;
                  if ($counter <= 25) {
                     echo '<li class="toplist"><a href="movie.php?movieID=' . $movieID . '">' . $name . '</a></li><hr/>';
                  }
                }
            ?>
          </ol>
        </div>
      </div>
    </aside>
              <div class="" data-orbit-slide="headine-1">
                <div class="large-4 small-0 hide-for-medium-down columns">
                  <a href="movie.php?movieID=<?php $random_movie_data1 = random_movie_data($pdo); echo $random_movie_data1['movieID']; ?>">
                    <img class="imgScale" src="<?php echo $random_movie_data1['image']; ?>" title="<?php echo $random_movie_data1['name']; ?>">
                  </a>
                </div>
                <div class="large-8 small-12 columns">  
                  <div class="TitleRating">
                    <ul>
                      <li><h4 class="inline"><?php echo $random_movie_data1['name']; ?></h4></li>
                      <li class="Right">
                      <!-- Rating System -->
                      <div data-productid="<?php echo $random_movie_data1['movieID']; ?>" data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-readonly="true" class="rateit" data-rateit-backingfld="#backing" data-rateit-resetable="false">
                        </div>
                        <h2 class="inline"><?php echo round($random_movie_data1['rating'], 1); ?></h2>
                      </li>
                    </ul>
                  </div>
                  <ul>
                    <li>Leikstjóri: <?php echo $random_movie_data1['director']; ?></li>
                    <li>Flokkur: <?php echo $random_movie_data1['genre']; ?></li>
                  </ul>
                  <hr>
          
                  <p><?php echo $random_movie_data1['info']; ?></p>

                  <a href="movie.php?movieID=<?php echo $random_movie_data1['movieID']; ?>" class="Right button buttonSlider">Meiri upplýsingar um kvikmynd</a>
                </div>
              </div>


              <div class="" data-orbit-slide="headline-2">
                <div class="large-4 small-0 hide-for-medium-down columns">
                  <a href="movie.php?movieID=<?php $random_movie_data2 = random_movie_data($pdo); echo $random_movie_data2['movieID']; ?>">
                    <img class="imgScale" src="<?php echo $random_movie_data2['image']; ?>" title="<?php echo $random_movie_data2['name']; ?>"/>
                  </a>
                </div>
                <div class="large-8 small-12 columns">
                  <div class="TitleRating">
                    <ul>
                      <li><h4 class="inline"><?php echo $random_movie_data2['name']; ?></h4></li>
                      <li class="Right">
                      <!-- Rating System -->
                      <div data-productid="<?php echo $random_movie_data2['movieID']; ?>" data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-readonly="true" class="rateit" data-rateit-backingfld="#backing1" data-rateit-resetable="false">
                        </div>
                        <h2 class="inline"><?php echo round($random_movie_data2['rating'], 1); ?></h2>
                      </li>
                    </ul>
                  </div>
                  <ul>
                    <li>Leikstjóri: <?php echo $random_movie_data2['director']; ?></li>
                    <li>Flokkur: <?php echo $random_movie_data2['genre']; ?></li>
                  </ul>
                  <hr>
          
                  <p><?php echo $random_movie_data2['info']; ?></p>

                  <a href="movie.php?movieID=<?php echo $random_movie_data2['movieID']; ?>" class="Right button buttonSlider">Meiri upplýsingar um kvikmynd</a>
                </div>
              </div>


              <div class="" data-orbit-slide="headline-3">
                <div class="large-4 small-0 hide-for-medium-down columns">
                  <a href="movie.php?movieID=<?php $random_movie_data3 = random_movie_data($pdo); echo $random_movie_data3['movieID']; ?>">
                    <img class="imgScale" src="<?php echo $random_movie_data3['image']; ?>" title="<?php echo $random_movie_data3['name']; ?>"/>
                  </a>
                </div>
                <div class="large-8 small-12 columns">
                  <div class="TitleRating">
                    <ul>
                      <li><h4 class="inline"><?php echo $random_movie_data3['name']; ?></h4></li>
                      <li class="Right">
                      <!-- Rating System -->
                      <div data-productid="<?php echo $random_movie_data3['movieID']; ?>" data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-readonly="true" class="rateit" data-rateit-backingfld="#backing2" data-rateit-resetable="false">
                        </div>
                        <h2 class="inline"><?php echo round($random_movie_data3['rating'], 1); ?></h2>
                      </li>
                    </ul>
                  </div>
                  <ul>
                    <li>Leikstjóri: <?php echo $random_movie_data3['director']; ?></li>
                    <li>Flokkur: <?php echo $random_movie_data3['genre']; ?></li>
                  </ul>
                  <hr>
          
                  <p><?php echo $random_movie_data3['info']; ?></p>

                  <a href="movie.php?movieID=<?php echo $random_movie_data3['movieID']; ?>" class="Right button buttonSlider">Meiri upplýsingar um kvikmynd</a>
                </div>
              </div>


              <div class="" data-orbit-slide="headline-4">
                <div class="large-4 small-0 hide-for-medium-down columns">
                  <a href="movie.php?movieID=<?php $random_movie_data4 = random_movie_data($pdo); echo $random_movie_data4['movieID']; ?>">
                    <img class="imgScale" src="<?php echo $random_movie_data4['image']; ?>" title="<?php echo $random_movie_data4['name']; ?>"/>
                  </a>
                </div>
                <div class="large-8 small-12 columns">
                  <div class="TitleRating">
                    <ul>
                      <li><h4 class="inline"><?php echo $random_movie_data4['name']; ?></h4></li>
                      <li class="Right">
                      <!-- Rating System -->
                      <div data-productid="<?php echo $random_movie_data4['movieID']; ?>" data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-readonly="true" class="rateit" data-rateit-backingfld="#backing3" data-rateit-resetable="false">
                        </div>
                        <h2 class="inline"><?php echo round($random_movie_data4['rating'], 1); ?></h2>
                      </li>
                    </ul>
                  </div>
                  <ul>
                    <li>Leikstjóri: <?php echo $random_movie_data4['director']; ?></li>
                    <li>Flokkur: <?php echo $random_movie_data4['genre']; ?></li>
                  </ul>
                  <hr>
          
                  <p><?php echo $random_movie_data4['info']; ?></p>

                  <a href="movie.php?movieID=<?php echo $random_movie_data4['movieID']; ?>" class="Right button buttonSlider">Meiri upplýsingar um kvikmynd</a>
                </div>
              </div>


              <div class="" data-orbit-slide="headline-5">
                <div class="large-4 small-0 hide-for-medium-down columns">
                  <a href="movie.php?movieID=<?php $random_movie_data5 = random_movie_data($pdo); echo $random_movie_data5['movieID']; ?>">
                    <img class="imgScale" src="<?php echo $random_movie_data5['image']; ?>" title="<?php echo $random_movie_data5['name']; ?>"/>
                  </a>
                </div>
                <div class="large-8 small-12 columns">
                  <div class="TitleRating">
                    <ul>
                      <li><h4 class="inline"><?php echo $random_movie_data5['name']; ?></h4></li>
                      <li class="Right">
                      <!-- Rating System -->
                      <div data-productid="<?php echo $random_movie_data5['movieID']; ?>" data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-readonly="true" class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false">
                        </div>
                        <h2 class="inline"><?php echo round($random_movie_data5['rating'], 1); ?></h2>
                      </li>
                    </ul>
                  </div>
                  <ul>
                    <li>Leikstjóri: <?php echo $random_movie_data5['director']; ?></li>
                    <li>Flokkur: <?php echo $random_movie_data5['genre']; ?></li>
                  </ul>
                  <hr>
          
                  <p><?php echo $random_movie_data5['info']; ?></p>

                  <a href="movie.php?movieID=<?php echo $random_movie_data5['movieID']; ?>" class="Right button buttonSlider">Meiri upplýsingar um kvikmynd</a>
                </div>
              </div>
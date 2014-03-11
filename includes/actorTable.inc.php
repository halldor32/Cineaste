<table class="large-12 columns">
          <thead>
            <tr>
              <th>Leikarar</th>
            </tr>
          </thead>
          <tbody>

            <?php 
              $actor = actor_in_movie($movie_data['movieID'], $pdo);
              foreach ($actor as $row) { ?>
                <tr>
                  <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                </tr>
              <?php } ?>
          </tbody>
        </table>
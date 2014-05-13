<?php 

try {

    // Find out how many items are in the table
     $total = $pdo->query('
        SELECT
            COUNT(*)
        FROM
            movies
    ')->fetchColumn();

    // How many items to list per page
    $limit = 6;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total); ?>

    
    <!-- <div class="margin-null-auto pagination"> -->
    <?php
    // The "back" link
    $prevlink = ($page > 1) ? '<a href="?page=1" class="arrow" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" class="arrow" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" class="arrow" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" class="arrow" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    // Display the paging information
    //echo '<div id="paging"><ul class="pagination"><li>', $prevlink, '</li> Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </div>';
    ?>
    <div class="pagination-background">
    <div id="paging" class="pagination-centered">
        <ul class="pagination">
        <?php //if ($page != 1) { ?>
            <li class="arrow"><?php echo $prevlink; ?></li>
            <?php// } ?>

            <?php 
                for ($i=1; $i <= $pages; $i++) { ?>
                    <?php if ($i == $page) { ?>
                    <li class="current"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php }
                    else { ?>
                        <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
               <?php }
             ?>
            <li class="arrow"><?php echo $nextlink; ?></li>
        </ul>
    </div>

    </div>

    <?php
    // Prepare the paged query
    $stmt = $pdo->prepare('
        SELECT
            *
        FROM
            movies
        ORDER BY
            movie_name
        LIMIT
            :limit
        OFFSET
            :offset
    ');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO:: PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO:: PARAM_INT);
    $stmt->execute();

    // Do we have any results?
    if ($stmt->rowCount() > 0) {
        // Define how we want to fetch the results
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($stmt);
        ?>
        <div class="background-color-white">
        <div class="row index-random-wrapper">
            <div class="large-12 columns">
                <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
        <?php
        // Display the results
        foreach ($iterator as $row) {
            echo '<li class="text-center"><a href="Movies.php?m=',  $row['ID'] ,'" class="color-black name-font-size"><img title="', $row['movie_name'] , ' (' , $row['movie_year'] , ') " src="images/movie-poster/', $row['poster'] , '" alt="Poster of', $row['movie_name'] ,'"></a></li>';
        }

    } else {
        echo '<p>No results could be displayed.</p>';
    }?>
    </ul>
    </div>
    </div>
    </div>
    <div class="pagination-background">
    <div id="paging" class="pagination-centered">
        <ul class="pagination">
            <li><?php echo $prevlink; ?></li>

            <?php 
                for ($i=1; $i <= $pages; $i++) { ?>
                    <?php if ($i == $page) { ?>
                    <li class="current"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php }
                    else { ?>
                        <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
               <?php }
             ?>
            <li><?php echo $nextlink; ?></li>
        </ul>
    </div>
    </div>

<?php
} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}

 ?>
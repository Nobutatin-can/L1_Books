<?php

    include "topbit.php";
    $showall_sql="SELECT * FROM `Book_reviews` ORDER BY `Book_reviews`.`Title` ASC";
    $showall_query=mysqli_query($dbconnect, $showall_sql);
    $showall_rs=mysqli_fetch_assoc($showall_query);
    $count=mysqli_num_rows($showall_query);

?>


        <div class="box main">

            <h2>All Items</h2>

            <?php

            // Check if there are any results

            if ($count<1)
            {

            ?>

            <div class="error">
                Sorry! There are no results that match your search.
                Please use the searchbox in the sidebar to try again.

            </div>

            <?php
            
            }       // End count 'if'

            // if there are no results, output an error
            
            else
            {
                do {
                
                ?>

                <!-- Results go here -->
                <div class="results">

                <p>Title: <span class="sub_heading"><?php echo $showall_rs['Title'];?></span></p>

                <p>Author: <span class="sub_heading"><?php echo $showall_rs['Author'];?></span></p>

                <p>Genre: <span class="sub_heading"><?php echo $showall_rs['Genre'];?></span></p>

                <p>Rating: <span class="sub_heading">

                    <?php

                    for ($x=0; $x < $showall_rs['Rating']; $x++)        // Show rating as an amount of stars, not an int
                    {
                        echo "&#9733;";
                    }

                    ?>
                
                </span></p>

                <p><span class="sub_heading"> Review / Response</span></p>

                <p>

                <?php echo $showall_rs['Review'];?> 

                </p>

                </div>      <!-- / end results -->

                <br />  <!-- make gap between boxes -->

            <?php

                }       // end of 'do'

                while($showall_rs=mysqli_fetch_assoc($showall_query));
            
            }       // end else

            // if there are results, display them

            ?>

            
        </div>                          <!-- / main box -->

<?php
    include "bottombit.php";
?>



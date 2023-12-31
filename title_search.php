<?php

    include "topbit.php";

    // if find button pushed...

    if(isset($_POST['find_title']))
    {

    // retreve title and format it
    $title=test_input(mysqli_real_escape_string($dbconnect,$_POST['title']));

    $find_sql="SELECT * FROM `Book_reviews` WHERE `Title` LIKE '%$title%' ORDER BY `Title` ASC ";
    $find_query=mysqli_query($dbconnect, $find_sql);
    $find_rs=mysqli_fetch_assoc($find_query);
    $count=mysqli_num_rows($find_query);

?>


        <div class="box main">

            <h2>Title search</h2>

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

                <p>Title: <span class="sub_heading"><?php echo $find_rs['Title'];?></span></p>

                <p>Author: <span class="sub_heading"><?php echo $find_rs['Author'];?></span></p>

                <p>Genre: <span class="sub_heading"><?php echo $find_rs['Genre'];?></span></p>

                <p>Rating: <span class="sub_heading">

                    <?php

                    for ($x=0; $x < $find_rs['Rating']; $x++)        // Show rating as an amount of stars, not an int
                    {
                        echo "&#9733;";
                    }

                    ?>
                
                </span></p>

                <p><span class="sub_heading"> Review / Response</span></p>

                <p>

                <?php echo $find_rs['Review'];?> 

                </p>

                </div>      <!-- / end results -->

                <br />  <!-- make gap between boxes -->

            <?php

                }       // end of 'do'

                while($find_rs=mysqli_fetch_assoc($find_query));
            
            }       // end else

            // if there are results, display them

            } // end isset

            ?>

            
        </div>                          <!-- / main box -->

<?php
    include "bottombit.php";
?>



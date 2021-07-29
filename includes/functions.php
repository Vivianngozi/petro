<?php
function confirmQuery($result) // Confirm query
    {
        global $connect;
        if (!$result) 
        {
            die("Query failed! " . mysqli_error($connect));
        }
    }
    ?>
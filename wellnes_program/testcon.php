   <?php
   include 'db.php';

   if ($conn) {
       echo "Database connection is working!";
   } else {
       echo "Failed to connect to database.";
   }
   ?>
   
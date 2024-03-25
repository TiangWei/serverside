<?php

require '../config.php';
include '../auth.php';

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Staff Record</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

   <style>
      table,
      th,
      td {
         border: 1px solid black;
         padding: 15px;
      }

      th {
         text-align: center;
         background-color: #57A0D3;
         color: white;
      }

      table {
         border-spacing: 10px;
      }
   </style>
</head>

<body>
   <h3 class="title">Staff Management</h3>
   <br><br>

   <table width="100%" border="1" style="border-collapse:collapse;">
      <thead>
         <tr>
            <th><strong>No.</strong></th>
            <th><strong>Staff ID</strong></th>
            <th><strong>Staff Name</strong></th>
            <th><strong>Staff Email</strong></th>
            <th><strong>Account Created on</strong></th>
            <th><strong>DOB</strong></th>
            <th><strong>Action</strong></th>

         </tr>
      </thead>
      <tbody>
         <?php
         $count = 1;
         $query = "SELECT * FROM staff ORDER BY staff_id ASC";
         $result = mysqli_query($conn, $query) or die (mysqli_error($conn));

         while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
               <td align="center">
                  <?php echo $count; ?>
               </td>
               <td align="center">
                  <?php echo $row["staff_id"]; ?>
               </td>
               <td align="center">
                  <?php echo $row["name"]; ?>
               </td>
               <td align="center">
                  <?php echo $row["email"]; ?>
               </td>
               <td align="center">
                  <?php echo $row["createdOn"]; ?>
               </td>
               <td align="center">
                  <?php echo $row["dob"]; ?>
               </td>
               <td align="center">

                     <i style="color:blue;" class="fa fa-pencil-square" aria-hidden="true">
                        <a href="edit_staff.php?staff_id=<?php echo $row["staff_id"]; ?>">Edit</a> &nbsp; </i>
                     <span style="font-weight:bold"> | &nbsp; </span>
                     <i style="color:orange;" class="fa fa-trash" aria-hidden="true">
                        <a href="delete_staff.php?staff_id=<?php echo $row["staff_id"]; ?>"
                           onclick="return confirm('Are you sure you want to delete this product record?')">Delete</a>
                     </i>
                  
            </tr>

            <?php $count++;
         }
         ?>


</body>

</html>
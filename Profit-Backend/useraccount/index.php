<?php require_once ('includes/header.php'); ?>
<?php require_once ('includes/nav.php'); ?>
<?php
    $sql= "SELECT * from user";
    $query= Query($sql);
    confirm($query);
    $row=fatech_data($query);
    echo $row['FirstName'];
?>
   <div class="container">
       <div class="row">
           <div class="col">
               <div class="card bg-light nt-5 py-2">
                    <div class="card-title">
                        <?php display_message(); ?>
                        <h2> Info Page. </h2>
                    </div>
               </div>
           </div>
       </div>
   </div>
<?php require_once ('includes/footer.php'); ?>
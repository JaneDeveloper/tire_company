

<?php include './view/header.php'; ?>
<main>
    <h1>View  Vehicle</h1>



        
      


        <label>Model:</label>
        <span><?php echo $vehicle['model'];?></span>
        <br>

        <label>Make:</label>
        <span><?php echo $vehicle['make'];?></span>
        <br>

        <label>Year:</label>
        <span><?php echo $vehicle['year'];?></span>
        <br>

        <label>VIN number:</label>
        <span><?php echo $vehicle['vinNumber'];?></span>
        <br>

        <label>Last Recorded Mileage:</label>
        <span><?php echo $vehicle['recordedMileage'];?></span>
        <br>




        <table>
            <tr>
                <th>Tire Position:</th>
                <th>Tire Size:</th>
                <th>Tire Name:</th>
                <th>Date of Installation</th>
                <th>Number of Replacement</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($tires as $tire) : ?>
            <tr>
                <td><?php echo $tire['tirePosition']; ?></td>
                <td><?php echo $tire['tireCode']; ?></td>
                <td><?php echo $tire['nameTire']; ?></td>
                <td><?php echo $tire['dateInstallation']; ?></td>
                <td><?php echo $tire['numberReplacement']; ?></td>




        
               <td><form action="." method="post">
                    <input type="hidden" name="action" value="view_tire_form">
                    <input type="hidden" name="tire_id" value="<?php echo $tire['tireID']; ?>">
                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicleID']; ?>">
                    <input type="submit" value = "Edit">
                </form></td>

                <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_tire">
                    <input type="hidden" name="tire_id" value="<?php echo $tire['tireID']; ?>">
                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicleID']; ?>">
                    <input type="submit" value="Delete" />
                </form></td> 

            
                
            </tr>
            <?php endforeach; ?>
        </table>

                <form action="." method="post">
                  <input type="hidden" name="action" value="add_tire_form">
                  <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicleID']; ?>">
                  <input type="hidden" name="tire_id" value="<?php echo $tire['tireID']; ?>">
                  <input class="add_button" type="submit" value="Add" />
                </form> 

                <p class="last_paragraph" onclick="history.go(-1)">Go Back</p>





</main>
<?php include './view/footer.php'; ?>
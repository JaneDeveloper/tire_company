
<?php include './view/header.php'; ?>
<main>
    <h1>View  Customer</h1>



        <label>Account Number:</label>
        <span><?php echo $customer['customerAccount'];?></span>
        <br>
        <label>First Name:</label>
        <span><?php echo $customer['firstName'];?></span>
        <br>

        <label>Last Name:</label>
        <span><?php echo $customer['lastName'];?></span>
        <br>

        <label>Telephone Number:</label>
        <span><?php echo $customer['phone'];?></span>
        <br>

        <label>Email Address:</label>
        <span><?php echo $customer['email'];?></span>
        <br>
        

        <table>
            <tr>
                <th>Model</th>
                <th>Make</th>
                <th>Year</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?php echo $vehicle['model']; ?></td>
                <td><?php echo $vehicle['make']; ?></td>
                <td><?php echo $vehicle['year']; ?></td>

                <td><form action="." method="post">
                    <input type="hidden" name="action" value="display_vehicle" />
                 
                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicleID']?>" />
                    <input type="submit" value="View" />

                </form></td>
                
            </tr>
            <?php endforeach; ?>
        </table>

    <p class="last_paragraph"><a href="customer_search.php">Customer Search</a></p>

        

</main>
<?php include './view/footer.php'; ?>
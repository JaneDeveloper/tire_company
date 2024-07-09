
<?php include './view/header.php'; ?>
<main>
    <h1>View  Tire</h1>
    <p class="error"><?php echo $error ?></p>
 
    


    <form action="index.php" method="post" id="update_tire_form">
        <input type="hidden" name="action" value=<?php if($tire) {echo "update_tire";} else {echo "add_tire";};?>>
        




        <label>Tire Position:</label>
        <select name="position">
            <option <?php if($tire && $tire['tirePosition']=="FL"){echo "selected";} ?> value="FL">FL</option>
            <option <?php if($tire && $tire['tirePosition']=="RL"){echo "selected";} ?> value="RL">RL</option>
            <option <?php if($tire && $tire['tirePosition']=="RR"){echo "selected";} ?> value="RR">RR</option>
            <option <?php if($tire && $tire['tirePosition']=="S"){echo "selected";} ?> value="S">S</option>
            <option <?php if($tire && $tire['tirePosition']=="FR"){echo "selected";} ?> value="FR">FR</option>
            <option <?php if($tire && $tire['tirePosition']=="R"){echo "selected";} ?> value="R">R</option>
            <option <?php if($tire && $tire['tirePosition']=="F"){echo "selected";} ?> value="F">F</option>
        </select>
       <br>

        <label>Tire Size:</label>
        <input type="text" name="size" value="<?php if ($tire) echo $tire['tireCode'];?>" />
        <br>

        <label>Tire Name:</label>
        <input type="text" name="tire_name" value="<?php if ($tire) echo $tire['nameTire'];?>" />
        <br>

        <label>Date of Installation:</label>
        <input type="text" name="installation" value="<?php if ($tire) echo $tire['dateInstallation'];?>"/>
        <br>

        <label>Number of Replacements:</label>
        <input type="text" name="replacement" value="<?php if ($tire) echo $tire['numberReplacement'];?>" />
        <br>
        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id;?>">
        <input type="hidden" name="tire_id" value="<?php if ($tire) echo $tire['tireID'];?>">
        <input class="save_button" type="submit" value="Save" />
        <br>
    </form>


    <p class="last_paragraph" onclick="history.go(-1)">Go Back</button>






      

</main>
<?php include './view/footer.php'; ?>
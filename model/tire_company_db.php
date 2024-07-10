
<?php
function employee_username($input) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE username = :username_variable';
    $statement = $db->prepare($query);
    $statement->bindValue(':username_variable', $input);
    $statement->execute();
    $employee = $statement->fetch();
    $statement->closeCursor();
    return $employee;
}

function employee_passcode($input) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE passcode = :passcode_variable';
    $statement = $db->prepare($query);
    $statement->bindValue(':passcode_variable', $input);
    $statement->execute();
    $employee = $statement->fetch();
    $statement->closeCursor();
    return $employee;
}

function customer_phone($input) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE phone = :phone_variable';
    $statement = $db->prepare($query);
    $statement->bindValue(':phone_variable', $input);
    $statement->execute();
    $customer= $statement->fetch();
    $statement->closeCursor();
    return $customer;
}


function get_vehicles_by_customer($input) {
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE vehicles.customerAccount = :customer_account
              ORDER BY customerAccount';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_account', $input);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}


function get_customer_account($input) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE phone = :phone_variable';
    $statement = $db->prepare($query);
    $statement->bindValue(':phone_variable', $input);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    $customer_account=$customer['customerAccount'];
    return $customer_account;
}

function get_vehicle($input) {
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $input);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    return $vehicle;
}

function get_tires_by_vehicle($input) {
    global $db;
    $query = 'SELECT * FROM tires
              WHERE tires.vehicleID = :vehicle_id
              ORDER BY vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $input);
    $statement->execute();
    $tires = $statement->fetchAll();
    $statement->closeCursor();
    return $tires;
}

function delete_tire($input) {
    global $db;
    $query = 'DELETE FROM tires
              WHERE tireID = :tire_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tire_id', $input);
    $statement->execute();
    $statement->closeCursor();
}

function get_tire_id($input) {
    global $db;
    $query = 'SELECT * FROM tires
              WHERE tireID = :tire_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tire_id', $input);
    $statement->execute();
    $tire = $statement->fetch();
    $statement->closeCursor();
    return $tire;
}

function edit_tire ($tire_id, $position, $size, $tire_name, $date_installation, $number_replacement) {
    global $db;
    $query = 'UPDATE tires
              SET tirePosition = :position, tireCode = :size, nameTire = :name_tire, dateInstallation = :date_installation, numberReplacement = :number_replacement
              WHERE tireID = :tire_id';
              
    $statement = $db->prepare($query);
    $statement->bindValue(':tire_id', $tire_id);
    $statement->bindValue(':position', $position);
    $statement->bindValue(':size', $size);
    $statement->bindValue(':name_tire', $tire_name);
    $statement->bindValue(':date_installation', $date_installation);
    $statement->bindValue(':number_replacement', $number_replacement);
    $statement->execute();
    $statement->closeCursor();
  
}

function add_tire($vehicle_id, $position, $size, $name_tire, $date_installation, $number_replacement) {
    global $db;
    $query = 'INSERT INTO tires
                 (vehicleID, tirePosition, tireCode, nameTire, dateInstallation, numberReplacement)
              VALUES
                 (:vehicle_id, :position, :size, :name_tire, :date_installation, :number_replacement)';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':position', $position);
    $statement->bindValue(':size', $size);
    $statement->bindValue(':name_tire', $name_tire);
    $statement->bindValue(':date_installation', $date_installation);
    $statement->bindValue(':number_replacement', $number_replacement);
    $statement->execute();
    $statement->closeCursor();
}


 function get_tire_by_vehicle_id_and_position($vehicle_id, $position) {
    global $db;
    $query = 'SELECT * FROM tires
              WHERE tirePosition = :tire_position AND vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tire_position', $position);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $tire = $statement->fetch();
    $statement->closeCursor();
    return $tire;
}



?>
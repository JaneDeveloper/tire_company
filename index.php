

<?php
require('./model/database.php');
require('./model/tire_company_db.php');



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'login_view';
    
    }
}
if ($action=='login_view') {
    include('login.php');


}

else if ($action == 'employee_login') {
    $userName = filter_input(INPUT_POST, 'username');
    $passcode = filter_input(INPUT_POST, 'passcode');
    $employee_username=employee_username($userName);
    $employee_passcode=employee_passcode($passcode);
      
    if($employee_username == false || $employee_passcode == false){
        $error="Sorry, you have entered the wrong username or password.Try again, please.";
       include('login.php'); 
    

    } else { 
        include('customer_search.php');
    }
}

else if ($action=='customer_search') {
    $phone = filter_input(INPUT_POST, 'phone');
    $customer = customer_phone($phone);
     if($customer == false) {
        $error="Sorry, we could not find this telephone number. Try again.";
        include('customer_search.php'); 
    
      

        
       
     }else {
        $customer_account=$customer['customerAccount'];
        $vehicles = get_vehicles_by_customer($customer_account);
        include ('view_customer.php');
     }
    }

else if ($action == 'display_vehicle') {
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
        $vehicle = get_vehicle($vehicle_id);
        $tires = get_tires_by_vehicle($vehicle_id);
        include('view_vehicle.php');
}



else if ($action == 'view_tire_form') {
    $tire_id = filter_input(INPUT_POST, 'tire_id');
    $tire = get_tire_id($tire_id);
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
    include('view_tire.php');
}


else if ($action=='update_tire') {
    $position = filter_input(INPUT_POST, 'position');
    $size = filter_input(INPUT_POST, 'size');
    $tire_name = filter_input(INPUT_POST, 'tire_name');
    $date_installation = filter_input(INPUT_POST, 'installation');
    $number_replacement = filter_input(INPUT_POST, 'replacement');
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
    $position_in_db = get_tire_by_vehicle_id_and_position($vehicle_id, $position);
    $tire_id = filter_input(INPUT_POST, 'tire_id');
    $tire=get_tire_id($tire_id);
    $tire_position = $tire['tirePosition'];


    if ($position == NULL || $size == NULL || $tire_name == NULL || $number_replacement == NULL) {
        $error = "Invalid tire data. Check all fields and try again.";
       include('view_tire.php');
        }

   else if ($position==$tire_position) {
    edit_tire($tire_id, $position, $size, $tire_name, $date_installation, $number_replacement);
    $vehicle = get_vehicle($vehicle_id);
    $tires = get_tires_by_vehicle($vehicle_id);
    include('view_vehicle.php'); 

   }
   else if ($position_in_db) {
        $error="Tire Position already exists";
        include('view_tire.php'); 
     
     }else  {
    edit_tire($tire_id, $position, $size, $tire_name, $date_installation, $number_replacement);
    $vehicle = get_vehicle($vehicle_id);
    $tires = get_tires_by_vehicle($vehicle_id);
    include('view_vehicle.php'); 
     }

    

   } 

else if ($action=="add_tire_form") {
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
    include('view_tire.php');
       }


else if ($action=='add_tire') {
     $position = filter_input(INPUT_POST, 'position');
     $size = filter_input(INPUT_POST, 'size');
     $tire_name = filter_input(INPUT_POST, 'tire_name');
     $date_installation = filter_input(INPUT_POST, 'installation');
     $number_replacement = filter_input(INPUT_POST, 'replacement');
     $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
     $position_in_db = get_tire_by_vehicle_id_and_position($vehicle_id, $position);
     if ($position_in_db == NULL) {
     add_tire($vehicle_id, $position, $size, $tire_name, $date_installation, $number_replacement);
     $tires = get_tires_by_vehicle($vehicle_id);
     $vehicle = get_vehicle($vehicle_id);
    include('view_vehicle.php');

  
     }else {
        $error="Tire Position already exists";
        include('view_tire.php');
     }
        
    }


else if ($action == 'delete_tire') {
    $tire_id = filter_input(INPUT_POST, 'tire_id');
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
    delete_tire($tire_id);
    $tires = get_tires_by_vehicle($vehicle_id);
    $vehicle = get_vehicle($vehicle_id);
    include('view_vehicle.php');
    }



    ?>
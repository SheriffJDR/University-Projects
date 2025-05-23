<?php
      include "../functionality/authenticateClass.php";
      include "../functionality/datahandlerClass.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
                                    $handler = new handler();
                                    $handler->getAllCustomers();
                               
                                 $data = $handler->getData();
                                 print_r($data);
                                    foreach($data as $value){
                                        echo("
                                        <tr>
                                        <td><input class='form-check-input' type='checkbox'></td>
                                        <td>{$value['customer_id']}</td>
                                        <td>{$value['first_name']}</td>
                                        <td>{$value['last_name']}</td>
                                        <td>{$value['address']}</td>
                                        <td>{$value['city']}</td>
                                        <td>{$value['email']}</td>
                                        <td>{$value['phone_number']}</td>
                                        <td>{$value['drivers_license_num']}</td>
                                        <td>{$value['drivers_license_state']}</td>
                                        <td>{$value['drivers_license_exp_date']}</td>
                                        <td>{$value['credit_card_num']}</td>
                                        <td>{$value['credit_card_exp_date']}</td>
                                        <td>{$value['billing_address']}</td>
                                        <td>{$value['preferred_vehicle_type']}</td>
                                        <td>{$value['rental_duration']}</td>
                                        <td>{$value['pickup_location']}</td>
                                        <td>{$value['dropoff_location']}</td>
                                        <td><a class='btn btn-sm btn-primary' href=''>View</a></td>
                                        </tr>");
                                    }
                                    unset($value);
                                    
                                ?>
</body>
</html>
<?php
session_start();

$msg = ''; // Initialize an empty message variable

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Check if 'timeSlot' is set and not empty before accessing it
    if(isset($_POST['timeSlot']) && !empty($_POST['timeSlot'])) {
        $timeSlot = $_POST['timeSlot']; 
        
        // "Time in" functionality
        $msg = "<div class='alert alert-success'>Time In Successfully at $timeSlot</div>";
    } else {
        // If no time slot is selected, display an error message
        $msg = "<div class='alert alert-danger'>Please select a time slot</div>";
    }
}

// Function to generate time slots
function generateTimeSlots($start, $end, $interval) {
    $start = strtotime($start);
    $end = strtotime($end);
    $interval = strtotime('+' . $interval . ' minutes', 0);

    $slots = array();

    for ($i = $start; $i <= $end; $i += $interval) {
        $slots[] = date('h:i A', $i);
    }

    return $slots;
}

// Define start time, end time, and interval for time slots
$start = "08:00 AM";
$end = "05:00 PM";
$interval = 30;

// Generate time slots
$timeSlots = generateTimeSlots($start, $end, $interval);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">TIME IN</h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo $msg; ?>
                <form action="book.php" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Select Time Slot</label>
                        <select class="form-control" name="timeSlot">
                            <?php foreach ($timeSlots as $slot) : ?>
                                <option value="<?php echo $slot; ?>"><?php echo $slot; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">TIME IN</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

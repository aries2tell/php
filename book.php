<?php
session_start();

// Default date set to today
$date = date('Y-m-d');

// Check if a date is passed through GET request
if(isset($_GET['date'])){
    $date = $_GET['date'];
}

$msg = ''; // Initialize an empty message variable

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Check if 'timeSlot' is set and not empty before accessing it
    if(isset($_POST['timeSlot']) && !empty($_POST['timeSlot'])) {
        $timeSlot = $_POST['timeSlot']; 
    } else {
        // If no time slot is selected, display an error message
        $msg = "<div class='alert alert-danger'>Please select a time slot</div>";
    }

    if(!empty($timeSlot)) {
        $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');

        // Check for connection errors
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, date, time_slot) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $name, $email, $date, $timeSlot);
        $stmt->execute();

        // Check if the query was executed successfully
        if ($stmt->error) {
            $msg = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        } else {
            $msg = "<div class='alert alert-success'>Booking Successful</div>";
        }

        $stmt->close();
        $mysqli->close();
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
    <title>Booking Calendar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo $msg; ?>
                <form action="book.php" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                    <div class="form-group">
                        <label for="">Select Time Slot</label>
                        <select class="form-control" name="timeSlot">
                            <?php foreach ($timeSlots as $slot) : ?>
                                <option value="<?php echo $slot; ?>"><?php echo $slot; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </form>
                <br>
                <a href="calendar.php" class="btn btn-primary">Back to Calendar</a>
            </div>
        </div>
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function navigateToDestination(destination) {
            // Your JavaScript code to handle the navigation
            window.location.href = destination;
        }
    </script>
    <style>
     body {
            background-image: url('aries.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

       
    </style>
    <style>
         .col-lg-12 { width: 100%; }
            .col-lg-11 { width: 91.66666667%;}
            .col-lg-10 { width: 83.33333333%;}
            .col-lg-9 {	width: 75%; }
            .col-lg-8 {	width: 66.66666667%;  }
            .col-lg-7 {	width: 58.33333333%;  }
            .col-lg-6 {	width: 50%;  }
            .col-lg-5 {	width: 41.66666667%; }
            .col-lg-4 {	width: 33.33333333%; }
            .col-lg-3 {	width: 25%;  }
            .col-lg-2 {	width: 16.66666667%;  }
            .col-lg-1 {	width: 8.33333333%;  }
      
    </style>

<style>
           .single{
                height: 50vh;
                display: block;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
           }
           .multiplayer{
                height: 50vh;
                display: block;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
           }
           
        </style>
        
        <style>
            .single:hover{
                opacity: 0.7;
                cursor: pointer;
            }

            .multiplayer:hover{
                opacity: 0.7;
                cursor: pointer;
            }
            
        </style>

        <style>
            .choice{
                height: 90vh;
                display: block;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                
               
            }
        </style>
            

</head>
<body>

    <section class="choice">
        <div class="single">
            <img class="col-lg-4" src="study.jpg" alt="single player" onclick="navigateToDestination('calendar.php')">
        </div>
        <div class="multiplayer">
            <img class="col-lg-4" src="collab.jpg" alt="multiplayer" onclick="navigateToDestination('studying.php')">
        </div>
    </section>



</body>
</html>
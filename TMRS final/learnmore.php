<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn More</title>
    <!-- You can include any additional stylesheets or scripts here -->
</head>
<body>
    <h1>More Information</h1>
    <div>
        <?php
       
        if(isset($_GET['brand'])) {
            $brand = htmlspecialchars($_GET['brand']);
           
            echo "<h2>$brand</h2>";
            
            switch($brand) {
                case "BMW":
                    echo "<p>BMW is a German multinational company which produces luxury vehicles and motorcycles.</p>";
                    break;
                case "Volvo":
                    echo "<p>Volvo Cars is a Swedish luxury automobile marque. It is headquartered in Torslanda in Gothenburg, Sweden.</p>";
                    break;
                case "Land Rover":
                    echo "<p>Land Rover is a British brand of predominantly four-wheel drive, off-road capable vehicles, owned by multinational car manufacturer Jaguar Land Rover (JLR).</p>";
                    break;
              
                default:
                    echo "<p>No information available for this brand.</p>";
            }
        } else {
          
            echo "<p>No brand specified.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
    include 'function.php';
    $pdo=pdo_connect_mysql();
    $msg='';

    if(isset($_GET['id'])){ 

        $stm=$pdo->prepare('SELECT *FROM tmrs_contacts WHERE id=?');
        $stm->execute([$_GET['id']]);
        $contact=$stm->fetch(PDO::FETCH_ASSOC);

        if(isset($_GET['confirm'])){
            if($_GET['confirm']=='yes'){
                $stmt=$pdo->prepare('DELETE FROM tmrs_contacts WHERE id=?');
                $stmt->execute([$_GET['id']]);
                $msg='the contact has been deleted';
                header("refresh:2;read.php");
            }
            else{
                header("refresh:2;read.php");
                exit;
            }
        }
     } 
     else{
        exit('No ID specified');
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>TMRS</title>
</head>
<body>
    <!--Delete-->
    <div class="delete">
        <h1>Delete Contact <?=$contact['id']?></h1>
        <div class="underline"></div>
        <?php if($msg):?>
        <p><?=$msg ?></p>
        <?php else:?>
        <p>Are you sure you want to delete contact <?=$contact['id'] ?>?</p>
        <div class="buttons">
        <a class="yes" href="delete.php?id=<?=$contact['id']?>&confirm=yes">Yes</a>
        <a class="no" href="delete.php?id=<?=$contact['id']?>&confirm=no">No</a>
        </div>
        <?php endif; ?>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

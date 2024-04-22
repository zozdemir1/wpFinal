<?php
include 'function.php';
$pdo=pdo_connect_mysql();

if(isset($_GET['id'])){

    if(!empty($_POST)){
        $id=isset($_POST['id']) ? $_POST['id'] :NULL;
        $name=isset($_POST['name']) ? $_POST['name'] : '';
        $surname=isset($_POST['surname']) ? $_POST['surname'] :'';
        $brand=isset($_POST['brand']) ? $_POST['brand'] :'';
        $model=isset($_POST['model']) ? $_POST['model'] :'';
        $phone=isset($_POST['phone']) ? $_POST['phone'] :'';
        $message=isset($_POST['message']) ? $_POST['message']: '';
        $date=isset($_POST['date']) ? $_POST['date']: '';

        $stmt=$pdo->prepare('UPDATE tmrs_contacts SET id= ?, name= ?, surname= ?, brand= ?, model=?, phone= ?, message= ?, date= ? WHERE id= ?');
        $stmt->execute([$id, $name, $surname, $brand, $model, $phone, $message, $date, $_GET['id']]);
        header("refresh:2;read.php");

    }

    $stmt=$pdo->prepare('SELECT *FROM tmrs_contacts WHERE id= ?');
    $stmt->execute([$_GET['id']]);
    $contact=$stmt->fetch(PDO::FETCH_ASSOC);
    if(!$contact){
        exit('there is no contact with that ID');
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

<div class="update">
    <h1>Update Contact <?=$contact['id']?></h1>
    <div class="underline"></div>
</div>
    <form action="update.php?id=<?=$contact['id']?>" method="POST" class="container formedit">

        <div class="form-group">
            <label for="id" class="labeledit">ID</label>
            <input type="text" name="id" value="<?=$contact['id']?>" id="id" class="form-control">
        </div>
        <div class="form-group">
            <label for="name" class="labeledit">Name</label>
            <input type="text" name="name" value="<?=$contact['name'] ?>" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="surname" class="labeledit">Surname</label>
            <input type="text" name="surname" value="<?=$contact['surname'] ?>" id="surname" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand" class="labeledit">Brand</label>
            <input type="text" name="brand" value="<?=$contact['brand'] ?>" id="brand" class="form-control">
        </div>
        <div class="form-group">
            <label for="model" class="labeledit">Model</label>
            <input type="text" name="model" value="<?=$contact['model'] ?>" id="model" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone" class="labeledit">Phone</label>
            <input type="text" name="phone" value="<?=$contact['phone'] ?>" id="phone" class="form-control">
        </div>
        <div class="form-group">
           <label for="message" class="labeledit">Message</label>
           <input type="text" name="message" value="<?=$contact['message'] ?>" id="message" class="form-control">
        </div>
        <div class="form-group">
           <label for="date" class="labeledit">Date</label>
           <input type="datetime-local" name="date" value="<?=date('Y-m-d\TH:i',strtotime($contact['date'])) ?>" id="date" class="form-control">  
        </div>
       <input type="submit" class="btn btn-success submitbtn" value= update> 
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

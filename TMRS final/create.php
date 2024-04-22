<?php
    include 'function.php';
    $pdo=pdo_connect_mysql();
    $msg='';
    if(!empty($_POST)){
    $id=isset($POST['id']) && !empty($_POST['id']) && $_POST['id']!='auto' ? $_POST['id']: NULL;
    $name=isset($_POST['name']) ? $_POST['name'] : '';
    $surname=isset($_POST['surname']) ? $_POST['surname'] :'';
    $brand=isset($_POST['brand']) ? $_POST['brand'] :'';
    $model=isset($_POST['model']) ? $_POST['model'] :'';
    $phone=isset($_POST['phone']) ? $_POST['phone'] :'';
    $message=isset($_POST['message']) ? $_POST['message']: '';
    $date=isset($_POST['date']) ? $_POST['date']: '';

    $stm=$pdo->prepare('INSERT INTO tmrs_contacts VALUES(?,?,?,?,?,?,?,?)');
    $stm->execute([$id,$name,$surname,$brand,$model,$phone,$message,$date]);

    $msg='You booked a car rent!';
    header("refresh:2;read.php");
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

<div class="create">
    <h1>Rent a car</h1>
    <div class="underline"></div>
</div>
    <form action="create.php" method="post" class="container formedit">
        <div class="form-group">
            <label class="labeledit">Name</label>
            <input type="text" required name="name" class="form-control">
        </div>
        <div class="form-group">
            <label class="labeledit">Surname</label>
            <input type="text" required name="surname" class="form-control">
        </div>
        <div class="form-group">
            <label class="labeledit">Brand</label>
            <input type="text"required name="brand" class="form-control">
        </div>
        <div class="form-group">
            <label class="labeledit">Model</label>
            <input type="text"required name="model" class="form-control">
        </div>
        <div class="form-group">
            <label class="labeledit">Phone</label>
            <input type="text"required name="phone" class="form-control">
        </div>
        <div class="form-group">
           <label class="labeledit">Message</label>
           <input type="text"required name="message" class="form-control">
        </div>
        <div class="form-group">
           <label class="labeledit">Date</label>
           <input type="datetime-local" name="date" value="<?=date('Y-m-d\TH:i')?>" id="date" class="form-control">
        </div>
       <input type="submit" name="send" values="Add to The List" class="btn btn-success submitbtn">
      </form>
    <?php if($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

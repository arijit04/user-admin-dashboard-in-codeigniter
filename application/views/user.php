<!DOCTYPE html>
<html lang="en">

<head>
    <title>tootle project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Yatra+One" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="<?php echo base_url(); ?>asset/css/signup.css" rel="stylesheet" type="text/css" media="all" /> -->
</head>

<body>
    <div class="container mt-3">
        <div class="text-center">
            <h4>Dashboard</h4>
            <div class="d-print-inline-block text-right">
            <?php 
            $id=$data[0]->id;
            $url=base_url();
            if($data[0]->role=='Admin'){
                echo '<a class="mr-3" href="'.$url.'admin">Admin Dashboard</a>';
            }
            ?>
            <a class="mr-3" href="<?php echo base_url(); ?>userview/edit">Edit</a>
            <a class="mr-3" href="<?php echo base_url(); ?>userview/delete">Delete</a>
            <a href="<?php echo base_url(); ?>userview/logout">Logout</a>
            </div>
            <img src="<?php echo $url.'img/'.$data[0]->img ?>" class="img-fluid rounded mx-auto d-block rounded-circle" alt="Responsive image">
        </div>
        <div class="text-center mt-4">
            <p>
                <b>Name: <?php echo $data[0]->name ?></b>
            </p>
            <p>
                <b>Email: <?php echo $data[0]->email ?></b>
            </p>
            <p>
                <b>Role: <?php echo $data[0]->role ?></b>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
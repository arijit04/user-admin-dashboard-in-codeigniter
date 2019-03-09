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
            <h1>Admin Dashboard</h1>
            <div class="d-print-inline-block text-right">
            <a class="mr-3" href="<?php echo base_url(); ?>userview">Profile</a>
            <a href="<?php echo base_url(); ?>userview/logout">Logout</a>
            </div>

        </div>
        <table class="table table-hover table-sm mt-3 table-responsive-md text-center table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $user_id = $this->session->userdata('id');
                foreach($data as $r) { 
                    echo "<tr>"; 
                    echo "<th>".$r->id."</th>"; 
                    echo "<td>".$r->name."</td>"; 
                    echo "<td>".$r->email."</td>"; 
                    echo "<td>".$r->pass."</td>";
                    echo "<td>".$r->role."</td>";
                    echo "<td>".$r->img."</td>";
                    echo "<th>";
                        echo form_open('admin/edit' ,'id="edit"');
                        echo"<input type='hidden' name='id' value='$r->id'>";
                    
                        echo'<button class="btn btn-link" type="submit">Edit</button>';
                        echo "</form></th>";
                    if($user_id != $r->id){
                        echo "<th>";
                        echo form_open('admin/delete' ,'id="delete"');
                        echo"<input type='hidden' name='id' value='$r->id'>";
                    
                        echo'<button class="btn btn-link" type="submit">Delete</button>';
                            echo "</form></th>";
                       
                    }
                    else{
                        echo "<th></th>";
                    }
                    echo "<tr>"; 
                } 
              ?>
            </tbody>
        </table>
    </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
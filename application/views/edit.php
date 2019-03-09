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
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="text-center">
                    <h1>Edit Profile</h1>
                </div>
                <div class="d-print-inline-block text-right mb-4">
            <?php 
            $id=$data[0]->id;
            $url=base_url();
            $ad='userview/editsave';
            $trole = $this->session->userdata('trole');
            if($trole=='Admin'){
                echo '<a class="mr-3" href="'.$url.'admin">Admin Dashboard</a>';
                $ad='admin/editsave';
            }
            ?>
            <a class="mr-3" href="<?php echo base_url(); ?>userview">Profile</a>
            <a class="mr-3" href="<?php echo base_url(); ?>userview/delete">Delete</a>
            <a href="<?php echo base_url(); ?>userview/logout">Logout</a>
            </div>
                <?php echo validation_errors(); ?>
                
                <form action="<?php echo base_url(); echo $ad; ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                
                <?php
                echo'
                <input type="hidden" value="'.$data[0]->id.'" name="id">
                <div class="form-group">
                    <div class="row">
                    <div class="col-3 offset-1 text-right">
                    <label for="name">Name</label>
                    </div>
                    <div class="col-5">
                    <input type="Name" class="form-control form-control-sm" id="name" name="name" placeholder="Name" value="'.$data[0]->name.'" required="">
                    </div>
                    </div>
            </div>
                <div class="form-group">
                        <div class="row">
                                <div class="col-3 offset-1 text-right">
                    <label for="email">Email address</label>
                </div>
                <div class="col-5">
                    <input type="email" class="form-control form-control-sm" id="email" aria-describedby="emailHelp" name="email" value="'.$data[0]->email.'" placeholder="Enter email" readonly>
                </div>
            </div>
        </div>
                <div class="form-group">
                        <div class="row">
                                <div class="col-3 offset-1 text-right">
                    <label for="pass">Password</label>
                </div>
                <div class="col-5">
                    <input type="password" class="form-control form-control-sm" id="pass" name="pass" placeholder="Password" value="'.$data[0]->pass.'" required="Password">
                </div>
            </div>
        </div>';
        if($data[0]->role=='Admin'){
            echo'<div class="form-group">
            <div class="row">
                    <div class="col-3 offset-1 text-right">
        <label for="role">Role</label>
    </div>
    <div class="col-5">
        <select name="role" id="role" class="form-control form-control-sm" required="">
        <option value="User">User</option>
        <option value="Admin" selected>Admin</option>
                      </select>
    </div>
</div>
</div>';
        }
                ?>
                <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-5 offset-4">
                <input type = "file" accept=".jpg, .jpeg, .png, .gif" name = "file" size = "20" />
                </div>
                </div>
                </div>
                <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-5 offset-4">
                                    <button type="submit" class="btn btn-outline-primary btn-sm btn-block">Update</button>
                                </div>
                            </div>
                </div>

                </form>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- <script></script> -->
</body>

</html>
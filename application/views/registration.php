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
            <div class="col-md-6 col-12">
                <h1>Registration form.</h1>

                <!-- <form action="<?php echo base_url(); ?>User_controller/registration" method="post"> -->
                    <?php echo validation_errors(); ?>  
                    <?php echo form_open('registration'); ?> 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="Name" class="form-control form-control-sm" id="name" name="name" placeholder="Name" required="">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please enter your name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control form-control-sm" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email" required="">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control form-control-sm" id="pass" name="pass" placeholder="Password" required="Password">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control form-control-sm" required="">
                                    <option value='User' selected>User</option>
                                    <option value='Admin'>Admin</option>
                                  </select>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="agree" required="">
                        <label class="form-check-label" for="agree">I Agree To The Terms & Conditions</label>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-outline-primary btn-sm btn-block">Register</button>
                    </div>

                </form>

            </div>
            <div class="col-md col-12">
                <h1>Login form.</h1>
                <?php echo validation_errors(); ?>  
                    <?php echo form_open('login', 'class="needs-validation" novalidate'); ?> 
                <!-- <form class="needs-validation" action="<?php echo base_url(); ?>User_controller/login" method="post" novalidate> -->
                    <div class="form-row">
                        <div class="col-md-12 col-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Enter a valid Email id.
                            </div>
                        </div>
                        <div class="col-md12 col-12">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" id="pass" placeholder="Password" name="pass" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Enter your password.
                            </div>
                        </div>
                        <div class="col-md12 col-12 mt-3">
                            <button class="btn btn-outline-primary btn-sm btn-block" type="submit">Login</button>
                        </div>
                </form>


                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- <script></script> -->
        <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
</body>

</html>
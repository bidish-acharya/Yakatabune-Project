<?php
session_start();
    include '../layouts/header.php';
?>
<body class="bg">
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top: 10%;">
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="card">
                    <div class="card-header">
                        Please login first
                    </div>
                    <div class="card-body">

                        <form action="../process/loginLogout.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="username">Username*</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" class="form-control" id="password" name="password"  required>
                            </div>
                            <div class="form-group align-content-center">
                                <input type="submit" value="Login" class="btn btn-primary" name="loginBtn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 5%;">
            <h6> Copyright © EBIYA, All rights reserved. <?php echo date("Y", strtotime('today'));  ?></h6>
        </div>
    </div>
</body>

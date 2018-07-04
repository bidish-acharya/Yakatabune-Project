<?php
session_start();
include "../layouts/header.php";
include "../process/functions.php";
redirectifnotloggedin();
include "../layouts/navbar.php";
?>
<body class="bg">
<div class="container">
    <div class="row justify-content-md-center" style="margin-top: 10%;">
        <div class="col-lg-8 col-md-12 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    Create new user
                </div>
                <div class="card-body">
                    <form method="POST" action="../process/user.php" autocomplete="off">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" name="fullName" id="fullName" aria-describedby="fullName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" aria-describedby="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="email" required>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="fullName" aria-describedby="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="custom-select">
                                    <option value="ADMIN"> ADMIN </option>
                                    <option value="USER"> USER </option>
                                </select>
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" name="_createUser" value="Create" id="_createUser">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
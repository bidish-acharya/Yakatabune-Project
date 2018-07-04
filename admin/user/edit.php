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
                    Edit user
                </div>
                <div class="card-body">
                    <?php $user = getUser($conn, $_GET['id']); ?>
                    <form method="POST" action="../process/user.php" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" name="fullName" id="fullName" aria-describedby="fullName" required value="<?php echo $user[0]['full_name']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" aria-describedby="username" required value="<?php echo $user[0]['username']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" aria-describedby="email" required value="<?php echo $user[0]['email']; ?>">
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password" id="fullName" aria-describedby="password" required value="<?php echo $user[0]['password']; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="custom-select">
                                        <?php if($user[0]['role'] == "ADMIN") { ?>
                                            <option value="ADMIN" selected> ADMIN </option>
                                            <option value="USER"> USER </option>
                                        <?php } else { ?>
                                            <option value="ADMIN"> ADMIN </option>
                                            <option value="USER" selected> USER </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                <input type="submit" name="_updateUser" class="btn btn-primary" value="Update" id="_updateUser">
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
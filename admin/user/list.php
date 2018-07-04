<?php
session_start();
    include "../layouts/header.php";
    include "../process/functions.php";
redirectifnotloggedin();
include "../layouts/navbar.php";
?>
<body class="bg">

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Are you sure?</h4>
            </div>
            <div class="modal-footer">
                <form action="../process/user.php" method="POST">
                    <input type="hidden" name="deleteId" id="deleteId">
                    <button type="submit" class="btn btn-success" name="delete">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-md-center" style="margin-top: 10%;">
        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    ALL USERS
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                <thead class="thead-dark">
                    <th> S.N </th>
                    <th> Full Name </th>
                    <th> Username </th>
                    <th> Email </th>
                    <th> Role </th>
                    <th> Actions </th>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $userList = getUserList($conn);
                foreach ($userList as $user){
                    ?>
                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td> <?php echo $user["full_name"]; ?> </td>
                        <td> <?php echo $user["username"]; ?> </td>
                        <td> <?php echo $user["email"]; ?> </td>
                        <td> <?php echo $user["role"]; ?> </td>
                        <td>
                            <a href="../user/edit.php?id=<?php echo $user["id"]; ?>" ><i class="fas fa-edit text-primary"></i></a> &nbsp;|&nbsp;
                            <a href="" onclick="setDeleteId(<?php echo $user["id"]; ?>);" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

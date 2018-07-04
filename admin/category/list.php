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
                <form action="../process/category.php" method="POST">
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
        <div class="col-lg-8 col-md-12 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    All categories
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <th> S.N </th>
                            <th> Category </th>
                            <th> Description </th>
                            <th> Actions </th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $categoryList = getCategoryList($conn);
                            foreach ($categoryList as $category){
                                ?>
                                <tr>
                                    <td> <?php echo $i++; ?> </td>
                                    <td> <?php echo $category["category"]; ?> </td>
                                    <td> <?php echo $category["description"]; ?> </td>
                                    <td>
                                        <a href="../category/edit.php?id=<?php echo $category["id"]; ?>" ><i class="fas fa-edit text-primary"></i></a> &nbsp;|&nbsp;
                                        <a href="" onclick="setDeleteId(<?php echo $category["id"]; ?>);" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash text-danger"></i></a>
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
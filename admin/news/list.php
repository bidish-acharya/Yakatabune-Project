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
                <form action="../process/news.php" method="POST">
                    <input type="hidden" name="deleteId" id="deleteId">
                    <button type="submit" class="btn btn-success" name="delete">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-md-center" style="margin-top: 5%;">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    All News
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <th> S.N </th>
                            <th> Title </th>
                            <th> Published Date </th>
                            <th> Author </th>
                            <th> Actions </th>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $newsList = getNewsList($conn);
                        foreach ($newsList as $news){
                            ?>
                            <tr>
                                <td> <?php echo $i++; ?> </td>
                                <td> <?php echo $news["title"]; ?> </td>
                                <td> <?php echo $news["date"]; ?> </td>
                                <td>
                                    <?php $author = getUser($conn, $news["user"]);
                                        echo $author[0]['username']; ?>
                                </td>
                                <td>
                                    <a target="_blank" href="../../view-news.php?id=<?php echo $news["id"]; ?>" ><i class="fas fa-eye fa-1x text-success"></i></a> &nbsp;|&nbsp;
                                    <a href="../news/edit.php?id=<?php echo $news["id"]; ?>" ><i class="fas fa-edit fa-1x text-primary"></i></a> &nbsp;|&nbsp;
                                    <a href="" onclick="setDeleteId(<?php echo $news["id"]; ?>);" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash fa-1x text-danger"></i></a>
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
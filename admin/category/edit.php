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
                    Edit category
                </div>
                <div class="card-body">
                    <?php $category = getCategory($conn, $_GET['id']); ?>
                    <form method="POST" action="../process/category.php" autocomplete="off">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="category">Category*</label>
                            <input type="text" class="form-control" name="category" id="category" aria-describedby="category" value="<?php echo $category[0]["category"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description (optional) </label>
                            <textarea name="description" id="description" class="form-control">
                                <?php echo $category[0]['description']; ?>
                            </textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" name="_updateCategory" value="Update" id="_updateCategory">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
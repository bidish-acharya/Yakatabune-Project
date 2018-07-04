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
                    Create new category
                </div>
                <div class="card-body">
                    <form method="POST" action="../process/category.php" autocomplete="off">
                        <div class="form-group">
                            <label for="category">Category*</label>
                            <input type="text" class="form-control" name="category" id="category" aria-describedby="category" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description (optional) </label>
                            <textarea name="description" id="description" class="form-control">
                            </textarea>
                        </div>
                        <input type="submit" name="_createCategory" class="btn btn-primary" value="Create" id="_createCategory">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
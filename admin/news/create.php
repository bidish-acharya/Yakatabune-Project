<?php
session_start();
include "../layouts/header.php";
include "../process/functions.php";
redirectifnotloggedin();
include "../layouts/navbar.php";
?>
    <body class="bg">
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top: 5%;">
            <div class="col-lg-10 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="card-header">
                        Create news
                    </div>
                    <div class="card-body">
                        <form method="POST" action="../process/news.php" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <input type="text" placeholder="Enter a title here" class="form-control" name="title" id="title" aria-describedby="title" required>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="user">Author</label>
                                    <select name="user" id="user" class="custom-select">
                                        <?php $userList = getUserList($conn);
                                        foreach ($userList as $user) { ?>
                                            <option value="<?php echo $user['id']; ?>"> <?php echo $user['username'] ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="custom-select">
                                        <?php $categoryList = getCategoryList($conn);

                                        foreach ($categoryList as $category) { ?>
                                            <option value="<?php echo $category['id']; ?>"> <?php echo $category['category'] ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="image">Select photo*</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image" required>
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="content" class="form-control">
                                </textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('content');
                                </script>
                            </div>
                            <input type="submit" name="_createNews" class="btn btn-primary" value="Post" id="_createNews">
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>
<?php include '../layouts/footer.php' ?>
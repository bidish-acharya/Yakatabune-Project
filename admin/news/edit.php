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
                        Edit News
                    </div>
                    <div class="card-body">
                        <?php $news = getNews($conn, $_GET['id']); ?>
                        <form method="POST" action="../process/news.php" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $news[0]['title']; ?>" name="title" id="title" aria-describedby="title" required>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="user">Author</label>
                                    <select name="user" id="user" class="custom-select">
                                        <?php $userList = getUserList($conn);

                                        foreach ($userList as $user) {
                                            if($user['id'] == $news[0]['user']) {
                                                ?>
                                                <option value="<?php echo $user['id']; ?>" selected> <?php echo $user['username'] ?></option>
                                            <?php }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="category">Category</label>
                                    <select name="category[]" id="category" class="custom-select">
                                        <?php $categoryList = getCategoryList($conn);

                                        foreach ($categoryList as $category) {
                                            ?>
                                            <option value="<?php echo $category['id']; ?>"> <?php echo $category['category'] ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="content" class="form-control">
                                    <?php echo $news[0]['content']; ?>
                                </textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('content');
                                </script>
                            </div>
                            <div class="form-group justify-content-md-center">
                                <img src="../uploads/<?php echo $news[0]['photo']; ?>" id="currentImage" style="height: auto; width: 100%;">
                            </div>
                            <div class="form-group">
                                <label for="image">Select new photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                                <input type="submit" class="btn btn-primary" name="_updateNews" value="Update" id="_updateNews">
                            </form>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>
<?php include '../layouts/footer.php' ?>
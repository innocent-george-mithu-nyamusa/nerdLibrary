<!DOCTYPE html>
<html lang="en">

<?php

use Classes\CategoryView;

include_once "../vendor/autoload.php";

session_start();
$catObj = new CategoryView();


if(isset($_POST["edit_category"])) {

    if($catObj->updateCategory($_POST["category_id"], $_POST["category_name"])){
        header("Location: allCategories.php");
    }else{
        header("Location: ");
    }
}

if(isset($_GET["catId"])) {

    $id = $_GET["catId"];
    $category = $catObj->getCategory($id);

}

?>
<!-- Mirrored from designreset.com/cork/ltr/demo4/auth_register_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Jun 2021 09:04:25 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Edit Category | Lost And Found </title>
    <link rel="icon" type="image/x-icon" href="/admin/assets/img/logo/logo.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/forms/switches.css">
</head>
<body class="form">


<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">Edit Category</h1>
                    <p class="signup-link register"></p>
                    <form class="text-left" method="post" action="">
                        <div class="form">
                            <div id="email-field" class="field-wrapper input">
                                <label for="categoryEmail">Category Name</label>
                                <input type="hidden" name="category_id" value="<?php echo $id?>">
                                <input id="categoryEmail" name="category_name" type="text" class="form-control" value="<?php echo $category["category_name"] ?>" placeholder="Category Name">
                            </div>

                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" name="edit_category" class="btn btn-primary">Edit Category</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="/admin/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="/admin/bootstrap/js/popper.min.js"></script>
<script src="/admin/bootstrap/js/bootstrap.min.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="/admin/assets/js/authentication/form-2.js"></script>

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/auth_register_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Jun 2021 09:04:25 GMT -->
</html>
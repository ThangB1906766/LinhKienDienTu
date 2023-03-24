<!-- Start Including Header -->
<?php
include('./mainInclude/header.php')
?>
<!-- End Including Header -->

<!-- Start Courses Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/coursebanner.jpg" alt="courses" style="width: 100%; height: 500px; object-fit: cover; box-shadow: 10px;">
    </div>
</div>
<!-- End Courses Page Banner -->

<div class="container">
    <h2 class="text-center my-4">Payment Status </h2>
    <form method="post" action="">
        <div class="form-group row">
            <label class="offset-sm-3 col-form-label">Order ID: </label>
            <div>
                <input class="form-control mx-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="">
            </div>
            <div>
                <input class="btn btn-primary mx-4" value="View" type="submit" onclick="">
            </div>
        </div>
    </form>
</div>


<?php
include('./contact.php')
?>

<!-- Start Including Footer -->
<?php
include('./mainInclude/footer.php')
?>
<!-- End Including Footer -->
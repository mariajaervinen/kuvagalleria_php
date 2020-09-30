<?php require_once 'include/top.php';?>

<section class="row ml-3 mr-3">
    <form class="col-12" action="save.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file">Tiedosto</label>
            <input type="file" class="form-control" id="file" name="file">
            <button class="btn btn-primary mt-3">Lataa</button>
        </div>
    </form>
</section>
<?php require_once 'include/bottom.php';?>

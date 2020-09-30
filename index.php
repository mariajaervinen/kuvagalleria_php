
  <?php require_once 'include/top.php';?>

  <section class="row mx-3 my-3">

    <div class="col-12">
    <p>Lisää kuvia galleriaan</p>
    </div>

    <div class="col-12 mb-3">
    <a class="btn btn-primary" href="add.php" role="button">Lisää kuvia</a>
    </div>

    <?php
    $folder= 'uploads';
    $handle = opendir($folder);

    if($handle){
      print"<div class='col-12' id='images'></div>";
      print "<div class='card-group'>";
      print"<div class='row'>";
      while(false !== ($file = readdir($handle))){
        $file_ending = pathinfo($file, PATHINFO_EXTENSION);
        if(strtoupper($file_ending)==='PNG' || strtoupper($file_ending)==='JPG' || strtoupper($file_ending)==='JPEG'){
          $path = $folder . '/' . $file;
          $thumbs_path = $folder . 'thumbs/' . $file;
          ?>

       
        <div class="card p-2 col-lg-3 col-md4 col-sm-6">
            <a data-fancybox="gallery" href="<?php print $path; ?>">
              <img class="card-img-top" src="<?php print $path; ?>">
          </a>
          <div class="card-body">
            <p class="card-text"><?php print $file; ?></p>
          </div>
        </div>

          <?php
        }
      }
    }
    ?>
</section>
  <?php require_once 'include/bottom.php';?>

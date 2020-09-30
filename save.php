<?php
include 'lib/ImageResize.php';
use \Gumlet\ImageResize;
?>

<?php require_once 'include/top.php';?>

<section class="row ml-3 mr-3 mt-3">
       
<?php
if($_FILES['file']['error'] === UPLOAD_ERR_OK){
    if($_FILES['file']['size'] > 0){
        $type = $_FILES['file']['type'];
        if(strcmp($type,'image/png')==0 || strcmp($type,'image/jpg')==0 || strcmp($type,'image/jpeg')==0){
            $file = basename($_FILES['file']['name']);
            $folder= 'uploads/';
            if(move_uploaded_file($_FILES['file']['tmp_name'],"$folder$file")){
                try{
                    $image=new ImageResize("$folder$file");
                    $image ->resizeToWidth(150);
                    $image -> save($folder . 'thumbs/' . $file);
                    print"<p>Kuva on tallennettu palvelimelle</p>";
                 }catch(Exception $ex){
                    print"<p>Kuvan tallennuksessa tapahtui virhe!</p>" . $ex -> get_message() . "</p>";
                 }
                
                 
            }else{
                print"<p>Kuvan tallennuksessa tapahtui virhe!</p>";
            }
        }else{
            print"<p>Voit ladata vain png- ja jpg-kuvia!</p>";
        }
    }else{
        print"<p>Tiedoston koko on 0!</p>";
    }
}else{
    print"<p>Virhe kuvan lataamisessa! Virhekoodi: " . $_FILES['file']['error'] . "</p>";

}

?>

<div class= "col-12">
<a class="btn btn-primary" href="index.php" role="button">Selaa kuvia</a>
</div> 
</section>

<?php require_once 'include/bottom.php';?>

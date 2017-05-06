


<div id="signin_form" >
        <form action="#" method="post" enctype="multipart/form-data"style="margin: 0 auto;" >
            <h1>Inscrir</h1><br>
            <?php
            $error ="";

            ?>
            <input type="file" required name="fileToUpload" id="fileToUpload"><br>
            <input type="text" required placeholder="nom" name="nom"><br>
            <input type="text" required placeholder="prenom" name="prenom"><br>
            <input type="text" required placeholder="username" name="username"><br>
            <input type="password" required placeholder="mote de pass" name="password"><br>
            <div id="a_terms"> Accepter les termes et condition <input type="checkbox" required></div>
            <input type="submit" name="submit" value="Inscrir">
            <input type="reset" name="reset" value="Annuler">
        </form>
    </div>


<?php if(isset($_POST["submit"])) { ?>



<?php
    $servername = "localhost";
    $c_username = "root";
    $pwd = "";
    $dbname = "wassilni";

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $filename= "". basename( $_FILES["fileToUpload"]["name"]). "";



    // Create connection
    $conn = new mysqli($servername, $c_username, $pwd, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $query = mysqli_query( $conn,"select * from utilisateur where username = '$username'");
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
    echo  "<p style='text-align:center; color:red; font-size:18px;'><i class='fa fa-exclamation-triangle'></i> Username Exist Deja <i class='fa fa-exclamation-triangle'></i></p>";
    }
    else{

        ?>



<!-- file upload -->
<?php
    $target_dir = "uploads/".$username;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $img_file=$target_dir.".".$imageFileType;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            /*echo "File is an image - " . $check["mime"] . ".";*/
            $uploadOk = 1;
        } else {
            /*echo "File is not an image.";*/
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        /*echo "Sorry, file already exists.";*/
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        /*echo "Sorry, your file is too large.";*/
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        /*echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";*/
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        /*echo "Sorry, your file was not uploaded.";*/
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $img_file)) {
            /*echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";*/
        } else {
            /*echo "Sorry, there was an error uploading your file.";*/
        }
    }
?>
<!-- end file upload -->



        <?php

    $sql = "INSERT INTO utilisateur (nom,prenom,username, password, img)
    VALUES ('$nom', '$prenom','$username','$password', '$img_file')";

    if ($conn->query($sql) === TRUE) {
        echo  "<p style='text-align:center; color:green; font-size:18px;'><i class='fa fa-check'></i> Inscription terminer avec succeé <i class='fa fa-check'></i></p>";
        header( "refresh:3;url=index.php?page=2" );
    } 

    else{echo "Error: " . $sql . "<br>" . $conn->error;}
    }

    $conn->close();
}
?>

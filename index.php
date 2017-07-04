<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
  </head>
  <body>
    <h1>Create a new resume</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
      <label>Choose your passport size image:</label>
      <br><input type="file" name="fileToUpload"><br>
      <?php
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            }
            else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if ((file_exists($target_file))&&$uploadOk==1) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if (($_FILES["fileToUpload"]["size"] > 1000000)&&$uploadOk==1) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" &&$uploadOk==1) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
          if($uploadOk==1){
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
          }
      ?>
      <script type="text/javascript">
      var flag="<?php echo $uploadOK; ?>";
      if(flag==1)
        window.location="resume.php";
      </script>
      <br><br><label>Fullname:<br></label>
      <input type="text" name="fullname" placeholder="Enter your fullname" required>*
      <br><label>Address:<br></label>
      <input type="text" name="address" placeholder="Enter your address" required>*
      <br><label>Email:<br></label>
      <input type="text" name="email" placeholder="Enter your email address" required>*
      <br><label>Phone no.:<br></label>
      <input type="tel" name="phone" placeholder="Enter your phone no." maxlength="10" required>*
      <br><label>Website(if any):<br></label>
      <input type="url" name="web" placeholder="Enter your web address">
      <br><label>Objective:<br></label>
      <textarea name="objective" required placeholder="Enter your objective"></textarea>*
      <br><label><br>Education<br><br>10th:<br> From</label>
      <input type="month" name="metricFrom" required>*
      <br><label>Upto</label>
      <input type="month" name="metricUpto" required>*
      <br><label>School:</label>
      <input type="text" name="metricSchool" required>*
      <br><label><br><br>12th:<br>From</label>
      <input type="month" name="twelvthFrom" required>*
      <br><label>Upto</label>
      <input type="month" name="twelvthUpto" required>*
      <br><label>Stream:</label>
      <input type="text" name="stream" required>*
      <br><label>School:</label>
      <input type="text" name="twelvthSchool" required>*
      <br><br><label>Degree:</label>
      <select name="degree" required>*
        <option value="btech">B.Tech</option>
        <option value="be">BE</option>
        <option value="bca">BCA</option>
      </select>
      <br><label>From:</label>
      <input type="month" name="degreeFrom" required>*
      <br><label>upto:</label>
      <input type="month" name="degreeUpto" required>*
      <br><label>College:</label>
      <input type="text" name="college" required>*
      <br><br><label><br>Work Experience(If any)<br></label>
      <br><label>Company:<br></label>
      <input type="text" name="company" value="----none----">
      <br><label>Designation:<br></label>
      <input type="text" name="designation" value="----none----">
      <br><label>Description:<br></label>
      <textarea name="description" value="----none----"></textarea>
      <br><label>From:<br></label>
      <input type="month" name="workFrom" value="----none----">
      <br><label>Upto:<br></label>
      <input type="month" name="workUpto" value="----none----">
      <br><br><label>Languages:<br></label>
      <br><input type="checkbox" name="c[]" value="<li>JAVA</li>">JAVA
      <br><input type="checkbox" name="c[]" value="<li>ASP</li>">ASP
      <br><input type="checkbox" name="c[]" value="<li>C</li>">C
      <br><input type="checkbox" name="c[]" value="<li>C#</li>">C#
      <br><input type="checkbox" name="c[]" value="<li>C++</li>">C++
      <br><input type="checkbox" name="c[]" value="<li>Haskell</li>">Haskell
      <br><input type="checkbox" name="c[]" value="<li>Objective-C</li>">Objective-C
      <br><input type="checkbox" name="c[]" value="<li>Perl</li>">Perl
      <br><input type="checkbox" name="c[]" value="<li>PHP</li>">PHP
      <br><input type="checkbox" name="c[]" value="<li>PL/SQL</li>">PL/SQL
      <br><input type="checkbox" name="c[]" value="<li>MYSQL</li>">MYSQL
      <br><input type="checkbox" name="c[]" value="<li>MongoDB</li>">MongoDB
      <br><input type="checkbox" name="c[]" value="<li>TaffyDB</li>">TaffyDB
      <br><input type="checkbox" name="c[]" value="<li>Ruby</li>">Ruby
      <br><input type="checkbox" name="c[]" value="<li>VBScript</li>">VBScript
      <br><input type="checkbox" name="c[]" value="<li>.NET</li>">.NET
      <br><input type="checkbox" name="c[]" value="<li>XQuery</li>">XQuery
      <br><input type="checkbox" name="c[]" value="<li>HTML</li>">HTML
      <br><input type="checkbox" name="c[]" value="<li>CSS</li>">CSS
      <br><input type="checkbox" name="c[]" value="<li>JAVASCRIPT</li>">JAVASCRIPT

      <br><button>Submit</button>
    </form>

    <?php
    $email="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $fullname=$_POST["fullname"];
      $address=$_POST["address"];
      $email=$_POST["email"];
      $phone=$_POST["phone"];
      $web=$_POST["web"];
      $objective=$_POST["objective"];
      $metricFrom=$_POST["metricFrom"];
      $metricUpto=$_POST["metricUpto"];
      $metricSchool=$_POST["metricSchool"];
      $twelvthFrom=$_POST["twelvthFrom"];
      $twelvthUpto=$_POST["twelvthUpto"];
      $stream=$_POST["stream"];
      $twelvthSchool=$_POST["twelvthSchool"];
      $degree=$_POST["degree"];
      $degreeFrom=$_POST["degreeFrom"];
      $degreeUpto=$_POST["degreeUpto"];
      $college=$_POST["college"];
      $company=$_POST["company"];
      $designation=$_POST["designation"];
      $description=$_POST["description"];
      $workFrom=$_POST["workFrom"];
      $workUpto=$_POST["workUpto"];
      $c=implode('', $_POST['c']);
    }

  if($email!=""){
    $servername="localhost";
    $username="root";
    $pswd="abhi123.";
    try{
      $conn= new PDO("mysql:host=$servername;dbname=myDB", $username, $pswd);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $fullname=$fullname." <br>";
      $sql = "insert into details(email) values('$email')";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $q = $conn->query("select id from details where email='$email'");
      $f = $q->fetch();
      $h = $f['id'];
      $_SESSION["user"]=$h;
      $sql = "update details set image='$target_file' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set address='$address' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set fullname='$fullname' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set phone='$phone' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      if($web!=""){
      $sql = "update details set web='$web' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      }
      $sql = "update details set objective='$objective' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set metricFrom='$metricFrom' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set metricUpto='$metricUpto' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set metricSchool='$metricSchool' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set twelvthFrom='$twelvthFrom' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set twelvthUpto='$twelvthUpto' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set stream='$stream' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set twelvthSchool='$twelvthSchool' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set degree='$degree' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set degreeFrom='$degreeFrom' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set degreeUpto='$degreeUpto' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $sql = "update details set college='$college' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      if($company!=""){
      $sql = "update details set company='$company' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      }
      if($designation!=""){
      $sql = "update details set designation='$designation' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      }
      if($description!=""){
      $sql = "update details set description='$description' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      }
      if($workFrom!=""){
      $sql = "update details set workFrom='$workFrom' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      }
      if($workUpto!=""){
      $sql = "update details set workUpto='$workUpto' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      }
      $sql = "update details set languages='$c' where id='$h'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      ?>
      <script type="text/javascript">
        window.location="resume.php";
      </script>
      <?php
    }
    catch(PDOException $e){
      echo "Connection failed: ".$e->getMessage();
    }
    $conn=null;
  }
    ?>
  </body>
</html>

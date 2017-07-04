<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Resume</title>
<link type="text/css" rel="stylesheet" href="css/purple.css" />
<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<?php
  $user=$_SESSION["user"];
  $servername="localhost";
  $username="root";
  $pswd="abhi123.";
  try{
    $conn= new PDO("mysql:host=$servername;dbname=myDB", $username, $pswd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $conn->query("select fullname from details where id='$user'");
    $f = $q->fetch();
    $fullname = $f['fullname'];
    $q = $conn->query("select image from details where id='$user'");
    $f = $q->fetch();
    $image = $f['image'];
    $q = $conn->query("select address from details where id='$user'");
    $f = $q->fetch();
    $address = $f['address'];
    $q = $conn->query("select email from details where id='$user'");
    $f = $q->fetch();
    $email = $f['email'];
    $q = $conn->query("select phone from details where id='$user'");
    $f = $q->fetch();
    $phone = $f['phone'];
    $q = $conn->query("select web from details where id='$user'");
    $f = $q->fetch();
    $web = $f['web'];
    $q = $conn->query("select objective from details where id='$user'");
    $f = $q->fetch();
    $objective = $f['objective'];
    $q = $conn->query("select metricFrom from details where id='$user'");
    $f = $q->fetch();
    $metricFrom = $f['metricFrom'];
    $q = $conn->query("select metricUpto from details where id='$user'");
    $f = $q->fetch();
    $metricUpto = $f['metricUpto'];
    $q = $conn->query("select metricSchool from details where id='$user'");
    $f = $q->fetch();
    $metricSchool = $f['metricSchool'];
    $q = $conn->query("select twelvthFrom from details where id='$user'");
    $f = $q->fetch();
    $twelvthFrom = $f['twelvthFrom'];
    $q = $conn->query("select twelvthUpto from details where id='$user'");
    $f = $q->fetch();
    $twelvthUpto = $f['twelvthUpto'];
    $q = $conn->query("select stream from details where id='$user'");
    $f = $q->fetch();
    $stream = $f['stream'];
    $q = $conn->query("select twelvthSchool from details where id='$user'");
    $f = $q->fetch();
    $twelvthSchool = $f['twelvthSchool'];
    $q = $conn->query("select degree from details where id='$user'");
    $f = $q->fetch();
    $degree = $f['degree'];
    $q = $conn->query("select degreeFrom from details where id='$user'");
    $f = $q->fetch();
    $degreeFrom = $f['degreeFrom'];
    $q = $conn->query("select degreeUpto from details where id='$user'");
    $f = $q->fetch();
    $degreeUpto = $f['degreeUpto'];
    $q = $conn->query("select college from details where id='$user'");
    $f = $q->fetch();
    $college = $f['college'];
    $q = $conn->query("select company from details where id='$user'");
    $f = $q->fetch();
    $company = $f['company'];
    $q = $conn->query("select designation from details where id='$user'");
    $f = $q->fetch();
    $designation = $f['designation'];
    $q = $conn->query("select description from details where id='$user'");
    $f = $q->fetch();
    $description = $f['description'];
    $q = $conn->query("select workFrom from details where id='$user'");
    $f = $q->fetch();
    $workFrom = $f['workFrom'];
    $q = $conn->query("select workUpto from details where id='$user'");
    $f = $q->fetch();
    $workUpto = $f['workUpto'];
    $q = $conn->query("select languages from details where id='$user'");
    $f = $q->fetch();
    $languages = $f['languages'];
  }
  catch(PDOException $e){
  echo "Connection failed: ".$e->getMessage();
  }
  $conn=null;
?>
<script type="text/javascript">
var fullname="<?php echo $fullname; ?>";
var image="<img class=\"portrait\" src="+"<?php echo $image; ?>"+">";
var address="<?php echo $address; ?>";
var email="<?php echo $email; ?>";
var phone="<?php echo $phone; ?>";
var web="<?php echo $web; ?>";
var objective="<?php echo $objective; ?>";
var metricFrom="<?php echo $metricFrom; ?>";
var metricUpto="Metric Education____<br>"+metricFrom+" ----- "+"<?php echo $metricUpto; ?>";
var metricSchool="<?php echo $metricSchool; ?>";
var twelvthFrom="<?php echo $twelvthFrom; ?>";
var twelvthUpto="Twelvth Education___<br>"+twelvthFrom+" ----- "+"<?php echo $twelvthUpto; ?>";
var stream="<?php echo $stream; ?>";
var twelvthSchool="<?php echo $twelvthSchool; ?>";
var degree="<?php echo $degree; ?>";
var degreeFrom="<?php echo $degreeFrom; ?>";
var degreeUpto="College Degree_____<br>"+degreeFrom+" ----- "+"<?php echo $degreeUpto; ?>";
var college="<?php echo $college; ?>";
var company="<?php echo $company; ?>"+"<br>";
var designation="<?php echo $designation; ?>";
var description="<?php echo $description; ?>";
var workFrom="<?php echo $workFrom; ?>";
var workUpto=workFrom+" ----- "+"<?php echo $workUpto; ?>";
var languages="<?php echo $languages; ?>";

$(document).ready(function(){
$(".name").html(fullname);
$("#img").html(image);
$(".ad").html(address);
$(".mail").html(email);
$(".tel").html(phone);
$(".web").html(web);
$("#obj").html(objective);
$("#m2").html(metricUpto);
$("#m3").html(metricSchool);
$("#m6").html(twelvthUpto);
$("#m8").html(stream);
$("#m7").html(twelvthSchool);
$("#m14").html(degree);
$("#m13").html(degreeUpto);
$("#m15").html(college);
$("#m10").html(company);
if(company!="<br>"){
  $("#exp").html("EXPERIENCE");
  $("#m11").html(designation);
  $("#m12").html(description);
  $("#m9").html(workUpto);
}
$("#skills").html(languages);
});
</script>

<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">

      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">

        <div id="img"></div>

          <div class="self">
            <h1 class="name"></h1>
            <ul>
              <li class="ad"></li>
              <li class="mail"></li>
              <li class="tel"></li>
              <li class="web"></li>
            </ul>
          </div>

          <div class="social">
            <ul>
              <li><a class='north' href="javascript:window.print()" title="Print"><img src="images/icn-print.jpg" alt="" /></a></li>
            </ul>
          </div>

        </div>

        <div class="entry">
          <h2>OBJECTIVE</h2>
          <p id="obj"></p>
        </div>

        <div class="entry">
          <h2>EDUCATION</h2>
          <div class="content">
            <h3 id="m2"></h3>
            <p id="m3"><br />
              <em id="m4"></em></p>
          </div>
          <div class="content">
            <h3 id="m6"></h3>
            <p id="m7"><br /></p>
              <p><em id="m8"></em></p>
          </div>
          <div class="content">
            <h3 id="m13"></h3>
            <p id="m14"><br /></p>
              <p><em id="m15"></em></p>
          </div>
        </div>

        <div class="entry">
          <h2 id="exp"></h2>
          <div class="content">
            <h3 id="m9"></h3>
            <p id="m10"></p>
              <p><em id="m11"></em></p>
            </div>
        </div>

        <div class="entry">
          <h2>SKILLS</h2>
          <div class="content">
            <h3>Languages</h3>
            <ul id="skills" class="skills"></ul>
          </div>
        </div>

      </div>
      <div class="clear"></div>
      <div class="paper-bottom"></div>

  </div>
  <div class="wrapper-bottom"></div>
</div>

</body>
</html>

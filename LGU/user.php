<?php
require('connection.php');
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $isDeleteBtn = true;
}else{
    $isDeleteBtn = false;
    $user_id = $_SESSION['user_id'];
}
$query = "SELECT v.*, a.account_status, d.psa , d.med FROM verified v INNER JOIN  account a on a.account_id = v.app_id inner join doc d on v.app_id = d.user_id where a.account_id = '$user_id'";
$result = mysqli_query($conn, $query);

$query1 = "SELECT u.action, u.time_edited , a.name as admin_name from user_history u inner join admin a on u.admin_id = a.admin_id where u.user_id = '$user_id' order by u.id desc limit 1 ";
$result1 = mysqli_query($conn,$query1);
if($result && $result1 ){
    $assoc = mysqli_fetch_assoc($result);
    $assoc1 = mysqli_fetch_assoc($result1);
    extract($assoc);
    extract($assoc1);
}else{
    echo $query;
}

$query3 = "SELECT u.action, u.time_edited, a.name as admin_name, concat(v.lname,' ',v.fname) as user_name  from user_history u inner join admin a on u.admin_id = a.admin_id inner join verified v on u.user_id = v.app_id where u.user_id = '$user_id' order by u.id desc ";
$query3_result = mysqli_query($conn,$query3);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>LGU Managment</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/confirmation.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
        #history_content, #history_content tr, #history_content td{
            border: 1px solid black;
        }
        #history_content table{
            border: 1px solid black;
            width: 100%;
        }
        .table_head{
            text-align: center;
        }
        #table_body td{
            padding-inline: .5em;
        }
       
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" >
        <?php 
        $class="user";
        include('includes/sidebar.php'); ?>
    </div>
    <div class="main-panel">
		<?php include('includes/navbar.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Profile</h4>
                            </div>
                            <div class="content">
                                <form id="info_content" >
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control"  placeholder="Enter first name" value="<?php echo $fname; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input type="text" class="form-control" placeholder="Enter M.I" value="<?php echo $mi?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input id="lname" type="text" class="form-control" placeholder="Enter last name" value="<?php echo $lname?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select name="  " class="form-control" id="" readonly>
                                                    <option value=""><?php echo $gender ?></option>
                                                    <option value="<?php echo ($gender=="Female")? "Male":"Female" ?>"><?php echo ($gender=="Female")? "Male":"Female" ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="  " class="form-control" id="" readonly>
                                                    <option value="<?php echo $status_rs ?>"><?php echo $status_rs ?></option>
                                                    <?php 
                                                    $arr = ['single', 'widowed', 'married'];
                                                    for($i = 0; $i<count($arr);$i++){
                                                        if($arr[$i]!=$status_rs){
                                                            echo '<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
                                                            echo $status_rs==$arr[$i];
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input type="date" class="form-control"  value="<?php echo date('Y-m-d', strtotime($bdate)); ?>" readonly>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row otherInfoOff">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="<?php echo $address ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email Address" id="email" value="<?php echo $email ?>" readonly >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row otherInfoOn" >
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>National ID</label>
                                                <input type="text" class="form-control" value="<?php echo $valid_id?>" placeholder="Enter National ID Number" id="valid_id" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>APP ID</label>
                                                <input type="text" class="form-control" value="<?php echo $app_id?>" placeholder="Enter APP ID Number" id="app_id" readonly>
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <div class="row otherInfoOff">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input type="text" class="form-control" placeholder="Enter nationality" value="<?php echo $nationality ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Number</label>
                                                <input type="text" class="form-control" placeholder="Enter number" value="<?php echo $number ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Condition</label>
                                                <select name="  " class="form-control" id="" readonly>
                                                    <option value=""><?php echo $conditions ?></option>
                                                    <option value="<?php echo ($conditions=="pwd")? "senior citizen":"disabled" ?>"><?php echo ($conditions=="pwd")? "Senior Citizen":"disabled" ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row otherInfoOn" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Family Name</label>
                                                <input type="text" class="form-control" value="<?php echo $family_name?>" placeholder="Enter Family Name" id="family_name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Family Contact</label>
                                                <input type="text" class="form-control" value="<?php echo $family_contact?>" placeholder="Enter Family Number" id="family_contact" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Barangay</label>
                                                <select name="" class="form-control" id="brgy" readonly>
                                                    <option selected value="<?php echo $brgy?>"><?php echo $brgy?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <form id="history_content" style="display: none;">
                                    <table id="table_body">
                                        <tr>
                                            <td class="table_head">ID</td>
                                            <td class="table_head">USER</td>
                                            <td class="table_head">ADMIN</td>
                                            <td class="table_head">ACTION</td>
                                            <td class="table_head">DATE</td>
                                        </tr>
                                        <?php
                                        $counter=1;
                                        while ($row = mysqli_fetch_assoc($query3_result)) {
                                            $user_name = $row['user_name'];
                                            $admin_name = $row['admin_name'];
                                            $action = $row['action'];
                                            $time_done = $row['time_edited'];
                                            $dateTime = new DateTime($time_done);
                                            $newDate = $dateTime -> format('F j g:i A');
                                            echo "<tr>
                                            <td>$counter</td>
                                            <td>$user_name</td>
                                            <td>$admin_name</td>
                                            <td>$action</td>
                                            <td>$newDate</td>
                                            </tr>";
                                            $counter++;
                                        }
                                        ?>
                                    </table>
                                </form>
                                <br>
                                <div style="display:flex;gap: 1em;">
                                        <button type="submit" class="btn btn-info btn-fill " onclick="window.location.href='user_edit.php?user_id=<?php  echo $user_id ?>'">Edit Profile</button>
                                        <button type="submit" class="btn btn-info btn-fill " onclick="window.location.href='<?php echo ($conditions=='pwd')? 'table_pwd':'table_senior' ?>.php?id=<?php  echo $user_id.'&action=edit' ?>'">Complete Form</button>
                                        <button type="submit" class="btn btn-success btn-fill " onclick="userHistory()">User History</button>
                                        <button type="submit" class="btn btn-danger btn-fill " onclick="deleteUser('<?php  echo $user_id ?>')">Delete Profile</button>

                                        
                                </div>
                                    <div class="clearfix"></div>
                                <p>
                                <?php 
                                $dateFormat = $time_edited;
                                $dateTime = new DateTime($dateFormat);
                                $newDate = $dateTime -> format('F j g:i A');
                                $text = ($action=="Created"? "Created by ": "Last Edited by "); 
                                $text =$text.$admin_name. " on ".$newDate;
                                echo $text;
                                ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img style="visibility:hidden;"  src="../priotizen_app/user_img/<?php echo $photo ?>" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                     <?php
                                        $imagePath = "../priotizen_app/user_img/$photo";
                                        if(file_exists($imagePath)) {
                                            echo '<img class="avatar border-gray" style="height: 21em; width: 21em" src="../priotizen_app/user_img/'.$photo.'"  alt="..."/>';
                                        }else{
                                            echo '<img class="avatar border-gray" style="height: 21em; width: 21em" src="../priotizen_app/user_img/default.png"  alt="..."/>';
                                        }
                                      ?>
                                    

                                      <h4 class="title"><?php echo $fname." ".$mi." ".$lname ?><br />
                                         <small><?php echo $email ?></small>
                                      </h4>
                                    </a>
                                    <?php
                                    $bdateFormat = $bdate;
                                    $date =  date("l F d, Y");
                                    $date = explode(',',$date);
                                    $date = $date[1];
                                    $bdate = explode('-', $bdateFormat);
                                    $bdate = $bdate[0];
                                    $birthday = $date - $bdate ;
                                    ?>
                                    <h5><?php echo $birthday ?> Yrs Old</h5>
                                    <h5><?php echo $account_status ?></h5>
                                </div>
                               
                            </div>
                            <hr>
                            <div class="text-center">
                                <button onclick="showDoc('Psa')" href="#" class="btn btn-simple"><i class="pe-7s-note2"></i> PSA</button>
                                <button onclick="showDoc('Med')" href="#" class="btn btn-simple"><i class="pe-7s-file"></i> MED</button>
                                

                            </div>
                        </div>
                    </div>

                    
                   

                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6" id="docPsa" style="display: none;">
                        <div class="card">
                        <p class="text-center" style="padding-top: 1em;">PSA</p>
                          <img style="height: 30em; width:100%; object-fit:cover;" src="../priotizen_app/documents/<?php echo $psa ?>" alt="">
                          <div class="flex" style="padding: 1em;">
                            <button onclick="hideDoc('Psa')" class="btn btn-info btn-fill" style="float: right;">Hide</button>
                            <br><br>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="docMed" style="display: none;">
                        <div class="card">
                        <p class="text-center" style="padding-top: 1em;">MED</p>
                          <img style="height: 30em; width:100%; object-fit:cover;" src="../priotizen_app/documents/<?php echo $med ?>" alt="">
                          <div class="flex" style="padding: 1em;">
                            <button onclick="hideDoc('Med')" class="btn btn-info btn-fill" style="float: right;">Hide</button>
                            <br><br>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>

<script>
    let seeUserHistory = false;
    function userHistory(){
        const history_content = document.getElementById('history_content');
        const info_content = document.getElementById('info_content');
        if(!seeUserHistory){
            history_content.style.display = 'block';
            info_content.style.display = 'none';
            seeUserHistory = true
        }else{
            history_content.style.display = 'none';
            info_content.style.display = 'block';
            seeUserHistory = false
        }
    }

  let showOtherInfo = false;

function toggleOtherInfo() {
    const otherInfoOnElements = document.querySelectorAll('.otherInfoOn');
    const otherInfoOffElements = document.querySelectorAll('.otherInfoOff');

    if (showOtherInfo) {
        otherInfoOnElements.forEach(element => {
            element.style.display = 'none';
        });
        otherInfoOffElements.forEach(element => {
            element.style.display = 'block';
        });
        showOtherInfo = false;
    } else {
        otherInfoOnElements.forEach(element => {
            element.style.display = 'block';
        });
        otherInfoOffElements.forEach(element => {
            element.style.display = 'none';
        });
        showOtherInfo = true;
    }
    console.log(showOtherInfo);
}
    function goSuccess(){
        demo.goNotif('Successfully',' Deleted','danger','pe-7s-delete-user')
    }
    function goError(){
        demo.goNotif('Error',' Deleted','danger','pe-7s-junk')
    }
    function deleteUser(id){
        fetch(`./backend/user.php?id=${id}`,{
            method: "DELETE",
        })
        .then( response => response.json())
        .then( result => {
            if(result=="Success"){
                goSuccess()
                setTimeout(()=>{
                    window.location.href = "table.php"
                },2000)
            }else{
                goError()
            }
        })
    }

  

    function showDoc(str){
        const doc = document.querySelector(`#doc${str}`);
        doc.style.display = "block";
    }
    function hideDoc(str){
        const doc = document.querySelector(`#doc${str}`);
        doc.style.display = "none";
    }
</script>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>

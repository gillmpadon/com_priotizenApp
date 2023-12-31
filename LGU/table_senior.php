<?php
include('./backend/connection.php');
$id = $_GET['id'];
$query = "SELECT v.*, a.street, a.house, s.signature from verified v Inner join address a on v.app_id = a.user_id inner join test s on s.user_id = v.app_id where v.app_id = '$id' limit 1";
$result = mysqli_query($conn,$query);
if($result){
    if(mysqli_num_rows($result)>0){
        $assoc = mysqli_fetch_assoc($result);
        extract($assoc);
    }else{
        echo mysqli_error($conn);
    }
}else{
    echo mysqli_error($conn);
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>LGU Management</title>

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
    <link href="assets/css/senior.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39365077-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
  <style>
    .signModal{
        width: 100%;
        height: 100%;
        position: fixed;
        background-color: rgba(255, 255, 255, 0.4);
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);
        z-index: 100;
        top:0;
    }
    .signBox{
        width: 30%;
        height:30%;
        position: absolute;
        top: 50%;
        left:50%;
        transform: translate(-50%, -50%)
    }
    .btnSign{
        height:3em;
        width:100%
    }
    
    .signExit{
        position:absolute;
        top:0;
        right:0;
        z-index: 100;
    }
  </style>
</head>
<body onselectstart="return false" style="position:relative">


<div class="wrapper">
    <div class="sidebar" data-color="purple" >
    <?php
            $admin_id = json_encode($_SESSION['user_id']);
            $class="user_add";
            include('includes/sidebar.php'); 
            
    ?>
            
    </div>

    <div class="main-panel">
		    <?php include('includes/navbar.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card " style="padding: 1em;">
                            <div class="headers" style="text-align: center;">
                                <h4 class="title">DEPARTMENT OF HEALTH</h4>
                                <p>Philippine Registry for Person with Disabilities Version 4.0</p>
                                <h4 class="title">Application Form</h4>
                            </div>
                            <div class="content maincontent">
                                <table>
                                    <tr>
                                        <td colspan="6" class="black text-white">I. IDENTIFYING INFORMATION</td>
                                    </tr>
                                    <tr><td></td></tr>
                                    <tr>
                                        <td>
                                            1. Name of Senior Citizen
                                        </td>
                                        <td colspan="4">
                                            <div class="inputs">
                                                <input type="text" class="noleft notop nobottom" id="lname" value="<?php echo $lname; ?>" >
                                                <input type="text" class="noleft notop nobottom" id="fname" value="<?php echo $fname; ?>">
                                                <input type="text" class="noleft notop nobottom" id="mname" value="<?php echo $mi; ?>">
                                                <input type="text" class="noleft notop nobottom noright" id="ext">
                                            </div>
                                            <div class="input-text">
                                                <p>Last Name</p>
                                                <p>First Name</p>
                                                <p>Middle Name</p>
                                                <p>Extension</p>
                                            </div>
                                        </td>
                                        <td rowspan="3" class="bg-gray">
                                        <?php
                                            $imagePath = "../priotizen_app/user_img/$photo";
                                            if(file_exists($imagePath)) {
                                                echo '<img  src="../priotizen_app/user_img/'.$photo.'" style="height:100%; width:100%;" alt="..."/>';
                                            }else{
                                                echo '<img  src="../priotizen_app/user_img/default.png" style="height:100%; width:100%; "  alt="..."/>';
                                            }
                                        ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray">
                                            2. Address
                                        </td>
                                        <td colspan="4">
                                            <div class="inputs">
                                                <input type="text" class="noleft notop nobottom" id="region" value="<?php echo "Region I"; ?>">
                                                <input type="text" class="noleft notop nobottom" id="province" value="<?php echo "Pangasinan"; ?>">
                                                <input type="text" class="noleft notop nobottom" id="municipality" value="<?php echo "Lingayen"; ?>">
                                                <input type="text" class="noleft notop nobottom noright" id="brgy" value="<?php echo $brgy; ?>">
                                            </div>
                                            <div class="input-text bg-gray">
                                                <p>Region</p>
                                                <p>Province</p>
                                                <p>City Municipality</p>
                                                <p>Barangay</p>
                                            </div>
                                            <div class="inputs">
                                                <input type="text" class="noleft notop nobottom" style="width: 180%;" id="house" value="<?php echo $house; ?>">
                                                <input type="text" class="noleft notop nobottom noright" id="street" value="<?php echo $street; ?>">
                                            </div>
                                            <div class="input-text bg-gray">
                                                <p>House No./Zone/Purok/Sition</p>
                                                <p>Street</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3. Date of Birth</td>
                                        <td>
                                            <?php
                                            $bdateStr = explode("-",$bdate);
                                            $birth00 = substr($bdateStr[1],0);
                                            $birth01 = substr($bdateStr[1],1);
                                            $birth10 = substr($bdateStr[2],0);
                                            $birth11 = substr($bdateStr[2],1);
                                            $birth20 = substr($bdateStr[0],-2);
                                            $birth22 = substr($bdateStr[0],-1);

                                            ?>
                                            <div class="top">
                                                <input type="text" id="birth00" value="<?php echo $birth00; ?>" >
                                                <input type="text" id="birth01" value="<?php echo $birth01; ?>">
                                                <input type="text" id="birth10" value="<?php echo $birth10; ?>">
                                                <input type="text" id="birth11" value="<?php echo $birth11; ?>">
                                                <input type="text" id="birth20" value="<?php echo $birth20; ?>">
                                                <input type="text" id="birth22" value="<?php echo $birth22; ?>" >
                                            </div>
                                            <div class="bot">
                                                <input type="text" placeholder="m" readonly>
                                                <input type="text" placeholder="m" readonly>
                                                <input type="text" placeholder="d" readonly>
                                                <input type="text" placeholder="d" readonly>
                                                <input type="text" placeholder="y" readonly>
                                                <input type="text" placeholder="y" readonly>
                                            </div>
                                        </td>
                                        <td class="bg-gray">
                                            4. Place of Birth
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="birth_place">
                                        </td>
                                        <td class="bg-gray">
                                            5. Marital Status
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="status" value="<?php echo $status_rs; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                       
                                        <td class="bg-gray">
                                            6. Gender/Sex
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="sex" value="<?php echo $gender; ?>">
                                        </td>
                                        <td class="bg-gray">
                                            7. Contact Number
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="contact" value="<?php echo $number; ?>">
                                        </td>
                                        <td class="bg-gray">
                                            8. Email Address
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="email" value="<?php echo $email; ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>

                                    <tr>
                                       
                                        <td class="bg-gray">
                                            9. Religion
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="religion">
                                        </td>
                                        <td class="bg-gray">
                                            10. Ethnic Origin
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="ethnic">
                                        </td>
                                        <td class="bg-gray">
                                            11. Language Spoken/Written
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="language">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>

                                    <tr>
                                       
                                        <td class="bg-gray">
                                            12. OSCA ID Number
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="osca_id">
                                        </td>
                                        <td class="bg-gray">
                                            13. GSIS/SSS
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="gsis_id">
                                        </td>
                                        <td class="bg-gray">
                                            14. TIN
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="tin_id">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>

                                    <tr>
                                       
                                        <td class="bg-gray">
                                            15. PhilHealth
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="philhealth_id">
                                        </td>
                                        <td class="bg-gray">
                                            16. SC Association/ Org ID No.
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="org_id">
                                        </td>
                                        <td class="bg-gray">
                                            17. Other Gov't. ID
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="gov_id">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>

                                    <tr>
                                       
                                        <td class="bg-gray">
                                            18. Capability to Travel
                                        </td>
                                        <td>
                                           <div class="flex">
                                            <div class="checkbox-input">
                                                <input type="checkbox" name="" class="travel" onclick="updateCheckBox(this)" id="travel_yes">
                                                <p>YES</p>
                                           </div>
                                           <div class="checkbox-input">
                                                <input type="checkbox" name="" class="travel" onclick="updateCheckBox(this)" id="travel_no">
                                                <p>NO</p>
                                            </div>
                                           </div>
                                        </td>
                                        <td class="bg-gray">
                                            19. Service/Business (specify)
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="business">
                                        </td>
                                        <td class="bg-gray">
                                            20. Current Pension (specify)
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="pension">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="black text-white">II. FAMILY COMPOSITION</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray">
                                            21. Name of Spouse
                                        </td>
                                        <td colspan="5">
                                            <div class="inputs">
                                                <input type="text" class="noleft notop nobottom" id="spouse_lname">
                                                <input type="text" class="noleft notop nobottom" id="spouse_fname">
                                                <input type="text" class="noleft notop nobottom" id="spouse_mname">
                                                <input type="text" class="noleft notop nobottom noright" id="spouse_ext">
                                            </div>
                                            <div class="input-text bg-gray">
                                                <p>Last Name</p>
                                                <p>First Name</p>
                                                <p>Middle Name</p>
                                                <p>Extension</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="bg-gray">
                                            22. Father's Name
                                        </td>
                                        <td colspan="5">
                                            <div class="inputs">
                                            <input type="text" class="noleft notop nobottom" id="fathers_lname">
                                                <input type="text" class="noleft notop nobottom" id="fathers_fname">
                                                <input type="text" class="noleft notop nobottom" id="fathers_mname">
                                                <input type="text" class="noleft notop nobottom noright" id="fathers_ext">
                                            </div>
                                            <div class="input-text bg-gray">
                                                <p>Last Name</p>
                                                <p>First Name</p>
                                                <p>Middle Name</p>
                                                <p>Extension</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="bg-gray">
                                            23. Mother's Maiden Name
                                        </td>
                                        <td colspan="5">
                                            <div class="inputs">
                                            <input type="text" class="noleft notop nobottom" id="mothers_lname">
                                                <input type="text" class="noleft notop nobottom" id="mothers_fname">
                                                <input type="text" class="noleft notop nobottom" id="mothers_mname">
                                                <input type="text" class="noleft notop nobottom noright" id="mothers_ext">
                                            </div>
                                            <div class="input-text bg-gray">
                                                <p>Last Name</p>
                                                <p>First Name</p>
                                                <p>Middle Name</p>
                                                <p>Extension</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>24. Child(ren)</td>
                                        <td colspan="5">
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" value="Fullname" readonly id="child1_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" value="Occupation" readonly id="child1_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" value="Income" readonly id="child1_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" value="Age" readonly id="child1_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" value="Working/not working" readonly id="child1_work">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text"   id="child2_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child2_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child2_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child2_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child2_work">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text"   id="child3_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child3_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child3_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child3_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child3_work">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text"   id="child4_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child4_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child4_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child4_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child4_work">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text"   id="child5_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child5_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child5_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child5_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text"   id="child5_work">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>25. Other Dependants</td>
                                        <td colspan="5">
                                            
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="others_name" id="others2_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_job" id="others2_job">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_income" id="others2_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_age" id="others2_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_isworking" id="others2_work">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="others_name" id="others3_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_job" id="others3_job">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_income" id="others3_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_age" id="others3_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_isworking" id="others3_work">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="others_name" id="others4_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_job" id="others4_job">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_income" id="others4_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_age" id="others4_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_isworking" id="others4_work">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="others_name" id="others5_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_job" id="others5_job">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_income" id="others5_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_age" id="others5_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_isworking" id="others5_work">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="6">
                                            <p></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="black text-white">III. EDUCATION / HR PROFILE</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">
                                            26. Educational Attainment
                                        </td>
                                        <td colspan="3">
                                            27. Areas of Specialization/ Technical Skills
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="elementary_level" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="highschool_level" >
                                                        <p>High School Level</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="post_graduate" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="elementary_graduate" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="college_graduate" >
                                                        <p>College Level</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="vocational" >
                                                        <p>Vocational</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="highschool_graduate" >
                                                        <p>High School Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="college_graduate" >
                                                        <p>College Graduate</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)"  name="" id="no_school">
                                                        <p>No Attended School</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="middle narrow">
                                                <div class="midentry bg-gray">
                                                    28. Share Skill (Community Service)
                                                </div>
                                                <div class="midentry">
                                                    <input type="checkbox" class="skills" onclick="updateCheckBox(this)" name="" id="skill1">
                                                    <p>1</p>
                                                    <input type="text" name="" id="skill1_input">
                                                </div>
                                                <div class="midentry">
                                                <input type="checkbox" class="skills" onclick="updateCheckBox(this)" name="" id="skill2">
                                                    <p>2</p>
                                                    <input type="text"  name="" id="skill2_input">
                                                </div>
                                                <div class="midentry" id="nobottom">
                                                <input type="checkbox" class="skills" onclick="updateCheckBox(this)" name="" id="skill3">
                                                    <p>3</p>
                                                    <input type="text" name="" id="skill3_input">
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3" rowspan="2">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="medical" >
                                                        <p>Medical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="dental" >
                                                        <p>Dental</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="fishing" >
                                                        <p>Fishing</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="engineering" >
                                                        <p>Engineering</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="barber" >
                                                        <p>Barber</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="evangelization" >
                                                        <p>Evangelization</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="teaching" >
                                                        <p>Teaching</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="counselling" >
                                                        <p>Counselling</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="cooking" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="carpenter" >
                                                        <p>Carpenter</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="masson" >
                                                        <p>Masson</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="tailor" >
                                                        <p>Tailor</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="legal_services" >
                                                        <p>Legal Services</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="farming" >
                                                        <p>Farming</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="arts" >
                                                        <p>Arts</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="plumber" >
                                                        <p>Plumber</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="sapatero" >
                                                        <p>Sapatero</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="chef" >
                                                        <p>Chef/Cook</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           

                                            <div class="checks">
                                                <div class="checks-entry lastentry">
                                                    <div class="last ">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="millwright" >
                                                        <p>Millwright</p>
                                                    </div>
                                                    <div class="last " id="norights">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t20" >
                                                        <p>Others, specify</p>
                                                    </div>
                                                    <div class="last">
                                                        <input type="text" name="" id="technical_checkbox_others" >
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="bg-gray">29. Community Service and Involvement</td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="community_medical" >
                                                        <p>Medical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="organization_leader" >
                                                        <p>Community / Organization Leader</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="support_services" >
                                                        <p>Neighborhood Support Services</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="counseling_referral" >
                                                        <p>Counseling Referral</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="resource_volunter" >
                                                        <p>Resource Volunter</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="dental" >
                                                        <p>Dental</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="legal_services" >
                                                        <p>Legal Services</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="sponsorship" >
                                                        <p>Sponsorship</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="community_beutification" >
                                                        <p>Community Beautification</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="friendly_visits" >
                                                        <p>Friendly Visits</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="religious" >
                                                        <p>Religious</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c12" >
                                                        <p>Others, specify</p>
                                                        <input type="text" name="" id="community_checkbox_others">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="black text-white">IV. DEPENDENCY PROFILE</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="bg-gray">30. Living/Residing with</td>
                                        <td colspan="2" class="bg-gray">31. Household Condition</td>
                                    </tr>
                                    <tr>
                                       <td colspan="4">
                                        <div class="checks">
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="alone" >
                                                    <p>Alone</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="spouse" >
                                                    <p>Spouse</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="children" >
                                                    <p>Child(ren)</p>
                                                </div>
                                                
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="grandchildren" >
                                                    <p>Grand Child(ren)</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="inlaws" >
                                                    <p>In-law(s)</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="relative" >
                                                    <p>Relative(s)</p>
                                                </div>
                                               
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="law_spouse" >
                                                    <p>Common Law Spouse</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="care_institution" >
                                                    <p>Care Institution</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="friends" >
                                                    <p>Friends(s)</p>
                                                </div>
                                            </div>
                                        </div>
                                       </td>
                                       
                                       <td colspan="2">
                                        <div class="checks">
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="no_privacy" >
                                                    <p>No privacy</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="informal_settler" >
                                                    <p>Informal Settler</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="high_cost_of_rent" >
                                                    <p>High cost of rent</p>
                                                </div>
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="overcrowded_in_home" >
                                                    <p>Overcrowded in home</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="no_permanent_house" >
                                                    <p>No permanent house</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="longing_for_quiet_living" >
                                                    <p>Longing for quiet living</p>
                                                </div>
                                               
                                            </div>
                                           
                                        </div>
                                       </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">
                                            <div class="checks-entry narrow">
                                                <div class="entries ">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i10" >
                                                    <p>Others, pls specify</p>
                                                    <input type="text" name="" id="income_checkbox_others">
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="2">
                                            <div class="checks-entry narrow">
                                                <div class="entries">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="p7" >
                                                    <p>Others, pls specify</p>
                                                    <input type="text" name="" id="personal_checkbox_input">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="black text-white">V. ECONOMIC PROFILE</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="bg-gray">32. Source of Income and Assistance</td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div class="checks ">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="salary" >
                                                        <p>Own earnigns, salary/ wages</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="relatives" >
                                                        <p>Depended on children/ relatives</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="spouse_pension" >
                                                        <p>Spouse's Pension</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="livestock" >
                                                        <p>Livestock / orchard / farm</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="own_pension" >
                                                        <p>Own Pension</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="spouse_salary" >
                                                        <p>Spouse's salary</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="share_crops" >
                                                        <p>Rentals / sharecrops</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="fishing_income" >
                                                        <p>Fishing</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="stocks" >
                                                        <p>Stocks / Dividends</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="insurance" >
                                                        <p>Insurance</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="savings" >
                                                        <p>Savings</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s12" >
                                                        <p>Others, specify</p>
                                                        <input type="text" name="" id="source_checkout_input">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="bg-gray">33. Asssets: Real and Immovable Properties</td>
                                        <td colspan="3" class="bg-gray">34. Assets: Personal and Movable Properties</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow" >
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="house_assets" >
                                                        <p>House</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="farm_assets" >
                                                        <p>Lot / Farmland</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="house_asset" >
                                                        <p>House & Lot</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checks"> 
                                                <div class="checks-entry narrow" style="width: 100%;">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="commercial_assets" >
                                                        <p>Commercial Building</p>
                                                        <input type="text">
                                                    </div>
                                                    
                                                </div>
                                               
                                                <div class="checks-entry narrow" style="width: 50%;">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="fishpond" >
                                                        <p>Fishpond / resort</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="a6" >
                                                        <p>Others, specify</p>
                                                        <input type="text" id="assets_others">
                                                    </div>
                                                    
                                                </div>
                                               
                                                
                                            </div>
                                        </td>
                                        <td colspan="3">
                                            <div class="checks ">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="automobile" >
                                                        <p>Automobile</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="personal_computer" >
                                                        <p>Personal Computer</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="boarts" >
                                                        <p>Boarts</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="heavy_equipment" >
                                                        <p>Heavy Equipment</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="laptops" >
                                                        <p>Laptops</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="drones" >
                                                        <p>Drones</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="motorcycle" >
                                                        <p>Motorcycle</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="mobile_phones" >
                                                        <p>Mobile Phones</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per9" >
                                                        <p>Specify</p>
                                                        <input type="text" id="personsal_others">
                                                    </div></div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="bg-gray">
                                            35. Monthly Income
                                        </td>
                                        <td colspan="3" class="black text-white">
                                            36. Problems/ Need Commonly Encounter
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="checks ">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="60000_above" >
                                                        <p>60,000 and above</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="50000_to_60000" >
                                                        <p>50,000 to 60,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="40000_to_50000" >
                                                        <p>40,000 to 50,000</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="30000_to_40000" >
                                                        <p>30,000 to 40,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="20000_to_30000" >
                                                        <p>20,000 to 30,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="10000_to_20000" >
                                                        <p>10,000 to 20,000</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow ">
                                                    <div class="entries onlybottom ">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="5000_to_10000" >
                                                        <p>5,000 to 10,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="1000_to_5000" >
                                                        <p>1,000 to 5000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="Below_1000" >
                                                        <p>Below 1,000</p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            
                                            <div class="entries ">
                                                <input type="checkbox" class="month_income" onclick="updateCheckBox(this)" id="mon10" >
                                                <p>Others, specify</p>
                                                <input type="text" name="" id="month_income_others">
                                            </div>
                                            <br>
                                        </td>
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="lack_of_income" >
                                                        <p>Lack of income / resources</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="loss_of_income" >
                                                        <p>Loss of income / resources</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="skills" >
                                                        <p>Skills / capability training</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="livelihood" >
                                                        <p>Livelihood opportunities</p>
                                                    </div>
                                                    <div class="entries ">
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="res5" >
                                                        <p>Others, specify</p>
                                                        <input type="text" name="" id="resources_others">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="black text-white">
                                            VI. HEALTH PROFILE
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-gray">
                                            35. Medical Concern
                                        </td>
                                        <td colspan="3" class="bg-gray">
                                            Hearing
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow" >
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)"  name="" id="blood_type" >
                                                        <p>Blood Type</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="medsub1">
                                                        <p>O</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="medsub2">
                                                        <p>A</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="medsub3">
                                                        <p>B</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="medsub4">
                                                        <p>AB</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="medsub5">
                                                        <p>Don't know</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="physical_disability" >
                                                        <p>Physical Disability</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="health_problems" >
                                                        <p>Health problems / ailments</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="hypertension" >
                                                        <p>Hypertension</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="arthritis">
                                                        <p>Arthritis / Goul</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="coronory_heart_disease">
                                                        <p>Coronary Heart Disease</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="diabetes" >
                                                        <p>Diabetes</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="chronic_kidney_disease">
                                                        <p>Chronic Kidney Disease</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="alzheimer" >
                                                        <p>Alzheimer's / Dementia</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="pulmonary_disease" >
                                                        <p>Chronic Obstructive Pulmonary Disease</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="med8" >
                                                        <p>Others, pls specify</p>
                                                        <input type="text" id="medical_others">
                                                    </div>
                                                    <div class="entries bg-gray">
                                                        <p>38. Dental Concern</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="dental" onclick="updateCheckBox(this)" name="" id="dental_care" >
                                                        <p>Needs Dental Care</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="dental" onclick="updateCheckBox(this)" name="" id="den2" >
                                                        <p>Others</p>
                                                        <input type="text" id="dental_others">
                                                    </div>
                                                    <div class="entries bg-gray">
                                                        <p>39. Optical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="optical" onclick="updateCheckBox(this)" name="" id="eye_impairment" >
                                                        <p>Eye impairment</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="optical" onclick="updateCheckBox(this)" name="" id="need_eye_care" >
                                                        <p>Needs eye care</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="optical" onclick="updateCheckBox(this)" name="" id="opt3" >
                                                        <p>Others</p>
                                                        <input type="text" id="optical_others">
                                                    </div>
                                                   
                                                </div>
                                                
                                            </div>
                                        </td>
                                            
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow" >
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="hearing" onclick="updateCheckBox(this)"  name="" id="hear1" >
                                                        <p>Aural impairment / Hearing impairement</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox"  class="hearing" onclick="updateCheckBox(this)" name="" id="hear2" >
                                                        <p>Others</p>
                                                        <input type="text" id="hearing_others">
                                                    </div>
                                                    <div class="entries onlybottom bg-gray">
                                                        <p>41. Social/Emotional</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox"class="social" onclick="updateCheckBox(this)" name="" id="soc1" >
                                                        <p>Feeling neglect / rejection</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox"class="social" onclick="updateCheckBox(this)" name="" id="soc2" >
                                                        <p>Feeling helplessness / worthlessness</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox"class="social" onclick="updateCheckBox(this)" name="" id="soc3" >
                                                        <p>Feeling loneliness / isolate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox"class="social" onclick="updateCheckBox(this)" name="" id="soc4" >
                                                        <p>Lack of leisure / recreational activities</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox"class="social" onclick="updateCheckBox(this)" name="" id="soc5" >
                                                        <p>Lack SC friendly environment</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox"class="social" onclick="updateCheckBox(this)" name="" id="soc6" >
                                                        <p>Others, specify</p>
                                                        <input type="text" name="" id="social_others">
                                                    </div>
                                                    <div class="entries onlybottom bg-gray">
                                                        <p>42. Area / Difficulty</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="cost" onclick="updateCheckBox(this)" name="" id="high_cost_of_medicines" >
                                                        <p>High cost of medicines</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="cost" onclick="updateCheckBox(this)" name="" id="lack_of_medicines" >
                                                        <p>Lack of medicines</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="cost" onclick="updateCheckBox(this)" name="" id="high_of_medical_attention" >
                                                        <p>Lack of medical attention</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="cost" onclick="updateCheckBox(this)" name="" id="cost4" >
                                                        <p>Others</p>
                                                        <input type="text" id="cost_others">
                                                    </div>
                                                    <div class="entries onlybottom" style="visibility:hidden">
                                                        <input type="checkbox" >
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="bg-gray ">
                                            43. List of Medicines for Maintenace
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_1">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_2">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_3">
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_4">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_5">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_6">
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_7">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_8">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" class="listMed" name="" id="listMed_9">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bg-gray">
                                            44. Do you have a scheduled medical/physical checkup?
                                        </td>
                                        <td colspan="4" >
                                           <div class="checks">
                                            <div class="checks-entry " >
                                                <div class="entries ">
                                                    <input type="checkbox" class="isMed" onclick="updateCheckBox(this)" name="" id="isMedyes" >
                                                    <p>Yes</p>
                                                    <input type="checkbox" class="isMed" onclick="updateCheckBox(this)" name="" id="isMedno" >
                                                    <p>No</p>
                                                </div>
                                            </div>
                                           </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bg-gray">
                                            44. Do you have a scheduled medical/physical checkup?
                                        </td>
                                        <td colspan="4">
                                           <div class="checks">
                                            <div class="checks-entry" >
                                                <div class="entries">
                                                    <input type="checkbox" class="frequent" onclick="updateCheckBox(this)" name="" id="fre1" >
                                                    <p>Yearly</p>
                                                    <input type="checkbox" class="frequent" onclick="updateCheckBox(this)" name="" id="fre2" >
                                                    <p>Every 6 months</p>
                                                    <input type="checkbox" class="frequent" onclick="updateCheckBox(this)" name="" id="fre3" >
                                                    <p>Others</p>
                                                    
                                                </div>
                                            </div>
                                           </div>
                                        </td>
                                    </tr>
                                    <tr>
                                       <td colspan="6" style="border: none;">
                                        <div class="text" style="padding: 1em;">
                                            <p>This certifies that I have willingly given my personal consent and willfully participated in the provision of data and relevant information regarding my person, being part of the establishment of database of Senior Citizens.</p>
                                        </div>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="padding: 1em;">
                                            <img src="" id="imgSignature" alt="this is image" style="display: none; width:100%; height:auto;">
                                            <h3 style="text-align:center; display:none" id="signLabel" >Signature</h3>
                                        </td>
                                    </tr>
                                    <tr style="border:none">
                                        <td colspan="6" style=" width:100%; border:none; margin:auto;text-align:center;">
                                        <?php
                                        $action_get = $_GET['action'];
                                        ?>
                                         <div class="" style="display:flex; gap:1em; items:center;" >
                                            <button class="btn btn-info btn-fill" onclick="showSignature()" style=" width: 100%; <?php echo $_GET['action']=="edit"? "display:none":"" ?>">Upload Signature</button>
                                            <button onclick="submitForm()" style="width:100%; margin:auto; text-align:center;" class="btn btn-info btn-fill"><?php echo $action_get=="edit"? "EDIT":"SUBMIT" ?> FORM</button>
                                        </div>

                                        </td>
                                    </tr>
                                </table>
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
                          <img style="height: 30em; width:100%; object-fit:cover;" src="../priotizen_app/user_img/john.png" alt="">
                          <div class="flex" style="padding: 1em;">
                            <button onclick="hideDoc('Psa')" class="btn btn-info btn-fill" style="float: right;">Update</button>
                            <br><br>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6" id="docMed" style="display: none;">
                        <div class="card">
                        <p class="text-center" style="padding-top: 1em;">MED</p>
                          <img style="height: 30em; width:100%; object-fit:cover;" src="../priotizen_app/user_img/john.png" alt="">
                          <div class="flex" style="padding: 1em;">
                            <button onclick="hideDoc('Med')" class="btn btn-info btn-fill" style="float: right;">Update</button>
                            <br><br>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include('includes/footer.php'); ?>

    </div>
</div>

<div id="signature-pad" class="signature-pad signModal"  style="visibility:hidden">
    <div class="signBox">
        <div class="signature-pad--body signPanel" style="border: 1px solid black;">
            <canvas style="width: 100%;"></canvas>
        </div>
        <div class="signature-pad--actions signControl">
            <div style="display:flex; gap:1em; margin-top:1em">
            <button type="button" class="button clear btnSign" data-action="clear">Clear</button>
            <button type="button" class="button btnSign" data-action="undo" >Undo</button>
            <button type="button" class="button save btnSign" data-action="save-png">Save</button>
            </div>
        </div>
        <svg  class="signExit" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 256 256"><path fill="currentColor" d="M208 32H48a16 16 0 0 0-16 16v160a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16Zm-26.34 138.34a8 8 0 0 1-11.32 11.32L128 139.31l-42.34 42.35a8 8 0 0 1-11.32-11.32L116.69 128L74.34 85.66a8 8 0 0 1 11.32-11.32L128 116.69l42.34-42.35a8 8 0 0 1 11.32 11.32L139.31 128Z"/></svg>
    </div>
</div>

<script src="assets/sign_js/signature_pad.js"></script>
<script src="assets/sign_js/app.js"></script>
<script>
     const signExit = document.querySelector('.signExit')
     signExit.addEventListener('click', () =>{
    const signModal = document.querySelector('.signModal');
    signModal.style.visibility = 'hidden';
 })

 const signModal = document.querySelector('.signModal');
    function showSignature(){
        signModal.style.visibility = 'visible';
    }
</script>

<script>


     function goSuccess(){
        demo.goNotif('Successfully',' Update','success','pe-7s-add-user')
    }
    function goError(){
        demo.goNotif('Error',' Update','success','pe-7s-delete-user')
    }

    function submitForm(){
        const mainObj = {}
        const inputs = document.querySelectorAll('table input');
        inputs.forEach(input => {
        if (input.type === 'checkbox') {
            mainObj[input.id] = input.checked;
        } else if (input.type === 'text') {
            mainObj[input.id] = input.value
        }else if((input.type === 'radio')){
            mainObj[input.id] = input.checked
        }
        else{
            mainObj[input.id] = input.value
        }
        });

        const url = new URLSearchParams(window.location.search)
        const id = url.get('id')
        const admin_id= localStorage.getItem('admin_id');
        const action = url.get('action')

        const formData = new FormData();
        const jsonString = JSON.stringify(mainObj);
        console.log(jsonString)
        formData.append('data', jsonString);
        formData.append('user_id', id)
        formData.append('admin_id', admin_id)
        formData.append('action', action)
        formData.append('senior', true)

        fetch('./backend/forms_submit.php',{
            method: 'POST',
            body: formData
        })
        .then(response=> response.json())
        .then(result =>{
            if(result=="Successful"){
                goSuccess()
                setTimeout(()=>{
                    window.location.href = "user.php?user_id="+id
                },2000);
            }else{
                goError()
            }
        })

    }
    function updateCheckBox(e){
        const id = e.id
        const element = document.querySelectorAll(`.${e.className}`)
        element.forEach( item =>{
            if(item.id != id){
                const unselect = document.querySelector(`#${item.id}`)
                unselect.checked= false;
            }
        })
    }


    function readData(){
        const url = new URLSearchParams(window.location.search);
        const id = url.get('id');
        const action = url.get('action');
        fetch(`./backend/forms_submit.php?user_id=${id}`,{
            method: 'GET'
        })
        .then( response => response.json())
        .then( result => {
            const data = result['data'];
            const signature = result['signature'];
            const imgSignature = document.getElementById('imgSignature');
            const signLabel = document.getElementById('signLabel');
            imgSignature.src = `../priotizen_app/documents/${signature}`
            imgSignature.style.display= "block"
            signLabel.style.display= "block"
            
            let objectData = JSON.parse(data);
            for (const key in objectData) {
                if (objectData.hasOwnProperty(key)) {
                    const value = objectData[key];
                    const item = document.getElementById(key);

                    if (item && item.tagName === "INPUT") {
                        if (item.type === "checkbox") {
                            // It's a checkbox input
                            item.checked = value === true; // Set the checkbox value based on your data
                        } else if (item.type === "text") {
                            // It's a text input
                            item.value = value==""? "":value; // Set the text input value
                        }else{
                            item.checked = value === true;
                        }
                    }
                  
                }
            }
        })
    }
    readData()

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

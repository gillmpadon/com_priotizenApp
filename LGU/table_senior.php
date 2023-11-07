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
    <link href="assets/css/senior.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
   
</head>
<body>

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
                                                    <input type="text" value="Fullname" readonly>
                                                </div>
                                                <div class="entry">
                                                    <input type="text" value="Occupation" readonly>
                                                </div>
                                                <div class="entry">
                                                    <input type="text" value="Income" readonly>
                                                </div>
                                                <div class="entry">
                                                    <input type="text" value="Age" readonly>
                                                </div>
                                                <div class="entry">
                                                    <input type="text" value="Working/not working" readonly>
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="child_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_isworking">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="child_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_isworking">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="child_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_isworking">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="child_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_occupation">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="child_isworking">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>25. Other Dependants</td>
                                        <td colspan="5">
                                            
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="others_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_job">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_isworking">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="others_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_job">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_isworking">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="others_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_job">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_isworking">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text" class="others_name">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_job">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_income">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="others_isworking">
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
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e1" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e2" >
                                                        <p>High School Level</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e3" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e4" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e5" >
                                                        <p>College Level</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e6" >
                                                        <p>Vocational</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e7" >
                                                        <p>High School Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e8" >
                                                        <p>College Graduate</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" onclick="updateCheckBox(this)" " name="" id="e9">
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
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t1" >
                                                        <p>Medical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t2" >
                                                        <p>Dental</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t3" >
                                                        <p>Fishing</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t4" >
                                                        <p>Engineering</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t5" >
                                                        <p>Barber</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t6" >
                                                        <p>Evangelization</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t7" >
                                                        <p>Teaching</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t8" >
                                                        <p>Counselling</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t9" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t10" >
                                                        <p>Carpenter</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t11" >
                                                        <p>Masson</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t12" >
                                                        <p>Tailor</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t13" >
                                                        <p>Legal Services</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t14" >
                                                        <p>Farming</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t15" >
                                                        <p>Arts</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t16" >
                                                        <p>Plumber</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t17" >
                                                        <p>Sapatero</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t18" >
                                                        <p>Chef/Cook</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           

                                            <div class="checks">
                                                <div class="checks-entry lastentry">
                                                    <div class="last ">
                                                        <input type="checkbox" class="technical_checkbox" onclick="updateCheckBox(this)"  name="" id="t19" >
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
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c1" >
                                                        <p>Medical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c2" >
                                                        <p>Community / Organization Leader</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c3" >
                                                        <p>Neighborhood Support Services</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c4" >
                                                        <p>Counseling Referral</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c5" >
                                                        <p>Rosource Volunter</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c6" >
                                                        <p>Dental</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c7" >
                                                        <p>Legal Services</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c8" >
                                                        <p>Sponsorship</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c9" >
                                                        <p>Community Beautification</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c10" >
                                                        <p>Friendly Visits</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" onclick="updateCheckBox(this)"  name="" id="c11" >
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
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i1" >
                                                    <p>Alone</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i2" >
                                                    <p>Spouse</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i3" >
                                                    <p>Child(ren)</p>
                                                </div>
                                                
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i4" >
                                                    <p>Grand Child(ren)</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i5" >
                                                    <p>In-law(s)</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i6" >
                                                    <p>Relative(s)</p>
                                                </div>
                                               
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i7" >
                                                    <p>Common Law Spouse</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i8" >
                                                    <p>Care Institution</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" onclick="updateCheckBox(this)" name="" id="i9" >
                                                    <p>Friends(s)</p>
                                                </div>
                                            </div>
                                        </div>
                                       </td>
                                       
                                       <td colspan="2">
                                        <div class="checks">
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="p1" >
                                                    <p>No privacy</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="p2" >
                                                    <p>Informal Settler</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="p3" >
                                                    <p>High cost of rent</p>
                                                </div>
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="p4" >
                                                    <p>Overcrowded in home</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="p5" >
                                                    <p>No permanent house</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="p6" >
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
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s1" >
                                                        <p>Own earnigns, salary/ wages</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s2" >
                                                        <p>Depended on children/ relatives</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s3" >
                                                        <p>Spouse's Pension</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s4" >
                                                        <p>Livestock / orchard / farm</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s5" >
                                                        <p>Own Pension</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s6" >
                                                        <p>Spouse's salary</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s7" >
                                                        <p>Rentals / sharecrops</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s8" >
                                                        <p>Fishing</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s9" >
                                                        <p>Stocs / Dividends</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s10" >
                                                        <p>Insurance</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" onclick="updateCheckBox(this)"  name="" id="s11" >
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
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="a1" >
                                                        <p>House</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="a2" >
                                                        <p>Lot / Farmland</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="a3" >
                                                        <p>House & Lot</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checks"> 
                                                <div class="checks-entry narrow" style="width: 100%;">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="a4" >
                                                        <p>Commercial Building</p>
                                                        <input type="text">
                                                    </div>
                                                    
                                                </div>
                                               
                                                <div class="checks-entry narrow" style="width: 50%;">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="assets" onclick="updateCheckBox(this)" id="a5" >
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
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per1" >
                                                        <p>Automobile</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per2" >
                                                        <p>Personal Computer</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per3" >
                                                        <p>Boarts</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per4" >
                                                        <p>Heavy Equipment</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per5" >
                                                        <p>Laptops</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per6" >
                                                        <p>Drones</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per7" >
                                                        <p>Motorcycle</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="personal" onclick="updateCheckBox(this)" id="per8" >
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
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon1" >
                                                        <p>60,000 and above</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon2" >
                                                        <p>50,000 to 60,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon3" >
                                                        <p>40,000 to 50,000</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon4" >
                                                        <p>30,000 to 40,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon5" >
                                                        <p>20,000 to 30,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon6" >
                                                        <p>10,000 to 20,000</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow ">
                                                    <div class="entries onlybottom ">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon7" >
                                                        <p>5,000 to 10,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon8" >
                                                        <p>1,000 to 5000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="month_income" onclick="updateCheckBox(this)" id="mon9" >
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
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="res1" >
                                                        <p>Lack of income / resources</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="res2" >
                                                        <p>Loss of income / resources</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="res3" >
                                                        <p>Skills / capability training</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" class="resources" onclick="updateCheckBox(this)" id="res4" >
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
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)"  name="" id="med1" >
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
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="med2" >
                                                        <p>Physical Disability</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="med3" >
                                                        <p>Health problems / ailments</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="med4" >
                                                        <p>Hypertension</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="medsub6">
                                                        <p>Arthritis / Goul</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="medsub7">
                                                        <p>Coronary Heart Disease</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="med5" >
                                                        <p>Diabetes</p>
                                                        <input type="checkbox" class="medical_sub" onclick="updateCheckBox(this)" name="" id="medsub8">
                                                        <p>Chronic Kidney Disease</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="med6" >
                                                        <p>Alzheimer's / Dementia</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="medical" onclick="updateCheckBox(this)" name="" id="med7" >
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
                                                        <input type="checkbox" class="dental" onclick="updateCheckBox(this)" name="" id="den1" >
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
                                                        <input type="checkbox" class="optical" onclick="updateCheckBox(this)" name="" id="opt1" >
                                                        <p>Eye impairment</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="optical" onclick="updateCheckBox(this)" name="" id="opt2" >
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
                                                        <input type="checkbox" class="cost" onclick="updateCheckBox(this)" name="" id="cost1" >
                                                        <p>High cost of medicines</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="cost" onclick="updateCheckBox(this)" name="" id="cost2" >
                                                        <p>Lack of medicines</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="cost" onclick="updateCheckBox(this)" name="" id="cost3" >
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
                                            <div class="sign">
                                                <div class="signature">
                                                    <input type="text" id="signature">
                                                    <p>Name and Signaure of Senior Citizen</p>
                                                </div>
                                                <div class="attach">
                                                <?php
                                                    $imagePath = "../priotizen_app/documents/$signature";
                                                        if(file_exists($imagePath)) { ?>
                                                            <img id="attach_signature" src="../priotizen_app/documents/signature.png" style="height:100%; width:100%; "  alt="..."/>
                                                    <?php  }else{
                                                        echo "<img id='attach_signature' src='../priotizen_app/documents/no_signature.png' style='height:100%; width:100%;'alt='...'/>";
                                                    }
                                                    ?>

                                                    <input type="file" name="" style="display: none;" id="attach_file">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="border:none">
                                        <td colspan="6" style=" width:100%; border:none; margin:auto;text-align:center;">
                                        <?php
                                        $action_get = $_GET['action'];
                                        ?>
                                            <button onclick="submitForm()" style="width:50%; margin:auto; text-align:center;" class="btn btn-info btn-fill"><?php echo $action_get=="edit"? "EDIT":"SUBMIT" ?> FORM</button>
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


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="dashboard.php">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="table.php">
                                User List
                            </a>
                        </li>
                        <li>
                            <a href="table_user.php">
                                Admin List
                            </a>
                        </li>
                        <li>
                          <a href="../priotizen_app/index.html">
                                Priotizen App
                            </a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </footer>

    </div>
</div>

<script>


     function goSuccess(){
        demo.goNotif('Successfully',' Update','success','pe-7s-add-user')
    }
    function goError(){
        demo.goNotif('Error',' Update','success','pe-7s-delete-user')
    }

    const inputs_id = ['lname','fname','mname','ext','region','province','country',
    'municipality','brgy','birth00','birth01','birth10','birth11','birth20','birth22',
    'birth_place','status','sex','contact','email','religion','ethnic','language','osca_id','gsis_id',
    'tin_id','philhealth_id','org_id','gov_id','business','pension','spouse_lname',
    'spouse_fname','spouse_mname','spouse_ext','fathers_fname','fathers_lname','fathers_mname','fathers_ext',
    'mothers_lname','mothers_fname','mothers_mname','mothers_ext','signature','optical_others','hearing_others','social_others','cost_others','dental_others','month_income_others','resources_others','assets_others','personal_others','income_checkbox_others','personal_checkbox_others','community_checkbox_others','technical_checkbox_others']
    const checkboxes_and_inputs = [,'others_name','others_occupation','others_income','others_age','others_isworking','child_name','child_occupation','child_income','child_age','child_isworking','travel','educ_checkbox','skills','technical_checkbox','community_checkbox','income_checkbox','personal_checkbox','source_checkout','assets','personal','month_income','resources','medical','medical_sub','medical','dental','optical','hearing','social','cost','listMed','frequent','isMed']
   
    function submitForm(){
        const id_inputs = {}
        let counts = 0;
        inputs_id.forEach(item=>{
            const element = document.querySelectorAll(`#${item}`)
            element.forEach((i,index )=>{
                const myId = i.id
                if(i.value !="" || i.value.length >0){
                    id_inputs[myId] = i.value
                    counts++
                }else{
                    id_inputs[myId] = "off"
                }
            })
        
        })
        checkboxes_and_inputs.forEach(item=>{
            const element = document.querySelectorAll(`.${item}`)
            for( ele of element){
                const myId = ele.id
                if (ele.type === 'checkbox' && ele.checked) {
                    id_inputs[myId] = ele.value
                }else{
                    id_inputs[myId] = "off"
                }
                counts++
            }
        })

        const attach_file = document.querySelector('#attach_file')
        const url = new URLSearchParams(window.location.search)
        const id = url.get('id')
        const action = url.get('action')

        const formData = new FormData();
        const jsonString = JSON.stringify(id_inputs);
        formData.append('data', jsonString);
        formData.append('image', attach_file.files[0])
        formData.append('user_id', id)
        formData.append('action', action)
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
    const attach_signature = document.querySelector('#attach_signature')
    const attach_file = document.querySelector('#attach_file'  )
    attach_file.addEventListener('change',()=>{
        const file = attach_file.files[0]
        const reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onload = ()=>{
            attach_signature.src = reader.result
        }
    })
    attach_signature.addEventListener('click', ()=>{
        attach_file.click()
    })

    function readData(){
        const url = new URLSearchParams(window.location.search)
        const id = url.get('id')
        fetch(`./backend/forms_submit.php?user_id=${id}`,{
            method: 'GET'
        })
        .then( response => response.json())
        .then( result => {
            let signature = result['signature']; // Trim the string
            let img_signature = document.querySelector('#attach_signature');
            img_signature.src = '../priotizen_app/documents/'+signature;
            console.log(signature, signature.length)
            const data = result['data'];
            let objectData = JSON.parse(data);
            for (const key in objectData) {
                if (objectData.hasOwnProperty(key)) {
                    const value = objectData[key];
                    const item = document.getElementById(key);

                    // Check if the element is an input element and its type
                    if (item && item.tagName === "INPUT") {
                        if (item.type === "checkbox") {
                            // It's a checkbox input
                            item.checked = value === "on"; // Set the checkbox value based on your data
                            console.log(value === "on")
                        } else if (item.type === "text") {
                            // It's a text input
                            item.value = value=="off"? "":value; // Set the text input value
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

<?php
include('./backend/connection.php');
$id = $_GET['id'];
$query = "SELECT v.*, a.street, a.house from verified v Inner join address a on v.app_id = a.user_id where v.app_id = '$id' limit 1";
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
    <link href="assets/css/pwd.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" >
    <?php
            include('./backend/connection.php');
            $admin_id = json_encode($_SESSION['user_id']);
            $class="user_add";
            include('includes/sidebar.php'); ?>
    </div>

    <div class="main-panel">
		    <?php include('includes/navbar.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row"
                style="display: flex;
                    justify-content: center;
                    align-items: center;
                    ">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header" style="text-align: center;">
                                <h4 class="title">DEPARTMENT OF HEALTH</h4>
                                <p>Philippine Registry for Person with Disabilities Version 4.0</p>
                                <h4 class="title">Application Form</h4>
                            </div>
                            <div class="content maincontent">
                                   <table >
                                        <tr >
                                            <td colspan="4"  class=" noborder" >
                                                <div class="superflex">
                                                <p>1.</p> 
                                                    <div class="flexitem">
                                                        <input type="radio" name="applicant" id="new">
                                                        <p>NEW APPLICANT</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="applicant"  id="old">
                                                        <p>RENEWAL</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td colspan="1" >
                                                <p class="text-center">Place 1x1 Photo Here</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="rowitem superflex">
                                                    <p>2.</p> 
                                                    <p>PERSONS WITH DISABILITY NUMBER <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" value="" id="valid_id">
                                            </td>
                                            <td colspan="1">
                                                <div class="rowitem superflex">
                                                    <p>3.</p> 
                                                    <p>DATE APPLIED (mm/dd/yyyy)<span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" id="date">
                                            </td>
                                            <td colspan="1" rowspan="2">
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
                                            <td colspan="5">
                                                <p>4. PERSONAL INFORMATION <span class="asterisk">*</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>LAST NAME <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text"  value="<?php echo $lname; ?>" id="lname">

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>FIRST NAME <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text"  value="<?php echo $fname; ?>" id="fname">

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>MIDDLE NAME <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text"  value="<?php echo $mi; ?>" id="mi">

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>SUFFIX NAME <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text"  id="suffix">
                                            </td>
                                        </tr>


                                        <tr>
                                            <td colspan="3">
                                                <div class="rowitem superflex">
                                                    <P>5.DATE OF BIRTH <span class="asterisk">*</span> (mm/dd/yy)</P>
                                                </div>
                                                <?php
                                                    $convertedDate = date("Y-m-d", strtotime($bdate));
                                                ?>
                                                <input type="date" class="noborder" value="<?php echo $convertedDate; ?>" id="bdate">
                                            </td>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <P>6.SEX <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="superflex">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="male" class="gender">
                                                            <p>MALE</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="female" class="gender">
                                                            <p>FEMALE</p>
                                                        </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="rowitem superflex">
                                                    <P>CIVIL STATUS <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="superflex">
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="single"  class="status_rs">
                                                        <p>Single</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="separated" class="status_rs">
                                                        <p>Separated</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="cohabitation" class="status_rs">
                                                        <p>Cohabitation (live-in)</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="married" class="status_rs">
                                                        <p>Married</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="widow">
                                                        <p>Widow/er</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="rowitem superflex">
                                                    <P>8. TYPE OF DISABILITY <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="twocolumns" >

                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="deaf">
                                                            <p>Deaf or Hard of Hearing</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="intellectual">
                                                            <p>Intellectual Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="learning">
                                                            <p>Learning Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="mental">
                                                            <p>Mental Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="physical">
                                                            <p>Physical Disability</p>
                                                        </div>
                                                        
                                                    </div>
    
                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="pyschosocial">
                                                            <p>Pyschosocial Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="speech">
                                                            <p>Speech and Language Impairement</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="visual">
                                                            <p>Visual Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="cancer">
                                                            <p>Cancer (RA11215)</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes_a" onclick="updateCheckBox(this)" name="new_type" id="rare">
                                                            <p>Rare Disease(RA10747)</p>
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <p style="visibility: hidden;">hidden</p>

                                            </td>

                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <P>9. CAUSE OF DISABILITY <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="twocolumns" >

                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="congenital">
                                                            <p>Congenital/Inborn</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="adhd">
                                                            <p>ADHD</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="cerebral">
                                                            <p>Cerebral</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="palsy">
                                                            <p>Central Palsy</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="down">
                                                            <p>Down Syndrome</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="cause_others_1">
                                                            <p>Others</p>
                                                            <input type="text" id="cause_others_1_input" style="width: 100%; border:none;" >
                                                        </div>
                                                        
                                                    </div>
    
                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="acquired">
                                                            <p>Acquired</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="chronic">
                                                            <p>Chronic Illness</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="cerebral">
                                                            <p>Cerebral Palsy</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="injury">
                                                            <p>Injury</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" class="checkboxes" onclick="updateCheckBox(this)" name="cause_new" id="cause_others_2">
                                                            <p>Others</p>
                                                            <input type="text" id="cause_others_2_input" style="width: 100%; border:none;" >
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <p style="visibility: hidden;">hidden</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="5">
                                                <p>10. RESIDENCE ADDRESS  <span class="asterisk">*</span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>House No. and Street <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" value="<?php echo $house ?>" id="house">
                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>Barangay<span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" value="<?php echo $brgy ?> " id="brgy">

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>Municipality <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" value="<?php echo "Lingayen" ?>" id="municipality">

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>Province <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" value="<?php echo "Pangasinan" ?>" id="province">
                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>Region <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" value="<?php echo "Region 1" ?>" id="region">
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="5">
                                                <p>11. CONTACT DETAILS  <span class="asterisk">*</span></p>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>Landline No. </p>
                                                </div>
                                                <input class="input" type="text" id="landline">

                                            </td>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>Mobile No.<span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" value="<?php echo $number ?>" id="number">

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>Email Address </p>
                                                </div>
                                                <input class="input" type="text" value="<?php echo $email ?>" id="email">

                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3">
                                                <div class="rowitem superflex">
                                                    <P>12. EDUCATIONAL ATTAINMENT <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="twocolumns" >

                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_educ" id="none">
                                                            <p>None</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_educ" id="kindergarten">
                                                            <p>Kindergarten</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_educ" id="elementary">
                                                            <p>Elementary</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_educ" id="junior">
                                                            <p>Junior High School</p>
                                                        </div>
                                                    </div>
    
                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_educ" id="senior">
                                                            <p>Senior High School</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_educ" id="college">
                                                            <p>College</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_educ" id="vocational">
                                                            <p>Vocational</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_educ" id="graduate">
                                                            <p>Post Graduate</p>
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                <p style="visibility: hidden;">hidden</p>
                                            </td>

                                            <td colspan="2" rowspan="3">
                                                <div class="rowitem superflex">
                                                    <P>14. OCCUPATION <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="twocolumns" >

                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="managers">
                                                            <p>Managers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="professional">
                                                            <p>Professional</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="technicians">
                                                            <p>Technicians and Associate Professionals</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="clerical">
                                                            <p>Clerical Support Workers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="service">
                                                            <p>Service and Sales Workers</p>
                                                        </div>

                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="agricultural">
                                                            <p>Skilled Agricultrual, Forestry and Fishery Workers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="trade">
                                                            <p>Craft and Related Trade Workers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="machine">
                                                            <p>Plant and Machine Operations and Assembers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="occupation">
                                                            <p>Elementary Occupation</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="forces">
                                                            <p>Armed Forces Occupation</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_job" id="job_others">
                                                            <p>Others</p>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <p style="visibility: hidden;">hidden</p>
                                                <p style="visibility: hidden;">hidden</p>
                                                <p style="visibility: hidden;">hidden</p>
                                                <p style="visibility: hidden;">hidden</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <P>13. STATUS OF EMPLOYMENT <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="twocolumns" >

                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="radio" name="newStatus" id="employed">
                                                            <p>Employed</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="newStatus" id="unemployed">
                                                            <p>Unemployed</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="newStatus" id="selfemployed">
                                                            <p>Self-employed</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p style="visibility: hidden;">hidden</p>
                                            </td>
                                            <td rowspan="2">
                                                <div class="rowitem superflex">
                                                    <P>13. TYPES OF EMPLOYMENT <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="twocolumns" >
                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="regular">
                                                            <p>Permanent / Regular</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="seasonal">
                                                            <p>Seasonal</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="casual">
                                                            <p>Casual</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="emergency">
                                                            <p>Emergency</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p style="visibility: hidden;">hidden</p>
                                                <p style="visibility: hidden;">hidden</p>
                                                <p style="visibility: hidden;">hidden</p>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <P>13. CATEGORY OF EMPLOYMENT <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="twocolumns" >

                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_category" id="government">
                                                            <p>Goverment</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new_category" id="private">
                                                            <p>Private</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p style="visibility: hidden;">hidden</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="5">
                                                <div class="rowitem superflex">
                                                    <P>15. ORGANIZATION INFORMATION: </P>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>Organization Affiliated: </p>
                                                </div>
                                                <input class="input" type="text" id="organization">

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>Contact Person</p>
                                                </div>
                                                <input class="input" type="text" id="contact">

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>Office Address</p>
                                                </div>
                                                <input class="input" type="text" id="office">

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>Tel No.:</p>
                                                </div>
                                                <input class="input" type="text" id="tel">

                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="5">
                                                <div class="rowitem superflex">
                                                    <P>16. ID REFERENCE NO.: </P>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>SSS NO.: </p>
                                                </div>
                                                <input class="input" type="text" id="sss">

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>GSIS NO.:</p>
                                                </div>
                                                <input class="input" type="text" id="gsis">

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>PAG-IBIG NO.:</p>
                                                </div>
                                                <input class="input" type="text" id="pagibig">

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>PSN NO.:</p>
                                                </div>
                                                <input class="input" type="text" id="psn">
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>PhilHealth NO.:</p>
                                                </div>
                                                <input class="input" type="text" id="philhealth">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>17. FAMILY BACKGROUND </p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p class="text-center">LAST NAME</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p class="text-center">FIRST NAME</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p class="text-center">MIDDLE NAME</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>FATHER'S NAME:</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="fathers_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="fathers_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="fathers_mname">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>MOTHER'S NAME:</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="mothers_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="mothers_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="mothers_mname">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>GUARDIAN'S NAME:</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <input class="input" type="text" name="" id="guardian_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <input class="input" type="text" name="" id="guardian_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <input class="input" type="text" name="" id="guardian_mname">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>18. ACCOMPLISHED BY: <span class="asterisk">*</span> </p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p class="text-center">LAST NAME</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p class="text-center">FIRST NAME</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p class="text-center">MIDDLE NAME</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" rowspan="3">
                                                <div class="rowitem superflex">
                                                    <input type="radio" name="guard" id="radio_applicant">
                                                    <p>APPLICANT</p>
                                                </div>
                                                <div class="rowitem superflex">
                                                    <input type="radio" name="guard" id="radio_guardian">
                                                    <p>GUARDIAN</p>
                                                </div>
                                                <div class="rowitem superflex">
                                                    <input type="radio" name="guard" id="radio_representative">
                                                    <p>REPRESENTATIVE</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="aoplicant_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="aoplicant_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="aoplicant_mname">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="guardian_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="guardian_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="guardian_mname">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="representative_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="representative_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="representative_mname">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>19. NAME OF CERYIFYING PHYSICIAN: </p>
                                                </div>
                                                <p>LICENSE NO.</p>
                                                <input type="text" class="input">
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="license_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="license_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="license_mname">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>PROCESSING OFFICER: <span class="asterisk">*</span></p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="officer_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="officer_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="officer_mname">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>APPROVING OFFICER: <span class="asterisk">*</span></p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="approving_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="approving_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="approving_mname">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>ENCODER: <span class="asterisk">*</span></p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="encoder_lname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="encoder_fname">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="encoder_mname">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="rowitem superflex">
                                                    <p>NAME OF REPORTING UNIT(OFFICE/SECTION): <span class="asterisk">*</span></p>
                                                    <input class="input" type="text" name="" id="reporting_unit">
                                                </div>
                                            </td>
                                           
                                        </tr>

                                        <tr>
                                            <td colspan="5">
                                                <div class="rowitem superflex">
                                                    <p>CONTROL NO: <span class="asterisk">*</span></p>
                                                    <input class="input" type="text" name="" id="control_number">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                       

                                   </table>
                                 

                          
                            </div>
                        </div>
                    </div>

                </div>
        </div>

            <div class="content ">
                <div class="container-fluid">
                    <div class="row" style="display: flex;
                    justify-content: center;
                    align-items: center;
                    ">
                        <div class="col-md-8">
                            <div class="card certcontent" >
                                <div class="header" style="text-align: center;">
                                    <h4 class="title">CERTIFICATION OF DISABILITY</h4>
                                </div>
                                <table class="certificate">
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr>
                                        <td style="text-indent: 10%;">
                                            This is to certify that <input type="text" style="width: 22%;" id="fullname">, residents of <input type="text" style="width: 30%;" id="full_address">  </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="flexitem">
                                                <p style="padding-left: 38%;">
                                                    name
                                                </p>
                                                <p  style="padding-left: 22%;">
                                                    House No., Barangay, Town, Municipality
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >of the province of <input type="text" style="width: 30%;" id="full_province">, in <input type="text" style="width: 25%;" id="full_region">, had voluntarily submitted</td>
                                    </tr>
                                    <tr>
                                        <td>herself/himself to this facility/clinic/office with regard to the nature of disability due to the currently functional</td>
                                    </tr>
                                    <tr>
                                        <td> limitation currently experienced by the here in patient.</td>
                                    </tr>
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr>
                                        <td style="text-indent: 10%;">
                                            Based on the personal interview and medical assessment conducted by here in physician the patient has <input type="text" value="" id="full_disease"> Accompanied by <input type="text" name="" id="another_disease"  style="width: 40%;">, which results to Difficulty 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="flexitem">
                                            <p style="padding-left: 8%;">Diagnosis</p> 
                                            <p style="padding-left: 35%;"> Describe the health condition </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                             in (e.g. walking, seeing) and therefore considered as person with <input type="text" name="" id="type_disability" style="width: 40%;" > 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="padding-left: 70%;">Type of Disability</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>as classifed by the Department of health Adminstrative Order No. 2009-011.</td>
                                    </tr>
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr>
                                        <td style="text-indent: 10%;">
                                            This certification is issued on <input type="text" id="issue_date"> at <input type="text" id="requirement"> in compliance with the requirement in issuance of ID for the twenty percent(20%) discounts for Persons with disabilities mandated by Republic Act No. 9442 or Magna Carta for Persons with Disabilities.
                                        </td>
                                    </tr>
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr>
                                        <td>Signed</td>
                                    </tr>
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr><td><input type="text" class="myinput" id="mynameInput"></td></tr>
                                    <tr><td >Name of Physician: <span class="myinput" id="physician_name"></span> </td></tr>
                                    <tr><td>License Number: <span class="myinput" id="physician_number"></span></td></tr>
                                    <tr style="border:none">
                                        <td  style=" width:100%; border:none; margin:auto;text-align:center;">
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

    function goSuccess(){
        demo.goNotif('Successfully',' Update','success','pe-7s-add-user')
    }
    function goError(){
        demo.goNotif('Error',' Update','success','pe-7s-delete-user')
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
    
    function submitForm() {
        const mainObj = {}
        const inputs = document.querySelectorAll('table input');
        inputs.forEach(input => {
        if (input.type === 'checkbox') {
            mainObj[input.id] = input.checked;
        } else if (input.type === 'text') {
            mainObj[input.id] = input.value
        }else if((input.type === 'radio'))
            mainObj[input.id] = input.checked
        else{
            mainObj[input.id] = input.value
        }
        });
        
        const url = new URLSearchParams(window.location.search);
        const id = url.get('id');
        const action = url.get('action');
        
        const objStr = JSON.stringify(mainObj);
        const formData = new FormData();
        formData.append('data', objStr);
        formData.append('action', action);
        formData.append('user_id', id);
        formData.append('noimage', true);
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

    function readData(){
        const url = new URLSearchParams(window.location.search);
        const id = url.get('id');
        fetch(`./backend/forms_submit.php?user_id=${id}`,{
            method: 'GET'
        })
        .then( response => response.json())
        .then( result => {
            const data = result['data'];
            let objectData = JSON.parse(data);
            for (const key in objectData) {
                if (objectData.hasOwnProperty(key)) {
                    const value = objectData[key];
                    const item = document.getElementById(key);

                    if (item && item.tagName === "INPUT") {
                        if (item.type === "checkbox") {
                            // It's a checkbox input
                            item.checked = value === "on"; // Set the checkbox value based on your data
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

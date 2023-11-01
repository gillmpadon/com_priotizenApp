
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
            include('./backend/connection.php');
            $admin_id = json_encode($_SESSION['user_id']);
            $class="user_add";
            include('includes/sidebar.php'); ?>
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
                                                <input type="text" class="noleft notop nobottom" id="lname">
                                                <input type="text" class="noleft notop nobottom" id="fname">
                                                <input type="text" class="noleft notop nobottom" id="mname">
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
                                            <img src="../priotizen_app/user_img/123.jpg" alt="" style="height: 100%; width:100%;">
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
                                                <input type="text" class="noleft notop nobottom" id="region">
                                                <input type="text" class="noleft notop nobottom" id="province">
                                                <input type="text" class="noleft notop nobottom" id="municipality">
                                                <input type="text" class="noleft notop nobottom noright" id="brgy">
                                            </div>
                                            <div class="input-text bg-gray">
                                                <p>Region</p>
                                                <p>Province</p>
                                                <p>City Municipality</p>
                                                <p>Barangay</p>
                                            </div>
                                            <div class="inputs">
                                                <input type="text" class="noleft notop nobottom" style="width: 180%;" id="house">
                                                <input type="text" class="noleft notop nobottom noright" id="street">
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
                                            <div class="top">
                                                <input type="text" id="birth00">
                                                <input type="text" id="birth01">
                                                <input type="text" id="birth10">
                                                <input type="text" id="birth11">
                                                <input type="text" id="birth20">
                                                <input type="text" id="birth02">
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
                                            <input type="text" class="inputs nobottom noleft noright notop" id="status">
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
                                            <input type="text" class="inputs nobottom noleft noright notop" id="sex">
                                        </td>
                                        <td class="bg-gray">
                                            7. Contact Number
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="contact">
                                        </td>
                                        <td class="bg-gray">
                                            8. Email Address
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop" id="email">
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
                                                <input type="checkbox" name="" id="tavel_yes">
                                                <p>YES</p>
                                           </div>
                                           <div class="checkbox-input">
                                                <input type="checkbox" name="" id="travel_no">
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
                                                    <input type="text" class="children_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="children_isworking">
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
                                                    <input type="text" class="children_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="children_isworking">
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
                                                    <input type="text" class="children_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="children_isworking">
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
                                                    <input type="text" class="children_age">
                                                </div>
                                                <div class="entry">
                                                    <input type="text" class="children_isworking">
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
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e1" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e2" >
                                                        <p>High School Level</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e3" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e4" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e5" >
                                                        <p>College Level</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e6" >
                                                        <p>Vocational</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e7" >
                                                        <p>High School Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e8" >
                                                        <p>College Graduate</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="educ_checkbox" name="" id="e9">
                                                        <p>No Attended School</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="middle narrow">
                                                <div class="midentry bg-gray">
                                                    28. Share Skill (Community Service)
                                                </div>
                                                <div class="midentry">
                                                    <input type="checkbox" name="" id="skill1">
                                                    <p>1</p>
                                                    <input type="text" name="" id="skill1_input">
                                                </div>
                                                <div class="midentry">
                                                <input type="checkbox" name="" id="skill2">
                                                    <p>2</p>
                                                    <input type="text" name="" id="skill2_input">
                                                </div>
                                                <div class="midentry" id="nobottom">
                                                <input type="checkbox" name="" id="skill3">
                                                    <p>3</p>
                                                    <input type="text" name="" id="skill3_input">
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3" rowspan="2">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t1" >
                                                        <p>Medical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t2" >
                                                        <p>Dental</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t3" >
                                                        <p>Fishing</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t4" >
                                                        <p>Engineering</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t5" >
                                                        <p>Barber</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t6" >
                                                        <p>Evangelization</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t7" >
                                                        <p>Teaching</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t8" >
                                                        <p>Counselling</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t9" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t10" >
                                                        <p>Carpenter</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t11" >
                                                        <p>Masson</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t12" >
                                                        <p>Tailor</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t13" >
                                                        <p>Legal Services</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t14" >
                                                        <p>Farming</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t15" >
                                                        <p>Arts</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t16" >
                                                        <p>Plumber</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t17" >
                                                        <p>Sapatero</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t18" >
                                                        <p>Chef/Cook</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           

                                            <div class="checks">
                                                <div class="checks-entry lastentry">
                                                    <div class="last ">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t19" >
                                                        <p>Millwright</p>
                                                    </div>
                                                    <div class="last " id="norights">
                                                        <input type="checkbox" class="technical_checkbox" name="" id="t20" >
                                                        <p>Others, specify</p>
                                                    </div>
                                                    <div class="last">
                                                        <input type="text" name="" id="t20_input" >
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
                                                        <input type="checkbox" class="community_checkbox" name="" id="c1" >
                                                        <p>Medical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c2" >
                                                        <p>Community / Organization Leader</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c3" >
                                                        <p>Neighborhood Support Services</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c4" >
                                                        <p>Counseling Referral</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c5" >
                                                        <p>Rosource Volunter</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c6" >
                                                        <p>Dental</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c7" >
                                                        <p>Legal Services</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c8" >
                                                        <p>Sponsorship</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c9" >
                                                        <p>Community Beautification</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c10" >
                                                        <p>Friendly Visits</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c11" >
                                                        <p>Religious</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" class="community_checkbox" name="" id="c12" >
                                                        <p>Others, specify</p>
                                                        <input type="text" name="" id="c12_input">
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
                                                    <input type="checkbox" class="income_checkbox" name="" id="i1" >
                                                    <p>Alone</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" name="" id="i2" >
                                                    <p>Spouse</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" name="" id="i3" >
                                                    <p>Child(ren)</p>
                                                </div>
                                                
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" name="" id="i4" >
                                                    <p>Grand Child(ren)</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" name="" id="i5" >
                                                    <p>In-law(s)</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" name="" id="i6" >
                                                    <p>Relative(s)</p>
                                                </div>
                                               
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" name="" id="i7" >
                                                    <p>Common Law Spouse</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" name="" id="i8" >
                                                    <p>Care Institution</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" class="income_checkbox" name="" id="i9" >
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
                                                    <input type="checkbox" class="income_checkbox" name="" id="i10" >
                                                    <p>Others, pls specify</p>
                                                    <input type="text" name="" id="i10_input">
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="2">
                                            <div class="checks-entry narrow">
                                                <div class="entries">
                                                    <input type="checkbox" class="personal_checkbox" name="" id="p7" >
                                                    <p>Others, pls specify</p>
                                                    <input type="text" name="" id="p7_input">
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
                                                        <input type="checkbox" class="source_checkout" name="" id="s1" >
                                                        <p>Own earnigns, salary/ wages</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s2" >
                                                        <p>Depended on children/ relatives</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s3" >
                                                        <p>Spouse's Pension</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s4" >
                                                        <p>Livestock / orchard / farm</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s5" >
                                                        <p>Own Pension</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s6" >
                                                        <p>Spouse's salary</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s7" >
                                                        <p>Rentals / sharecrops</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s8" >
                                                        <p>Fishing</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s9" >
                                                        <p>Stocs / Dividends</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s10" >
                                                        <p>Insurance</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s11" >
                                                        <p>Savings</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" class="source_checkout" name="" id="s12" >
                                                        <p>Others, specify</p>
                                                        <input type="text" name="" id="">
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
                                                        <input type="checkbox" name="" id="" >
                                                        <p>House</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Lot / Farmland</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>House & Lot</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checks"> 
                                                <div class="checks-entry narrow" style="width: 100%;">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Commercial Building</p>
                                                        <input type="text">
                                                    </div>
                                                    
                                                </div>
                                               
                                                <div class="checks-entry narrow" style="width: 50%;">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Fishpond / resort</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others, specify</p>
                                                        <input type="text">
                                                    </div>
                                                    
                                                </div>
                                               
                                                
                                            </div>
                                        </td>
                                        <td colspan="3">
                                            <div class="checks ">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Automobile</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Personal Computer</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Boarts</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Heavy Equipment</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Laptops</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Drones</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Motorcycle</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Mobile Phones</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Specify</p>
                                                    </div>
                                                </div>
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
                                                        <input type="checkbox" name="" id="" >
                                                        <p>60,000 and above</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>50,000 to 60,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>40,000 to 50,000</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>30,000 to 40,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>20,000 to 30,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>10,000 to 20,000</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow ">
                                                    <div class="entries onlybottom ">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>5,000 to 10,000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>1,000 to 5000</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Below 1,000</p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            
                                            <div class="entries ">
                                                <input type="checkbox" name="" id="" >
                                                <p>Others, specify</p>
                                                <input type="text" name="" id="">
                                            </div>
                                            <br>
                                        </td>
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Lack of income / resources</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Loss of income / resources</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Skills / capability training</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Livelihood opportunities</p>
                                                    </div>
                                                    <div class="entries ">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others, specify</p>
                                                        <input type="text" name="" id="">
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
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Blood Type</p>
                                                        <input type="checkbox" name="" id="">
                                                        <p>O</p>
                                                        <input type="checkbox" name="" id="">
                                                        <p>A</p>
                                                        <input type="checkbox" name="" id="">
                                                        <p>B</p>
                                                        <input type="checkbox" name="" id="">
                                                        <p>AB</p>
                                                        <input type="checkbox" name="" id="">
                                                        <p>Don't know</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Physical Disability</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Health problems / ailments</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Hypertension</p>
                                                        <input type="checkbox" name="" id="">
                                                        <p>Arthritis / Goul</p>
                                                        <input type="checkbox" name="" id="">
                                                        <p>Coronary Heart Disease</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Diabetes</p>
                                                        <input type="checkbox" name="" id="">
                                                        <p>Chronic Kidney Disease</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Alzheimer's / Dementia</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Chronic Obstructive Pulmonary Disease</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others, pls specify</p>
                                                    </div>
                                                    <div class="entries bg-gray">
                                                        <p>38. Dental Concern</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Needs Dental Care</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others</p>
                                                    </div>
                                                    <div class="entries bg-gray">
                                                        <p>39. Optical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Eye impairment</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Needs eye care</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others</p>
                                                    </div>
                                                   
                                                </div>
                                                
                                            </div>
                                        </td>
                                            
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow" >
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Aural impairment / Hearing impairement</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others</p>
                                                    </div>
                                                    <div class="entries onlybottom bg-gray">
                                                        <p>41. Social/Emotional</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Feeling neglect / rejection</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Feeling helplessness / worthlessness</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Feeling loneliness / isolate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Lack of leisure / recreational activities</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Lack SC friendly environment</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others, specify</p>
                                                        <input type="text" name="" id="">
                                                    </div>
                                                    <div class="entries onlybottom bg-gray">
                                                        <p>42. Area / Difficulty</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High cost of medicines</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Lack of medicines</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Lack of medical attention</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others</p>
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
                                                        <input type="text" name="" id="">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" name="" id="">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="text" name="" id="">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" name="" id="">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" name="" id="">
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="text" name="" id="">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" name="" id="">
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="text" name="" id="">
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
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Yes</p>
                                                    <input type="checkbox" name="" id="" >
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
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
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
                                                    <input type="text">
                                                    <p>Name and Signaure of Senior Citizen</p>
                                                </div>
                                                <div class="attach">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 12c0-4.714 0-7.071 1.464-8.536C4.93 2 7.286 2 12 2c4.714 0 7.071 0 8.535 1.464C22 4.93 22 7.286 22 12c0 4.714 0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12Z"/><circle cx="16" cy="8" r="2" opacity=".5"/><path stroke-linecap="round" d="m2 12.5l1.752-1.533a2.3 2.3 0 0 1 3.14.105l4.29 4.29a2 2 0 0 0 2.564.222l.299-.21a3 3 0 0 1 3.731.225L21 18.5" opacity=".5"/></g></svg>
                                                </div>
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
        demo.goNotif('Successfully',' Created','success','pe-7s-add-user')
    }
    function goError(){
        demo.goNotif('Error',' Creation','success','pe-7s-delete-user')
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

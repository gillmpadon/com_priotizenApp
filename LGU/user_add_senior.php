
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
    <link href="assets/css/senior.css" rel="stylesheet" />
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
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom noright">
                                            </div>
                                            <div class="input-text">
                                                <p>Last Name</p>
                                                <p>First Name</p>
                                                <p>Middle Name</p>
                                                <p>Extension</p>
                                            </div>
                                        </td>
                                        <td rowspan="3" class="bg-gray">
                                            photo
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
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom noright">
                                            </div>
                                            <div class="input-text bg-gray">
                                                <p>Region</p>
                                                <p>Province</p>
                                                <p>City Municipality</p>
                                                <p>Barangay</p>
                                            </div>
                                            <div class="inputs">
                                                <input type="text" class="noleft notop nobottom" style="width: 180%;">
                                                <input type="text" class="noleft notop nobottom noright">
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
                                                <input type="text">
                                                <input type="text">
                                                <input type="text">
                                                <input type="text">
                                                <input type="text">
                                                <input type="text">
                                            </div>
                                            <div class="bot">
                                                <input type="text" placeholder="m">
                                                <input type="text" placeholder="m">
                                                <input type="text" placeholder="d">
                                                <input type="text" placeholder="d">
                                                <input type="text" placeholder="y">
                                                <input type="text" placeholder="y">
                                            </div>
                                        </td>
                                        <td class="bg-gray">
                                            4. Place of Birth
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            5. Marital Status
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
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
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            7. Contact Number
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            8. Email Address
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
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
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            10. Ethnic Origin
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            11. Language Spoken/Written
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
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
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            13. GSIS/SSS
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            14. TIN
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
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
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            16. SC Association/ Org ID No.
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            17. Other Gov't. ID
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
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
                                                <input type="checkbox" name="" id="">
                                                <p>YES</p>
                                           </div>
                                           <div class="checkbox-input">
                                                <input type="checkbox" name="" id="">
                                                <p>NO</p>
                                            </div>
                                           </div>
                                        </td>
                                        <td class="bg-gray">
                                            19. Service/Business (specify)
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
                                        </td>
                                        <td class="bg-gray">
                                            20. Current Pension (specify)
                                        </td>
                                        <td>
                                            <input type="text" class="inputs nobottom noleft noright notop">
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
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom noright">
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
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom noright">
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
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom">
                                                <input type="text" class="noleft notop nobottom noright">
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
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>25. Other Dependants</td>
                                        <td colspan="5">
                                            
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="header">
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
                                                </div>
                                                <div class="entry">
                                                    <input type="text">
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
                                        <td colspan="6" class="black text-white">II. FAMILY COMPOSITION</td>
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
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School Level</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>College Level</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Vocational</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>College Graduate</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>No Attended School</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="middle narrow">
                                                <div class="midentry bg-gray">
                                                    28. Share Skill (Community Service)
                                                </div>
                                                <div class="midentry">
                                                    <input type="checkbox" name="" id="">
                                                    <p>1</p>
                                                    <input type="text" name="" id="">
                                                </div>
                                                <div class="midentry">
                                                    <input type="checkbox" name="" id="">
                                                    <p>2</p>
                                                    <input type="text" name="" id="">
                                                </div>
                                                <div class="midentry" id="nobottom">
                                                    <input type="checkbox" name="" id="">
                                                    <p>3</p>
                                                    <input type="text" name="" id="">
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3" rowspan="2">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Medical</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Dental</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Fishing</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Engineering</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Barber</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Evangelization</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Teaching</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Counseling</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Cooking</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           

                                            <div class="checks">
                                                <div class="checks-entry lastentry">
                                                    <div class="last ">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Millwright</p>
                                                    </div>
                                                    <div class="last " id="norights">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Others, specify</p>
                                                    </div>
                                                    <div class="last">
                                                        <input type="text" name="" id="" >
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="black text-white">II. FAMILY COMPOSITION</td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>College Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Vocational</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>College Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>No Attended School</p>
                                                    </div>
                                                    <div class="entries">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="black text-white">II. FAMILY COMPOSITION</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="bg-gray">30. Libing/Residing with</td>
                                        <td colspan="3" class="bg-gray">31. Household Condition</td>
                                    </tr>
                                    <tr>
                                       <td colspan="4">
                                        <div class="checks">
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>High School Level</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Post Graduate</p>
                                                </div>
                                                
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Graduate</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>College Level</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Vocational</p>
                                                </div>
                                               
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>High School</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>College Graduate</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>No Attended School</p>
                                                </div>
                                            </div>
                                        </div>
                                       </td>
                                       
                                       <td colspan="2">
                                        <div class="checks">
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>High School Level</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>College Level</p>
                                                </div>
                                            </div>
                                            <div class="checks-entry narrow">
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Graduate</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>College Level</p>
                                                </div>
                                                <div class="entries onlybottom">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>College Level</p>
                                                </div>
                                               
                                            </div>
                                           
                                        </div>
                                       </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">
                                            <div class="checks-entry narrow">
                                                <div class="entries ">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Others, pls specify</p>
                                                    <input type="text" name="" id="">
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="2">
                                            <div class="checks-entry narrow">
                                                <div class="entries">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Others, pls specify</p>
                                                    <input type="text" name="" id="">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="black text-white">II. FAMILY COMPOSITION</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="bg-gray">32. Source of Income and Assistance</td>
                                    </tr>

                                    <tr>
                                        <td colspan="6">
                                            <div class="checks ">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Post Graduate</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>College Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Vocational</p>
                                                    </div>
                                                   
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>College Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>No Attended School</p>
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
                                                <div class="checks-entry">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checks"> 
                                                <div class="checks-entry" style="width: 100%;">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                        <input type="text">
                                                    </div>
                                                    
                                                </div>
                                               
                                                <div class="checks-entry" style="width: 50%;">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checks">
                                                <div class="checks-entry">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                        <input type="text">
                                                    </div>
                                                    
                                                </div>
                                               
                                                
                                            </div>
                                        </td>
                                        <td colspan="3">
                                            <div class="checks ">
                                                <div class="checks-entry">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
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
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Graduate</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="checks-entry narrow ">
                                                    <div class="entries onlybottom ">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>High School</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            
                                            <div class="entries ">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                            </div>
                                            <br>
                                        </td>
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow">
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries ">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
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
                                            35. Monthly Income
                                        </td>
                                        <td colspan="3" class="bg-gray">
                                            36. Problems/ Need Commonly Encounter
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow" >
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries bg-gray">
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries bg-gray">
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                   
                                                </div>
                                                
                                            </div>
                                        </td>
                                            
                                        <td colspan="3">
                                            <div class="checks">
                                                <div class="checks-entry narrow" >
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom bg-gray">
                                                        <p>41. Social/Emotional</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom bg-gray">
                                                        <p>41. Social/Emotional</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
                                                    </div>
                                                    <div class="entries onlybottom">
                                                        <input type="checkbox" name="" id="" >
                                                        <p>Elementary Level</p>
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
                                        <td colspan="2">
                                            44. Do you have a scheduled medical/physical checkup?
                                        </td>
                                        <td colspan="4" class="bg-gray">
                                           <div class="checks">
                                            <div class="checks-entry " >
                                                <div class="entries ">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
                                                </div>
                                            </div>
                                            <div class="checks-entry " >
                                                <div class="entries ">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
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
                                            <div class="checks-entry " >
                                                <div class="entries ">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
                                                </div>
                                            </div>
                                            <div class="checks-entry " >
                                                <div class="entries ">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
                                                </div>
                                            </div>
                                            <div class="checks-entry " >
                                                <div class="entries ">
                                                    <input type="checkbox" name="" id="" >
                                                    <p>Elementary Level</p>
                                                </div>
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
        demo.goNotif('Successfully',' Created','success','pe-7s-add-user')
    }
    function goError(){
        demo.goNotif('Error',' Creation','success','pe-7s-delete-user')
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


    let sfname = document.getElementById('fname')
    let smi = document.getElementById('mi');
    let slname = document.getElementById('lname');
    let semail = document.getElementById('email');
    sfname.addEventListener('keyup', (e)=>document.getElementById('setFname').textContent = e.target.value)
    smi.addEventListener('keyup', (e)=>document.getElementById('setMi').textContent = e.target.value)
    slname.addEventListener('keyup', (e)=>document.getElementById('setLname').textContent = e.target.value)
    semail.addEventListener('keyup', (e)=>document.getElementById('setEmail').textContent = e.target.value)
    
    const setImage = document.getElementById('setImage')
    setImage.addEventListener('click', ()=>{
        imageInput.click()
        console.log("Image is clicked")
    })

    const imageInput = document.getElementById('imageInput');
    imageInput.addEventListener('change', e=>{
        if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    setImage.src = e.target.result;
                };
                reader.readAsDataURL(imageInput.files[0]);
            }
    })

    function generateUID() {
    return Math.random().toString(36).substring(2);
    }
    
    const user_id = generateUID()
    const admin_id = <?php echo $admin_id ?>;
    let app_id = document.getElementById('app_id')
    app_id.value =user_id

    console.log({ user_id, admin_id });

    function createProfile(){
    const fname = document.getElementById('fname').value
    const mi = document.getElementById('mi').value;
    const lname = document.getElementById('lname').value;
    const email = document.getElementById('email').value;
    const gender = document.getElementById('gender').value
    const status = document.getElementById('status').value
    const bdate = document.getElementById('bdate').value
    const address = document.getElementById('address').value
    const number = document.getElementById('number').value
    const condition = document.getElementById('condition').value
    const brgy = document.getElementById('brgy').value
    const family_contact = document.getElementById('family_contact').value
    const family_name = document.getElementById('family_name').value
    const valid_id = document.getElementById('valid_id').value
    const image = document.getElementById('imageInput')

    const formData = new FormData();

    formData.append('fname', fname)
    formData.append('mi', mi)
    formData.append('lname', lname)
    formData.append('email', email)
    formData.append('gender', gender)
    formData.append('status', status)
    formData.append('bdate', bdate)
    formData.append('address', address)
    formData.append('number', number)
    formData.append('condition', condition)
    formData.append('brgy', brgy)
    formData.append('family_contact', family_contact)
    formData.append('family_name', family_name)
    formData.append('app_id', user_id)
    formData.append('admin_id', admin_id)
    formData.append('valid_id', valid_id)
    formData.append('image', image.files[0]);

    fetch('./backend/user.php',{
        method: 'POST',
        body: formData
    })
    .then( response => response.json())
    .then( result =>{
        if(result=="Successful"){
            goSuccess()
            setTimeout(()=>{
                if(condition == "disabled"){
                    window.location.href="table.php"
                }else{
                    window.location.href="table.php"
                }
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

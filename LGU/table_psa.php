
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
    .maincontent{
        box-sizing: border-box;
    }
    table {
        width: 100%;
        max-width: 100%;
        border: 1px solid black ;
        box-sizing: border-box;
        table-layout: fixed;
    }

    tr, td{
        border: 1px solid black ;
    }
    td{
        padding-inline: .5em;
    }
    .noborder{
        border: none;
    }

    .superflex {
        display: flex;
        align-items: baseline;
        gap: 1em;
    }
    .flexitem {
        display: flex;
        gap: 1em;
        align-items: baseline;
        margin-right: 2em;
    }

    .asterisk{
        color: red;
    }

    .input{
        border: none;
        line-height: 0;
        margin-left: 1em;
        box-sizing: border-box;
        width: 90%;
    }
    table p{
        font-size: .8em;
    }

    .checkboxDiv{
        line-height: 0;
        margin: 0;
    }
    .checkboxDiv div{
        height: 1em;
    }

    .twocolumns{
        display: flex;
    }

    .certcontent{
        padding: 1em;
    }

    /* certificate */
    .certificate, .certificate tr, .certificate td{
        border: none;
    }
    .certificate input{
        border: none;
        border-bottom: 1px solid black;
    }

    </style>
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
                                                        <input type="radio" name="applicant" id="">
                                                        <p>NEW APPLICANT</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="applicant" id="">
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
                                                <img src="../priotizen_app/user_img/123.jpg" alt="" style="height: 100%; width:100%;">
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
                                                <input class="input" type="text" >

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>FIRST NAME <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>MIDDLE NAME <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>SUFFIX NAME <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" >
                                            </td>
                                        </tr>


                                        <tr>
                                            <td colspan="3">
                                                <div class="rowitem superflex">
                                                    <P>5.DATE OF BIRTH <span class="asterisk">*</span> (mm/dd/yy)</P>
                                                </div>
                                                <input type="date" class="noborder">
                                            </td>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <P>6.SEX <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="superflex">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>MALE</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
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
                                                        <input type="radio" name="new" id="">
                                                        <p>Single</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="">
                                                        <p>Separated</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="">
                                                        <p>Cohabitation (live-in)</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="">
                                                        <p>Married</p>
                                                    </div>
                                                    <div class="flexitem">
                                                        <input type="radio" name="new" id="">
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
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Deaf or Hard of Hearing</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Intellectual Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Learning Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Mental Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Physical Disability</p>
                                                        </div>
                                                        
                                                    </div>
    
                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Deaf or Hard of Hearing</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Intellectual Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Learning Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Mental Disability</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Physical Disability</p>
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
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Congenital/Inborn</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>ADHD</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Cerebral</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Central Palsy</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Down Syndrome</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Others</p>
                                                        </div>
                                                        
                                                    </div>
    
                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Acquired</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Chronic Illness</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Cerebral Palsy</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Injury</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="checkbox" name="new" id="">
                                                            <p>Others</p>
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
                                                <input class="input" type="text" >

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>Barangay<span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>Municipality <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>Province <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" >
                                            </td>
                                            <td>
                                                <div class="rowitem superflex">
                                                    <p>Region <span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" >
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
                                                <input class="input" type="text" >

                                            </td>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>Mobile No.<span class="asterisk">*</span></p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>Email Address </p>
                                                </div>
                                                <input class="input" type="text" >

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
                                                            <input type="radio" name="new" id="">
                                                            <p>None</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Kindergarten</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Elementary</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Junior High School</p>
                                                        </div>
                                                    </div>
    
                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Senior High School</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>College</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Vocational</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
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
                                                            <input type="radio" name="new" id="">
                                                            <p>Managers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Professional</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Technicians and Associate Professionals</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Clerical Support Workers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Service and Sales Workers</p>
                                                        </div>

                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Skilled Agricultrual, Forestry and Fishery Workers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Craft and Related Trade Workers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Plant and Machine Operations and Assembers</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Elementary Occupation</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Armed Forces Occupation</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
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
                                                            <input type="radio" name="new" id="">
                                                            <p>Employed</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Unemployed</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
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
                                                            <input type="radio" name="new" id="">
                                                            <p>Employed</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Unemployed</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Self-employed</p>
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
                                                    <P>13. STATUS OF EMPLOYMENT <span class="asterisk">*</span></P>
                                                </div>
                                                <div class="twocolumns" >

                                                    <div class="checkboxDiv">
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
                                                            <p>Goverment</p>
                                                        </div>
                                                        <div class="flexitem">
                                                            <input type="radio" name="new" id="">
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
                                                <input class="input" type="text" >

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>Contact Person</p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>Office Address</p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>Tel No.:</p>
                                                </div>
                                                <input class="input" type="text" >

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
                                                <input class="input" type="text" >

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>GSIS NO.:</p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>PAG-IBIG NO.:</p>
                                                </div>
                                                <input class="input" type="text" >

                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>PSN NO.:</p>
                                                </div>
                                                <input class="input" type="text" >
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <p>PhilHealth NO.:</p>
                                                </div>
                                                <input class="input" type="text" >

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
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
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
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
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
                                                    <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <input class="input" type="text" name="" id="">
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
                                                    <input type="radio" name="" id="">
                                                    <p>APPLICANT</p>
                                                </div>
                                                <div class="rowitem superflex">
                                                    <input type="radio" name="" id="">
                                                    <p>GUERDIAN</p>
                                                </div>
                                                <div class="rowitem superflex">
                                                    <input type="radio" name="" id="">
                                                    <p>REPRESENTATIVE</p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                            <td >
                                                <div class="rowitem superflex">
                                                    <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                    <input class="input" type="text" name="" id="">
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
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="rowitem superflex">
                                                    <p>PROCESSING OFFICER: <span class="asterisk">*</span></p>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
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
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
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
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="rowitem superflex">
                                                     <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="rowitem superflex">
                                                    <p>NAME OF REPORTING UNIT(OFFICE/SECTION): <span class="asterisk">*</span></p>
                                                    <input class="input" type="text" name="" id="">
                                                </div>
                                            </td>
                                           
                                        </tr>

                                        <tr>
                                            <td colspan="5">
                                                <div class="rowitem superflex">
                                                    <p>CONTROL NO: <span class="asterisk">*</span></p>
                                                    <input class="input" type="text" name="" id="">
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
                                            This is to certify that <input type="text" style="width: 22%;">, residents of <input type="text" style="width: 30%;">  </td>
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
                                        <td >of the province of <input type="text" style="width: 30%;">, in <input type="text" style="width: 25%;">, had voluntarily submitted</td>
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
                                            Based on the personal interview and medical assessment conducted by herein physician <input type="text"> the patient has Accompanied by <input type="text" name="" id="">, which results to Difficulty 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="flexitem">
                                            <p style="padding-left: 8%;">Diagnosis</p> 
                                            <p style="padding-left: 38%;"> Describe the health condition </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                             in (e.g. walking, seeing) and therefore considered as person with <input type="text" name="" id="" style="width: 40%;"> 
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
                                            This certification is issued on <input type="text"> at <input type="text"> in compliance with the requirement in issuance of ID for the twenty percent(20%) discounts for Persons with disabilities mandated by Republic Act No. 9442 or Magna Carta for Persons with Disabilities.
                                        </td>
                                    </tr>
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr>
                                        <td>Signed</td>
                                    </tr>
                                    <tr><td><p style="visibility: hidden;">hi</p></td></tr>
                                    <tr><td><input type="text"></td></tr>
                                    <tr><td>Name of Physician</td></tr>
                                    <tr><td>License Number:</td></tr>

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

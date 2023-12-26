<?php
require('connection.php');
if(isset($_GET['user_id'])){
    $_SESSION['user_id'] = $_GET['user_id'];
    $_SESSION['isLogged'] =true;
}
if(!isset($_SESSION['isLogged'])){
    header('Location: login.php');
    exit();
}

$showTable = false;
$showTable = true;
$query_user = "SELECT v.*, t.all_data FROM verified v inner join test t on v.app_id=t.user_id where v.conditions like 'senior citizen' ";
$query_result = mysqli_query($conn,$query_user);
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

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="assets/css/confirmation.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--  Charts Plugin -->
    <script src="./assets/js/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #anotherList, .listUser{
            list-style-type: none;
        }
        #anotherList li a, , .listUser li a{
            padding:.5em;
        }
        .sidebar{
            background-color: #608943;
        }
        #downloadBtn, #showtable,#showgraph,#showcompany{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            height: 2em;
            width: 10em;
            padding: 1.5em;
            background: var(--primary);
            border: none;
            color: white;
        }
        .details{
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            gap: 2em;
        }
        .date_details, .detailsBtn{
            display:flex;
            gap: 1em;
            justify-content: center;
            align-items: center;
        }
        .details input{
            height:3em;
        }

        .detailsBtn button{
            background: var(--primary);
            border: none;
            color: white;
            padding: .8em;
        }
        

        #tableStore {
            border: 1px solid black;
            height: 10em;
            width: 100%;
            overflow: scroll;

        }
        table td{
            border: 1px solid black;
            padding: .5em;
        }
        .tablehead td{
            text-align: center;
        }
        #filterBtn{
            width: 15em;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" >
        <?php 
        $class="dashboard";
        include('includes/sidebar.php'); ?>
    </div>
    <div class="main-panel">
        <?php include('includes/navbar.php'); ?>
        <div class="content" id="downloadComponent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Reports</h4>
                                <p class="category">SENIOR</p>
                            </div>
                            <div class="content">
                                <div class="details">
                                    <button id="downloadBtn">DOWNLOAD</button>
                                    <div class="detailsBtn">
                                        <select name="filter" class="form-control" id="selectFilter">
                                            
                                            <option value="education" <?php echo ($_GET['select']=='education')? 'selected': '' ?>>Educational Attainment</option>
                                            <option value="technical" <?php echo ($_GET['select']=='technical')? 'selected': '' ?>>Technical Skills</option>
                                            <option value="economic" <?php echo ($_GET['select']=='economic')? 'selected': '' ?>>Economic Profile</option>
                                            <option value="monthlyincome" <?php echo ($_GET['select']=='monthlyincome')? 'selected': '' ?>>Monthly Income</option>
                                            <option value="residing" <?php echo($_GET['select']=='residing')? 'selected': '' ?>>Residing With</option>
                                            <option value="medicalconcern" <?php echo ($_GET['select']=='medicalconcern')? 'selected': '' ?>>Medical Concern</option>
                                            <option value="problem" <?php echo ($_GET['select']=='problem')? 'selected': '' ?>>Problem Encounter</option>
                                            <option value="difficulty" <?php echo ($_GET['select']=='difficulty')? 'selected': '' ?>>Difficulty</option>
                                        </select>
                                        <button id="filterBtn">Show Data</button>
                                    </div>
                                </div>
                                <br>
                                <?php
                                $select_col = "";
                                if($_GET['select'] == "education"){
                                    $select_col = "Education Attainment";
                                    $select_data = ['elementary_level', 'highschool_level', 'post_graduate', 'elementary_graduate', 'college_graduate', 'vocational', 'highschool_graduate', 'college_graduate', 'no_school'];
                                }else if($_GET['select'] == "technical"){
                                    $select_col = "Technical Skills";
                                    $select_data = ['medical', 'dental', 'fishing', 'engineering', 'barber', 'evangelization', 'teaching', 'counselling', 'cooking', 'carpenter', 'masson', 'tailor', 'legal_services', 'farming', 'arts', 'plumber', 'sapatero', 'chef', 'millwright', 'technical_checkbox_others'];
                                }else if($_GET['select'] == "economic"){
                                    $select_col = "Econnomic Profile";
                                    $select_data = ['salary', 'relatives', 'spouse_pension', 'livestock', 'own_pension', 'spouse_salary', 'share_crops', 'fishing_income', 'stocks', 'insurance', 'savings', 'source_checkout_input'];
                                }else if($_GET['select'] == "monthlyincome"){
                                    $select_col = "Monthly Income";
                                    $select_data = ['60000_above', '50000_to_60000', '40000_to_50000', '30000_to_40000', '20000_to_30000', '10000_to_20000', '5000_to_10000', '1000_to_5000', 'Below_1000','month_income_others'];
                                }else if($_GET['select'] == "medicalconcern"){
                                    $select_col = "Medical Concern";
                                    $select_data = ['blood_type', 'physical_disability', 'health_problems', 'hypertension', 'arthritis', 'coronory_heart_disease', 'diabetes', 'chronic_kidney_disease', 'alzheimer', 'pulmonary_disease', 'dental_care', 'dental_others', 'eye_impairment', 'need_eye_care'];
                                }else if($_GET['select'] == "residing"){
                                    $select_col = "Residing With";
                                    $select_data = ['alone', 'spouse', 'children', 'grandchildren', 'inlaws', 'relative', 'law_spouse', 'care_institution', 'friends'];
                                }else if($_GET['select'] == "problem"){
                                    $select_col = "Problem Encounter";
                                    $select_data = ['lack_of_income', 'loss_of_income', 'skills', 'livelihood', 'resources_others'];
                                }else if($_GET['select'] == "difficulty"){
                                    $select_col = "Difficulty";
                                    $select_data = ['high_cost_of_medicines', 'lack_of_medicines', 'high_of_medical_attention', 'cost_others'];
                                }
                                ?>
                               <table id="tableStore">
                                    <tr class="tablehead">
                                        <td>Name</td>
                                        <td>Address</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Number</td>
                                        <td>Birthdate</td>
                                        <td><?php echo $select_col ?></td>
                                    </tr>
                                    <?php
                                    function findValue($jsonData, $keys) {
                                        foreach ($keys as $key) {
                                            if ($jsonData[$key] == "1") {
                                                return $key;
                                            }
                                        }
                                    
                                        return "";
                                    }

                                    if(mysqli_num_rows($query_result)>0){
                                        while($row = mysqli_fetch_assoc($query_result) ){

                                        ?>
                                            <tr>
                                                
                                                <?php
                                                    $data = json_decode($row['all_data'], true); 
                                                    $resultsData = findValue($data, $select_data)
                                                ?>
                                                <td><?php echo $row['lname']." ".$row['fname'] ?></td>
                                                <td><?php echo $row['brgy']?></td>
                                                <td><?php echo $row['gender']?></td>
                                                <td><?php echo $row['email']?></td>
                                                <td><?php echo $row['number']?></td>
                                                <td><?php echo $row['bdate']?></td>
                                                <td><?php echo str_replace('_', ' ', $resultsData); ?></td>
                                            </tr>
                                        <?php
                                        }}else{
                                            echo '<tr><td colspan="7" style="text-align:center;">No Data</td></tr>';
                                        }
                                    
                                    ?>
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
const downloadButton = document.getElementById('downloadBtn');
const cardContainer = document.getElementById('downloadComponent');

downloadButton.addEventListener('click', function () {
  const element = cardContainer; // element to be converted to PDF
  html2pdf(element)
    .from(element)
    .save('dashboard_report.pdf');
});

const filterBtn = document.querySelector('#filterBtn');
filterBtn.addEventListener('click', ()=>{
    const selectFilter = document.querySelector('#selectFilter').value;
    window.location.href = `dash_reports_senior.php?select=${selectFilter}`;
})
</script>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	

</html>

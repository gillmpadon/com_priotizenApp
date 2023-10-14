
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
            $class="user_add";
            include('includes/sidebar.php'); ?>
    </div>

    <div class="main-panel">
		    <?php include('includes/navbar.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row" style="display: flex; justify-content:center;">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">
                                    <?php 
                                    $account = $_GET['account_type']? "CREATE ".$_GET['account_type'] : "FAILED";
                                    echo strtoUpper($account);
                                    ?>
                                </h4>
                            </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input id="name" type="text" class="form-control"  placeholder="Enter FullName" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input id="email" type="text" class="form-control" placeholder="Enter Email" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Number</label>
                                                    <input id="number" type="text" class="form-control" placeholder="Enter Number" >
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input id="password" type="text" class="form-control" placeholder="Enter Password" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill" onclick="createAdmin()" >Create Profile</button>
                                </div>
                                    <div class="clearfix"></div>
                                    <br>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img style="visibility:hidden"  src="../priotizen_app/user_img/unknown.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                    <input type="file" name="" id="imageInput" style="display: none;">
                                    <img id="setImage" class="avatar border-gray" style="height: 17em; width: 17em" src="../priotizen_app/user_img/unknown.jpg"  alt="..."/>
                                      <h4 class="title" ><span id="setFullname"></span> <br />
                                         <small id="setEmail">email@gmail.com</small>
                                      </h4>
                                      <br>
                                      <h6>Pending</h6>
                                    </a>
                                </div>
                               
                            </div>
                            <hr>
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
    const setImage = document.getElementById('setImage')
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
    setImage.addEventListener('click', ()=>{
            imageInput.click()
            console.log("Image is clicked")
        })

        

    function goSuccess(){
        demo.goNotif('Successfully',' Created','success','pe-7s-add-user')
    }
    function goError(){
        demo.goNotif('Error',' Creation','success','pe-7s-delete-user')
    }

    const admin_id = <?php echo json_encode($_SESSION['user_id']) ?>;
    function generateUID() {
    return Math.random().toString(36).substring(2);
    }
    
    const unique_id = generateUID()
    function createAdmin(){
        const search = new URLSearchParams(window.location.search)
        const account_type = search.get('account_type')
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const number = document.getElementById('number');
        const password = document.getElementById('password');
        const image = document.getElementById('imageInput');

        const formData = new FormData();
        formData.append('name', name.value);
        formData.append('email', email.value);
        formData.append('number', number.value);
        formData.append('password', password.value);
        formData.append('image', image.files[0]);
        formData.append('account_type', account_type);
        formData.append('admin_id', admin_id);
        formData.append('unique_id', unique_id);
        fetch(`./backend/admin_store.php`,{
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then( result => {
            if(result=="Successful"){
            goSuccess()
        }else{
            goError()
        }
        })
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

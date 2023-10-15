
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
            $admin_id = json_encode($_SESSION['user_id']);
            $class="user_add";
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
                                <h4 class="title">Add Profile</h4>
                            </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input id="fname" type="text" class="form-control"  placeholder="Enter first name" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middle Initial</label>
                                                <input id="mi" type="text" class="form-control" placeholder="Enter M.I" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input id="lname" type="text" class="form-control" placeholder="Enter last name" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select name="  " class="form-control" id="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="  " class="form-control" id="status">
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="widowed">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input type="date" class="form-control" id="bdate" >
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row otherInfoOff">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" id="address" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email Address" id="email" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row otherInfoOn" style="display: none;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Valid ID</label>
                                                <input type="text" class="form-control" placeholder="Enter Valid ID Number" id="valid_id" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>APP ID</label>
                                                <input readonly type="text" class="form-control" placeholder="Enter APP ID Number" id="app_id" >
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row otherInfoOff">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input type="text" class="form-control" placeholder="Enter nationality" id="nationality">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Number</label>
                                                <input type="text" class="form-control" placeholder="Enter number" id="number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Condition</label>
                                                <select name="  " class="form-control" id="condition">
                                                    <option value="senior citizen">Senior Citizen</option>
                                                    <option value="disabled">Disabled</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row otherInfoOn" style="display: none;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Family Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Family Name" id="family_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Family Contact</label>
                                                <input type="text" class="form-control" placeholder="Enter Family Number" id="family_contact">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Barangay</label>
                                                <select name="" class="form-control" id="brgy" >
                                                <?php
                                                $barangays = [
                                                    'ALIWEKWEK',
                                                    'BAAY',
                                                    'BALANGOBONG',
                                                    'BALOCOC',
                                                    'BANTAYAN',
                                                    'BASING',
                                                    'CAPANDANAN',
                                                    'DOMALANDAN CENTER',
                                                    'DOMALANDAN EAST',
                                                    'DOMALANDAN WEST',
                                                    'DORONGAN',
                                                    'DULAG',
                                                    'ESTANZA',
                                                    'LASIP',
                                                    'LIBSONG EAST',
                                                    'LIBSONG WEST',
                                                    'MALAWA',
                                                    'MALIMPUEC',
                                                    'MANIBOC',
                                                    'MATALAVA',
                                                    'NAGUELGUEL',
                                                    'NAMOLAN',
                                                    'PANGAPISAN NORTH',
                                                    'PANGAPISAN SUR',
                                                    'POBLACION',
                                                    'QUIBAOL',
                                                    'ROSARIO',
                                                    'SABANGAN',
                                                    'TALOGTOG',
                                                    'TUMBAR',
                                                    'TONTON',
                                                    'WAWA'
                                                ];
                                                foreach ($barangays as $barangay) {
                                                    echo "<option value=\"$barangay\">$barangay</option>";
                                                }
                                                ?>
                                             </select>
                                            </div>
                                        </div>
                                    </div>
                                <div >
                                        <button type="submit" class="btn btn-info btn-fill pull-right" onclick="createProfile()" >Create Profile</button>
                                </div>
                                    <div class="clearfix"></div>
                            </div>
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
                                      <h4 class="title" ><span id="setFname"></span> <span id="setMi"></span> <span id="setLname"></span> <br />
                                         <small id="setEmail">email@gmail.com</small>
                                      </h4>
                                    </a>
                                    <h5>Pending</h5>
                                </div>
                               
                            </div>
                            <hr>
                            <div class="text-center">
                                <button onclick="showDoc('Psa')" href="#" class="btn btn-simple"><i class="pe-7s-note2"></i> PSA</button>
                                <button onclick="showDoc('Med')" href="#" class="btn btn-simple"><i class="pe-7s-file"></i> MED</button>
                                <button onclick="toggleOtherInfo()" href="#" class="btn btn-simple"><i class="pe-7s-id"></i> OTHER</button>

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
            setTimeout(()=>[
                    window.location.href="table.php"
            ],2000)
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
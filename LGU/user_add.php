
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
                                                <label>First Name </label><span class="asterisk">*</span>
                                                <input id="fname" type="text" class="form-control"  placeholder="Enter first name" required >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input id="mi" type="text" class="form-control" placeholder="Enter Middle Name" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Last Name</label><span class="asterisk">*</span>
                                                <input id="lname" type="text" class="form-control" placeholder="Enter last name" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label><span class="asterisk">*</span>
                                                <select name="  " class="form-control" id="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status</label><span class="asterisk">*</span>
                                                <select name="  " class="form-control" id="status">
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="widowed">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Birth Date</label><span class="asterisk">*</span>
                                                <input type="date" class="form-control" id="bdate" >
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row otherInfoOff">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Municipality</label><span class="asterisk">*</span>
                                                <select name="  " class="form-control" id="municipality">
                                                    <option value="lingayen" selected>Lingayen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Barangay</label><span class="asterisk">*</span>
                                                <select name="" class="form-control" id="brgy" >
                                                <?php
                                                $barangays = [
                                                    'Aliwekwek',
                                                    'Baay',
                                                    'Balangobong',
                                                    'Balococ',
                                                    'Bantayan',
                                                    'Basing',
                                                    'Capandanan',
                                                    'Domalandan Center',
                                                    'Domalandan East',
                                                    'Domalandan West',
                                                    'Dorongan',
                                                    'Dulag',
                                                    'Estanza',
                                                    'Lasip',
                                                    'Libsong East',
                                                    'Libsong West',
                                                    'Malawa',
                                                    'Malimpuec',
                                                    'Maniboc',
                                                    'Matalava',
                                                    'Naguelguel',
                                                    'Namolan',
                                                    'Pangapisan North',
                                                    'Pangapisan Sur',
                                                    'Poblacion',
                                                    'Quibaol',
                                                    'Rosario',
                                                    'Sabangan',
                                                    'Talogtog',
                                                    'Tumbar',
                                                    'Tonton',
                                                    'Wawa'
                                                ];
                                                foreach ($barangays as $barangay) {
                                                    echo "<option value=\"$barangay\">$barangay</option>";
                                                }
                                                ?>
                                             </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Street</label><span class="asterisk">*</span>
                                                <select name="" class="form-control" id="street" >
                                                <?php
                                                $barangays = [
                                                    "Avenida",
                                                    "Alvear E",
                                                    "Alvear II",
                                                    "Artacho",
                                                    "Bonifacio",
                                                    "Dike",
                                                    "Dona Asunsion Garcia",
                                                    "Guilig",
                                                    "Heroes",
                                                    "Jacoba",
                                                    "Mendoza",
                                                    "New St",
                                                    "P. Moran",
                                                    "Padilla",
                                                    "Panfilo Lopez",
                                                    "Primicias St",
                                                    "Ramos",
                                                    "Sollis",
                                                    "Sto. Nino",
                                                    "Gov. Antonio U. Sison"
                                                ];
                                                foreach ($barangays as $barangay) {
                                                    echo "<option value=\"$barangay\">$barangay St.</option>";
                                                }
                                                ?>
                                                <option value="None">None</option>
                                             </select>                                               

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>House No</label><span class="asterisk">*</span>
                                                <input type="text" class="form-control" placeholder="House No/Block" id="house" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row otherInfoOn" >
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>National ID</label><span class="asterisk">*</span>
                                                <input type="text" class="form-control" placeholder="Enter National ID Number" id="valid_id" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>APP ID</label><span class="asterisk">*</span>
                                                <input readonly type="text" class="form-control" placeholder="Enter APP ID Number" id="app_id" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Email</label><span class="asterisk">*</span>
                                                <input type="email" class="form-control" placeholder="Email Address" id="email" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>ID Number</label><span class="asterisk">*</span>
                                                <input type="text" class="form-control" placeholder="ID Number" id="ctrlNo" >
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row otherInfoOff">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nationality</label><span class="asterisk">*</span>
                                                <input type="text" class="form-control" placeholder="Enter nationality" id="nationality">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Number</label><span class="asterisk">*</span>
                                                <input type="text" class="form-control" placeholder="Enter number" id="number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Condition</label><span class="asterisk">*</span>
                                                <select name="  " class="form-control" id="condition">
                                                    <option value="senior citizen">Senior Citizen</option>
                                                    <option value="pwd">PWD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row otherInfoOn" >
                                        <div class="header">
                                            <h5 class="title">Emergency Contact<span class="asterisk">*</span></h5>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="display:flex; gap:1em; align-items:baseline; justify-content:center;">
                                                <p>Name:</p>
                                                <input type="text" style="border:none; width:90%" class="form-control" placeholder="Enter Name" id="family_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="display:flex; gap:1em; align-items:baseline; justify-content:center;">
                                                <p>Contact<p> Number</p>:</p>
                                                <input type="text" style="border:none; width:90%" class="form-control" placeholder="Enter Contact" id="family_contact">
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
                            <button onclick="hideDoc('Psa')" class="btn btn-info btn-fill" style="float: right;">Hide</button>
                            <br><br>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6" id="docMed" style="display: none;">
                        <div class="card">
                        <p class="text-center" style="padding-top: 1em;">MED</p>
                          <img style="height: 30em; width:100%; object-fit:cover;" src="../priotizen_app/user_img/john.png" alt="">
                          <div class="flex" style="padding: 1em;">
                            <button onclick="hideDoc('Med')" class="btn btn-info btn-fill" style="float: right;">Hide</button>
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

<script src="https://cdn.emailjs.com/dist/email.min.js"></script> 
<script>
    function goSuccess(){
        demo.goNotif('Successfully',' Created','success','pe-7s-add-user')
    }
    function goError(){
        demo.goNotif('Error',' Creation','success','pe-7s-delete-user')
    }


    emailjs.init('wNOaPZ8yBLfSbRF8O'); 

    function sendEmail(to_email, fromname, message) {
        console.log("email is sent")
        const serviceID = 'service_ri5dx1k'; 
        const templateID = 'template_f1qj767'; 

        const emailParams = {
            to_email: to_email,
            from_name: fromname, 
            message: message,
        };

        emailjs.send(serviceID, templateID, emailParams)
            .then(function(response) {
                console.log('Email sent successfully!', response);
            })
            .catch(function(error) {
                console.error('Error sending email:', error);
            });
    }

</script>
<script>


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
    function validateEmail(email) {
        // Regular expression for Gmail addresses ending with '@gmail.com'
        const regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

        return regex.test(email);
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
    function containsOnlyNumbers(input) {
    const numberRegex = /^(\d+-)*\d+$/ ;
    return numberRegex.test(input);
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
    const number = document.getElementById('number').value
    const condition = document.getElementById('condition').value
    const brgy = document.getElementById('brgy').value
    const street = document.getElementById('street').value
    const house = document.getElementById('house').value
    const municipality = document.getElementById('municipality').value
    const family_contact = document.getElementById('family_contact').value
    const family_name = document.getElementById('family_name').value
    const valid_id = document.getElementById('valid_id').value
    const ctrlNo = document.getElementById('ctrlNo').value
    const image = document.getElementById('imageInput')

    const formData = new FormData();

    formData.append('fname', fname)
    formData.append('mi', mi)
    formData.append('lname', lname)
    formData.append('email', email)
    formData.append('gender', gender)
    formData.append('status', status)
    formData.append('bdate', bdate)
    formData.append('number', number)
    formData.append('condition', condition)
    formData.append('brgy', brgy)
    formData.append('street', street)
    formData.append('house', house)
    formData.append('municipality', municipality)
    formData.append('family_contact', family_contact)
    formData.append('family_name', family_name)
    formData.append('app_id', user_id)
    formData.append('admin_id', admin_id)
    formData.append('valid_id', valid_id)
    formData.append('ctrlNo', ctrlNo)
    formData.append('image', image.files[0]);
    let result = true, isAlready65 = false

    const dateSelected = new Date(bdate);
    const year  = dateSelected.getFullYear()
    const month = dateSelected.getMonth()+1
    const day = dateSelected.getDate()

    const currentDate = new Date()
    const currentYear = currentDate.getFullYear()
    const currentMonth = currentDate.getMonth()+1
    const currentDay = currentDate.getDate()

    let isValidEmail = validateEmail(email)


    if(fname == '' || lname == '' || email == '' || gender == '' || status == '' || bdate == '' || number == '' 
    || condition == '' || brgy == '' || street == '' || house == '' || municipality == '' || family_contact == ''
    || family_name == '' || valid_id == '' || image.files[0] == '' ||image.files.length === 0){
        result = false
    }
    if(condition != 'pwd'){
        if(currentYear - year >=60){
            if(currentYear - year ==60){
                if(currentMonth > month){
                result = true
                isAlready65 =true
                }else if(currentMonth == month){
                if(currentDay >= day){
                    result = true
                    isAlready65 = true
                }else{
                    result = false
                }
            }
            }else{
                isAlready65 = true
            }
        }else{
            result = false
        }
    }
    if(result && isValidEmail){
        const isValidNationalId = containsOnlyNumbers(valid_id)
        if(!isValidNationalId){
            setTimeout(()=>{
                    demo.goNotif('Invalid National ID or ID Number ','The Input should not contain any characters','success','pe-7s-delete-user')
            },1000)
        }else{
            fetch(`../priotizen_app/backend/verified.php?id=${ctrlNo}&type=${condition}&fname=${fname}&lname=${lname}`,{
            method: 'GET'
            })
            .then( res => res.json())
            .then( results=>{
                if(results=="Success"){
                    console.log(results);
                fetch('./backend/user.php',{
                method: 'POST',
                body: formData
                })
                .then( response => response.json())
                .then( result =>{
                    if(result=="Successful"){
                        const message =`
                            Hey there! Congratulations your account is now ready for use in Priotizen! To get started, we need to verify your email address.
                            Click the link to verify your email address https://pig-tidy-gradually.ngrok-free.app/edsa-priotizen/priotizen_app/signin.php?verify=${user_id} 
                            Please do not share this link with anyone.
                            Greetings from Quezone.`
                        sendEmail(email, "Verify user", message)
                        goSuccess()
                        setTimeout(()=>{
                            const id = `id=${user_id}`
                            // if(condition == "pwd"){
                            //     window.location.href=`table_pwd.php?${id}&action=create`
                            // }else{
                            //     window.location.href=`table_senior.php?${id}&action=create`
                            // }
                        },2000)
                    }else{
                        goError()
                        console.log(result)
                        console.log("error here")
                    }
                })
                }else{
                    demo.goNotif('Control No or Condition Error ','Number and Condition not exists  in Database','success','pe-7s-delete-user')
                }
            })
        }


    }else{
        if(!isValidEmail){
            setTimeout(()=>{
                    demo.goNotif('Invalid Email ','Email is not Valid and Incorrect','success','pe-7s-delete-user')
                },1000)
        }else{
            if(condition != 'pwd' && !isAlready65){
                setTimeout(()=>{
                    demo.goNotif('Fill All ','Age must be at least 60 for Senior Citizens','success','pe-7s-delete-user')
                },1000)
            }else{
                setTimeout(()=>{
                    demo.goNotif('Fill All ','Required Fields','success','pe-7s-delete-user')
                },1000)
            }
        }

    }
        
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

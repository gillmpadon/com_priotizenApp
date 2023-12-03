<?php
// $notifQuery = "SELECT concat(v.lname,' ',v.fname) as name, a.id, a.account_id from account a inner join verified v on a.account_id = v.app_id where a.account_status like 'Pending' order by a.id desc limit 5";
// $notifResult = mysqli_query($conn,$notifQuery);

?>
<div class="bodyconfirmation" style="display: none;">
            <div class="confirmation" >
                <div class="cons-text">
                    <h3>Confirmation</h3>
                    <p>Are you sure you want to proceed to pay?</p>
                </div>
                <div class="cons-buttons">
                    <button class="btnTrig" style="background: red;" onclick="proceedToPay('no')">No</button>
                    <button class="btnTrig" style="background: green;" onclick="proceedToPay('yes')">Yes</button>
            </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Profile List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!-- <ul class="nav navbar-nav navbar-left">
                        
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">
                                    <?php
                                        // $num = mysqli_num_rows($notifResult);
                                        // echo $num; 
                                    ?> 
                                    </span>
									<p class="hidden-lg hidden-md">
                                         Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                    <?php
                                    // if($notifResult){
                                    //     if(mysqli_num_rows($notifResult)>0){
                                    //         while($row = mysqli_fetch_assoc($notifResult)){
                                    //             $id = $row['account_id'];
                                    //             $name = $row['name'];
                                    //             echo "<li><a href='user.php?user_id=$id'>$name</a></li>";
                                    //         }
                                    //     }else{
                                    //         echo "<li><a href='#'>No Notification</a></li>";
                                    //     }
                                    // }else{
                                    //     echo "<li><a href='#'>No Notification</a></li>";
                                    // }

                                    ?>
                              </ul>
                        </li>
                      
                      
                    </ul> -->

                    <ul class="nav navbar-nav navbar-right" style="display:flex; align-items:center;">
                        <li>
                           <a href="user_edit_admin.php?account_type=admin&user_id=<?php echo $_SESSION['user_id']; ?>">
                               <img src="../priotizen_app/user_img/<?php echo $_SESSION['admin_image']; ?>" alt="" style="height:2em; width:2em; border-radius:150%;">
                            </a>
                        </li>
                        <?php
                        if(isset($_SESSION['isLogged'])){
                        ?>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Operation
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="user_add_admin.php?account_type=admin">Create Admin</a></li>
                                <li><a href="user_add_admin.php?account_type=store">Create Store</a></li>
                                <li><a href="user_add.php">Create User</a></li>
                              </ul>
                        </li>
                      
                            <li>
                                <a href="logout.php">
                                    <p>Log out</p>
                                </a>
                            </li>
<!-- 
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
									<p class="hidden-lg hidden-md">
                                         Settings
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                   <li><a onclick="truncate('disabled')">Delete All Disabled</a></li>
                                   <li><a onclick="truncate('senior')">Delete All Senior</a></li>
                              </ul>
                            </li> -->

                        <?php } ?>
                        
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <script>
             function goDelete(str){
                demo.goNotif('Deleted All',` ${str.toUpperCase()}`,'success','pe-7s-add-user')
            }
            function dontDelete(str){
                demo.goNotif('Error',` ${str.toUpperCase()}`,'success','pe-7s-delete-user')
            }

            const confirmation = document.querySelector('.bodyconfirmation')
            function proceed(str,action){
                if(action=="yes"){
                    fetch(`./backend/settings.php?action=${str}`,{
                        method: 'DELETE'
                    })
                    .then( response => response.json())
                    .then( result =>{
                        if(result == "Success"){
                            goDelete(str)
                        }else{
                            dontDelete(str)
                        }
                        setTimeout(()=>{
                            confirmation.style.display = "none"
                        },1000)
                    })
                }else{
                    confirmation.style.display ='none';
                }
                console.log(str,action)
            }
            function clearBtn(){
                const parent = document.querySelector('.cons-buttons')
                const btnTrig = document.querySelectorAll('.btnTrig')
                    while(parent.hasChildNodes()){
                        parent.removeChild(parent.childNodes[0]);
                    }
            }
            function truncate(str){
                clearBtn()
                const red = `<button class="btnTrig" style="background: red;" onclick="proceed('${str}','no')">No</button>`
                const green = `<button class="btnTrig" style="background: green;" onclick="proceed('${str}','yes')">Yes</button>`
                const parent = document.querySelector('.cons-buttons')
                parent.innerHTML += red
                parent.innerHTML += green
                confirmation.style.display ='block';
            }
        </script>
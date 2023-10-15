<?php
$notifQuery = "SELECT concat(v.lname,' ',v.fname) as name, a.id, a.account_id from account a inner join verified v on a.account_id = v.app_id where a.account_status like 'Pending' order by a.id desc limit 5";
$notifResult = mysqli_query($conn,$notifQuery);

?>
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
                    <ul class="nav navbar-nav navbar-left">
                        
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">
                                    <?php
                                        $num = mysqli_num_rows($notifResult);
                                        echo $num; 
                                    ?> 
                                    </span>
									<p class="hidden-lg hidden-md">
                                         Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                    <?php
                                    if($notifResult){
                                        if(mysqli_num_rows($notifResult)>0){
                                            while($row = mysqli_fetch_assoc($notifResult)){
                                                $id = $row['account_id'];
                                                $name = $row['name'];
                                                echo "<li><a href='user.php?user_id=$id'>$name</a></li>";
                                            }
                                        }else{
                                            echo "<li><a href='#'>No Notification</a></li>";
                                        }
                                    }else{
                                        echo "<li><a href='#'>No Notification</a></li>";
                                    }

                                    ?>
                              </ul>
                        </li>
                      
                      
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="user_edit_admin.php?account_type=admin&user_id=<?php echo $_SESSION['user_id']; ?>">
                               <p>Account</p>
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
                            </li>

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
            function truncate(str,account){
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
                })
            }
        </script>
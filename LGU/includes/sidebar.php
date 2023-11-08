<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    LGU MANAGEMENT
                </a>
            </div>

            <ul class="nav">
                <?php
                if(isset($_SESSION['isLogged'])){
                ?>
               
                <li <?php echo $class=="dashboard"? "class='active'" :""?>>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                    <ul id="anotherList" <?php echo $class=="dashboard"? "" :"style='display:none;'"?>>
                        <li>
                            <a href="dash_reports_user.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>User Reports</p>
                            </a>
                        </li>
                        <li>
                            <a href="dash_reports_company.php">
                                <i class="pe-7s-portfolio"></i>
                                <p>Company Reports</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li <?php echo $class=="table"? "class='active'" :""?>>
                    <a href="table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Users List</p>
                    </a>
                </li>
                <li <?php echo $class=="table list"? "class='active'" :""?>>
                    <a href="table_user.php">
                        <i class="pe-7s-id"></i>
                        <p>Admin & Store</p>
                    </a>
                </li>
                
                <?php }else{
                ?>
                 <li>
                    <a href="login.php">
                        <i class="pe-7s-graph"></i>
                        <p>Login Account</p>
                    </a>
                </li>
                <?php } ?>
            </ul>
</div>
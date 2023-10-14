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
                <li <?php echo $class=="user_add"? "class='active'" :""?>>
                    <a href="user_add.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Create User</p>
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
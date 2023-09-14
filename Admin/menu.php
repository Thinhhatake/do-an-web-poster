<!-- <ul> 
    <li>
        <a href="../Artists/"> Manage artists </a>
    </li>
    <li> 
        <a href="../Products"> Manage Products</a>
    </li>
    <li>
        <a href="../orders/index.php">Quản lý Đơn Hàng</a>
     </li>
</ul> -->
<div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Admin Manager</div>
            <div class="list-group list-group-flush my-3">
                <a href="../orders/" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Projects</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Analytics</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Reports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Store Mng</a>
                <a href="../Products/index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Products</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="../Artists/" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                         class="fa-duotone fa-user"></i>Artists</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
</div>
<?php
        if(isset($_GET['error'])) {
            ?> 
            <span style="color: red;"> 
                <?php
                 echo $_GET['error'] ;
                ?>
            </span>
        <?php 
        }
        ?>

<?php
        if(isset($_GET['success'])) {
            ?> 
            <span style="color: green;"> 
                <?php
                 echo $_GET['success'] ;
                ?>
            </span>
        <?php 
        }
        ?>
<?php
        if(isset($_GET['fixed'])) {
            ?> 
            <span style="color: yellow;"> 
                <?php
                 echo $_GET['fixed'] ;
                ?>
            </span>
        <?php 
        }
        ?>
<?php
        if(isset($_GET['deleted'])) {
            ?> 
            <span style="color: red;"> 
                <?php
                 echo $_GET['deleted'] ;
                ?>
            </span>
        <?php 
        }
        ?>
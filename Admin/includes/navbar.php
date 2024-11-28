<?php
$notification_sql = "SELECT * FROM notifications WHERE is_read = 0";
$result = $con->query($notification_sql);

$unread_count = $result->num_rows;
?>
<nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                

             
                <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-o">
                                Notifications 
                                   
                                <span class="badge badge-light"><?php echo $unread_count; ?></span>
                                  
                            </a>
                            <div class="dropdown-menu overflow-auto" style="max-height:150px;">
    <?php
        if ($unread_count > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a class="dropdown-item" href="read_notif.php?id=' . $row['notif_id'] . '" style="border-bottom: 1px solid #ddd; padding: 10px;">' . $row['message'] . '</a>';
            }
        } else {
            echo '<a class="dropdown-item" href="#" style="border-bottom: 1px solid #ddd; padding: 10px;">No new notifications</a>';
        }
    ?>
</div>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="" class="dropdown-item">1</a>
                                <a href="" class="dropdown-item">1</a>
                                <a href="" class="dropdown-item">1</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="../logout.php" class="dropdown-item">Logout</a>
                <?php if ($user_data['role_as'] == 1) { ?>
                    <!-- If user is an admin, you can show extra admin options -->
                    <a href="admin_dashboard.php" class="dropdown-item">Admin Dashboard</a>
                <?php } ?>
            </div>
        </li>
    </ul>
                
               
            </nav>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
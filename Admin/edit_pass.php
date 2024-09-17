<?php
    include("../functions/myFunctions.php");

    if (isset($_SESSION['password_changed']) && $_SESSION['password_changed'] == true) {
        echo "<script>alert('Password changed successfully!');</script>";
        unset($_SESSION['password_changed']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <?php
           include("includes/header.php");
        ?>
        <div class="container">
        <?php
                    if(isset($_GET['id']))
                    {
                        $id = $_GET['id'];
                        $user = getByID('user', $id);

                        if(mysqli_num_rows($user)>0)
                        {

                        $data = mysqli_fetch_array($user);
                ?>  

                <form action="code.php" method="POST">   
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
      
                    <table class="table table-bordered">
                  
                        <tbody>
                            <tr>
                                <th>First Name</th>
                                <td><input type="text" class="form-control" id="firstName" name="first_name" value="<?=$data['first_name']?>" required></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><input type="text" class="form-control" id="lastName" name="last_name" value="<?=$data['last_name']?>" required></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><input type="text" class="form-control" id="username" name="username" value="<?=$data['username']?>" required></td>
                            </tr>
                            <tr>
                                <th>Old Password</th>
                                <td><input type="password" class="form-control" id="oldPassword" name="old_password" required></td>
                            </tr>
                            <tr>
                                <th>New Password</th>
                                <td><input type="password" class="form-control" id="newPassword" name="new_pass" required></td>
                            </tr>
                            <tr>
                                <th>Confirm New Password</th>
                                <td><input type="password" class="form-control" id="confirmPassword" name="confirm_new_pass" required></td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary" name="change_pass">Save changes</button>
                    <a href="user_accounts.php" class="btn btn-secondary">Go Back</a>
                </form>
                </div>
    </div>
</div>
                    </form>
                        <?php
                        }else{
                            echo "Credentials Not Found";
                        }
                          }
                    ?>
        </div>
    </div>
</body>
</html>


<?php 
require APPROOT . '/views/includes/header.php';  
$user = $data["user"];
?>

<html>
<head>
</head>

<body>

    <!-- Profile -->
    <div class= "container">
        <br><h2>Profile</h2><br>
    </div>

    <div class="container">

        <table  class="table table-bordered">
            <tr>
                <td><b>Username</b></td>
                <td><?php echo $user->username ?></td>
            </tr>
            <tr>
                <td><b>First Name</b></td>
                <td><?php echo $user->first_name ?></td>
            </tr>
            <tr>
                <td><b>Last Name</b></td>
                <td><?php echo $user->last_name ?></td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td><?php echo $user->email ?></td>
            </tr>
        </table>

        <div>
            <form action="/WebsiteMVC/Profile/updateProfile">
                <button type="submit" name="editProfile" class="btn btn-dark text-center">Edit profile information</button>
            </form>
            <form action="/WebsiteMVC/Profile/updatePassword">
                <button type="submit" name="changePassword" class="btn btn-dark text-center">Change Password</button>
            </form>
        </div> 
    
    </div>

</body>
</html>

<?php require APPROOT . '/views/includes/footer.php'; ?>
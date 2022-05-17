<?php
class Profile extends Controller
{
    public function __construct()
    {
        $this->profileModel = $this->model('profileModel');
    }

    public function index()
    {  
        $user = $this->profileModel->getUser($_SESSION['user_username']);
        $data = [
            'user' => $user
        ];
        $this->view('Profile/profile',$data);
    }

    public function updateProfile() 
    {
        $user = $this->profileModel->getUser($_SESSION['user_username']);
        $data = [
            'user' => $user
        ];
        
        if(!isset($_POST['updateProfile'])){
            $this->view('Profile/updateProfile', $data);
        }
        else{
            $userdata = [
                'user' => $user,
                'user_id' => $_SESSION['user_id'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'fname_error' => '',
                'lname_error' => '',
                'email_error' => '',
                'msg' => '',
            ];
            
            if($this->validateData($userdata)){
                if($this->profileModel->updateProfile($userdata)){
                    echo 'Please wait updating the profile for '.$_SESSION['user_username'];
                    echo '<meta http-equiv="Refresh" content="2; url=/WebsiteMVC/Profile/">';
                }
            } 
        }
    }

    public function updatePassword() 
    {
        $user = $this->profileModel->getUser($_SESSION['user_username']);
        $data = [
            'user' => $user
        ];
        
        if(!isset($_POST['updatePassword'])){
            $this->view('Profile/updatePassword');
        }
        else{
            $userdata = [
                'user_id' => $_SESSION['user_id'],
                'hashed_password' => $user->password_hash,
                'password' => $_POST['password'],
                'new_password' => $_POST['new_password'],
                'new_pass_hash' => password_hash($_POST['new_password'], PASSWORD_DEFAULT),
                'new_password_re-enter' => $_POST['new_password_re-enter'],
                'password_error' => '',
                'new_password_error' => '',
                'new_password_re-enter_error' => '',
            ];
            
            if($this->validatePassword($userdata)){
                if($this->profileModel->updatePassword($userdata)){
                    echo 'Please wait updating the password for '.$_SESSION['user_username'];
                    echo '<meta http-equiv="Refresh" content="2; url=/WebsiteMVC/Profile/">';
                }
            } 
        }
    }

    public function validateData($userdata){
        if(empty($userdata['first_name'])){
            $userdata['fname_error'] = 'First name cannot be empty!';
        }
        if(empty($userdata['last_name'])){
            $userdata['lname_error'] = 'Last name cannot be empty!';
        }
        if(empty($userdata['email'])){
            $userdata['email_error'] = 'Email cannot be empty!';
        }


        if(empty($userdata['fname_error']) && empty($userdata['lname_error']) && empty($userdata['email_error'])){
            return true;
        }
        else{
            $this->view('Profile/updateProfile',$userdata);
        }
    }

    public function validatePassword($data)
    {
        if (empty($data['password'])) {
            $data['password_error'] = 'Password cannot be empty';
        }
        elseif (!password_verify($data['password'], $data['hashed_password'])) {
            $data['password_error'] = 'Password incorrect';
        }

        if (empty($data['new_password'])) {
            $data['new_password_error'] = 'Password can not be empty';
        }       
        elseif (strlen($data['new_password']) < 6) {
            $data['new_password_error'] = 'Password can not be less than 6 characters';
        }

        if (empty($data['new_password_re-enter'])) {
            $data['new_password_re-enter_error'] = 'Password can not be empty';
        }        
        elseif ($data['new_password'] != $data['new_password_re-enter']) {
            $data['new_password_re-enter_error'] = 'Password does not match';
        }

        if (empty($data['password_error']) && empty($data['new_password_error']) && empty($data['new_password_re-enter_error'])) {
            return true;
        } else {
            $this->view('Profile/updatePassword', $data);
        }
    }
}
?>
<?php
class Login extends Controller
{
     public function __construct()
     {
         $this->loginModel = $this->model('loginModel');
    }

     public function index()
    {
        if (!isset($_POST['login'])) 
        {
            $this->view('Login/index');
        } 
        else 
        {
            //if you want to login but data is wrong or missing
            if ((empty($_POST['username']) && empty($_POST['password']))
                || (empty($_POST['username']) && !empty($_POST['password']))
                || (!empty($_POST['username']) && empty($_POST['password']))
            ) 
            {
                $data = [
                    'username' => $_POST['username'],
                    'hashed_password' => '',
                    'password' => $_POST['password'],
                    'password_match_error' => '',
                    'empty_error' => '',
                    'password_error' => '',
                    'msg' => 'Please complete the fields'
                ];
                $this->validateLoginData($data);
            } 
            else 
            {
                    $user = $this->loginModel->getUser($_POST['username']);
                    //if you want to login, but data is wrong
                    if ($user != null) 
                    {
                        $hashed_password = $user->password_hash;
                        $password = $_POST['password'];
                        $data = [
                            'username' => $user->username,
                            'hashed_password' => $hashed_password,
                            'password' => $password,
                            'password_match_error' => '',
                            'empty_error' => '',
                            'password_error' => '',
                            'msg' => 'Please enter corrects password for' . ' ' . $user->username,
                        ];
                    }
                    // if login validation is correct
                    if ($this->validateLoginData($data)) {
                        $this->createSession($user);
                            $data = [
                                'msg' => "Welcome, $user->username!",

                            ];
                            header('Location: /WebsiteMVC/Home/index');
                            $this->view('Home/index', $data);
                    }
                    // validation failed
                    else {
                        $this->view('Login/index', $data);
                    }
                }
            }
        }
    
    public function create()
    {
        // if (!isset($_GET['signup']))
        // {
        //     $this->getSignUpDiscount();
        // }

        if (!isset($_POST['signup'])) 
        {
            $this->view('Login/create');
        } 
        else 
        {
            $user = $this->loginModel->getUser($_POST['username']);
            if ($user == null) {
                $data = [
                    'username' => trim($_POST['username']),
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'email' => $_POST['email'],
                    'pass' => $_POST['password'],
                    'pass_verify' => $_POST['verify_password'],
                    'pass_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'empty_error' => '',
                    'password_error' => '',
                    'password_match_error' => '',
                    'password_len_error' => '',
                    'msg' => '',
                    'email_error' => ''
                ];
                // when you sign up and validation is correct
                if ($this->validateSignUpData($data)) 
                {
                    if ($this->loginModel->createUser($data)) 
                    {
                        $user = $this->loginModel->getUser($_POST['username']);
                        // validation of password
                        if ($user != null) 
                        {
                            $hashed_password = $user->password_hash;
                            $password = $_POST['password'];
                            if (password_verify($password, $hashed_password)) 
                            {
                                $this->createSession($user);
                                header('Location: /WebsiteMVC/Home/index');
                            }
                        }
                    }
                }
            }
            //when you sign up but user already exists 
            else 
            {
                $data = [
                    'msg' => "User: " . $_POST['username'] . " already exists",];
                $this->view('Login/create', $data);
            }
        }
    }

    public function validateSignUpData($data)
    {
        if (empty($data['username']) || empty($data['first_name']) || empty($data['last_name'])) {
            $data['empty_error'] = 'Cannot not be empty';
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_error'] = 'Please check your email and try again';
        }
        if (strlen($data['pass']) < 6) {
            $data['password_len_error'] = 'Password can not be less than 6 characters';
        }
        if ($data['pass'] != $data['pass_verify']) {
            $data['password_match_error'] = 'Password does not match';
        }
        if (empty($data['empty_error']) && empty($data['password_error']) && empty($data['password_len_error']) && empty($data['password_match_error'])) {
            return true;
        } else {
            $this->view('Login/create', $data);
        }
    }

    public function validateLoginData($data)
    {
        if (empty($data['username'])) {
            $data['empty_error'] = 'Username can not be empty';
        }

        if (empty($data['password'])) {
            $data['password_error'] = 'Password can not be empty';
        }

        if (!empty($data['username']) && empty($data['password'])) {
            $data['password_error'] = 'Password can not be empty';
            $data['msg'] = 'Please enter password';
        }

        if (empty($data['username']) && !empty($data['password'])) {
            $data['empty_error'] = 'Username can not be empty';
            $data['msg'] = 'Please enter username';
        }

        if (!empty($data['username']) && !password_verify($data['password'], $data['hashed_password'])) {
            $data['password_match_error'] = ' Password incorrect';
        }

        if (empty($data['empty_error']) && empty($data['password_error']) && empty($data['password_match_error'])) {
            return true;
        } else {
            $this->view('Login/index', $data);
        }
    }

    public function createSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['is_new_user'] = $user->gotFirstDiscount;
        $_SESSION['user_username'] = $user->username;
    }

    public function logout()
    {
        unset( $_SESSION['user_id']);
        unset($_SESSION['user_username']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/WebsiteMVC/Login/">';
    }

    // public function getSignUpDiscount()
    // {
        // $user = $this->loginModel->getSignUpDiscount();
        // echo "sign up was pressed";
        // var_dump($user);
    // }
}

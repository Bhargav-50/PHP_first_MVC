<?php
ob_start();
session_start();
require_once('model/model.php');
class controller extends model{
    public function __construct(){
        parent::__construct();        
        // echo "<pre>";
        // print_r($_SERVER);
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once('views/header.php');
                    include_once('views/main_page.php');
                    include_once('views/footer.php');
                    break;
                case '/about':
                    include_once('views/header.php');
                    include_once('views/about.php');
                    include_once('views/footer.php');                   
                    break;
                case '/services':
                    include_once('views/header.php');
                    include_once('views/services.php');
                    include_once('views/footer.php');                                                           
                    break;    
                case '/contact':
                    include_once('views/header.php');
                    include_once('views/contact.php');
                    include_once('views/footer.php');                   
                    break;
                case '/login':
                    include_once('views/header.php');
                    include_once('views/login.php');
                    include_once('views/footer.php');
                    if (isset($_REQUEST['btn-save'])) { 
                        //    echo "<pre>";
                        //    print_r($_REQUEST);
                              
                            $InsertRes = $this->login($_REQUEST['uname'], $_REQUEST['pass']); 
                            //   echo "<pre>";
                            //   print_r($InsertRes);
                            if ($InsertRes['Code'] == 1) {
                                $_SESSION['UserData'] = $InsertRes['Data'];
                                if ($InsertRes['Data']->role_id==1) {
                                    header("location:admindashboard");
                                }else{
                                    header("location:home");
                                } 
                            }else {
                                echo "<script>alert('Try again')</script>";
                            }
                        }                   
                    break;
                case '/logout':
                    session_destroy();
                    header("location:login");                    
                    break;
                
                case '/admindashboard':
                    $AllUsers = $this->select('main'); 
                    // echo '<pre>';
                    // echo print_r($AllUsers);
                    include_once('views/admin/header.php');
                    include_once('views/admin/admin_dash.php');
                    include_once('views/admin/footer.php');
                    break;

                case '/allusers':
                    $AllUsers = $this->select('main'); 
                    // echo "<pre>";
                    // print_r($AllUser);
                    include_once('views/admin/header.php');
                    include_once('views/admin/listallusers.php');
                    include_once('views/admin/footer.php'); 
                    break;  
                    case '/addnewadmin':
                        $AllUsers = $this->select('main');
                        include_once('views/admin/header.php');
                        include_once('views/admin/addadmin.php');
                        include_once('views/admin/footer.php');    
    
                        if (isset($_REQUEST['btn-save'])) {
                               echo "<pre>";
                               print_r($_REQUEST);
    
                            if ($_FILES['pro_pic']['error']==0) {
                                $Imagename= $_FILES['pro_pic']['name'];
                              if (move_uploaded_file ($_FILES['pro_pic']['tmp_name'],"image/$Imagename")) {
                                  $imagedb = $Imagename;
                              }else {
                                  $imagedb = 'default';
                              }
                                
                            }
                                $InsertData = array("user_name"=>$_REQUEST ['uname'],"password"=>$_REQUEST ['pass'],
                            "email"=>$_REQUEST ['email'],"mobile"=>$_REQUEST ['mobile'], "role_id"=>'1', "pro_pic" => $imagedb); 
                                  $InsertRes = $this->insert("main",$InsertData);
                                //   echo "<pre>";
                                //   print_r($InsertRes);
                                if ($InsertRes['Code'] == 1) { 
                                     echo "<script>alert('Register success')</script>";
                                     header("location:dashboard");
                                }else {
                                    echo "<script>alert('Try again')</script>";
                                }
                            }
                        break;

                
                    case '/addnewuser':
                        $AllUsers = $this->select('main'); 
                        // echo "<pre>";
                        // print_r($AllUser);
                        include_once('views/admin/header.php');
                        include_once('views/admin/addnewuser.php');
                        include_once('views/admin/footer.php'); 
                        if (isset($_REQUEST['btn-save'])) {
                            echo "<pre>";
                            print_r($_REQUEST);
 
                         if ($_FILES['pro_pic']['error']==0) {
                             $Imagename= $_FILES['pro_pic']['name'];
                           if (move_uploaded_file ($_FILES['pro_pic']['tmp_name'],"image/$Imagename")) {
                               $imagedb = $Imagename;
                           }else {
                               $imagedb = 'default';
                           }
                             
                         }
                             $InsertData = array("user_name"=>$_REQUEST ['uname'],"password"=>$_REQUEST ['pass'],
                         "email"=>$_REQUEST ['email'],"mobile"=>$_REQUEST ['mobile'], "role_id"=>'0', "pro_pic" => $imagedb); 
                               $InsertRes = $this->insert("main",$InsertData);
                             //   echo "<pre>";
                             //   print_r($InsertRes);
                             if ($InsertRes['Code'] == 1) { 
                                  echo "<script>alert('Register success')</script>";
                                  header("location:admindashboard");
                             }else {
                                 echo "<script>alert('Try again')</script>";
                             }
                         }
                        break;

                        case '/edit':
                            $userID = 'main WHERE user_id = '.$_REQUEST['id'];
                            $UserDataById = $this->select($userID); 
                            // echo "<pre>";
                            // print_r($UserDataById);
                            include_once('views/admin/header.php');
                            include_once('views/admin/usersforedit.php');
                            include_once('views/admin/footer.php'); 
                            if (isset($_REQUEST['btn-save'])) {
                                //    echo "<pre>";
                                //    print_r($_REQUEST);
                                       
                                      if ($_FILES['pro_pic']['name'] != "") {
                                          $Imagename= $_FILES['pro_pic']['name'];
                                        if (move_uploaded_file ($_FILES['pro_pic']['tmp_name'],"image/$Imagename")) {
                                            $imagedb = ",pro_pic='". $Imagename."'" ;
                                        }
                                          
                                      }else {
                                            $imagedb = "";
                                      }
                                      
                                      $data= "user_name='".$_REQUEST['uname']."',email='".$_REQUEST ['email']."',mobile='".$_REQUEST ['mobile']. "',role_id = '0 ' ".$imagedb." WHERE user_id =  " .$_REQUEST['id'];
                                      $InsertRes = $this->update("main",$data);
                                    //   echo "<pre>";
                                    //   print_r($InsertRes);
                                      if ($InsertRes['Code'] == 1) { 
                                        echo "<script>alert('User Adit success')</script>";
                                        
                                        }else {
                                       echo "<script>alert('Try again')</script>";
                                        }
                            }
                            break;
                case '/registration':
                    include_once('views/header.php');
                    include_once('views/registration.php');
                    include_once('views/footer.php');    

                    if (isset($_REQUEST['btn-save'])) {
                           echo "<pre>";
                           print_r($_REQUEST);

                        if ($_FILES['pro_pic']['error']==0) {
                            $Imagename= $_FILES['pro_pic']['name'];
                          if (move_uploaded_file ($_FILES['pro_pic']['tmp_name'],"image/$Imagename")) {
                              $imagedb = $Imagename;
                          }else {
                              $imagedb = 'default';
                          }
                            
                        }
                            $InsertData = array("user_name"=>$_REQUEST ['uname'],"password"=>$_REQUEST ['pass'],
                        "email"=>$_REQUEST ['email'],"mobile"=>$_REQUEST ['mobile'], "role_id"=>'0', "pro_pic" => $imagedb); 
                              $InsertRes = $this->insert("main",$InsertData);
                            //   echo "<pre>";
                            //   print_r($InsertRes);
                            if ($InsertRes['Code'] == 1) { 
                                 echo "<script>alert('Register success')</script>";
                                 header("location:login");
                            }else {
                                echo "<script>alert('Try again')</script>";
                            }
                        }
                    break;

                default:
                include_once('views/header.php');
                echo "<br><br><br><br><br><h2> 404 Page Not Found</h2><br><br>";
                include_once('views/footer.php'); 
                }
        }else {
            header('location:home');
        }
    }
}
$controller =  new controller;
ob_end_flush();
?>
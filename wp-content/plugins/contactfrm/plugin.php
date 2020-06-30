<?php

/*
Plugin Name: Form Contact us By wordpress
Plugin URI:  https://github.com/Idoufkir/Plugin-Form-Contact-
Description: Simple contact form plugin. Form display is done via a shortcode.
Version:     1.0.0
Author:      IDOUFKIR Mustafa
*/




require_once(ABSPATH . 'wp-config.php');
$connex = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysqli_select_db($connex, DB_NAME);


function newTableData()
{
    global $connex;

    $sql = "CREATE TABLE contactfrm(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, name varchar(255) NOT NULL, email varchar(255) NOT NULL, phone varchar(255) NOT NULL, message text NOT NULL)";
    $result = mysqli_query($connex, $sql);
    return $result;
}

if ($connex == true){
    newTableData();
}



add_action("admin_menu", "addMenu");
function addMenu()
{
  add_menu_page("contact_form", "contact_form", 4, "contact-frm", "contactform" );

}

// function mytheme_files() { 
//     wp_enqueue_style('mytheme_main_style', get_stylesheet_uri()); 
//     wp_enqueue_style('mytheme_mobile_style', get_theme_file_uri('/css/contact.css')); 
// } 

// add_action('wp_enqueue_scripts', 'mytheme_files');

function contactform()
{
echo <<< 'EOD'
<div class="container1">
  <form class="contact1-form validate-form" method="post">
    <span class="contact1-form-title">
					Contact Us
	</span>

                <div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="name" placeholder="Name">
					    <span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="text" name="email" placeholder="Email">
					    <span class="shadow-input1"></span>
				</div>
    
				<div class="wrap-input1 validate-input" data-validate = "Phone is required">
					<input class="input1" type="text" name="phone" placeholder="Phone">
					    <span class="shadow-input1"></span>
				</div>

                <div class="wrap-input1 validate-input" data-validate = "Message is required">
                    <textarea class="input1" name="message" placeholder="Message"></textarea>
                        <span class="shadow-input1"></span>
                 </div>

                 <div class="container-contact1-form-btn">
                 <button name="save" class="contact1-form-btn">
                     <span>
                         Send Email
                         <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                     </span>
                 </button>
             </div>
         </form>
</div>

EOD;
}




    function contact($atts){
        extract(shortcode_atts(
            array(
                'name' => 'true',
                'email' => 'true',
                'phone' => 'true',
                'message' => 'true'

        ), $atts));

        if($name== "true"){
            $name1 = '<div class="wrap-input1 validate-input" data-validate = "Name is required">
            <input class="input1" type="text" name="name" placeholder="Name">
                <span class="shadow-input1"></span>
        </div>';
        }else{
            $name1 = "";
        }

        if($email== "true"){
            $email1 = '<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input1" type="text" name="email" placeholder="Email">
                <span class="shadow-input1"></span>
        </div>';
        }else{
            $email1 = "";
        }

        if($phone== "true"){
            $phone1 = '<div class="wrap-input1 validate-input" data-validate = "Phone is required">
            <input class="input1" type="text" name="phone" placeholder="Phone">
                <span class="shadow-input1"></span>
        </div>';
        }else{
            $phone1 = "";
        }

         if($message== "true"){
            $message1 = '<div class="wrap-input2 validate-input" data-validate = "Message is required">
            <textarea class="input2" name="message" placeholder="Message"></textarea>
                <span class="shadow-input2"></span>
         </div>';
        }else{
            $message1 = "";
        }



        echo '<form method="POST"  >' .$name1 . $email1 . $phone1 . $message1 . '<br /><br />    <input type="submit" name="save" value="Submit">

        </form><br />';
    }
    add_shortcode('contact_form', 'contact');



    function form($name, $email,  $phone, $message)
    {
        global $connex;

      $sql = "INSERT INTO contactfrm(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
      $result = mysqli_query($connex , $sql);

      return $result;
    }

    if(isset($_POST['save'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        form($name, $email, $phone, $message);



    }






?>
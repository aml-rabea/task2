<?php 

session_start();
require 'dbcoon.php';
require 'Validate.php';


class User
{
    private $title;
    private $content;
    private $image;

    // function __construct( )
    // {
  
    // }

    public function Register($val1, $val2 , $val3 )
    {

        ## Create Obj From Validator  ......
        $validator = new Validator();
       
        # Clean ....
        $this->title     = $validator->Clean($val1);
        $this->content    = $validator->Clean($val2);
        $this->image       = $validator->Clean($val3);

        # Validation .....
        $errors = [];

        # Validate title ...
        if (!$validator->Validate($this->title, 1)) {
            $errors['title'] = 'Field Required';
        }
        elseif (!$validator->Validate($this->content, 3,4)) {
            $errors['title'] = 'Invalid content';
        }


        # Validate content
        if (!$validator->Validate($this->content, 1)) {
            $errors['content'] = 'Field Required';
        } elseif (!$validator->Validate($this->content, 3,10)) {
            $errors['content'] = 'Invalid content';
        }

         # Validate Image
    if (!Validate($_FILES['image']['name'],1)) {
        $errors['Image'] = 'Field Required';
    }else{

         $ImgTempPath = $_FILES['image']['tmp_name'];
         $ImgName     = $_FILES['image']['name'];

         $extArray = explode('.',$ImgName);
         $ImageExtension = strtolower(end($extArray));

         if (!Validate($ImageExtension,6)) {
            $errors['Image'] = 'Invalid Extension';
         }else{
             $FinalName = time().rand().'.'.$ImageExtension;
         }

    }
    
       # CHECK ERRORS ...   
        if (count($errors) > 0) {
            $Message = $errors;
        }else{
    
        
         
         # Create DB Obj ...
         $db = new DB();

         $sql = "insert into blogs (title,content,image) values ('$this->title','$this->content','$this->image')";
         $op  = $db->doQuery($sql);

         if($op){
             $Message = ['Raw Inserted'];
         }else{
             $Message = ['Error Try Again !!!!!'];
         }
 
        }
      
        $_SESSION['Message'] = $Message;
    
    }



    public function info(){
        echo 'Name .....';
    }
}

?>
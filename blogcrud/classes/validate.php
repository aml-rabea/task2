<?php

class Validator
{
    public function Clean($input)
    {
        return trim(strip_tags(stripslashes($input)));
    }

    public function Validate($input, $flag)
    {
        $status = true;

        switch ($flag) {
            case 1:
                # code...
                if (empty($input)) {
                    $status = false;
                }
                break;

            case 2:
                # code ....
                if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                    $status = false;
                }
                break;

             case 3: 
           #code .... 
           if (strlen($input) < $length){
               $status = false;
           }  
           break;

            case 4:
                # code .... a
                if (!filter_var($input, FILTER_VALIDATE_INT)) {
                    $status = false;
                }
                break;

            case 5:
                #code ....
                if (strlen($input) != 11) {
                    $status = false;
                }
                case 6: 
            # Code ....
            $allowedExt = ['png','jpg']; 
                 if(!in_array($input,$allowedExt)){
                    $status = false;
                 }
                break;
        }

        return $status;
    }
}

?>

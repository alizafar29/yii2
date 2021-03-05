<?php

namespace frontend\widgets;

use yii\base\Widget;


class login extends Widget{
    public $name;
    public $password;
    
    public function init(){
        if($this->name == ""){
            $this->name = "Name";
        }
        if($this->password == ""){
            $this->password = "Password";
        }
        parent::init();

    }

    public function run(){

        $html ="<div class='container bgcolor'>
                    <label for='uname'><b>$this->name</b></label><br>
                    <input type='text' id='name' placeholder='Enter Username' name='uname' required><br><br>
            
                    <label for='psw'><b>$this->password</b></label><br>
                    <input type='password' id='password' placeholder='Enter Password' name='psw' required><br><br>
                    
                    <button type='submit' onclick='fun()'>Login</button><br>
                    </form>
                </div>";

  return $html;

    }
}

?>
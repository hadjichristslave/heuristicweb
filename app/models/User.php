<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');






    public static function foo(){
       var_dump(Input::all()); 
        $mail = new PHPMailer;

    	$mail->SMTPDebug = 3;
    	
    	$mail->isSMTP();    
    	$mail->Host = 'smtp.gmail.com';
    	$mail->SMTPAuth = true;
    	$mail->Username = 'kagourasph@gmail.com';
    	$mail->Password = '!@#k4m12k13p17#@!';
    	$mail->SMTPSecure = 'ssl';
    	$mail->Port = 465;
    	
    	$mail->From = Input::get('email');
    	$mail->FromName = Input::get('name');
        $mail->AddAddress("kagourasph@gmail.com", "Panos");	
    	$mail->isHTML(true);
    	
    	$mail->Subject = 'New website comment';
    	$mail->Body    = Input::get('message'); 
    	$mail->AltBody =  Input::get('message'); 
    	
        return ($mail->send())?true:false;
    }
}

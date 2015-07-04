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
        $mail = new PHPMailer;

    	$mail->SMTPDebug = 0;
        var_dump(Input::all()); 	
    	$mail->isSMTP();    
    	$mail->Host = 'smtp.gmail.com';
    	$mail->SMTPAuth = true;
    	$mail->Username = 'kagourasph@gmail.com';
    	$mail->Password = '1234!@#$aA';
    	$mail->SMTPSecure = 'ssl';
    	$mail->Port = 465;
    	
    	$mail->SetFrom = Input::get('email');
        $mail->FromName = Input::get('name');

        $mail->AddAddress("p.chatzichristodoulou@gmail.com", "Panos");	
    	$mail->isHTML(true);
    	
    	$mail->Subject = 'New website message'; 
    	$mail->Body    = Input::get('message'). "<br> with email " . Input::get('email') . "<br> and phone " . Input::get('phone'); 
    	$mail->AltBody =  Input::get('message'). "\n with email " . Input::get('email') . "\n and phone " . Input::get('phone'); 
    	
        return ($mail->send())?true:false;
    }
}

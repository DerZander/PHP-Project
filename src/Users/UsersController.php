<?php


namespace App\Users;


use App\Core\AbstractController;

class UsersController extends AbstractController
{

    public function __construct(UsersRepository $usersRepository){
        $this->usersRepository = $usersRepository;
    }

    public function edit(){
        $message = null;
        $user_id = $_SESSION['user_id'];
        $entry = $this->usersRepository->fetchOne($user_id);
        if($_POST){
            $entry->id = $user_id;
            $entry->first_name = $_POST['first_name'];
            $entry->last_name = $_POST['last_name'];
            $entry->birthday = $_POST['birthday'];
            $entry->email = $_POST['email'];
            $entry->street = $_POST['street'];
            $entry->housenumber= $_POST['housenumber'];
            $entry->postcode = $_POST['postcode'];
            $entry->city = $_POST['city'];
/*
            if(empty($_POST['old_password']) AND empty($_POST['new_password'])){
                $old_password = $_POST['old_password'];
                $new_password = $_POST['new_password'];
                if(password_verify($old_password, $entry->password)){
                    $entry->password = password_hash($new_password,PASSWORD_BCRYPT);
                }else{
                    $message = "Passwort verfi nicht.";
                }
            }else{
                $message = "Passwort simmt nicht.";
            }
*/
            $this->usersRepository->update($entry);
            header("Location: user-edit");
            return;
        }
        $this->render("users/edit",[
            "entry" => $entry,
            "message" => $message,
        ]);

    }
}
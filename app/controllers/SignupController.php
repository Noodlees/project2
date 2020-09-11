<?php
use Phalcon\Mvc\Controller;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Http\Response;

Class SignupController extends Controller
{
    public function indexAction()
    {

    }

    public function registerAction()
    {
        $user = new Users();

        //assign value from the form to $user
        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email',
                'password'
            ]
        );

        // Store and check for errors
        $success = $user->save();

        // passing the result to the view
        $this->view->success = $success;

        if ($success) {
            $message = "Thanks for registering!";
        } else {
            $message = "Sorry, the following problems were generated:<br>"
                . implode('<br>', $user->getMessages());
        }

        // passing a message to the view
        $this->view->message = $message;
    }


    /* Validation
    */
    private function validateRegistration()
    {

        $validation = new Phalcon\Validation;

        $validation = add(
            'email',

            new Email (
                array(
                    'message' => 'Ымейл уже занят, алло'
                )
            )
        );
    }
}
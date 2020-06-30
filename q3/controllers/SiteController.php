<?php

namespace app\controllers;

use box\Controller;
use box\View;
use app\models\Email;
use app\models\Phone;

//$emails = (new Email)->fetch("email = 'qq@qq.qq'");
//(new Email)->append(['email' => 'qq@qq.qq']);

class SiteController extends Controller
{
    public function actionIndex() {
        return View::render('index');
    }

    public function actionGetemails() {
        $emails = (new Email)->fetch();
        $phones = (new Phone)->fetch();

        //Тут без sql JOIN !
        foreach ($phones as $phone) {
            $email_id = $phone['email_id'];
            $emails[$email_id]['phones'][] = $phone['phone'];
        }

        return View::renderPartial('emails', ['emails' => $emails]);
    }

    public function actionAddphone() {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $success = false;

        $mPhone = new Phone;
        $phones = $mPhone->fetch("phone='$phone'");

        if (!$phones) {
            $mEmail = new Email;
            $emails = $mEmail->fetch("email='$email'");

            if (!$emails) {
                $mEmail->append(['email' => $email]);
                $emails = $mEmail->fetch("email='$email'");
            }

            $mPhone->append([
                'email_id' => array_shift($emails)['id'],
                'phone' => $phone,
            ]);

            $success = true;
        }

        return ['success' => $success];
    }

    public function actionRetrievephones() {
        $email = $_POST['email'];
        $success = false;

        $emails = (new Email)->fetch("email='$email'");

        if ($emails) {
            $emailId = array_shift($emails)['id'];
            $phones = (new Phone)->fetch("email_id='$emailId'");
            $phoneList = [];

            foreach ($phones as $phone) {
                $phoneList[] = $phone['phone'];
            }

            $success = $phoneList;
        }

        return ['success' => $success];
    }
}

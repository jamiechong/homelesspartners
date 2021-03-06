<?php

class HomeController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->render('/home/index/main');
        //$this->render('/home/static/cityshelters');
        //$this->render('/home/static/shelterstories');
        //$this->render('/home/static/story');
	}

	public function actionContact()
	{
		$this->render('/home/contact/main');
	}

	public function actionContactProcessor()
	{
		$name = Yii::app()->input->post('name');
		$email = Yii::app()->input->post('email');
		$body = Yii::app()->input->post('body');

		$body = 'Name: ' . $name . "\n" . 'Email: ' . $email . "\n\n" . $body;

		$email = new Email();
		$result = $email->send(Yii::app()->params['HP_SENDER_EMAIL_ADDRESS'], Yii::app()->params['HP_SENDER_EMAIL_ADDRESS'], 'Contact Us Request', $body);
	
		if($result)
		{
			Yii::app()->user->setFlash('success', 'Thanks for contacting us.');
		}
		else
		{
			Yii::app()->user->setFlash('error', '');
		}
		$this->redirect($this->createUrl('home/contact'));
	}
}

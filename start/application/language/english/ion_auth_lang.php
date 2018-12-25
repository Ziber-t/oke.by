<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Аккаунт успешно создан';
$lang['account_creation_unsuccessful'] 	 	 = 'Не удалось создать аккаунт';
$lang['account_creation_duplicate_email'] 	 = 'Email или используется или недействителен';
$lang['account_creation_duplicate_username'] = 'Логин или используется или недействителен';

// Password
$lang['password_change_successful'] 	 	 = 'Пароль успешно заменён';
$lang['password_change_unsuccessful'] 	  	 = 'Невозможно поменять пароль';
$lang['forgot_password_successful'] 	 	 = 'Проверьте почту';
$lang['forgot_password_unsuccessful'] 	 	 = 'Невозможно сбросить пароль';

// Activation
$lang['activate_successful'] 		  	     = 'Аккаунт активирован';
$lang['activate_unsuccessful'] 		 	     = 'Не удалось активировать аккаунт';
$lang['deactivate_successful'] 		  	     = 'Аккаунт деактивирован';
$lang['deactivate_unsuccessful'] 	  	     = 'Не удалось деактивировать учетную запись';
$lang['activation_email_successful'] 	  	 = 'Успешно!';
$lang['activation_email_unsuccessful']   	 = 'Ошибка!';

// Login / Logout
$lang['login_successful'] 		  	         = 'Удачно';
$lang['login_unsuccessful'] 		  	     = 'Неверный логин';
$lang['login_unsuccessful_not_active'] 		 = 'Аккаунт неактивен';
$lang['login_timeout']                       = 'Временно заблокирован. Попробуйте позже.';
$lang['logout_successful'] 		 	         = 'Ждем Вас снова!';

// Account Changes
$lang['update_successful'] 		 	         = 'Информация об учетной записи успешно обновлена';
$lang['update_unsuccessful'] 		 	     = 'Не удалось обновить информацию об учетной записи';
$lang['delete_successful']               = 'Пользователь удален';
$lang['delete_unsuccessful']           = 'Не удалось удалить пользователя';

// Groups
$lang['group_creation_successful']  = 'Группа успешно создана';
$lang['group_already_exists']       = 'Имя группы уже принято';
$lang['group_update_successful']    = 'Информация о группе обновлена';
$lang['group_delete_successful']    = 'Группа удалена';
$lang['group_delete_unsuccessful'] 	= 'Не удалось удалить группу';
$lang['group_name_required'] 		= 'Имя группы - обязательное поле';

// Activation Email
$lang['email_activation_subject']            = 'Активация аккаунта';
$lang['email_activate_heading']    = 'Активировать аккаунт для %s';
$lang['email_activate_subheading'] = 'Нажмите для продолжения %s.';
$lang['email_activate_link']       = 'Активируйте вашу учетную запись';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Подтверждение забытого пароля';
$lang['email_forgot_password_heading']    = 'Поменять пароль для %s';
$lang['email_forgot_password_subheading'] = 'Для того чтобы сбросить и поменять пароль нажмите на %s.';
$lang['email_forgot_password_link']       = 'Сбросить Пароль';

// New Password Email
$lang['email_new_password_subject']          = 'Новый пароль';
$lang['email_new_password_heading']    = 'Новый пароль для %s';
$lang['email_new_password_subheading'] = 'Сброшен пароль для: %s';

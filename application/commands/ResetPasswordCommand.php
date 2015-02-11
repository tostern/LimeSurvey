<?php
    /*
    * LimeSurvey (tm)
    * Copyright (C) 2011 The LimeSurvey Project Team / Carsten Schmitz
    * All rights reserved.
    * License: GNU/GPL License v2 or later, see LICENSE.php
    * LimeSurvey is free software. This version may have been modified pursuant
    * to the GNU General Public License, and as distributed it includes or
    * is derivative of works licensed under the GNU General Public License or
    * other free or open source software licenses.
    * See COPYRIGHT.php for copyright notices and details.
    *
    */
    class ResetPasswordCommand extends CConsoleCommand
    {
        public $connection;

        public function run($sArgument)
        {
            if (!isset($sArgument) || !isset($sArgument[0]) || !isset($sArgument[1])) die('You have to set username and password on the command line like this: php console.php username password');
            $iUserID = User::model()->findByAttributes(['users_name' => $sArgument[0]]);
            if ($iUserID)
            {
              User::model()->updatePassword($iUserID,$sArgument[1]);  
              echo "Password for user {$sArgument[0]} was set.\n";
            }
            else
            {
                echo "User {$sArgument[0]} not found.\n";
            }
        }
    }

?>
<?php


// live credentials
define('AUTHORIZE_NET_LOGIN', $Config['site']['AUTHORIZE_NET_LOGIN']);
define('AUTHORIZE_NET_KEY', $Config['site']['AUTHORIZE_NET_KEY']);
define('AUTHORIZENET_SANDBOX', $Config['site']['AUTHORIZENET_SANDBOX']=='1' ? true : false);



$AUTHORIZE_NET_LOGIN = AUTHORIZE_NET_LOGIN;
$AUTHORIZE_NET_KEY = AUTHORIZE_NET_KEY;


define('BOX_CLIENT_ID', $Config['site']['BOX_CLIENT_ID']);
define('BOX_CLIENT_SECRET', $Config['site']['BOX_CLIENT_SECRET']);
define('BOX_REDIRECT_URI', $Config['site']['BOX_REDIRECT_URI']);
define('BOX_FOLDER_ID', $Config['site']['BOX_FOLDER_ID']);


define('TRELLO_API_KEY', $Config['site']['TRELLO_API_KEY']);
define('TRELLO_TOKEN', $Config['site']['TRELLO_TOKEN']);
define('TRELLO_LIST_ID', $Config['site']['TRELLO_LIST_ID']);

define('BITLY_LOGIN', $Config['site']['BITLY_LOGIN']);
define('BITLY_KEY', $Config['site']['BITLY_KEY']);


define('PLIVO_SMS_AUTH_ID', $Config['site']['PLIVO_SMS_AUTH_ID']);
define('PLIVO_SMS_AUTH_TOKEN', $Config['site']['PLIVO_SMS_AUTH_TOKEN']);
define('PLIVO_SMS_SRC', $Config['site']['PLIVO_SMS_SRC']);


define('MANDRILL_API_KEY', $Config['site']['MANDRILL_API_KEY']);

define('ZIP_TAX_API_KEY', $Config['site']['ZIP_TAX_API_KEY']);


define('F_PATH', __DIR__ . '/../public_html');
define('A_PATH', __DIR__);

define('IS_LOCAL', false);
/*define('site_url_include', 'http://localhost/dtpadmin/'); */  /* For local */
 define('site_url_include', 'https://www.dtpadmin.com/');
 define('frontsite_url_include', 'https://www.filesupload.designtoprint.com/');

define('DANS_PHONE', '+17027677157');
define('MANAGER_CODE', 'dtp003');

define('RECAPTCHA_SITE_KEY', $Config['site']['RECAPTCHA_SITE_KEY']);
define('RECAPTCHA_SECRET_KEY', $Config['site']['RECAPTCHA_SECRET_KEY']);

?>
<?php

$config['ecomm_server_url']     = 'https://secureshop.firstdata.lv:8443/ecomm/MerchantHandler';
$config['ecomm_client_url']     = 'https://secureshop.firstdata.lv/ecomm/ClientHandler';
$config['cert_url']             = './certificate/JJ900085.pem'; //full path to keystore file
$config['cert_pass']            = 'GFOut24OpJg98TrsGn'; //keystore password
$config['currency']             = '978'; //428=LVL 978=EUR 840=USD 941=RSD 703=SKK 440=LTL 233=EEK 643=RUB 891=YUM


/*UNCOMMENT THIS WHEN YOU GO TO PRODUCTION SYSTEM, ALSO CHANGE KEYSTORE AND PASSWORD

$config['ecomm_server_url']     = 'https://secureshop.firstdata.lv:8443/ecomm/MerchantHandler';
$config['ecomm_client_url']     = 'https://secureshop.firstdata.lv/ecomm/ClientHandler';

*/


//MYSQL config
//!!!!! DO NOT CREATE DATABASE OR TABLE YOURSELF, IT WILL BE DONE AUTOMATICALY. CHANGE ONLY USER, PASS, HOST. !!!!!
$config['m_db_user']                =     'itmonten_db';
$config['m_db_pass']                =     'print00';
$config['m_db_host']                =     'localhost';
$config['m_db_database']            =     'itmonten_db';
$config['m_db_table_transaction']   =     'transaction';
$config['m_db_table_batch']         =     'batch';
$config['m_db_table_error']         =     'error';

?>
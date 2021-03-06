<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @package         Userconfigs
 * @since           1.0
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */

defined("XOOPS_ROOT_PATH") or die("XOOPS root path not defined");


$modversion = array();
$modversion['name'] = _MI_USERCONFIGS_NAME;
$modversion['description'] = _MI_USERCONFIGS_DSC;
$modversion['version'] = 1.42;
$modversion['author'] = 'Trabis';
$modversion['nickname'] = 'trabis';
$modversion['credits'] = 'The XOOPS Project';
$modversion['license'] = 'GNU GPL 2.0';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['official'] = 1;
//$modversion['help']           = 'page=help';
$modversion['image'] = 'images/logo.png';
$modversion['dirname'] = 'userconfigs';

//about
$modversion['release_date'] = '2013/01/01';
$modversion['module_website_url'] = 'http://www.xoops.org/';
$modversion['module_website_name'] = 'XOOPS';
$modversion['module_status'] = 'ALPHA 1';
$modversion['min_php'] = '5.3';
$modversion['min_xoops'] = '2.6.0';
$modversion['min_db'] = array('mysql' => '5.0.7', 'mysqli' => '5.0.7');

// paypal
$modversion['paypal'] = array();
$modversion['paypal']['business'] = 'lusopoemas@gmail.com';
$modversion['paypal']['item_name'] = '';
$modversion['paypal']['amount'] = 0;
$modversion['paypal']['currency_code'] = 'EUR';

// Admin things
$modversion['hasAdmin'] = 0;

// Manage extension
$modversion['extension'] = 1;
$modversion['extension_module'][] = 'system';

// Sql
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$i= 0;
$modversion['tables'][$i] = "userconfigs_item";
$i++;
$modversion['tables'][$i] = "userconfigs_option";

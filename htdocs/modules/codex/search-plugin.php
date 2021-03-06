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
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */

include dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'mainfile.php';

$xoops = Xoops::getInstance();
$xoops->header();
echo "
Since 2.6.0, the search functionality was removed from core.<br />
Now you need to install the 'Search' Module to get search functionality<br />
<br />
The method for implementing search does no longer uses xoops_version.php<br />
The 'Search' module provides a 'Plugin' interface that modules should implement<br />
The new class Xoops_Module_Plugin is the class that makes using plugins simple and effective!<br />
<br />
See how Codex module hooks into the search module just by using this codex/class/plugin/search.php
";

Xoops_Utils::dumpFile(dirname(__FILE__) . '/class/plugin/search.php');
$xoops->footer();

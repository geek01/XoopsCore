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
 * banners module
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         banners
 * @since           2.6.0
 * @author          Mage Grégory (AKA Mage)
 * @version         $Id: $
 */

defined('XOOPS_ROOT_PATH') or die('Restricted access');

class BannersBannerForm extends XoopsThemeForm
{
    /**
     * @param BannersBanner|XoopsObject $obj
     */
    public function __construct(BannersBanner &$obj)
    {
        $xoops = Xoops::getInstance();
        $helper = Banners::getInstance();

        if ($obj->isNew()) {
            $blank_img = 'blank.gif';
            $html_banner = 0;
        } else {
            if (substr_count($obj->getVar('banner_imageurl'), XOOPS_UPLOAD_URL . '/banners/') == false) {
                $blank_img = 'blank.gif';
            } else {
                $namefile = substr_replace($obj->getVar('banner_imageurl'), '', 0, strlen(XOOPS_UPLOAD_URL . '/banners/'));
                $pathfile =  XOOPS_ROOT_PATH . '/uploads/banners/' . $namefile;
                if (is_file($pathfile)){
                    $blank_img = str_replace( XOOPS_UPLOAD_URL . '/banners/', '', $obj->getVar('banner_imageurl', 'e') );
                } else {
                    $blank_img = 'blank.gif';
                }
            }
            $html_banner = $obj->getVar('banner_htmlbanner');
        }

        $title = $obj->isNew() ? sprintf( _AM_BANNERS_BANNERS_ADD ) : sprintf( _AM_BANNERS_BANNERS_EDIT );

        parent::__construct($title, 'form', 'banners.php', 'post', true);
        $this->setExtra('enctype="multipart/form-data"');
        $client_Handler = $helper->getHandlerBannerclient();
        $client_select = new XoopsFormSelect( _AM_BANNERS_CLIENTS_NAME, 'cid', $obj->getVar('banner_cid') );
        $client_select->addOptionArray($client_Handler->getList());
        $this->addElement($client_select, true);

        $imptotal = new XoopsFormText( _AM_BANNERS_BANNERS_IMPRESSIONSP, 'imptotal', 1, 255, $obj->getVar('banner_imptotal') );
        //$imptotal->setPattern('^[0-9]*[0-9]+$|^[0-9]+[0-9]*$', _AM_BANNERS_BANNERS_IMPRESSIONSP_PATTERN);
        $this->addElement($imptotal, true );

        $imgtray_img = new XoopsFormElementTray( _AM_BANNERS_BANNERS_IMAGE, '<br /><br />' );
        $imgtray_img->addElement(new XoopsFormText( _AM_BANNERS_BANNERS_IMGURL, 'imageurl', 8, 255, $obj->getVar('banner_imageurl')));
        $imgpath_img = sprintf( _AM_BANNERS_BANNERS_IMAGE_PATH, XOOPS_UPLOAD_PATH . '/banners/' );
        $imageselect_img = new XoopsFormSelect( $imgpath_img, 'banners_imageurl', $blank_img );
        $image_array_img = XoopsLists::getImgListAsArray( XOOPS_UPLOAD_PATH . '/banners' );
        $imageselect_img->addOption("$blank_img", $blank_img);
        foreach ($image_array_img as $image_img) {
            $imageselect_img->addOption("$image_img", $image_img);
        }
        $imageselect_img->setExtra( 'onchange="showImgSelected(\'xo-banners-img\', \'banners_imageurl\', \'banners\', \'\', \'' . XOOPS_UPLOAD_URL . '\' )"' );
        $imgtray_img->addElement( $imageselect_img, false);
        $imgtray_img->addElement( new XoopsFormLabel( '', "<br /><img src='" . XOOPS_UPLOAD_URL . "/banners/" . $blank_img . "' name='image_img' id='xo-banners-img' alt='' />" ) );
        $fileseltray_img = new XoopsFormElementTray('<br />','<br /><br />');
        $fileseltray_img->addElement(new XoopsFormFile(_AM_BANNERS_BANNERS_UPLOADS , 'banners_imageurl', 500000),false);
        $fileseltray_img->addElement(new XoopsFormLabel(''), false);
        $imgtray_img->addElement($fileseltray_img);
        $this->addElement($imgtray_img);

        $this->addElement(new XoopsFormText( _AM_BANNERS_BANNERS_CLICKURL, 'clickurl', 5, 255, $obj->getVar('banner_clickurl') ), false );

        $this->addElement(new XoopsFormRadioYN( _AM_BANNERS_BANNERS_USEHTML, 'htmlbanner', $html_banner) );

        $this->addElement(new xoopsFormTextArea( _AM_BANNERS_BANNERS_CODEHTML, 'htmlcode', $obj->getVar('banner_htmlcode'), 5, 5), false );
        if (!$obj->isNew()) {
            $this->addElement(new XoopsFormHidden( 'bid', $obj->getVar('banner_bid') ) );
        }
        $this->addElement(new XoopsFormHidden('op', 'save' ) );
        $this->addElement(new XoopsFormButton('', 'submit', XoopsLocale::A_SUBMIT, 'submit' ) );
    }
}
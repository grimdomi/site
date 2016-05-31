<?php
/*"******************************************************************************************************
*   (c) 2007-2013 by Kajona, www.kajona.de                                                              *
*       Published under the GNU LGPL v2.1, see /system/licence_lgpl.txt                                 *
*-------------------------------------------------------------------------------------------------------*
*	$Id: class_folder_validator.php 5409 2012-12-30 13:09:07Z sidler $                                   *
********************************************************************************************************/

/**
 * Validates, if the passed value is an existing folder
 *
 * @author sidler@mulchprod.de
 * @since 4.0
 * @package module_system
 */
class class_folder_validator implements interface_validator {

    /**
     * Validates the passed chunk of data.
     * In most cases, this'll be a string-object.
     *
     * @param string $objValue
     * @return bool
     */
    public function validate($objValue) {

        if(!is_string($objValue) || uniStrlen($objValue) == 0)
            return false;

        return is_dir(_realpath_.$objValue);
    }


    /**
     * Returns a string-based name of the current validator.
     * Used to pass the type of validator to the js-engine rendering the
     * form in the browser.
     *
     * @return string
     */
    public function getStrName() {
        return "folder";
    }
}

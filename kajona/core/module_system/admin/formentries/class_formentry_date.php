<?php
/*"******************************************************************************************************
*   (c) 2007-2013 by Kajona, www.kajona.de                                                              *
*       Published under the GNU LGPL v2.1, see /system/licence_lgpl.txt                                 *
*-------------------------------------------------------------------------------------------------------*
*	$Id: class_formentry_date.php 5884 2013-09-29 01:21:57Z sidler $                               *
********************************************************************************************************/

/**
 * @author sidler@mulchprod.de
 * @since 4.0
 * @package module_formgenerator
 */
class class_formentry_date extends class_formentry_base implements interface_formentry_printable {


    public function __construct($strFormName, $strSourceProperty, $objSourceObject = null) {
        parent::__construct($strFormName, $strSourceProperty, $objSourceObject);

        //set the default validator
        $this->setObjValidator(new class_date_validator());
    }

    /**
     * Renders the field itself.
     * In most cases, based on the current toolkit.
     *
     * @return string
     */
    public function renderField() {
        $objToolkit = class_carrier::getInstance()->getObjToolkit("admin");
        $strReturn = "";
        if($this->getStrHint() != null)
            $strReturn .= $objToolkit->formTextRow($this->getStrHint());

        $objDate = null;
        if($this->getStrValue() instanceof class_date)
            $objDate = $this->getStrValue();
        else if($this->getStrValue() != "")
            $objDate = new class_date($this->getStrValue());

        if($this->getBitReadonly())
            $strReturn .= $objToolkit->formInputText($this->getStrEntryName(), $this->getStrLabel(), dateToString($objDate, false), "", "", true);
        else
            $strReturn .= $objToolkit->formDateSingle($this->getStrEntryName(), $this->getStrLabel(), $objDate);

        return $strReturn;
    }



    protected function updateValue() {
        $arrParams = class_carrier::getAllParams();
        if((isset($arrParams[$this->getStrEntryName()."_day"]) && $arrParams[$this->getStrEntryName()."_day"] != "") || isset($arrParams[$this->getStrEntryName()])) {

            if(isset($arrParams[$this->getStrEntryName()]) && $arrParams[$this->getStrEntryName()] == "") {
                $this->setStrValue(null);
            }
            else {
                $objDate = new class_date();
                $objDate->generateDateFromParams($this->getStrEntryName(), $arrParams);
                $this->setStrValue($objDate->getLongTimestamp());
            }
        }
        else
            $this->setStrValue($this->getValueFromObject());

    }

    public function validateValue() {
        $objDate = new class_date("0");
        $objDate->generateDateFromParams($this->getStrEntryName(), class_carrier::getAllParams());
        return $this->getObjValidator()->validate($objDate);
    }

    public function setValueToObject() {

        if(uniSubstr($this->getStrSourceProperty(), 0, 3) == "obj" && !$this->getStrValue() instanceof class_date && $this->getStrValue() > 0)
            $this->setStrValue(new class_date($this->getStrValue()));
        return parent::setValueToObject();
    }



    /**
     * Returns a textual representation of the formentries' value.
     * May contain html, but should be stripped down to text-only.
     *
     * @return string
     */
    public function getValueAsText() {
        $objDate = null;
        if($this->getStrValue() instanceof class_date)
            $objDate = $this->getStrValue();
        else if($this->getStrValue() != "")
            $objDate = new class_date($this->getStrValue());

        if($objDate != null)
            return dateToString($objDate, false);

        return "";
    }

}

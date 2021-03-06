<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  iBROWS GmbH 2012
 * @author     Dominik Zogg <dominik.zogg@ibrows.ch>
 * @license    LGPLv3
 */

class FormExtendedCheckBox extends FormCheckBox
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'form_extendedcheckbox';


    /**
     * Generate the widget and return it as string
     * @return string
     */
    public function generate()
    {
        // The "required" attribute only makes sense for single checkboxes
        if (count($this->arrOptions) == 1 && $this->mandatory)
        {
            $this->arrAttributes['required'] = 'required';
        }

        // get template
        $strTemplate = $this->extendedcheckboxTpl ? $this->extendedcheckboxTpl : 'extendedcheckbox_default';

        // add _ to the suffix
        $strSuffix = $strSuffix ? '_' . $strSuffix : '';

        // options
        $arrOptions = $this->_prepareOptions($this->arrOptions, $strSuffix);

        // template
        $objTemplate = new FrontendTemplate($strTemplate);

        // add values to the template
        $objTemplate->id = $this->strId;
        $objTemplate->class = $this->strClass;
        $objTemplate->nameAttribute = $this->strName . $strSuffix;
        $objTemplate->label = $this->label;
        $objTemplate->sublabel = $this->sublabel;
        $objTemplate->required = $this->required;
        $objTemplate->options = $arrOptions;
        $objTemplate->optionscount = count($arrOptions);

        if($this->strError)
        {
            $objTemplate->error = $this->strError;
        }

        // return rendered widget
        return $objTemplate->parse();
    }

    /**
     * @param array $arrRawOptions
     * @return array
     */
    protected function _prepareOptions($arrRawOptions, $strSuffix = '')
    {
        // empty option array
        $arrOptions = array();

        // foreach option add prepared to the option array
        foreach($arrRawOptions as $intKey => $arrOption)
        {
            $arrOptions[$intKey] = array
            (
                'field' => array
                (
                    'name' => $this->strName . $strSuffix . ((count($arrRawOptions) > 1) ? '[]' : ''),
                    'id' => 'opt_' . $this->strId . $strSuffix . '_' . $intKey,
                    'value' => $arrOption['value'],
                    'checked' => $this->isChecked($arrOption),
                    'attributes' => $this->getAttributes(),
                ),
                'label' => array
                (
                    'id' => 'lbl_' . $this->strId . $strSuffix . '_' . $intKey,
                    'for' => 'opt_' . $this->strId . $strSuffix . '_' . $intKey,
                    'label' => $arrOption['label']
                )
            );
        }
        // return options array
        return($arrOptions);
    }
}

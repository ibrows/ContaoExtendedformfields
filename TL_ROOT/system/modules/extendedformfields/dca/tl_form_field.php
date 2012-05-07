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

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['extendedcheckbox'] = '{type_legend},type,name,label;{fconfig_legend},mandatory;{options_legend},options;{template_legend:hide},extendedcheckboxTpl;{expert_legend:hide},class';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['extendedselectmenu'] = str_replace('{submit_legend},addSubmit', '{template_legend:hide},extendedselectmenuTpl', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['select']);
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['extendedsubmit'] = $GLOBALS['TL_DCA']['tl_form_field']['palettes']['submit'] . '{template_legend:hide},extendedsubmitTpl';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['extendedtextarea'] = str_replace('{submit_legend},addSubmit', '{template_legend:hide},extendedtextareaTpl', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['textarea']);
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['extendedtextfield'] = str_replace('{submit_legend},addSubmit', '{template_legend:hide},extendedtextfieldTpl', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['text']);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['extendedcheckboxTpl'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['extendedcheckboxTpl'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_form_field_extended', 'getExtendedCheckBoxTemplates'),
    'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['extendedselectmenuTpl'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['extendedselectmenuTpl'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_form_field_extended', 'getExtendedSelectMenuTemplates'),
    'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['extendedsubmitTpl'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['extendedsubmitTpl'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_form_field_extended', 'getExtendedSubmitTemplates'),
    'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['extendedtextareaTpl'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['extendedtextareaTpl'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_form_field_extended', 'getExtendedTextAreaTemplates'),
    'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['extendedtextfieldTpl'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['extendedtextfieldTpl'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_form_field_extended', 'getExtendedTextFieldTemplates'),
    'eval'                    => array('tl_class'=>'w50')
);

class tl_form_field_extended extends Backend
{
    /**
     * Return all extended checkbox templates as array
     * @param DataContainer
     * @return array
     */
    public function getExtendedCheckBoxTemplates(DataContainer $dc)
    {
        $intPid = $dc->activeRecord->pid;

        if ($this->Input->get('act') == 'overrideAll')
        {
            $intPid = $this->Input->get('id');
        }

        return $this->getTemplateGroup('extendedcheckbox_', $intPid);
    }

    /**
     * Return all extended select menu templates as array
     * @param DataContainer
     * @return array
     */
    public function getExtendedSelectMenuTemplates(DataContainer $dc)
    {
        $intPid = $dc->activeRecord->pid;

        if ($this->Input->get('act') == 'overrideAll')
        {
            $intPid = $this->Input->get('id');
        }

        return $this->getTemplateGroup('extendedselectmenu_', $intPid);
    }

    /**
     * Return all extended submit templates as array
     * @param DataContainer
     * @return array
     */
    public function getExtendedSubmitTemplates(DataContainer $dc)
    {
        $intPid = $dc->activeRecord->pid;

        if ($this->Input->get('act') == 'overrideAll')
        {
            $intPid = $this->Input->get('id');
        }

        return $this->getTemplateGroup('extendedsubmit_', $intPid);
    }

    /**
     * Return all extended text area templates as array
     * @param DataContainer
     * @return array
     */
    public function getExtendedTextAreaTemplates(DataContainer $dc)
    {
        $intPid = $dc->activeRecord->pid;

        if ($this->Input->get('act') == 'overrideAll')
        {
            $intPid = $this->Input->get('id');
        }

        return $this->getTemplateGroup('extendedtextarea_', $intPid);
    }

    /**
     * Return all extended text field templates as array
     * @param DataContainer
     * @return array
     */
    public function getExtendedTextFieldTemplates(DataContainer $dc)
    {
        $intPid = $dc->activeRecord->pid;

        if ($this->Input->get('act') == 'overrideAll')
        {
            $intPid = $this->Input->get('id');
        }

        return $this->getTemplateGroup('extendedtextfield_', $intPid);
    }
}
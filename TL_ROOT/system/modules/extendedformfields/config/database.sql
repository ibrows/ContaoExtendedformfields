-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

--
-- Table `tl_form_field`
--

CREATE TABLE `tl_form_field` (
  `extendedcheckboxTpl` varchar(64) NOT NULL default '',
  `extendeddoublecheckboxTpl` varchar(64) NOT NULL default '',
  `extendedselectmenuTpl` varchar(64) NOT NULL default '',
  `extendedsubmitTpl` varchar(64) NOT NULL default '',
  `extendedtextareaTpl` varchar(64) NOT NULL default '',
  `extendedtextfieldTpl` varchar(64) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
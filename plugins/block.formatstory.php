<?php
/**
 * Smarty plugin to format text blocks
 *
 * @package Smarty
 * @subpackage PluginsBlock
 */

/**
 * Smarty {formatstory}{/formatstory} block plugin
 *
 * Type:     block function<br>
 * Name:     textformat<br>
 * Purpose:  format text a certain way with preset styles
 *           or custom wrap/indent settings<br>
 * Params:
 * <pre>
 * - char_set         - string (ISO-8859-1,US-ASCII)
 * - replace_bad        - boolean (true)
 * </pre>
 *
 * @param array                    $params   parameters
 * @param string                   $content  contents of the block
 * @param Smarty_Internal_Template $template template object
 * @param boolean                  &$repeat  repeat flag
 * @return string content re-formatted
 * @author Lalit Tanwar <lalit dot tanwar007 at gmail dot com>
 */
function smarty_block_formatstory($params, $content, $template, &$repeat)
{
	if (is_null($content)) {
		return;
	}
	$style = null;
	$indent = 0;
	$indent_first = 0;
	$indent_char = ' ';
	$wrap = 80;
	$wrap_char = "\n";
	$wrap_cut = false;
	$assign = null;
	$char_set = isset($params['charset'])? $params['charset'] : NULL;
	$replace_bad = isset($params['replace_bad'])? $params['replace_bad'] : NULL;

	$text = trim($content);
	if(strpos($text, "<br>") === false && strpos($text, "<p>") === false && strpos($text, "<br />") === false) $text = smarty_block_nl2br2($text);
	if(($char_set != "ISO-8859-1" && $char_set != "US-ASCII") && $replace_bad!=NULL) return stripslashes($text);
	$badwordchars = array(chr(212), chr(213), chr(210), chr(211), chr(209), chr(208), chr(201), chr(145), chr(146), chr(147), chr(148), chr(151), chr(150), chr(133));
	$fixedwordchars = array('&#8216;', '&#8217;', '&#8220;', '&#8221;', '&#8212;', '&#8211;', '&#8230;', '&#8216;', '&#8217;', '&#8220;', '&#8221;', '&#8212;', '&#8211;',  '&#8230;' );
	$text = str_replace($badwordchars,$fixedwordchars,stripslashes($text));
	return $text;
}

function smarty_block_nl2br2($string) {
	$string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
	return $string;
}

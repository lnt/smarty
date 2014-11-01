<?php
/**
 * Smarty plugin
*
* @package Smarty
* @subpackage PluginsFunction
*/

/**
 * Smarty {seo} function plugin
*
* Type:     function<br>
* Name:     seo<br>
* Date:     Dic 05, 2012
* Purpose:  seo url friendly.<br>
* Params:
* <pre>
* - string - (required) - Title to friendly URL conversion
* - divider - (required) - return good words separated by dashes
* </pre>
* Examples:
* <pre>
* {seo string="Lorem Ipsum"}
* {seo string="Lorem Ipsum" divider="_"}
* </pre>
*
* @version 1.0
* @author Concetto Vecchio <info@cvsolutions.it>
* @param array $params parameters
* @param Smarty_Internal_Template $template template object
* @return string
*/
function smarty_function_starrating($params, $template)
{
	$_output  = '';
	
	
	$rate = $params['rate'] ;
	
	if($rate == ''){
		$rate = 0;
	}
	
	$rating = number_format($rate, 1,'.','');
	
	$_output = '<span class="pull-right">';
	
	for($i=0; $i<5; $i++)
	{
		if($rating > 0.5)
		{
			$_output .= '<i class="fa fa-star fa-lg golden"></i>';
		}
		elseif($rating > 0.0)
		{
			$_output .= '<i class="fa fa-star-half-o fa-lg golden"></i>';
		}
		else
		{
			$_output .= '<i class="fa fa-star-o fa-lg golden"></i>';
		}
			
		$rating = $rating - 1.0;
	}
	
	$_output .= '</span>';
	
	return $_output;
	
}
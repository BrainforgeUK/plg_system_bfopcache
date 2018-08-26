<?php
/**
 * @package   Plugin which modifies the behaviour of PHP opcache.
 * @version   0.0.1
 * @author    http://www.brainforge.co.uk
 * @copyright Copyright (C) 2018 Jonathan Brain. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined('_JEXEC') or die;

class plgSystemBfopcache extends JPlugin
{
	/** TODO
	 * Check these parameters out - make configurable?
	 * opcache.validate_timestamps
	 * opcache.revalidate_freq
	 * opcache.revalidate_path
	 * opcache.file_update_protection
	 */
	function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}

	function onAfterInitialise()
	{
		if (JFactory::getApplication()->isAdmin())
		{
			// Only really need to do this to make configuration.php non-cacheable
			ini_set('opcache.enable', 0);
		}
		return true;
	}
}
?>

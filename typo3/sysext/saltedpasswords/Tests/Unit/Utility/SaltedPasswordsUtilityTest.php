<?php
namespace TYPO3\CMS\Saltedpasswords\Tests\Unit\Utility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009-2011 Marcus Krause <marcus#exp2009@t3sec.info>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Testcase for SaltedPasswordsUtility
 *
 * @author Marcus Krause <marcus#exp2009@t3sec.info>
 * @package TYPO3
 * @subpackage tx_saltedpasswords
 */
class SaltedPasswordsUtilityTest extends \tx_phpunit_testcase {

	/**
	 * Enable backup of global and system variables
	 *
	 * @var boolean
	 */
	protected $backupGlobals = TRUE;

	/**
	 * Exclude TYPO3_DB from backup/ restore of $GLOBALS
	 * because resource types cannot be handled during serializing
	 *
	 * @var array
	 */
	protected $backupGlobalsBlacklist = array('TYPO3_DB');

	/**
	 * @test
	 */
	public function doesReturnExtConfReturnDefaultSettingsIfNoExtensionConfigurationIsFound() {
		$this->assertEquals(\TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility::returnExtConfDefaults(), \TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility::returnExtConf('TEST_MODE'));
	}

	/**
	 * @test
	 */
	public function doesReturnExtConfReturnMergedSettingsIfExtensionConfigurationIsFound() {
		$setting = array('setting' => 1);
		$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['saltedpasswords'] = serialize(array('TEST_MODE.' => $setting));
		$this->assertEquals(array_merge(\TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility::returnExtConfDefaults(), $setting), \TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility::returnExtConf('TEST_MODE'));
	}

}


?>
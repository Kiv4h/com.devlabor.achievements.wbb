<?php
//wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * Manipulates AbstractAchievementObject.
 *
 * @author		Jeffrey 'Kiv' Reichardt
 * @copyright	2011-2012 devlabor.com
 * @package     	com.devlabor.achievements.wbb
 * @license		CC BY-NC-SA 3.0 <http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode>
 * @subpackage	system.event.listener
 */
 
class BurningBoardAchievementObjectListener implements EventListener{
    /**
	* @see EventListener::execute
	*/
    public function execute($eventObj, $className, $eventName){
        $eventObj->user = new AchievementUser($eventObj->user->userID, null, null, null, 'wbb_user.*,', ' LEFT JOIN wbb'.WBB_N.'_user wbb_user ON (wbb_user.userID = user.userID) ');
        $eventObj->compareAchievements();
    }
}
?>

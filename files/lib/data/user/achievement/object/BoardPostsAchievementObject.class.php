<?php
//wbb imports
require_once(WCF_DIR.'lib/data/user/achievement/object/AbstractAchievementObject.class.php');

/**
 * Earn achievement on posting.
 *
 * @author		Jeffrey 'Kiv' Reichardt
 * @copyright	2011-2012 devlabor.com
 * @package     	com.devlabor.achievements.wbb
 * @license		CC BY-NC-SA 3.0 <http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode>
 * @subpackage	data.user.achievement.object
 */

class BoardPostsAchievementObject extends AbstractAchievementObject{
	public $workerExecution = true;
	
    /**
     * @see AbstractAchievementObject::execute
     */
    public function execute($eventObj){
        parent::execute($eventObj);

		foreach($this->availableAchievements as $achievement){
            if($this->user->posts >= $achievement->objectQuantity){
                $achievement->awardToUser($this->user->userID);
            }
        }
    }
	
	/**
	 * @see AbstractAchievementObject::getProgress()
	 */
	public function getProgress(){
		parent::getProgress();

		return $this->user->posts;
	}
}
?>
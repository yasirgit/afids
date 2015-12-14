<?php

class MemberWingJobPeer extends BaseMemberWingJobPeer
{
	public static function getWingJob($member_id = null, $wing_job_id = null) {
		$c = new Criteria();
		if($member_id)   $c->add(self::MEMBER_ID, $member_id);
		if($wing_job_id) $c->add(self::WING_JOB_ID, $wing_job_id);
    return self::doSelect($c);
	}
}

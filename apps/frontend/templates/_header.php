<?php
$nav_menu = get_slot('nav_menu');
if (!isset($nav_menu[0]))
    $nav_menu[0] = '';
if (!isset($nav_menu[1]))
    $nav_menu[1] = '';
?>

<!--header starts-->
<div id="header">
    <!--additional navigation-->
    <div class="ad-nav">
        <ul>
            <?php if($sf_user->getId()): ?><li><a href="/secure/signOut">Log Out</a></li>
            <li><a href="/account/index">Account Settings</a></li><?php endif;?>
            <li><a href="/dashboard/index">AFW West Home</a></li>
        </ul>
    </div>
    <p class="welcome">Welcome, <?php echo $sf_user->getFirstname() ?></p>
    <!--a href="#" class="help">Help</a -->
    <!--navigation starts-->

    <ul class="nav">
        <li class="<?php if ('instrument' == $nav_menu[0])
    echo 'active' ?>"><a href="/dashboard/index" class="link-instrumental"><span><strong class="txt-nav">Instrument Panel</strong></span></a></li>
	<?php if ($sf_user->hasCredential(array('Administrator','Staff','Member','Coordinator','Volunteer'), false)){?>
        <li class="mission-el <?php if ('mission_coord' == $nav_menu[0])
            echo 'active' ?>">
            <a href="#" class="link-mission"><span><strong class="txt-nav">Mission Coordination</strong></span></a>
            <!--drop down-->
            <div class="drop">
                <div class="t">&nbsp;</div>
                <div class="c">
                    <div class="bg">
                        <div class="drop-columns">
                            <div class="holder alt">
                                <h3>Find / Add</h3>
                                <ul class="alter">
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a <?php if ($nav_menu[1] == 'find_passenger')
											echo 'class="selected"' ?> href="/passenger?filter=1"><span class="t-r"><span class="b-l"><span class="b-r">Find Passenger</span></span></span></a></li>
                                    <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a href="/companion?filter=1"><span class="t-r"><span class="b-l"><span class="b-r">Find Companion</span></span></span></a></li>
                                    <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a href="/requester?filter=1<?php //echo url_for('@default?module=requester&action=index&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Find Requester</span></span></span></a></li>
                                    <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a <?php if ($nav_menu[1] == 'find-agency')
											echo 'class="selected"' ?> href="/agency?filter=1<?php //echo url_for('@default?module=agency&action=index&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Find Agency</span></span></span></a></li>
                                    <?php }?>                                   
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a href="/leg?filter=1<?php //echo url_for('@leg?filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Find Leg</span></span></span></a></li>
                                    <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a href="/mission?filter=1"><span class="t-r"><span class="b-l"><span class="b-r">Find Mission</span></span></span></a></li>
                                    <?php }?>
									
                                </ul>
                                <ul>                                    
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false))  {?>
                                        <li><a <?php if ($nav_menu[1] == 'find-camp')
											echo 'class="selected"' ?> href="/camp?filter=1<?php //echo url_for('@default?module=camp&action=index&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Find Camp</span></span></span></a></li>
                                    <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false))  {?>
                                        <li><a <?php if ($nav_menu[1] == 'find-airport')
											echo 'class="selected"' ?> href="/airport?filter=1<?php //echo url_for('@default?module=airport&action=index&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Find Airport</span></span></span></a></li>
                                    <?php }?>
                                     <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false))  {?>
                                        <li><a <?php if ($nav_menu[1] == 'find-itinerary')
											echo 'class="selected"' ?> href="/itinerary?filter=1<?php //echo url_for('@default?module=airport&action=index&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Find Itinerary</span></span></span></a></li>
                                    <?php }?>
                                </ul>
                            </div>

                            <div class="holder">
                                <h3></h3>
                                <ul>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                        <li><a href="/passenger/find?filter=1<?php //echo url_for('@default?module=passenger&action=find&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Passenger</span></span></span></a></li>
                                    <?php }?>
                                   <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
					<li><a href="/person/update<?php //echo url_for('@default?module=person&action=update') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Person</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {?>
                                        <li><a href="/requester/find?filter=1<?php //echo url_for('@default?module=requester&action=find&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Requester</span></span></span></a></li>
                                    <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)) {?>
                                        <li><a <?php if ($nav_menu[1] == 'add-agency') echo 'class="selected"' ?> href="/agency/create<?php //echo url_for('@default?module=agency&action=create') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Agency</span></span></span></a></li>
                                    <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {?>
                                        <li><a href="/itinerary/find?filter=1<?php //echo url_for('itinerary/find?filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Mission</span></span></span></a></li>
                                    <?php }?>                                                                        
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false))  {?>
                                        <li><a href="/camp/create<?php //echo url_for('@camp_create')?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Camp</span></span></span></a></li>
										<li><a href="/itinerary/create?filter=1<?php //echo url_for('itinerary/create?filter=1')  ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Itinerary</span></span></span></a></li>
                                    <?php }?>
									
									
									
									
                                    <!--li><a href="/request_legs<?php //echo url_for('request_legs') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Mission Available(Pilot)</span></span></span></a></li -->
                                    <!--li><a href="/mission_avalaible_camp<?php //echo url_for('mission_avalaible_camp') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Mission Available w/ camps(Pilot)</span></span></span></a></li -->
                                    <!--li><a href="/staff_available<?php //echo url_for('staff_available')?>"><span class="t-r"><span class="b-l"><span class="b-r">Mission Available(Staff)</span></span></span></a></li -->
                                </ul>
                            </div>
                            <!--div class="holder">
                                <h3>Other Stuff</h3>
                                <ul>
                                    <li><a href="/itinerary/find?filter=1<?php //echo url_for('itinerary/find?filter=1')  ?>"><span class="t-r"><span class="b-l"><span class="b-r">Itinerary</span></span></span></a></li>
                                    <li><a href="/itinerary/create?filter=1<?php //echo url_for('itinerary/create?filter=1')  ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Itinerary</span></span></span></a></li>
                                    <li><a href="/update_medical_release?filter=1<?php //echo url_for('@update_medical_release?filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Missions Medical Release Status</span></span></span></a></li>
                                    <?php $member = MemberPeer::getByPersonId($sf_user->getId()) ?>
                                    <?php if (isset($member)): ?>
                                        <li><a href="/account/index<?php //echo url_for('account/index') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Account Setting(pilot)</span></span></span></a></li>
                                    <?php else: ?>
                                            <li><a href="/account<?php //echo url_for('account') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Account Setting(personal)</span></span></span></a></li>
                                    <?php endif ?>
                                        </ul>
                                    </div -->
                        </div>
                    </div>
                </div>
                <div class="b">&nbsp;</div>

                <span class="triangle">&nbsp;</span>
            </div>
        </li>
        <li class="link-members-el <?php if ('members' == $nav_menu[0])
                                                echo 'active' ?>">
            <a href="#" class="link-members"><span><strong class="txt-nav">Members</strong></span></a>

            <!--drop down-->
            <div class="drop">
                <div class="t">&nbsp;</div>
                <div class="c">
                    <div class="bg">
                        <div class="drop-columns">
                            <div class="holder">
                                <h3>Find</h3>
                                <ul>
                                   <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>
                                        <li><a href="/member?filter=1&actives=1<?php //echo url_for('@default?module=member&action=index&filter=1&actives=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Member</span></span></span></a></li>
                                   <?php }?>
                                   <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a href="/pilot?filter=1<?php //echo url_for('@default?module=pilot&action=index&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Pilot</span></span></span></a></li>
                                   <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a href="/mission_report/review?fitler=1<?php //echo url_for('@default?module=mission_report&action=review&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Mission Report</span></span></span></a></li>
                                    <?php }?>
                                </ul>

                                <h3>Add</h3>
                                <ul>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Member'), false)){?>
                                        <li><a href="/pending_member/step1<?php //echo url_for('@default?module=member&action=find&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Member</span></span></span></a></li>
                                    <?php }?>
                                </ul>
                            </div>
                            <div class="holder">
                                <h3>Member Applications</h3>
                                <ul>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Member'), false)) {?>
                                            <li><a <?php if ($nav_menu[1] == 'add-application')
                                            echo 'class="selected"' ?> href="/pending_member/step1<?php //echo url_for('@default?module=pending_member&action=step1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add New Member Application</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                            <li><a <?php if ($nav_menu[1] == 'pending-application')
                                            echo 'class="selected"' ?> href="/pending_member<?php //echo url_for('@default?module=pending_member&action=index') ?>"><span class="t-r"><span class="b-l"><span class="b-r">New Member Applications</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                            <li><a <?php if ($nav_menu[1] == 'pending-search')
                                            echo 'class="selected"' ?> href="/reports/reports.php?reportDef=report_specs.xml&reportName=search_member_applications<?php //echo url_for('pending_member/search?filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Search Member Applications</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                            <li><a <?php if ($nav_menu[1] == 'pending-renewal')
                                            echo 'class="selected"' ?> href="/renewal<?php //echo url_for('@default?module=renewal&action=index') ?>"><span class="t-r"><span class="b-l"><span class="b-r">New Member Renewals</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
										<!--li><a href="/member/needsBN<?php //echo url_for('@member_needsbn') ?>"><span class="t-r"><span class="b-l"><span class="b-r">New Members Needing a Badge or Notebook</span></span></span></a></li -->
                                        <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=newMembersNeedingBadge&wing"><span class="t-r"><span class="b-l"><span class="b-r">New Members Needing a Badge or Notebook</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                            <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=newMembers"><span class="t-r"><span class="b-l"><span class="b-r">New Members' Status</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                            <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=memberApplications"><span class="t-r"><span class="b-l"><span class="b-r">Member Application for Reconciliation</span></span></span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b">&nbsp;</div>
                <span class="triangle">&nbsp;</span>
            </div>
        </li>
        <li class="link-reference-el <?php if ('reference' == $nav_menu[0])
                                                                    echo 'active' ?>">
            <a href="#" class="link-reference"><span><strong class="txt-nav">Reference</strong></span></a>

            <!--drop down-->
            <div class="drop">
                <div class="t">&nbsp;</div>
                <div class="c">

                    <div class="bg">
                        <div class="drop-columns three">
                            <div class="holder alt">
                                <h3>Find</h3>
                                <ul class="alter">
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff','Pilot'), false)) {?>
                                        <li><a <?php if ($nav_menu[1] == 'find-fbo') echo 'class="selected"' ?> href="/fbo?filter=1<?php //echo url_for('fbo/index?filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">FBO</span></span></span></a></li>
                                    <?php }?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                        <li><a <?php if ($nav_menu[1] == 'find-aircraft')
                                        echo 'class="selected"' ?> href="/aircraft?filter=1<?php //echo url_for('@default_index?module=aircraft&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Aircraft</span></span></span></a></li>
                                    <?php }?>
                                        <?php if($sf_user->hasCredential(array('Administrator', 'Staff'), false)){?>
                                                <li><a <?php if ($nav_menu[1] == 'find_afaorg')
                                                echo 'class="selected"' ?> href="/afaOrg?filter=1<?php //echo url_for('@default_index?module=afaOrg&filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Linking Organization</span></span></span></a></li>
                                        <?php }?>
                                        <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
                                        <li><a href="/role_permission<?php //echo url_for('@default_index?module=role_permission') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Role</span></span></span></a></li>
                                    <?php }?>
                                </ul>
                            </div>

                            <div class="holder">
                                <h3>Add</h3>
                                <ul>
                                   <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) {?>
                                        <li><a <?php if ($nav_menu[1] == 'find-fbo') echo 'class="selected"' ?> href="/fbo/create<?php //echo url_for('fbo/create') ?>"><span class="t-r"><span class="b-l"><span class="b-r">FBO</span></span></span></a></li>
                                    <?php }?>
                                    <?php if($sf_user->hasCredential(array('Administrator'), false)){?>
                                        <li><a href="/mclass/create<?php //echo url_for('mclass/create') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Member Class</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if($sf_user->hasCredential(array('Administrator'), false)){?>
                                        <li><a href="/ptype/create<?php //echo url_for('@default?module=passenger&action=updateType') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Passenger Type</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if($sf_user->hasCredential(array('Administrator'), false)){?>
                                        <li><a href="/mission/updateMisType<?php //echo url_for('mission/updateMisType') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Mission Type</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if($sf_user->hasCredential(array('Administrator'), false)){?>
                                        <li><a href="/vocation/new<?php //echo url_for('@default?module=vocation&action=new') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Vocation</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if($sf_user->hasCredential(array('Administrator'), false)){?>
                                        <li><a href="/wing/update<?php //echo url_for('wing/update') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Wing</span></span></span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="holder">
                                <h3>List</h3>
                                <ul>
                                    <?php if($sf_user->hasCredential(array('Administrator'), false)){?>
                                            <li><a href="/mclass <?php //echo url_for('mclass/index') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Member Class</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){?>
                                            <li><a href="/ptype<?php //echo url_for('@default?module=passenger&action=indexType') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Passenger Type</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){?>
                                            <li><a href="/pill<?php //echo url_for('@default?module=passenger&action=indexIllness') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Illness Category</span></span></span></a></li>
                                    <?php }?>
                                    <?php if($sf_user->hasCredential(array('Administrator'), false)){?>
                                            <li><a href="/mission/indexMisType<?php //echo url_for('mission/indexMisType') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Mission Type</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if($sf_user->hasCredential(array('Administrator'), false)){?>
                                            <li><a href="/vocation<?php //echo url_for('@default?module=vocation&action=index') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Vocation</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){?>
                                        <li><a href="/wing<?php //echo url_for('wing/index') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Wing</span></span></span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b">&nbsp;</div>

                <span class="triangle">&nbsp;</span>
            </div>
        </li>
        <li class="content-tools-el <?php if ('content-tools' == $nav_menu[0])
                                                                                        echo 'active' ?>">
            <a href="#" class="link-content-tools"><span><strong class="txt-nav">Content/Tools</strong></span></a>

            <!--drop down-->
            <div class="drop">
                <div class="t">&nbsp;</div>
                <div class="c">
                    <div class="bg">
                        <div class="drop-columns">
                            <div class="holder">
                                <h3>Web Content</h3>

                                <ul>
                                    <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
                                        <li><a href="/mission_photo"><span class="t-r"><span class="b-l"><span class="b-r">Review Mission Photos</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
                                        <li><a href="/mission_photo/approved_photo"><span class="t-r"><span class="b-l"><span class="b-r">List Mission Photos</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)){?>
                                        <li><a href="/event"><span class="t-r"><span class="b-l"><span class="b-r">List/Edit events in the database</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) {?>
                                        <li><a href="/event/new"><span class="t-r"><span class="b-l"><span class="b-r">Add a new event</span></span></span></a></li>
                                   <?php } ?>
                                   <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>
                                        <li><a href="/event/calendar"><span class="t-r"><span class="b-l"><span class="b-r">Calendar</span></span></span></a></li>
                                   <?php } ?>
                                </ul>
                                <h3>Bulk Emails</h3>
                                <ul>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                        <li><a href="/email_list<?php //echo url_for('@default?module=email_list&action=index') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Mailing List Management</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                         <li><a href="/email/sendBulk<?php //echo url_for('@default?module=email&action=sendBulk') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Create New Emails to Members</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                         <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">Create New Emails to Members (using missions)</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                         <li><a href="/email/sendBulkQueue"><span class="t-r"><span class="b-l"><span class="b-r">List/Edit Email Letters</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                          <li><a href="/email/listEditBulkQueuedEmail"><span class="t-r"><span class="b-l"><span class="b-r">List/Edit Email Queue</span></span></span></a></li>
                                    <?php } ?>
                                    <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) {?>
                                          <li><a href="/email/listEditBulkSentEmail"><span class="t-r"><span class="b-l"><span class="b-r">List/Edit Sent Emails</span></span></span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="holder">
                                <h3>Contacts</h3>
                                <ul>
                                     <?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) {?>
                                         <li><a href="/contact?filter=1<?php //echo url_for('@default?module=contact&action=index&filter=1'); ?>"><span class="t-r"><span class="b-l"><span class="b-r">Search Contacts</span></span></span></a></li>
                                     <?php } ?>
                                     <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)){?>
                                         <li><a href="/contact/add<?php //echo url_for('@default?module=contact&action=add'); ?>"><span class="t-r"><span class="b-l"><span class="b-r">Add Contacts</span></span></span></a></li>
                                     <?php } ?>
                                     <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) {?>
                                         <li><a href="/contact/listRequest<?php //echo url_for('@default?module=contact&action=listRequest'); ?>"><span class="t-r"><span class="b-l"><span class="b-r">List outstanding contact requests</span></span></span></a></li>
                                     <?php } ?>
                                </ul>
                                <h3>Data For Printing</h3>
                                <ul>                                    
                                     <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                                          <li><a href="/update_medical_release?filter=1<?php //echo url_for('@update_medical_release?filter=1') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Missions Medical Release Status</span></span></span></a></li>
                                    <?php } ?>
                                </ul>

                                

                            </div>
                        </div>
                    </div>
                </div>
                <div class="b">&nbsp;</div>
                <span class="triangle">&nbsp;</span>
            </div>
        </li>
        <li class="reports-el <?php if ('reports' == $nav_menu[0])
                                                                                            echo 'active' ?>">

            <a href="/reports/index.php" class="link-reports"><span><strong class="txt-nav">Reports</strong></span></a>
            <!--drop down-->
            <div class="drop">
                <div class="t">&nbsp;</div>
                <div class="c">
                    <div class="bg">
                        <ul class="reports-bar">						  
                            <li class="active"><a href="#tab3" class="tab active">Statistics</a></li>
                            <li><a href="#tab4" class="tab">Members</a></li>
                            <li><a href="#tab5" class="tab">Missions</a></li>
                            <li><a href="#tab6" class="tab">Misc.</a></li>						  
						</ul>
                        <div id="tab3">
                            <div class="drop-columns">
                                <div class="holder">
                                    <ul>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                            <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=mission_counts_YTD"><span class="t-r"><span class="b-l"><span class="b-r">Mission Counts (YTD)</span></span></span></a></li>
                                        <?php } ?>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                            <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=memberMissionCounts"><span class="t-r"><span class="b-l"><span class="b-r">Mission Counts by Member</span></span></span></a></li>
                                        <?php } ?>
					<?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                            <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">Mission Counts by Member (by Wing)</span></span></span></a></li>
                                        <?php } ?>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">ACN Mission Counts Year to Date</span></span></span></a></li>
                                        <?php } ?>
                                       <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=monthly_mission_report_summary"><span class="t-r"><span class="b-l"><span class="b-r">Mission Month Summary</span></span></span></a></li>
                                        <?php } ?>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=cancelled_mission_detail"><span class="t-r"><span class="b-l"><span class="b-r">Cancelled Missions Detail</span></span></span></a></li>
                                        <?php } ?>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">Member Counts</span></span></span></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="holder">
                                    <ul>
                                           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=memberMissionDistribution"><span class="t-r"><span class="b-l"><span class="b-r">Member Mission Distribution</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=statistical_summary"><span class="t-r"><span class="b-l"><span class="b-r">Statistical Summary</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">Air Charity Network&#0153; Statistics Report</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=childrenPassengersReport"><span class="t-r"><span class="b-l"><span class="b-r">Child Passengers Report</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=missionTypeWingStatsLeg"><span class="t-r"><span class="b-l"><span class="b-r">Permanent Mission Statistics</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=memberWingStatsMonth"><span class="t-r"><span class="b-l"><span class="b-r">Permanent Member Statistics</span></span></span></a></li>
                                            <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="tab4">
                            <div class="drop-columns">
                                <div class="holder">
                                    <ul>
                                           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=member_roster"><span class="t-r"><span class="b-l"><span class="b-r">Member Roster</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">Coordination Roster</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=membersTotalHours"><span class="t-r"><span class="b-l"><span class="b-r">Members' Flight Hours</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=hseats"><span class="t-r"><span class="b-l"><span class="b-r">Pilots' HSEATS status</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=membersNoMissions"><span class="t-r"><span class="b-l"><span class="b-r">Member who have not flown a mission</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=flightStatusWing"><span class="t-r"><span class="b-l"><span class="b-r">Members' Flight Status by Wing</span></span></span></a></li>
                                            <?php } ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div id="tab5">
                            <div class="drop-columns">
                                <div class="holder">
                                    <ul>
                                           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=weekendSummary"><span class="t-r"><span class="b-l"><span class="b-r">Missions Summary</span></span></span></a></li>
                                            <?php } ?>
                                           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=campPassengers"><span class="t-r"><span class="b-l"><span class="b-r">Camp Passenger Summary</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=campCounts"><span class="t-r"><span class="b-l"><span class="b-r">Camp Statistics</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/mission/pending<?php //echo url_for('@default?module=mission&action=pending') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Missions Pending</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                    <li><a href="/update_medical_release<?php //echo url_for('@update_medical_release') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Missions Medical Release Status</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="<?php echo url_for('@missing_waivers') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Missions Missing Waivers</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=alaskaAirlines"><span class="t-r"><span class="b-l"><span class="b-r">Alaska Airlines Report</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=missionTypesWing"><span class="t-r"><span class="b-l"><span class="b-r">Mission Types by Wing</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=outreachReport"><span class="t-r"><span class="b-l"><span class="b-r">Outreach Report</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="Origin Destination Summary Report"><span class="t-r"><span class="b-l"><span class="b-r">Origin/Destination by missions</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=originDestinationLegs"><span class="t-r"><span class="b-l"><span class="b-r">Origin/Destination by mission legs</span></span></span></a></li>
                                            <?php } ?>
                                    </ul>
                                </div>
                                <div class="holder">
                                    <ul>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">Origin/Destination by missions (with ACN legs)</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">Origin/Destination by mission legs (with ACN legs)</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=missionCostTracker"><span class="t-r"><span class="b-l"><span class="b-r">Mission Cost Tracking (Airlines &amp; Funds)</span></span></span></a></li>
                                            <?php } ?>
                                           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                    <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">HSEATS Reports from for ACN</span></span></span></a></li>
                                            <?php } ?>
                                            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                    <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=airport_landings"><span class="t-r"><span class="b-l"><span class="b-r">Airport Landings</span></span></span></a></li>
                                            <?php } ?>
                                    </ul>
                                    <h3>Mission Reports</h3>
                                    <ul>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                                <li><a href="<?php echo url_for('@default?module=mission_report&action=review') ?>"><span class="t-r"><span class="b-l"><span class="b-r">Mission Report Review</span></span></span></a></li>
                                        <?php } ?>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                                <li><a href="#"><span class="t-r"><span class="b-l"><span class="b-r">Mission Legs with no Mission Report</span></span></span></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div id="tab6">
                            <div class="drop-columns">
                                <div class="holder">
                                    <h3>Auditing</h3>
                                    <ul>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?> 
                                             <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=auditLog"><span class="t-r"><span class="b-l"><span class="b-r">AFIDS View Audit Log</span></span></span></a></li>
                                         <?php } ?>
                                         <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                             <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=loginsSummary"><span class="t-r"><span class="b-l"><span class="b-r">Login Statistical Summary</span></span></span></a></li>
                                         <?php } ?>
                                         <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                             <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=loginsNonStaff"><span class="t-r"><span class="b-l"><span class="b-r">Logins by non-staff</span></span></span></a></li>
                                         <?php } ?>
                                        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                                             <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=loginsStaff"><span class="t-r"><span class="b-l"><span class="b-r">Logins by staff</span></span></span></a></li>
                                         <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b">&nbsp;</div>
                <span class="triangle">&nbsp;</span>
            </div>
        </li>
<?php } ?>
    </ul>
    <!--navigation ends-->
</div>
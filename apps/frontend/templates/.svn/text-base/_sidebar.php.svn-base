<!--sidebar starts-->
<div id="sidebar">     
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
  <h3 class="side-heading misson-heading">MISSIONS</h3>
  <!--mission options-->
  <ul class="mission-options">
    <li><a href="/request_legs">Avail</a><?php //echo link_to('Avail', '/request_legs')?></li>
    <li><a href="/mission/pending">Pending</a><?php //echo link_to('Pending', 'mission/pending')?></li>
    <li><a href="/mission/visual?first=1">Visual</a><?php //echo link_to('Visual', 'mission/visual?first=1')?></li>    
  </ul>
 <?php }?>          
 
  
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){ ?>
    <h3 class="side-heading person-heading">PERSON</h3>
    <!--person options-->
    <ul class="person-options">
      <li><a href="/person?filter=1<?php //echo url_for('person/index?filter=1')?>">Find</a></li>
      <?php if (!$sf_user->hasCredential('Pilot')) {?>
        <li><a href="/person/update<?php //echo url_for('person/update')?>">Add</a></li>
      <?php }?>
    </ul>  
    <!--side tab box-->
    <div class="side-tab-box">
      <!--tab set-->
      <ul class="tab-set">
        <li class="tab-1"><a href="#tab1" class="tab active">Search</a></li>
        <li class="tab-2"><a href="#tab2" class="tab">distance calc</a></li>
      </ul>
      <!--tab content-->
      <div class="tab-content">

        <div class="bg">
          <div id="tab1">
            <form action="/search/specific<?php //echo url_for('search/specific')?>">
              <fieldset>
                <div class="search">
                  <div class="search-input"><input type="text" title="search" name="text"/></div>
                  <select title="all" name="search">
                    <option value="all">All</option>
                    <option value="person">Person</option>
                    <option value="passenger">Passenger</option>
                    <option value="companion">Companion</option>
                    <option value="mission">Mission</option>
                    <option value="leg">Leg</option>
                    <option value="requester">Requester</option>
                    <option value="agency">Agency</option>
                    <option value="pilot_request">Pilot Request</option>
                    <option value="mission_request">Mission Request</option>
                    <option value="coordinator">Coordinator</option>
                    <option value="camp">Camp</option>
                    <option value="airport">Airport</option>
                    <option value="member">Member</option>
                    <option value="pilot">Pilot</option>
                    <option value="mission_report">Mission Report</option>
                    <option value="role">Role</option>
                  </select>
                  <a href="#" class="btn-go" onclick="jQuery('#sidebar_search').click(); return false;">GO</a>
                  <input type="submit" class="hide" value="submit" id="sidebar_search"/>
                </div>
              </fieldset>
            </form>
          </div>
          <div id="tab2">
            <?php include_partial('dashboard/distance_calculator')?>
          </div>
        </div>
      </div>
    </div>
    <!--recent activity-->
    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)) {?>
    <div class="recent-activity alter">
      <h3>recent activity</h3>
      <div class="frame" id="side_recent_activity"></div>
      <script type="text/javascript">
        function sidebarUpdateActivity()
        {
          jQuery.ajax({
            url: '/activity/ajaxIndex',
            dataType: 'html',
            success: function (html) {
              jQuery('#side_recent_activity').html(html);
            }
          });
          setTimeout('sidebarUpdateActivity()', 60000); // 5000
        }
        function sidebarHideActivity(id)
        {
          jQuery.ajax({
            url: '/activity/ajaxHide',
            data: { id: id },
            success: function () {
              jQuery('#sidebar_activity_'+id).remove();
            }
          });
        }
        jQuery(function(){
          sidebarUpdateActivity();
        });
      </script>
    </div>
    <?php } ?>
  <?php }?>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
    <div class="recent-activity alter">
      <div class="frame">
        <ul>
          <li><b>Account</b></li>
		  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){?>
			<li><a href="/renewal/step1">Membership Renewal</a><?php //echo link_to('Membership Renewal', 'renewal/step1')?></li>
          <?php } ?>
            <li><b>Tools</b></li>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {?>
            <li><a href="/miss_req">Mission Request Process</a><?php //echo link_to('MOP Directory', 'pilot/mopDirectory')?></li>
          <?php } ?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){?>
            <li><a href="/um_request/create">Mission Request</a><?php //echo link_to('MOP Directory', 'pilot/mopDirectory')?></li>
          <?php } ?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                <li><a href="/pilot/mopDirectory">MOP Directory</a><?php //echo link_to('MOP Directory', 'pilot/mopDirectory')?></li>
          <?php } ?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>            
                <li><a href="/reports/reports.php?reportDef=report_specs.xml&reportName=member_roster">Member Roster</a></li>
          <?php } ?>
          <li><b>Reports</b></li>
           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
                  <li><a href="/mission_report/index">File Mission Report</a><?php //echo link_to('File Mission Report', 'mission_report/index')?></li>
           <?php } ?>
		   <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator'), false)){?>
                  <li><a href="/mission/summary">Mission Summary</a><?php //echo link_to('Mission Summary', 'mission/summary')?></li>
           <?php } ?>
           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator'), false)) {?>
                 <li><a href="/mission/yearReport">Year-End Report</a><?php //echo link_to('Year-End Report', 'mission/yearReport')?></li>
           <?php } ?>
        </ul>
      </div>
    </div>
  <?php }?>
</div>
<!--sidebar ends-->
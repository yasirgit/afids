<?php
// auto-generated by sfRoutingConfigHandler
// date: 2011/06/03 16:22:59
return array(
'update_medical_release' => new sfRoute('/update_medical_release', array (
  'module' => 'mission',
  'action' => 'updateMedicalRelease',
), array (
), array (
)),
'request_group_mission' => new sfRoute('/request_group_mission/:id', array (
  'module' => 'mission',
  'action' => 'requestGroupMission',
), array (
), array (
)),
'mission_avalaible_camp' => new sfRoute('/mission_avalaible_camp', array (
  'module' => 'mission',
  'action' => 'availableCamp',
), array (
), array (
)),
'add_pass_ajax' => new sfRoute('/add_pass_ajax', array (
  'module' => 'camp',
  'action' => 'addPassengerAjax',
), array (
), array (
)),
'add_passengers' => new sfRoute('/add_passengers/:id', array (
  'module' => 'camp',
  'action' => 'addPassengers',
), array (
), array (
)),
'reverse' => new sfRoute('/reverse/:id', array (
  'module' => 'mission',
  'action' => 'reverse',
), array (
), array (
)),
'staff_available' => new sfRoute('/staff_available', array (
  'module' => 'mission',
  'action' => 'staffAvailable',
), array (
), array (
)),
'pilot_req_accept' => new sfRoute('/pilot_req/accept/:id', array (
  'module' => 'pilotRequest',
  'action' => 'accept',
  'id' => 0,
), array (
), array (
)),
'pilot_req_process' => new sfRoute('/pilot_req/process/:id', array (
  'module' => 'pilotRequest',
  'action' => 'process',
), array (
), array (
)),
'pilot_req_hold' => new sfRoute('/pilot_req/hold/:id', array (
  'module' => 'pilotRequest',
  'action' => 'hold',
), array (
), array (
)),
'edit_group_aircraft' => new sfRoute('/edit_group_aircraft/*', array (
  'module' => 'pilot',
  'action' => 'editGroupAircraft',
), array (
), array (
)),
'remove_group_aircraft' => new sfRoute('/remove_group_aircraft/*', array (
  'module' => 'pilot',
  'action' => 'removeGroupAircraft',
), array (
), array (
)),
'paircraft_delete' => new sfRoute('/paircraft/delete', array (
  'module' => 'pilot',
  'action' => 'deleteAir',
), array (
), array (
)),
'paircraft_create' => new sfRoute('/paircraft/create/*', array (
  'module' => 'pilot',
  'action' => 'aircraft',
), array (
), array (
)),
'paircraft_edit' => new sfRoute('/paircraft/edit/:id', array (
  'module' => 'pilot',
  'action' => 'aircraft',
), array (
), array (
)),
'pilot_request' => new sfRoute('/pilot_request/:id', array (
  'module' => 'pilotRequest',
  'action' => 'update',
), array (
), array (
)),
'request_legs' => new sfRoute('/request_legs/*', array (
  'module' => 'pilotRequest',
  'action' => 'requestLegs',
), array (
), array (
)),
'pilot_request_list' => new sfRoute('/pilot_request_list', array (
  'module' => 'pilotRequest',
  'action' => 'index',
), array (
), array (
)),
'pilot_thanks' => new sfRoute('/pilot_thanks/:id', array (
  'module' => 'pilotRequest',
  'action' => 'pilotThanks',
), array (
), array (
)),
'upload_mission_photo' => new sfRoute('/mission_photo/upload_photo', array (
  'module' => 'mission_photo',
  'action' => 'uploadMissionPhoto',
), array (
), array (
)),
'mission_photo_approved' => new sfRoute('/mission_photo/approved_photo', array (
  'module' => 'mission_photo',
  'action' => 'photoApproved',
), array (
), array (
)),
'leg' => new sfRoute('/leg', array (
  'module' => 'missionLeg',
  'action' => 'index',
), array (
), array (
)),
'leg_edit' => new sfRoute('/leg_edit/:id', array (
  'module' => 'missionLeg',
  'action' => 'update',
), array (
), array (
)),
'leg_view' => new sfRoute('/leg_view/:id', array (
  'module' => 'missionLeg',
  'action' => 'view',
), array (
), array (
)),
'leg_delete' => new sfRoute('/leg_delete/:id', array (
  'module' => 'missionLeg',
  'action' => 'delete',
), array (
), array (
)),
'legpilot_delete' => new sfRoute('/legpilot_delete/:id', array (
  'module' => 'missionLeg',
  'action' => 'pilotDelete',
), array (
), array (
)),
'leg_save' => new sfRoute('/leg_save/*', array (
  'module' => 'missionLeg',
  'action' => 'save',
), array (
), array (
)),
'leg_create' => new sfRoute('/leg_create', array (
  'module' => 'missionLeg',
  'action' => 'update',
), array (
), array (
)),
'leg_email' => new sfRoute('/leg_email', array (
  'module' => 'missionLeg',
  'action' => 'email',
), array (
), array (
)),
'send_leg_email' => new sfRoute('/send_leg_email', array (
  'module' => 'missionLeg',
  'action' => 'sendLegEmail',
), array (
), array (
)),
'print_mission_leg' => new sfRoute('/print_mission_leg/:id', array (
  'module' => 'missionLeg',
  'action' => 'printMissionLeg',
), array (
), array (
)),
'create_companion' => new sfRoute('/create_companion/:id', array (
  'module' => 'missionLeg',
  'action' => 'createCompanion',
), array (
), array (
)),
'save_companion' => new sfRoute('/save_companion', array (
  'module' => 'missionLeg',
  'action' => 'saveCompanion',
), array (
), array (
)),
'mission' => new sfRoute('/mission', array (
  'module' => 'mission',
  'action' => 'index',
), array (
), array (
)),
'mission_create' => new sfRoute('/mission/create', array (
  'module' => 'mission',
  'action' => 'update',
), array (
), array (
)),
'mission_edit' => new sfRoute('/mission/edit/:id', array (
  'module' => 'mission',
  'action' => 'edit',
), array (
), array (
)),
'mission_delete' => new sfRoute('/mission/delete/:id', array (
  'module' => 'mission',
  'action' => 'delete',
), array (
), array (
)),
'mission_view' => new sfRoute('/mission/view/:id', array (
  'module' => 'mission',
  'action' => 'view',
), array (
), array (
)),
'mission_copy' => new sfRoute('/mission/copy/:id/*', array (
  'module' => 'mission',
  'action' => 'copy',
), array (
), array (
)),
'um_request' => new sfRoute('/um_request', array (
  'module' => 'missionRequest',
  'action' => 'index',
), array (
), array (
)),
'um_request_create' => new sfRoute('/um_request/create', array (
  'module' => 'missionRequest',
  'action' => 'userStep',
), array (
), array (
)),
'um_request_edit' => new sfRoute('/um_request/edit/:id', array (
  'module' => 'missionRequest',
  'action' => 'userStep1',
), array (
), array (
)),
'um_request_delete' => new sfRoute('/um_request/delete/:id', array (
  'module' => 'missionRequest',
  'action' => 'delete',
), array (
), array (
)),
'um_request_view' => new sfRoute('/um_request/view/:id', array (
  'module' => 'missionRequest',
  'action' => 'userView',
), array (
), array (
)),
'itinerary' => new sfRoute('/itinerary', array (
  'module' => 'itinerary',
  'action' => 'index',
), array (
), array (
)),
'itinerary_find' => new sfRoute('/itinerary/find', array (
  'module' => 'itinerary',
  'action' => 'find',
), array (
), array (
)),
'itinerary_create' => new sfRoute('/itinerary/create', array (
  'module' => 'itinerary',
  'action' => 'update',
), array (
), array (
)),
'itinerary_edit' => new sfRoute('/itinerary_edit/:id', array (
  'module' => 'itinerary',
  'action' => 'update',
), array (
), array (
)),
'itinerary_delete' => new sfRoute('/itinerary/delete/:id', array (
  'module' => 'itinerary',
  'action' => 'delete',
), array (
), array (
)),
'itinerary_detail' => new sfRoute('/itinerary/detail/:id', array (
  'module' => 'itinerary',
  'action' => 'detail',
), array (
), array (
)),
'itinerary_copy' => new sfRoute('/itinerary/copy/:id', array (
  'module' => 'itinerary',
  'action' => 'copy',
), array (
), array (
)),
'itinerary_copy_form' => new sfRoute('/itinerary/copyForm/:id', array (
  'module' => 'itinerary',
  'action' => 'copyForm',
), array (
), array (
)),
'miss_req' => new sfRoute('/miss_req', array (
  'module' => 'missionRequest',
  'action' => 'index',
), array (
), array (
)),
'miss_req_create' => new sfRoute('/miss_req/create', array (
  'module' => 'missionRequest',
  'action' => 'step1',
), array (
), array (
)),
'miss_req_edit' => new sfRoute('/miss_req/edit/:id', array (
  'module' => 'missionRequest',
  'action' => 'step1',
), array (
), array (
)),
'miss_req_delete' => new sfRoute('/miss_req/delete/:id', array (
  'module' => 'missionRequest',
  'action' => 'delete',
), array (
), array (
)),
'event' => new sfRoute('/event', array (
  'module' => 'event',
  'action' => 'index',
), array (
), array (
)),
'event_create' => new sfRoute('/event/new', array (
  'module' => 'event',
  'action' => 'create',
), array (
), array (
)),
'event_edit' => new sfRoute('/event/edit/:id', array (
  'module' => 'event',
  'action' => 'edit',
), array (
), array (
)),
'event_delete' => new sfRoute('/event/delete/:id', array (
  'module' => 'event',
  'action' => 'delete',
), array (
), array (
)),
'calendar' => new sfRoute('/calendar', array (
  'module' => 'event',
  'action' => 'calendar',
), array (
), array (
)),
'wing' => new sfRoute('/wing', array (
  'module' => 'wing',
  'action' => 'index',
), array (
), array (
)),
'wing_create' => new sfRoute('/wing/create', array (
  'module' => 'wing',
  'action' => 'update',
), array (
), array (
)),
'wing_edit' => new sfRoute('/wing/edit/:id', array (
  'module' => 'wing',
  'action' => 'update',
), array (
), array (
)),
'wing_delete' => new sfRoute('/wing/delete/:id', array (
  'module' => 'wing',
  'action' => 'delete',
), array (
), array (
)),
'mis_type' => new sfRoute('/mis_type', array (
  'module' => 'mission',
  'action' => 'indexMisType',
), array (
), array (
)),
'mis_type_create' => new sfRoute('/mis_type/create', array (
  'module' => 'mission',
  'action' => 'updateMisType',
), array (
), array (
)),
'mis_type_edit' => new sfRoute('/mis_type/edit/:id', array (
  'module' => 'mission',
  'action' => 'updateMisType',
), array (
), array (
)),
'mis_type_delete' => new sfRoute('/mis_type/delete/:id', array (
  'module' => 'mission',
  'action' => 'deleteMisType',
), array (
), array (
)),
'mclass' => new sfRoute('/mclass', array (
  'module' => 'member',
  'action' => 'indexMclass',
), array (
), array (
)),
'mclass_create' => new sfRoute('/mclass/create', array (
  'module' => 'member',
  'action' => 'updateMclass',
), array (
), array (
)),
'mclass_edit' => new sfRoute('/mclass/edit/:id', array (
  'module' => 'member',
  'action' => 'updateMclass',
), array (
), array (
)),
'mclass_delete' => new sfRoute('/mclass/delete/:id', array (
  'module' => 'member',
  'action' => 'deleteMclass',
), array (
), array (
)),
'ctype' => new sfRoute('/ctype', array (
  'module' => 'contact',
  'action' => 'indexType',
), array (
), array (
)),
'ctype_create' => new sfRoute('/ctype/create', array (
  'module' => 'contact',
  'action' => 'updateType',
), array (
), array (
)),
'ctype_edit' => new sfRoute('/ctype/edit/:id', array (
  'module' => 'contact',
  'action' => 'updateType',
), array (
), array (
)),
'ctype_delete' => new sfRoute('/ctype/delete/:id', array (
  'module' => 'contact',
  'action' => 'delete',
), array (
), array (
)),
'contact' => new sfRoute('/contact', array (
  'module' => 'contact',
  'action' => 'index',
), array (
), array (
)),
'contact_create' => new sfRoute('/contact/create', array (
  'module' => 'contact',
  'action' => 'update',
), array (
), array (
)),
'contact_edit' => new sfRoute('/contact/edit/:id', array (
  'module' => 'contact',
  'action' => 'update',
), array (
), array (
)),
'contact_delete' => new sfRoute('/contact/delete/:id', array (
  'module' => 'contact',
  'action' => 'delete',
), array (
), array (
)),
'contact_view' => new sfRoute('/contact/view/:id', array (
  'module' => 'contact',
  'action' => 'view',
), array (
), array (
)),
'coordinator' => new sfRoute('/coordinator', array (
  'module' => 'coordinator',
  'action' => 'index',
), array (
), array (
)),
'coordinator_create' => new sfRoute('/coordinator_create/*', array (
  'module' => 'coordinator',
  'action' => 'update',
), array (
), array (
)),
'coordinator_edit' => new sfRoute('/coordinator/edit/:id/*', array (
  'module' => 'coordinator',
  'action' => 'update',
), array (
), array (
)),
'coordinator_delete' => new sfRoute('/coordinator/delete/:id', array (
  'module' => 'coordinator',
  'action' => 'delete',
), array (
), array (
)),
'coordinator_view' => new sfRoute('/coordinator/view/:id/*', array (
  'module' => 'coordinator',
  'action' => 'view',
), array (
), array (
)),
'fbo' => new sfRoute('/fbo', array (
  'module' => 'airport',
  'action' => 'fboIndex',
), array (
), array (
)),
'fbo_create' => new sfRoute('/fbo/create/*', array (
  'module' => 'airport',
  'action' => 'fboUpdate',
), array (
), array (
)),
'fbo_edit' => new sfRoute('/fbo/edit/:id', array (
  'module' => 'airport',
  'action' => 'fboUpdate',
), array (
), array (
)),
'fbo_delete' => new sfRoute('/fbo/delete/:id', array (
  'module' => 'airport',
  'action' => 'fboDelete',
), array (
), array (
)),
'board' => new sfRoute('/board/update', array (
  'module' => 'member',
  'action' => 'boardMember',
), array (
), array (
)),
'board_delete' => new sfRoute('/board/delete/:id', array (
  'module' => 'member',
  'action' => 'boardDelete',
), array (
), array (
)),
'board_edit' => new sfRoute('/board/edit/:id', array (
  'module' => 'member',
  'action' => 'boardMember',
), array (
), array (
)),
'board_view' => new sfRoute('/board/view/:id', array (
  'module' => 'member',
  'action' => 'boardMemberView',
), array (
), array (
)),
'member_create' => new sfRoute('/member/create/*', array (
  'module' => 'member',
  'action' => 'update',
), array (
), array (
)),
'member_edit' => new sfRoute('/member/edit/:id', array (
  'module' => 'member',
  'action' => 'update',
), array (
), array (
)),
'member_delete' => new sfRoute('/member/delete/:id', array (
  'module' => 'member',
  'action' => 'delete',
), array (
), array (
)),
'member_find' => new sfRoute('/member/find/*', array (
  'module' => 'member',
  'action' => 'find',
), array (
), array (
)),
'member_view' => new sfRoute('/member/view/*', array (
  'module' => 'member',
  'action' => 'view',
), array (
), array (
)),
'requester' => new sfRoute('/requester', array (
  'module' => 'requester',
  'action' => 'index',
), array (
), array (
)),
'requester_find' => new sfRoute('/requester/find', array (
  'module' => 'requester',
  'action' => 'find',
), array (
), array (
)),
'requester_create' => new sfRoute('/requester/create/*', array (
  'module' => 'requester',
  'action' => 'update',
), array (
), array (
)),
'requester_edit' => new sfRoute('/requester/edit/:id', array (
  'module' => 'requester',
  'action' => 'update',
), array (
), array (
)),
'requester_delete' => new sfRoute('/reqstr/delete/:id', array (
  'module' => 'requester',
  'action' => 'delete',
), array (
), array (
)),
'person' => new sfRoute('/person', array (
  'module' => 'person',
  'action' => 'index',
), array (
), array (
)),
'person_edit' => new sfRoute('/person/edit/:id', array (
  'module' => 'person',
  'action' => 'update',
), array (
), array (
)),
'person_view' => new sfRoute('/person/view/:id', array (
  'module' => 'person',
  'action' => 'view',
), array (
), array (
)),
'person_delete' => new sfRoute('/person/delete', array (
  'module' => 'person',
  'action' => 'delete',
), array (
), array (
)),
'agency' => new sfRoute('/agency', array (
  'module' => 'agency',
  'action' => 'index',
), array (
), array (
)),
'agency_create' => new sfRoute('/agency/create', array (
  'module' => 'agency',
  'action' => 'update',
), array (
), array (
)),
'agency_edit' => new sfRoute('/agency/edit/:id', array (
  'module' => 'agency',
  'action' => 'update',
), array (
), array (
)),
'agency_delete' => new sfRoute('/agency/delete/:id', array (
  'module' => 'agency',
  'action' => 'delete',
), array (
), array (
)),
'account_pilot' => new sfRoute('/account_pilot', array (
  'module' => 'account',
  'action' => 'indexPilot',
), array (
), array (
)),
'account' => new sfRoute('/account', array (
  'module' => 'account',
  'action' => 'index',
), array (
), array (
)),
'account_create' => new sfRoute('/account/create', array (
  'module' => 'account',
  'action' => 'update',
), array (
), array (
)),
'account_edit' => new sfRoute('/account/edit/:id', array (
  'module' => 'account',
  'action' => 'update',
), array (
), array (
)),
'password_edit' => new sfRoute('/password/edit/:id', array (
  'module' => 'account',
  'action' => 'updatePassword',
), array (
), array (
)),
'fund' => new sfRoute('/fund', array (
  'module' => 'fund',
  'action' => 'index',
), array (
), array (
)),
'fund_create' => new sfRoute('/fund/create', array (
  'module' => 'fund',
  'action' => 'update',
), array (
), array (
)),
'fund_edit' => new sfRoute('/fund/edit/:id', array (
  'module' => 'fund',
  'action' => 'update',
), array (
), array (
)),
'fund_delete' => new sfRoute('/fund/delete/:id', array (
  'module' => 'fund',
  'action' => 'delete',
), array (
), array (
)),
'gift' => new sfRoute('/gift', array (
  'module' => 'donation',
  'action' => 'indexGift',
), array (
), array (
)),
'gift_create' => new sfRoute('/gift/create', array (
  'module' => 'donation',
  'action' => 'updateGift',
), array (
), array (
)),
'gift_edit' => new sfRoute('/gift/edit/:id', array (
  'module' => 'donation',
  'action' => 'updateGift',
), array (
), array (
)),
'gift_delete' => new sfRoute('/gift/delete/:id', array (
  'module' => 'donation',
  'action' => 'deleteGift',
), array (
), array (
)),
'donation' => new sfRoute('/donation', array (
  'module' => 'donation',
  'action' => 'index',
), array (
), array (
)),
'donation_create' => new sfRoute('/donation/create', array (
  'module' => 'donation',
  'action' => 'update',
), array (
), array (
)),
'donation_edit' => new sfRoute('/donation/edit/:id', array (
  'module' => 'donation',
  'action' => 'update',
), array (
), array (
)),
'donation_delete' => new sfRoute('/donation/delete/:id', array (
  'module' => 'donation',
  'action' => 'delete',
), array (
), array (
)),
'campaign' => new sfRoute('/campaign', array (
  'module' => 'campaign',
  'action' => 'index',
), array (
), array (
)),
'campaign_create' => new sfRoute('/campaign/create', array (
  'module' => 'campaign',
  'action' => 'update',
), array (
), array (
)),
'campaign_edit' => new sfRoute('/campaign/edit/:id', array (
  'module' => 'campaign',
  'action' => 'update',
), array (
), array (
)),
'campaign_delete' => new sfRoute('/campaign/delete/:id', array (
  'module' => 'campaign',
  'action' => 'delete',
), array (
), array (
)),
'donor' => new sfRoute('/donor', array (
  'module' => 'donor',
  'action' => 'index',
), array (
), array (
)),
'donor_create' => new sfRoute('/donor/create', array (
  'module' => 'donor',
  'action' => 'update',
), array (
), array (
)),
'donor_edit' => new sfRoute('/donor/edit/:id', array (
  'module' => 'donor',
  'action' => 'update',
), array (
), array (
)),
'donor_delete' => new sfRoute('/donor/delete/:id', array (
  'module' => 'donor',
  'action' => 'delete',
), array (
), array (
)),
'companion' => new sfRoute('/companion', array (
  'module' => 'companion',
  'action' => 'index',
), array (
), array (
)),
'companion_create' => new sfRoute('/companion/create', array (
  'module' => 'companion',
  'action' => 'update',
), array (
), array (
)),
'companion_edit' => new sfRoute('/companion/edit/:id', array (
  'module' => 'companion',
  'action' => 'update',
), array (
), array (
)),
'companion_delete' => new sfRoute('/companion/delete/:id', array (
  'module' => 'companion',
  'action' => 'delete',
), array (
), array (
)),
'passenger' => new sfRoute('/passenger', array (
  'module' => 'passenger',
  'action' => 'index',
), array (
), array (
)),
'passenger_create' => new sfRoute('/passenger/create/*', array (
  'module' => 'passenger',
  'action' => 'step1',
), array (
), array (
)),
'passenger_edit' => new sfRoute('/passenger/edit/:id', array (
  'module' => 'passenger',
  'action' => 'step1',
), array (
), array (
)),
'passenger_find' => new sfRoute('/passenger/find/*', array (
  'module' => 'passenger',
  'action' => 'find',
), array (
), array (
)),
'passenger_view' => new sfRoute('/passenger/view/:id', array (
  'module' => 'passenger',
  'action' => 'view',
), array (
), array (
)),
'passenger_change' => new sfRoute('/passenger/change/:id', array (
  'module' => 'passenger',
  'action' => 'change',
), array (
), array (
)),
'pill' => new sfRoute('/pill', array (
  'module' => 'passenger',
  'action' => 'indexIllness',
), array (
), array (
)),
'pill_create' => new sfRoute('/pill/create', array (
  'module' => 'passenger',
  'action' => 'updateIllness',
), array (
), array (
)),
'pill_edit' => new sfRoute('/pill/edit/:id', array (
  'module' => 'passenger',
  'action' => 'updateIllness',
), array (
), array (
)),
'pill_delete' => new sfRoute('/pill/delete/:id', array (
  'module' => 'passenger',
  'action' => 'deleteIllness',
), array (
), array (
)),
'ptype' => new sfRoute('/ptype', array (
  'module' => 'passenger',
  'action' => 'indexType',
), array (
), array (
)),
'ptype_create' => new sfRoute('/ptype/create', array (
  'module' => 'passenger',
  'action' => 'updateType',
), array (
), array (
)),
'ptype_edit' => new sfRoute('/ptype/edit/:id', array (
  'module' => 'passenger',
  'action' => 'updateType',
), array (
), array (
)),
'ptype_delete' => new sfRoute('/ptype/delete/:id', array (
  'module' => 'passenger',
  'action' => 'deleteType',
), array (
), array (
)),
'camp' => new sfRoute('/camp', array (
  'module' => 'camp',
  'action' => 'index',
), array (
), array (
)),
'camp_create' => new sfRoute('/camp/create', array (
  'module' => 'camp',
  'action' => 'update',
), array (
), array (
)),
'camp_edit' => new sfRoute('/camp/edit/:id', array (
  'module' => 'camp',
  'action' => 'update',
), array (
), array (
)),
'camp_delete' => new sfRoute('/camp/delete/:id', array (
  'module' => 'camp',
  'action' => 'delete',
), array (
), array (
)),
'camp_pilot_match' => new sfRoute('/camp_pilot_match/:id', array (
  'module' => 'camp',
  'action' => 'match',
), array (
), array (
)),
'afaOrg' => new sfRoute('/afaOrg', array (
  'module' => 'afaOrg',
  'action' => 'index',
), array (
), array (
)),
'afaOrg_create' => new sfRoute('/afaOrg/create', array (
  'module' => 'afaOrg',
  'action' => 'update',
), array (
), array (
)),
'afaOrg_edit' => new sfRoute('/afaOrg/edit/:id', array (
  'module' => 'afaOrg',
  'action' => 'update',
), array (
), array (
)),
'afaOrg_delete' => new sfRoute('/afaOrg/delete/:id', array (
  'module' => 'afaOrg',
  'action' => 'delete',
), array (
), array (
)),
'aircraft' => new sfRoute('/aircraft', array (
  'module' => 'aircraft',
  'action' => 'index',
), array (
), array (
)),
'aircraft_create' => new sfRoute('/aircraft/create', array (
  'module' => 'aircraft',
  'action' => 'update',
), array (
), array (
)),
'aircraft_edit' => new sfRoute('/aircraft/edit/:id', array (
  'module' => 'aircraft',
  'action' => 'update',
), array (
), array (
)),
'aircraft_delete' => new sfRoute('/aircraft/delete/:id', array (
  'module' => 'aircraft',
  'action' => 'delete',
), array (
), array (
)),
'airport' => new sfRoute('/airport', array (
  'module' => 'airport',
  'action' => 'index',
), array (
), array (
)),
'airport_create' => new sfRoute('/airport/create', array (
  'module' => 'airport',
  'action' => 'update',
), array (
), array (
)),
'airport_edit' => new sfRoute('/airport/edit/:id/*', array (
  'module' => 'airport',
  'action' => 'update',
), array (
), array (
)),
'airport_delete' => new sfRoute('/airport/delete/:id', array (
  'module' => 'airport',
  'action' => 'delete',
), array (
), array (
)),
'pilot' => new sfRoute('/pilot', array (
  'module' => 'pilot',
  'action' => 'index',
), array (
), array (
)),
'pilot_create' => new sfRoute('/pilot/create/*', array (
  'module' => 'pilot',
  'action' => 'update',
), array (
), array (
)),
'pilot_edit' => new sfRoute('/pilot/edit/:id/*', array (
  'module' => 'pilot',
  'action' => 'update',
), array (
), array (
)),
'pilot_delete' => new sfRoute('/pilot/delete/:id', array (
  'module' => 'pilot',
  'action' => 'delete',
), array (
), array (
)),
'pilot_view' => new sfRoute('/pilot/view/:id/*', array (
  'module' => 'pilot',
  'action' => 'view',
), array (
), array (
)),
'member_needsbn' => new sfRoute('/member/needsBN', array (
  'module' => 'member',
  'action' => 'needsBN',
), array (
), array (
)),
'member_update_bn' => new sfRoute('/member/updateBN/:id/*', array (
  'module' => 'member',
  'action' => 'updateBN',
), array (
), array (
)),
'missing_waivers' => new sfRoute('/mission/missingWaivers', array (
  'module' => 'mission',
  'action' => 'missingWaivers',
), array (
), array (
)),
'missing_waivers_update' => new sfRoute('/mission/updateMissingWaivers', array (
  'module' => 'mission',
  'action' => 'updateMissingWaivers',
), array (
), array (
)),
'available_camps' => new sfRoute('/available_camps/*', array (
  'module' => 'mission',
  'action' => 'availableCamp',
), array (
), array (
)),
'homepage' => new sfRoute('/', array (
  'module' => 'dashboard',
  'action' => 'index',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);

DROP VIEW mission_cost_tracking;
CREATE VIEW rp_mission_cost_tracking
AS
SELECT DISTINCT mr.mission_date, 
date_format(`mr`.`mission_date`,'%m-%d-%Y') AS `missionDateDisplay`, 
m.external_id, pilot_id, 
concat_ws(' ',`p`.`first_name`,`p`.`last_name`) AS `pilotName`,
mr.id, commercial_ticket_cost, 
year(mr.mission_date) as yearNo, 
mr.approved,
concat_ws(' ',`pass`.`first_name`,`pass`.`last_name`) AS `passengerName`
FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id)
JOIN mission_report mr ON (ml.mission_report_id = mr.id)
JOIN member mb ON (ml.pilot_id = mb.id)
JOIN person p ON (mb.person_id = p.id)
JOIN passenger pa ON (m.passenger_id = pa.id)
JOIN person pass ON (pa.person_id = pass.id)
WHERE ml.cancelled is Null;

CREATE VIEW member_application_reconciliation
AS
/* Lists member application with financial data for financial reconciliation */
SELECT p.first_name, p.last_name, m.external_id, a.renewal, a.dues_amount_paid, a.method_of_payment, a.check_number, a.donation_amount_paid,
a.date as application_date,
date_format(`a`.`date`,'%m-%d-%Y') AS `applicationDateDisplay`, 
date_format(`a`.`processed_date`,'%m-%d-%Y') AS `processedDate`, 
a.ccard_approval_number, 
a.payment_transaction_id, 
m.member_class_id, 
mc.name as memberClass, m.master_member_id, mm.external_id as masterMemberExternalID,
mp.first_name as masterMemberFirstName, mp.last_name as masterMemberLastName, m.renewal_date
from application a JOIN member m ON (a.member_id = m.id)
JOIN person p ON (m.person_id = p.id)
JOIN member_class mc ON (m.member_class_id = mc.id)
LEFT JOIN member mm ON (m.master_member_id = mm.id)
LEFT JOIN person mp ON (mm.person_id = mp.id)

/* ********************************  */

ALTER VIEW camp_passengers AS
SELECT concat_ws(' ',`pass`.`first_name`,`pass`.`last_name`) AS `passName`,
pass.last_name as `passLastName`,
pass.first_name as `passFirstName`,
pa.weight,
(Now() - pa.date_of_birth)/365 as passAge,
date_format(`pa`.`date_of_birth`,'%m-%d-%Y') AS passDOB,
pass.day_phone as `passDayPhone`,
pass.evening_phone as `passEvePhone`,
pass.mobile_phone as `passMobilePhone`,
pass.pager_phone as `passPagerPhone`,
pass.other_phone as `passOtherPhone`,
pass.fax_phone1 as `passFaxPhone`,
pass.day_comment as `passDayComment`, 
pass.evening_comment as `passEveComment`, 
pass.mobile_comment as `passMobileComment`, 
pass.pager_comment as `passPagerComment`, 
pass.other_comment as `passOtherComment`, 
pass.fax_comment1 as `passFaxComment`, 
concat_ws(' ',`pr`.`first_name`,`pr`.`last_name`) AS `reqName`,
pr.last_name as reqLastName, 
pr.day_phone as 'reqDayPhone',
pr.evening_phone as 'reqEvePhone',
pr.mobile_phone as 'reqMobilePhone',
pr.pager_phone as 'reqPagerPhone',
pr.other_phone as 'reqOtherPhone',
pr.fax_phone1 as 'reqFaxPhone',
pr.day_comment as reqDayComment, 
pr.evening_comment as reqEveComment, 
pr.mobile_comment as reqMobileComment, 
pr.pager_comment as reqPagerComment, 
pr.other_comment as reqOtherComment, 
pr.fax_comment1 as reqFaxComment, 
camp_name,
camp_phone,
concat_ws(' ',`pilot`.`first_name`,`pilot`.`last_name`) AS `pilotName`,
pilot.last_name as 'pilotLastName',
pilot.day_phone as 'pilotDayPhone',
pilot.evening_phone as 'pilotEvePhone',
pilot.mobile_phone as 'pilotMobilePhone',
pilot.other_phone as 'pilotOtherPhone',
pilot.pager_phone as 'pilotPagerPhone',
pilot.fax_phone1 as 'pilotFaxPhone',
ma.ident as homeBase,
pilot.day_comment as pilotDayComment, 
pilot.evening_comment as pilotEveComment, 
pilot.mobile_comment as pilotMobileComment, 
pilot.pager_comment as pilotPagerComment, 
pilot.other_comment as pilotOtherComment, 
pilot.fax_comment1 as pilotFaxComment, 
pilot.email as pilotEmail,
mp.ifr as ifr,
ta.name as toAirportName, 
ta.ident as toAirportIdent, 
fa.name as fromAirportName, 
fa.ident as fromAirportIdent, 
m.external_id as missionID, 
m.mission_date as missionSelectDate,
date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDate`,
date_format(`pa`.`medical_release_received`,'%m-%d-%Y') AS `medicalReleaseReceived`,
date_format(`ml`.`waiver_received`,'%m-%d-%Y') AS `waiverReceived`,
ml.private_c_note,
ml.cancelled,
pac.n_number,
ac.make,
ac.model
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id) 
JOIN passenger pa ON (pa.id = m.passenger_id) 
JOIN person pass ON (pass.id = pa.person_id) 
JOIN requester r ON (m.requester_id = r.id) 
JOIN person pr ON (r.person_id = pr.id) 
JOIN airport ta ON (ml.to_airport_id = ta.id) 
JOIN airport fa ON (ml.from_airport_id = fa.id) 
JOIN camp ON (m.camp_id = camp.id) 
LEFT JOIN member member ON (ml.pilot_id = member.id) 
LEFT JOIN person pilot ON (member.person_id = pilot.id) 
LEFT JOIN pilot mp ON (member.id = mp.member_id) 
LEFT JOIN airport ma ON (mp.primary_airport_id = ma.id)
LEFT JOIN pilot_aircraft pac ON (ml.pilot_aircraft_id = pac.id)
LEFT JOIN aircraft ac ON (pac.aircraft_id = ac.id)


DELIMITER $$

CREATE PROCEDURE `test`()
BEGIN
  DECLARE x INT;
  WHILE x < 10 DO
    SELECT count(*) FROM afa_org;
    SET x = x + 1;
  END WHILE;
END $$
DELIMITER ;


        IF ((SELECT count(*) from mission m JOIN mission_leg ml1 ON (m.id = ml1.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = Year(Now())) > 0,((SELECT count(*) from mission m JOIN mission_leg ml2 ON (m.id = ml2.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = Year(Now())) AND ml.cancelled is Not Null)/(SELECT count(*) from mission m JOIN mission_leg ml3 ON (m.id = ml3.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = Year(Now())),0) as percentCancelled,
        (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = Year(Now())) AND ml.cancelled is Not Null as `cancelledCount`,
        (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mr.approved = 1 AND month(m.mission_date) = x AND year(m.mission_date) = year(now())) as `approved`;


            ((SELECT count(*) from mission m JOIN mission_leg ml2 ON (m.id = ml2.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = Year(Now()) AND ml.cancelled is Not Null)
               /
               (SELECT count(*) from mission m JOIN mission_leg ml3 ON (m.id = ml3.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = Year(Now())))


CREATE VIEW rp_weekend_summary AS
SELECT
concat_ws(' ',`pass`.`first_name`,`pass`.`last_name`) AS `passName`,
pass.last_name as passLastName,
pa.weight, 
pass.day_phone as 'passDayPhone',
pass.day_phone as passDayPhoneSearch,
pass.evening_phone as 'passEvePhone',
pass.mobile_phone as 'passMobilePhone',
pass.pager_phone as 'passPagerPhone',
pass.other_phone as 'passOtherPhone',
pass.fax_phone1 as 'passFaxPhone',
pass.day_comment as passDayComment, 
pass.evening_comment as passEveComment, 
pass.mobile_comment as passMobileComment, 
pass.pager_comment as passPagerComment, 
pass.other_comment as passOtherComment, 
pass.fax_comment1 as passFaxComment,
concat_ws(' ',`pr`.`first_name`,`pr`.`last_name`) AS `reqName`,
pr.last_name as reqLastName,
pr.day_phone as 'reqDayPhone',
pr.evening_phone as 'reqEvePhone',
pr.mobile_phone as 'reqMobilePhone',
pr.pager_phone as 'reqPagerPhone',
pr.other_phone as 'reqOtherPhone',
pr.fax_phone1 as 'reqFaxPhone',
pr.day_comment as reqDayComment, 
pr.evening_comment as reqEveComment, 
pr.mobile_comment as reqMobileComment, 
pr.pager_comment as reqPagerComment, 
pr.other_comment as reqOtherComment, 
pr.fax_comment1 as reqFaxComment,
concat_ws(' ',`pilot`.`first_name`,`pilot`.`last_name`) AS `pilotName`,
pilot.last_name as pilotLastName, 
pilot.day_phone as 'pilotDayPhone',
pilot.evening_phone as 'pilotEvePhone',
pilot.mobile_phone as 'pilotMobilePhone',
pilot.pager_phone as 'pilotPagerPhone',
pilot.other_phone as 'pilotOtherPhone',
pilot.fax_phone1 as 'pilotFaxPhone',
ma.ident as homeBase, 
pilot.day_comment as pilotDayComment, 
pilot.evening_comment as pilotEveComment, 
pilot.mobile_comment as pilotMobileComment, 
pilot.pager_comment as pilotPagerComment, 
pilot.other_comment as pilotOtherComment, 
pilot.fax_comment1 as pilotFaxComment,
ta.name as toAirportName, 
ta.ident as toAirportIdent,
fa.name as fromAirportName, 
fa.ident as fromAirportIdent,
m.mission_date,
m.mission_type_id,
date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDisplayDate`,
mt.name as missionType,
m.external_id as missionID,
member.wing_id,
ml.cancelled,
pass.county as countyName
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN passenger pa ON (pa.id = m.passenger_id)
JOIN person pass ON (pass.id = pa.person_id)
JOIN requester r ON (m.requester_id = r.id)
JOIN person pr ON (r.person_id = pr.id)
JOIN airport ta ON (ml.to_airport_id = ta.id)
JOIN airport fa ON (ml.from_airport_id = fa.id)
JOIN mission_type mt ON (m.mission_type_id = mt.id)
LEFT OUTER JOIN member member ON (ml.pilot_id = member.id)
LEFT OUTER JOIN person pilot ON (member.person_id = pilot.id)
LEFT OUTER JOIN pilot mp ON (member.id = mp.member_id)
LEFT OUTER JOIN airport ma ON (mp.primary_airport_id = ma.id)


CREATE PROCEDURE `rp_member_mission_counts`(IN start_date date, IN end_date date)
BEGIN
SELECT mb.external_id, 
concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `pilotName`,
(SELECT count(ml.id) FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr1 ON (ml.mission_report_id = mr1.id) WHERE ml.pilot_id = mb.id AND mr1.approved = 1 AND mr1.mission_date >= start_date AND mr1.mission_date <= end_date) as legCount,
(SELECT sum(mr2.hobbs_time) FROM mission_report mr2 WHERE id IN (SELECT mr3.id FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr3 on (ml.mission_report_id = mr3.id) WHERE ml.pilot_id = mb.id AND mr3.mission_date >= start_date AND mr3.mission_date <= end_date AND mr3.approved = 1)) AS hobbsTime,
(SELECT sum(mr2.commercial_ticket_cost) FROM mission_report mr2 WHERE id IN (SELECT mr3.id FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr3 on (ml.mission_report_id = mr3.id) WHERE ml.pilot_id = mb.id AND mr3.mission_date >= start_date AND mr3.mission_date <= end_date AND mr3.approved = 1)) AS commercialTickets 
FROM member mb JOIN person p ON (mb.person_id = p.id)
WHERE mb.active = 1
AND mb.member_class_id <> 3
ORDER BY (SELECT count(ml.id) FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr1 ON (ml.mission_report_id = mr1.id) WHERE ml.pilot_id = mb.id AND mr1.approved = 1 AND mr1.mission_date >= start_date AND mr1.mission_date <= end_date) DESC;
END $$

DELIMITER ;

DELIMITER $$

ALTER PROCEDURE `rp_member_mission_counts`(IN start_date date, IN end_date date, IN wingID INT)
BEGIN
SELECT mb.external_id, 
concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `pilotName`,
(SELECT count(ml.id) FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr1 ON (ml.mission_report_id = mr1.id) WHERE ml.pilot_id = mb.id AND mr1.approved = 1 AND mr1.mission_date >= start_date AND mr1.mission_date <= end_date) as legCount,
(SELECT sum(mr2.hobbs_time) FROM mission_report mr2 WHERE id IN (SELECT mr3.id FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr3 on (ml.mission_report_id = mr3.id) WHERE ml.pilot_id = mb.id AND mr3.mission_date >= start_date AND mr3.mission_date <= end_date AND mr3.approved = 1)) AS hobbsTime,
(SELECT sum(mr2.commercial_ticket_cost) FROM mission_report mr2 WHERE id IN (SELECT mr3.id FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr3 on (ml.mission_report_id = mr3.id) WHERE ml.pilot_id = mb.id AND mr3.mission_date >= start_date AND mr3.mission_date <= end_date AND mr3.approved = 1)) AS commercialTickets 
FROM member mb JOIN person p ON (mb.person_id = p.id)
WHERE mb.active = 1
AND mb.member_class_id <> 3
AND CASE wingID WHEN 0 THEN mb.wing_id Is Not Null ELSE mb.wing_id = wingID END 
ORDER BY (SELECT count(ml.id) FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr1 ON (ml.mission_report_id = mr1.id) WHERE ml.pilot_id = mb.id AND mr1.approved = 1 AND mr1.mission_date >= start_date AND mr1.mission_date <= end_date) DESC;
END $$

DELIMITER ;


ALTER VIEW rp_members_no_missions
AS
SELECT p.first_name as firstName, p.last_name as lastName, 
p.county,
p.zipcode,
left(p.evening_phone,3) as memberAC,
date_format(`m`.`join_date`,'%m-%d-%Y') AS `joinDate`, 
date_format(`pl`.`oriented_date`,'%m-%d-%Y') AS `orientedDate`, 
m.join_date as joinDateSort, wing_id, email
FROM member m JOIN person p ON (m.person_id = p.id)
LEFT JOIN pilot pl ON (m.id = pl.member_id)
WHERE active = 1
AND flight_status = 'Command Pilot' 
AND (SELECT count(*) FROM mission_leg ml WHERE ml.cancelled is Null AND ml.pilot_id = m.id) = 0
AND (SELECT count(*) FROM mission_leg ml WHERE ml.cancelled is Not Null AND ml.pilot_id = m.id) = 0

ALTER VIEW rp_mission_legs_origin_destination AS
SELECT concat_ws('-',`m`.`external_id`,`ml`.`leg_number`) AS `missionNo`,
date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDisplayDate`,
CONCAT(fa.ident, ' (', fa.city, ', ', fa.state ,')<br/>', faz.county_name) as origin,
CONCAT(ta.ident, ' (', ta.city, ', ', ta.state ,')<br/>', taz.county_name) as destination,
wing.name as wingName,
m.mission_date,
afa_leg.id
FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id)
LEFT JOIN mission_report mr ON (ml.mission_report_id = mr.id)
LEFT JOIN afa_leg ON (ml.id = afa_leg.leg_id)
JOIN airport fa ON (ml.from_airport_id = fa.id)
LEFT JOIN zipcode faz ON (fa.zipcode = faz.zipcode)
JOIN airport ta ON (ml.to_airport_id = ta.id)
LEFT JOIN zipcode taz ON (ta.zipcode = taz.zipcode)
LEFT JOIN member mb ON (ml.pilot_id = mb.id)
LEFT JOIN wing ON (mb.wing_id = wing.id)
WHERE ml.cancelled is Null


CREATE VIEW rp_member_directory AS
SELECT external_id,
p.id as personID,
p.first_name as firstName,
p.last_name as lastName,
p.address1 as address_one,
p.address2 as address_two,
p.city,
p.state,
p.zipcode,
p.deceased,
p.email_blocked as emailBlocked,
p.email,
p.secondary_email as secondaryEmail,
p.pager_email as pagerEmail,
p.county as countyName,
substring(p.day_phone,1,3) as areaCode,
p.day_phone as 'dayPhone',
p.day_comment,
p.evening_phone as 'evePhone',
p.evening_comment,
p.mobile_phone as 'mobilePhone',
p.mobile_comment,
p.pager_phone as 'pagerPhone',
p.pager_comment,
p.fax_phone1 as 'faxPhone1',
p.fax_comment1,
p.fax_phone2 as 'faxPhone2',
p.fax_comment2,
p.other_phone as 'otherPhone',
p.other_comment,
pilot.license_type,
CASE 
	WHEN pilot.ifr = 1 THEN 'Yes'
	ELSE 'No'
	END as `ifr`,
CASE
	WHEN pilot.multi_engine = 1 THEN 'Yes'
	ELSE 'No'
	END as `multiEngine`,
pilot.se_instructor,
pilot.hseats,
pilot.transplant,
pilot.me_Instructor,
pilot.mop_regions_served,
pilot.insurance_received,
CASE
	WHEN pilot.insurance_received > Now() Then 1
	ELSE 0
	END as `insuranceExpired`,
member.id as memberID,
member.flight_status,
member.renewal_date,
member.date_of_birth,
member.coordinator_notes,
wing.name as wingName,
member.wing_id,
active,
member_class_id,
airport.ident as homeBase,
wing_job.id as wingJobID,
coordinator.id as coordinatorID,
board_member.id as boardMemberID,
a.no_weekday,
a.no_night,
a.no_weekend,
a.last_minute,
a.first_date,
a.last_date,
a.availability_comment,
(SELECT own FROM pilot_aircraft WHERE pilot_aircraft.member_id = member.id AND own = 1 LIMIT 1) as aircraftOwner,
(SELECT speed FROM aircraft ac JOIN pilot_aircraft on (ac.id = pilot_aircraft.id) WHERE pilot_aircraft.member_id = member.id ORDER BY speed DESC LIMIT 1) as fastestAircraft,
(SELECT ac.range FROM aircraft ac JOIN pilot_aircraft on (ac.id = pilot_aircraft.aircraft_id) WHERE pilot_aircraft.member_id = member.id ORDER BY ac.range DESC LIMIT 1) as longestRangeAircraft,
(SELECT seats FROM pilot_aircraft WHERE pilot_aircraft.member_id = member.id ORDER BY seats DESC LIMIT 1) as mostSeatsAircraft,
(SELECT ac.ac_load FROM aircraft ac JOIN pilot_aircraft on (ac.id = pilot_aircraft.aircraft_id) WHERE pilot_aircraft.member_id = member.id ORDER BY ac.ac_load DESC LIMIT 1) as maxLoadAircraft,
(select count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE pilot_id = member.id AND mr.approved = 1 AND Year(m.mission_date) = Year(Now())) as missionCountThisYear,
(select count(*) from mission_leg ml JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE pilot_id = member.id AND mr.approved = 1) as missionCountTotal,
(SELECT m.mission_date FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE ml.pilot_id = member.id AND approved = 1 ORDER BY m.mission_date DESC LIMIT 1) as lastMissionFlown,
(SELECT m.mission_date FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE ml.pilot_id = member.id AND m.mission_date > Now() ORDER BY m.mission_date LIMIT 1) as nextPendingMission
FROM member JOIN person p on (member.person_id = p.id)
JOIN wing on (member.wing_id = wing.id)
LEFT JOIN pilot on (member.id = pilot.member_id)
LEFT JOIN airport on (pilot.primary_airport_id = airport.id)
LEFT JOIN coordinator on (member.id = coordinator.member_id)
LEFT JOIN board_member on (p.id = board_member.person_id)
LEFT JOIN member_wing_job on (member.id = member_wing_job.member_id)
LEFT JOIN wing_job on (wing_job.id = member_wing_job.wing_job_id)
LEFT JOIN availability a on (member.id = a.member_id)
LEFT JOIN email_list_person el on (p.id = el.person_id)


CREATE VIEW rp_new_member_status
AS
SELECT p.first_name as firstName, p.last_name as lastName, 
date_format(`m`.`join_date`,'%m-%d-%Y') AS `joinDate`,
flight_status as flightStatus, 
date_format(`pa`.`insurance_received`,'%m-%d-%Y') AS `insuranceReceived`,
date_format(`m`.`badge_made`,'%m-%d-%Y') AS `badgeMade`,
date_format(`m`.`notebook_sent`,'%m-%d-%Y') AS `notebookSent`,
join_date as joinDateSort, 
m.wing_id, 
p.email
FROM member m JOIN person p ON (m.person_id = p.id)
LEFT JOIN pilot pa ON (m.id = pa.member_id)
WHERE active = 1
AND (m.badge_made is Null OR m.notebook_sent is Null OR (pa.insurance_received is Null AND m.flight_status = 'Verify Orientation'))

CREATE VIEW rp_flight_status_wing
AS
SELECT name as wingName,
(SELECT count(*) FROM member WHERE wing_id = wing.id AND active = 1) as totalCount,
(SELECT count(*) FROM member WHERE wing_id = wing.id AND active = 1 AND flight_status = 'Command Pilot') as commandPilot,
(SELECT count(*) FROM member WHERE wing_id = wing.id AND active = 1 AND flight_status = 'Non-pilot') as nonPilot,
(SELECT count(*) FROM member WHERE wing_id = wing.id AND active = 1 AND flight_status = 'Verify Orientation') as verifyOrientation,
(SELECT count(*) FROM member WHERE wing_id = wing.id AND active = 1 AND flight_status = 'Ground Angel') as groundAngel,
(SELECT count(*) FROM member WHERE wing_id = wing.id AND active = 1 AND flight_status = 'Mission Assistant') as missionAssistant
FROM wing
ORDER BY name


CREATE PROC reportMissionTypeWing
(@startDate smallDateTime,
@endDate smallDateTime)
AS
SELECT name as wingName,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= '2010/01/01' AND m.mission_date <= '2010/01/15' AND m.mission_type_id = 1) as normalCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= '2010/01/01' AND m.mission_date <= '2010/01/15' AND m.mission_type_id = 2) as adminCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= '2010/01/01' AND m.mission_date <= '2010/01/15' AND m.mission_type_id = 3) as transplantCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= '2010/01/01' AND m.mission_date <= '2010/01/15' AND m.mission_type_id = 4) as compassionCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= '2010/01/01' AND m.mission_date <= '2010/01/15' AND m.mission_type_id = 5) as commCompCount
FROM wing
ORDER BY name

DELIMITER $$

CREATE PROCEDURE rp_mission_type_wing(IN startDate date, IN endDate date)
BEGIN
SELECT name as wingName,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 1) as normalCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 2) as adminCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 3) as transplantCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 4) as compassionCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 5) as commCompCount
FROM wing
ORDER BY name;
END $$

DELIMITER ;

call afids.rp_mission_type_wing('2010/01/01', '2010/01/15')



SELECT mb.wing_id, m.mission_type_id, count( *  )
FROM mission m
JOIN mission_leg ml ON ( m.id = ml.mission_id )
JOIN mission_report mr ON ( ml.mission_report_id = mr.id )
JOIN member mb ON ( ml.pilot_id = mb.id )
JOIN wing ON ( mb.wing_id = wing.id )
WHERE mb.wing_id = wing.id
AND approved =1
AND m.mission_date >= '2010/01/01'


-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE rp_mission_counts_ytd(IN yearNo INT, IN inc VARCHAR(25))
BEGIN
    declare x int default 1;
    while x<=12 do
        SELECT x as `monthNo`,
        CASE inc
            WHEN 'all' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            WHEN 'org' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) LEFT JOIN afa_leg a ON (ml.id = a.id) WHERE a.id is Null AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            WHEN 'linking' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN afa_leg a ON (ml.id = a.id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            END as 'scheduled',
        CASE inc
            WHEN 'all' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Not Null)
            WHEN 'org' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) LEFT JOIN afa_leg a ON (ml.id = a.id) WHERE a.id is Null AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Not Null)
            WHEN 'linking' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN afa_leg a ON (ml.id = a.id)  WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Not Null)
            END as 'cancelled',
        CASE inc
            WHEN 'all' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Null)
            WHEN 'org' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) LEFT JOIN afa_leg a ON (ml.id = a.id) WHERE a.id is Null AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Null)
            WHEN 'linking' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN afa_leg a ON (ml.id = a.id)  WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Null)
            END as 'notCancelled',
        CASE inc
            WHEN 'all' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE approved = 1 AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            WHEN 'org' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) LEFT JOIN afa_leg a ON (ml.id = a.id) WHERE a.id is Null AND approved = 1 AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            WHEN 'linking' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN afa_leg a ON (ml.id = a.id)  JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE approved = 1 AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            END as 'approved';
        set x= x + 1;
    end while;
END $$

CREATE VIEW rp_missions_available_coordination
AS
SELECT concat_ws('-',`m`.`external_id`,`ml`.`leg_number`) AS `externalID`,
ml.id as missionLegID,
0 as memberWingID,
'' as memberHomeBase,
date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDate`,
m.mission_date,
m.flight_time,
ml.pass_on_board,
fa.ident as originID,
fa.name as originName,
fa.city as originCity,
fa.state as originState,
fa.latitude as originLat,
fa.longitude as originLong,
fa.wing_id as originWingID,
ta.ident as destinationID,
ta.name as destinationName,
ta.city as destinationCity,
ta.state as destinationState,
ta.latitude as destinationLat,
ta.longitude as destinationLong,
ta.wing_id as destinationWingID,
mlc.CompanionCount,
Round(ACos(Sin(Radians(fa.latitude)) * Sin(Radians(ta.latitude)) + Cos(Radians(fa.latitude)) * Cos(Radians(ta.latitude)) * Cos(Radians(fa.longitude)-Radians(ta.longitude))) * ((180*60)/3.1415),0) as distance,
CASE
	WHEN mlc.CompanionCount is Null Then ml.pass_on_board
	ELSE mlc.CompanionCount + ml.pass_on_board
	END as passCount,
coalesce(mlc.CompanionTotalWeight,0) + coalesce(p.weight,0) + coalesce(ml.baggage_weight,0) as totalMissionWeight,
person.first_name as firstName,
person.last_name as lastName,
person.email,
person.day_phone as dayPhone,
person.day_comment,
person.evening_phone as evePhone,
person.evening_comment,
ml.coordinator_id as coordinatorID,
cp.first_name as coordFirstName,
cp.last_name as coordLastName,
cp.email as coordEmail,
(select count(*) from mission_leg where pilot_id = member.id AND cancelled is Null) as missionCount,
(select speed from pilot_aircraft JOIN aircraft on (pilot_aircraft.aircraft_id = aircraft.id) where member_id = member.id ORDER BY speed DESC LIMIT 1) as fastestAircraft,
(select aircraft.range from pilot_aircraft JOIN aircraft on (pilot_aircraft.aircraft_id = aircraft.id) where member_id = member.id ORDER BY aircraft.range DESC LIMIT 1) as bestRangeAircraft,
(select seats from pilot_aircraft where member_id = member.id ORDER BY seats DESC LIMIT 1) as seatsAircraft
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN passenger p on (p.id = m.passenger_id)
JOIN airport fa on (ml.from_airport_id = fa.id)
JOIN airport ta on (ml.to_airport_id = ta.id)
LEFT JOIN coordinator c on (ml.coordinator_id = c.id)
LEFT JOIN member cm on (c.member_id = cm.id)
LEFT JOIN person as cp on (cm.person_id = cp.id)
LEFT OUTER JOIN rp_mission_leg_companion_count mlc on (mlc.mission_leg_id = m.id)
LEFT OUTER JOIN afa_leg on (ml.id = afa_leg.id),
pilot, member, person
WHERE ml.pilot_id is Null
AND ml.cancelled is Null
AND m.mission_date >= Now()
AND afa_leg.id is Null
AND (pilot.primary_airport_id = fa.id OR pilot.primary_airport_id = ta.id)
AND pilot.member_id = member.id
AND member.person_id = person.id
AND member.active = 1
AND member.flight_status = 'Command Pilot'
AND (select speed from pilot_aircraft JOIN aircraft on (pilot_aircraft.aircraft_id = aircraft.id) where member_id = member.id ORDER BY speed DESC LIMIT 1) is Not Null


CREATE view rp_mission_leg_companion_count as
SELECT distinct mission_leg_id, count(mission_leg_id) as CompanionCount, Sum(weight) as CompanionTotalWeight 
FROM mission_companion JOIN companion on (mission_companion.companion_id = companion.id)
GROUP BY mission_leg_id


DELIMITER $$

CREATE DEFINER=`afidsApp`@`localhost` PROCEDURE `rp_camp_count`(IN startDate date, IN endDate date)
BEGIN
SELECT c.camp_name as campName,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE m.camp_id = c.id) as legCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE m.camp_id = c.id AND ml.cancelled is Not Null) as cancelledCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE m.camp_id = c.id AND mr.approved = 1) as approvedCount
FROM camp c JOIN mission m ON (c.id = m.camp_id)
WHERE m.mission_date >= startDate
AND m.mission_date <= endDate
GROUP BY c.id, c.camp_name
ORDER BY c.camp_name;
END  $$

CREATE VIEW rp_member_wing_stats_report
AS
SELECT month as monthNo, year as yearNo, s.wing_id, w.name as wingName, flight_status, member_count 
FROM member_wing_stats s JOIN wing w ON (s.wing_id = w.id)

CREATE VIEW rp_mission_type_wing_stats
AS
SELECT month_no as monthNo, year_no as yearNo, mission_type_id as missionTypeID, wing_id as wingID, leg_count as legCount, total_hours as totalHours, aircraft_cost as aircraftCost, commercial_cost as commercialCost
FROM mission_type_wing_stats 

CREATE VIEW rp_missions_by_member
AS
SELECT mb.external_id, 
concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `pilotName`,
mr.mission_date,
count(ml.id) as legCount,
sum(hobbs_time) as hobbsTime,
sum(commercial_ticket_cost) as commercialTicketCost
FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id)
JOIN mission_report mr ON (ml.mission_report_id = mr.id)
JOIN member mb ON (ml.pilot_id = mb.id)
JOIN person p ON (mb.person_id = p.id)

WHERE mr.mission_date >= '2010/02/01'
AND mr.mission_date <= '2010/02/15'
GROUP BY mb.external_id, concat_ws(', ',`p`.`last_name`,`p`.`first_name`)
ORDER BY p.last_name 

CREATE VIEW rp_deceased_persons
AS
SELECT
p.deceased_date,
date_format(`p`.`deceased_date`,'%m-%d-%Y') AS `deceasedDate`,
concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `personName`,
p.deceased_comment as deceasedComment
FROM person p
WHERE deceased = 1

CREATE VIEW `rp_disaster_response_status` AS select `pilot`.`hseats` AS `hseats`,`p`.`last_name` AS `lastName`,concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `personName`,`pilot`.`hseats` AS `disasterResponse`,`p`.`county` AS `county`,`m`.`wing_id` AS `wingID`,`w`.`name` AS `wingName` from (((`person` `p` join `member` `m` on((`p`.`id` = `m`.`person_id`))) join `pilot` on((`m`.`id` = `pilot`.`member_id`))) join `wing` `w` on((`m`.`wing_id` = `w`.`id`))) where (`m`.`active` = 1)


CREATE VIEW rp_application_search
AS
SELECT
application.id as applicationID,
application.date as applicationDate,
person.id as personID,
person.first_name as firstName,
person.last_name as lastName,
person.address1,
person.city,
person.state,
person.zipcode,
person.county,
person.day_phone as areaCode,
person.day_phone as dayPhone,
person.day_comment as dayComment,
person.evening_phone as eveningPhone,
person.evening_comment as eveComment,
person.mobile_phone as mobilePhone,
person.mobile_comment as mobileComment,
person.other_phone as otherPhone,
person.other_comment as otherComment,
person.pager_phone as pagerPhone,
person.pager_comment as pagerComment,
person.email,
spouse_pilot as spousePilot,
wing.id as wingID,
wing.name as wingName,
member.renewal_date as renewalDate,
member.join_date as joinDate,
year(member.join_date) as joinYear,
ref_source.id as refSourceID,
ref_source.source_name as refSourceName,
company_match_funds as companyMatchFunds,
company as companyName,
company_position as companyPosition,
vocation_class.id as vocationClassID,
vocation_class.name as vocationClassName,
member_aopa as memberAOPA,
member_kiwanis as memberKiwanis,
member_rotary as memberRotary,
member_lions as memberLions,
member99s as member99s,
member_wia as memberWIA,
mission_orientation as missionOrientation,
mission_coordination as missionCoordination,
pilot_recruitment as pilotRecruitment,
fund_raising as fundRaising,
celebrity_contacts as celebrityContacts,
graphic_arts as graphicArts,
hospital_outreach as hospitalOutreach,
event_planning as eventPlanning,
media_relations as mediaRelations,
telephone_work as telephoneWork,
computers,
printing,
writing,
speakers_bureau as speakersBureau,
wing_team as wingTeam,
web_internet as webInternet,
foundation_contacts as foundationContacts,
aviation_contacts as aviationContacts,
hseats_interest as disasterResponseInterest
FROM application JOIN member ON (application.member_id = member.id)
JOIN person ON (member.person_id = person.id)
JOIN wing ON (member.wing_id = wing.id)
LEFT JOIN ref_source ON (application.referral_source = ref_source.id)
LEFT JOIN vocation_class ON (application.vocation_class_id = vocation_class.id)


CREATE VIEW `rp_new_member_status`
AS
select `p`.`first_name` AS `firstName`,
`p`.`last_name` AS `lastName`,
date_format(`m`.`join_date`,'%m-%d-%Y') AS `joinDate`,
`m`.`flight_status` AS `flightStatus`,
date_format(`pa`.`insurance_received`,'%m-%d-%Y') AS `insuranceReceived`,
date_format(`m`.`badge_made`,'%m-%d-%Y') AS `badgeMade`,
date_format(`m`.`notebook_sent`,'%m-%d-%Y') AS `notebookSent`,
`m`.`join_date` AS `joinDateSort`,
`m`.`wing_id` AS `wing_id`,
`p`.`email` AS `email`
from `member` `m` join `person` `p` on (`m`.`person_id` = `p`.`id`)
left join `pilot` `pa` on (`m`.`id` = `pa`.`member_id`)
where `m`.`active` = 1

CREATE VIEW `rp_new_member_badge`
AS
select 
m.id as memberID,
m.external_id as externalID,
`p`.`first_name` AS `firstName`,
`p`.`last_name` AS `lastName`,
`p`.`address1` as `addressOne`,
`p`.`address2` as `addressTwo`,
`p`.`city`,
`p`.`state`,
`p`.`zipcode`,
date_format(`m`.`join_date`,'%m-%d-%Y') AS `joinDate`,
`m`.`flight_status` AS `flightStatus`,
date_format(`pa`.`insurance_received`,'%m-%d-%Y') AS `insuranceReceived`,
date_format(`m`.`badge_made`,'%m-%d-%Y') AS `badgeMade`,
date_format(`m`.`notebook_sent`,'%m-%d-%Y') AS `notebookSent`,
`m`.`join_date` AS `joinDateSort`,
`m`.`wing_id` AS `wing_id`,
`p`.`email` AS `email`,
(SELECT id from application where application.member_id = m.id order by date desc limit 1) as applicationID
from `member` `m` join `person` `p` on (`m`.`person_id` = `p`.`id`)
left join `pilot` `pa` on (`m`.`id` = `pa`.`member_id`)
where `m`.`active` = 1
and (m.notebook_sent is null or m.badge_made is null)

CREATE VIEW rp_outreach_report AS
SELECT m.external_id as externalID,
m.mission_date,
date_format(`m`.`mission_date`,'%m-%d-%Y') AS `displayDate`,
ml.cancelled,
concat_ws(', ',`pilot`.`first_name`,`pilot`.`last_name`) AS `pilotName`,
pilot.last_name as pilotLastName,
a.name as agencyName,
concat_ws(', ',`pass`.`first_name`,`pass`.`last_name`) AS `passName`,
pass.last_name as passLastName,
Now() - pa.date_of_birth as passAge,
pa.illness,
pa.facility_name as facilityName,
pa.lodging_name as lodgingName,
a.city as agencyCity,
a.state as agencyState,
pass.state as passState,
a.id,
pa.id as passengerID
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN passenger pa on (pa.id = m.passenger_id)
JOIN person pass on (pa.person_id = pass.id)
JOIN member mb on (ml.pilot_id = mb.id)
JOIN person pilot on (mb.person_id = pilot.id)
JOIN requester r on (m.requester_id = r.id)
JOIN agency a on (r.agency_id = a.id)

CREATE VIEW rp_cancelled_missions
AS
SELECT
month(m.mission_date) as monthNo,
cancelled,
count(ml.id) as legCount
FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id)

CREATE VIEW rp_missions_origin_destination
AS
SELECT DISTINCT m.external_id as externalID, m.mission_date,
(SELECT ident FROM airport a JOIN mission_leg mla ON (a.id = mla.from_airport_id) JOIN mission_report mra ON (mla.mission_report_id = mra.id) WHERE mla.mission_id = m.id AND mra.approved = 1 AND mla.cancelled is Null ORDER BY leg_number LIMIT 1) as originID,
(SELECT city FROM airport a JOIN mission_leg mla ON (a.id = mla.from_airport_id) JOIN mission_report mra ON (mla.mission_report_id = mra.id) WHERE mla.mission_id = m.id AND mra.approved = 1 AND mla.cancelled is Null ORDER BY leg_number LIMIT 1) as originCity,
(SELECT ident FROM airport a JOIN mission_leg mla ON (a.id = mla.to_airport_id) JOIN mission_report mra ON (mla.mission_report_id = mra.id) WHERE mla.mission_id = m.id AND mra.approved = 1 AND mla.cancelled is Null ORDER BY leg_number DESC LIMIT 1) as destID,
(SELECT city FROM airport a JOIN mission_leg mla ON (a.id = mla.to_airport_id) JOIN mission_report mra ON (mla.mission_report_id = mra.id) WHERE mla.mission_id = m.id AND mra.approved = 1 AND mla.cancelled is Null ORDER BY leg_number DESC LIMIT 1) as destCity,
(SELECT count(*) FROM mission_leg mla JOIN mission_report mra ON (mla.mission_report_id = mra.id) WHERE mla.mission_id = m.id AND mra.approved = 1 AND mla.cancelled is Null)  as legCount
FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id)
JOIN mission_report mr ON (ml.mission_report_id = mr.id)
WHERE mr.approved = 1
AND ml.cancelled is Null

CREATE VIEW rp_member_application_reconciliation
AS
/* Lists member application with financial data for financial reconciliation */
SELECT p.first_name, p.last_name, 
m.external_id, a.renewal, 
a.dues_amount_paid, a.method_of_payment, 
a.check_number, a.donation_amount_paid, 
a.date as application_date,
date_format(`a`.`date`,'%m-%d-%Y') AS `applicationDateDisplay`,
date_format(`a`.`processed_date`,'%m-%d-%Y') AS `processedDate`,
a.ccard_approval_number, a.payment_transaction_id, m.member_class_id, mc.name as memberClass, m.master_member_id, mm.external_id as masterMemberExternalID,
mp.first_name as masterMemberFirstName, mp.last_name as masterMemberLastName, m.renewal_date
from application a JOIN member m ON (a.member_id = m.id)
JOIN person p ON (m.person_id = p.id)
JOIN member_class mc ON (m.member_class_id = mc.id)
LEFT JOIN member mm ON (m.master_member_id = mm.id)
LEFT JOIN person mp ON (mm.person_id = mp.id)

ALTER VIEW rp_audit_logs
AS
SELECT 
date_format(`date_time`,'%m-%d-%Y') AS `DateTimeDisplay`, date_time,
concat_ws(', ',`person`.`first_name`,`person`.`last_name`) AS `audit_identity`,
event,
event_reason
FROM audit_log LEFT JOIN person ON (person.id = audit_log.person_id)

/*   Audit log summary */

DELIMITER $$

CREATE PROCEDURE `rp_audit_logins_summary`(IN startDate date, IN endDate date)
BEGIN
SELECT
CASE WHEN pi.member_id is null THEN 'Non-Pilot' ELSE 'Pilot' END + ' - ' + CASE WHEN LENGTH(event_reason) > 12 THEN LEFT(event_reason,INSTR('% from%',event_reason)-1) ELSE event_reason END AS Status
FROM audit_log al
LEFT JOIN person p ON (p.id = al.person_id)
LEFT JOIN member m ON (p.id = m.person_id)
LEFT JOIN pilot pi ON (m.id = pi.member_id),
COUNT(event) as total
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND (p.id NOT IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6)) OR p.id IS NULL)
GROUP BY CASE WHEN pi.member_id is null THEN 'Non-Pilot' ELSE 'Pilot' END + ' - ' + CASE WHEN LENGTH(event_reason) > 12 THEN LEFT(event_reason,INSTR('% from%',event_reason)-1) ELSE event_reason END
-- Total Logins
UNION SELECT count(*) as total, 'Total Logins' as Status
FROM audit_log al WHERE event = 'login' and date_time BETWEEN startDate AND endDate
-- Total Pilot / Non-Pilot logins
UNION SELECT
CASE WHEN pi.member_id is null THEN 'Non-Pilot Logins' ELSE 'Pilot Logins' END AS Status
FROM audit_log al
LEFT JOIN person p ON p.id = al.person_id
LEFT JOIN member m ON p.id = m.person_id
LEFT JOIN pilot pi ON m.id = pi.member_id,
COUNT(event) as total
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND (p.id NOT IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6)) OR p.id IS NULL)
GROUP BY CASE WHEN pi.member_id is null THEN 'Non-Pilot Logins' ELSE 'Pilot Logins' END
-- Staff logins
UNION SELECT
'Staff Logins' AS Status,
COUNT(event) as total
FROM audit_log al
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND al.person_id IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6))
ORDER BY status DESC;
END

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE rp_audit_logins_non_staff(IN startDate date, IN endDate date)
BEGIN
SELECT
concat_ws(', ',`p`.`first_name`,`p`.`last_name`) AS `audit_identity`,
CASE WHEN pi.member_id is null THEN 'Non-Pilot' ELSE 'Pilot' END AS Status, event_reason,
COUNT(event) as total
FROM audit_log al
LEFT JOIN person p ON (p.id = al.person_id)
LEFT JOIN member m ON (p.id = m.person_id)
LEFT JOIN pilot pi ON (m.id = pi.member_id)
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND (p.id NOT IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6)) or p.id is null)
GROUP BY concat_ws(', ',`p`.`first_name`,`p`.`last_name`), pi.member_id, event_reason
ORDER BY count(event) DESC;
END $$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE afids.rp_audit_logins_staff(IN startDate date, IN endDate date)
BEGIN
SELECT
concat_ws(', ',`p`.`first_name`,`p`.`last_name`) AS `audit_identity`,
CASE WHEN pi.member_id is null THEN 'Non-Pilot' ELSE 'Pilot' END AS Status,
COUNT(event) as total
FROM audit_log al
LEFT JOIN person p ON (p.id = al.person_id)
LEFT JOIN member m ON (p.id = m.person_id)
LEFT JOIN pilot pi ON (m.id = pi.member_id)
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND p.id IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6))
GROUP BY concat_ws(', ',`p`.`first_name`,`p`.`last_name`), pi.member_id
ORDER BY count(event) DESC;
END $$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE afids.rp_member_mission_distribution(IN startDate date, IN endDate date)
BEGIN
SELECT DISTINCT (SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) > 0)) as rowOne,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) = 1)) as rowTwo,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >= 2 AND count(ml.id) <= 5)) as rowThree,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >= 6 AND count(ml.id) <= 10)) as rowFour,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >= 11 AND count(ml.id) <= 15)) as rowFive,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >= 16 AND count(ml.id) <= 20)) as rowSix,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >= 21 AND count(ml.id) <= 30)) as rowSeven,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >= 31 AND count(ml.id) <= 50)) as rowEight,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >= 51 AND count(ml.id) <= 100)) as rowNine,
(SELECT count(id) FROM member where id in (SELECT mb.id FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >= 100)) as rowTen,
(SELECT count(id) from member WHERE active = 1 AND member.member_class_id <> 3 AND flight_status = 'Command Pilot' AND member.id IN (SELECT pilot_id FROM mission_leg ml JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mr.approved = 1)) as membersWithMissions,
(SELECT count(mb.id) FROM member mb LEFT JOIN mission_leg ml ON (mb.id = ml.pilot_id) WHERE active = 1 AND mb.member_class_id <> 3 AND flight_status = 'Command Pilot' AND ml.pilot_id is Null AND ml.cancelled is Null) as membersWithoutMissions,
(SELECT count(*) from member where active = 1) as allCurrentMembers,
(SELECT count(*) from member WHERE active = 1 AND member.member_class_id <> 3 AND flight_status = 'Command Pilot') as allCurrentCommandPilots,
(SELECT count(ml.id) FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate) as legCount;
END $$

DELIMITER ;

ALTER VIEW rp_member_photos
AS
SELECT p.id as photoID, 
date_format(`submission_date`,'%m-%d-%Y') AS `submissionDate`,
date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDate`,
concat_ws(', ',`pa`.`first_name`,`pa`.`last_name`) AS `passengerName`,
concat_ws(', ',`pl`.`first_name`,`pl`.`last_name`) AS `pilotName`,
photo_quality,
photo_filename,
concat(substr(photo_filename,1,locate('.',photo_filename)-1),'_thumb.jpg') AS `photoThumb`,
mb.wing_id,
pa.last_name as passLastName,
pl.last_name as pilotLastName
FROM mission_photo p JOIN mission_leg ml ON (p.leg_id = ml.id)
JOIN mission m ON (ml.mission_id = m.id)
JOIN member mb ON (ml.pilot_id = mb.id)
JOIN person pl ON (mb.person_id = pl.id)
JOIN passenger pass ON (m.passenger_id = pass.id)
JOIN person pa ON (pass.person_id = pa.id)
WHERE approved = 1

/* rp_application_search */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_application_search` AS select `afids`.`application`.`id` AS `applicationID`,`afids`.`application`.`date` AS `applicationDate`,`afids`.`person`.`id` AS `personID`,`afids`.`person`.`first_name` AS `firstName`,`afids`.`person`.`last_name` AS `lastName`,`afids`.`person`.`address1` AS `address1`,`afids`.`person`.`city` AS `city`,`afids`.`person`.`state` AS `state`,`afids`.`person`.`zipcode` AS `zipcode`,`afids`.`person`.`county` AS `county`,`afids`.`person`.`day_phone` AS `areaCode`,`afids`.`person`.`day_phone` AS `dayPhone`,`afids`.`person`.`day_comment` AS `dayComment`,`afids`.`person`.`evening_phone` AS `eveningPhone`,`afids`.`person`.`evening_comment` AS `eveComment`,`afids`.`person`.`email` AS `email`,`afids`.`application`.`spouse_pilot` AS `spousePilot`,`afids`.`wing`.`id` AS `wingID`,`afids`.`wing`.`name` AS `wingName`,`afids`.`member`.`renewal_date` AS `renewalDate`,`afids`.`member`.`join_date` AS `joinDate`,year(`afids`.`member`.`join_date`) AS `joinYear`,`afids`.`ref_source`.`id` AS `refSourceID`,`afids`.`ref_source`.`source_name` AS `refSourceName`,`afids`.`application`.`company_match_funds` AS `companyMatchFunds`,`afids`.`application`.`company` AS `companyName`,`afids`.`application`.`company_position` AS `companyPosition`,`afids`.`vocation_class`.`id` AS `vocationClassID`,`afids`.`vocation_class`.`name` AS `vocationClassName`,`afids`.`application`.`member_aopa` AS `memberAOPA`,`afids`.`application`.`member_kiwanis` AS `memberKiwanis`,`afids`.`application`.`member_rotary` AS `memberRotary`,`afids`.`application`.`member_lions` AS `memberLions`,`afids`.`application`.`member99s` AS `member99s`,`afids`.`application`.`member_wia` AS `memberWIA`,`afids`.`application`.`mission_orientation` AS `missionOrientation`,`afids`.`application`.`mission_coordination` AS `missionCoordination`,`afids`.`application`.`pilot_recruitment` AS `pilotRecruitment`,`afids`.`application`.`fund_raising` AS `fundRaising`,`afids`.`application`.`celebrity_contacts` AS `celebrityContacts`,`afids`.`application`.`graphic_arts` AS `graphicArts`,`afids`.`application`.`hospital_outreach` AS `hospitalOutreach`,`afids`.`application`.`event_planning` AS `eventPlanning`,`afids`.`application`.`media_relations` AS `mediaRelations`,`afids`.`application`.`telephone_work` AS `telephoneWork`,`afids`.`application`.`computers` AS `computers`,`afids`.`application`.`printing` AS `printing`,`afids`.`application`.`writing` AS `writing`,`afids`.`application`.`speakers_bureau` AS `speakersBureau`,`afids`.`application`.`wing_team` AS `wingTeam`,`afids`.`application`.`web_internet` AS `webInternet`,`afids`.`application`.`foundation_contacts` AS `foundationContacts`,`afids`.`application`.`aviation_contacts` AS `aviationContacts`,`afids`.`application`.`hseats_interest` AS `disasterResponseInterest` from (((((`afids`.`application` join `afids`.`member` on((`afids`.`application`.`member_id` = `afids`.`member`.`id`))) join `afids`.`person` on((`afids`.`member`.`person_id` = `afids`.`person`.`id`))) join `afids`.`wing` on((`afids`.`member`.`wing_id` = `afids`.`wing`.`id`))) left join `afids`.`ref_source` on((`afids`.`application`.`referral_source` = `afids`.`ref_source`.`id`))) left join `afids`.`vocation_class` on((`afids`.`application`.`vocation_class_id` = `afids`.`vocation_class`.`id`)))

/* rp_audit_log */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_audit_logs` AS select date_format(`afids`.`audit_log`.`date_time`,'%m-%d-%Y') AS `DateTimeDisplay`,`afids`.`audit_log`.`date_time` AS `date_time`,concat_ws(', ',`afids`.`person`.`first_name`,`afids`.`person`.`last_name`) AS `audit_identity`,`afids`.`audit_log`.`event` AS `event`,`afids`.`audit_log`.`event_reason` AS `event_reason` from (`afids`.`audit_log` left join `afids`.`person` on((`afids`.`person`.`id` = `afids`.`audit_log`.`person_id`)))

/* rp_cancelled_missions */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_cancelled_missions` AS select distinct year(`afids`.`mission`.`mission_date`) AS `year`,month(`afids`.`mission`.`mission_date`) AS `month`,(case when isnull(`afids`.`mission_leg`.`cancelled`) then 'Not Cancelled' else `afids`.`mission_leg`.`cancelled` end) AS `cancelled`,count(`afids`.`mission_leg`.`cancelled`) AS `mission_leg`,count(`afids`.`mission_leg`.`pilot_id`) AS `coordinated` from ((((`afids`.`mission_leg` join `afids`.`mission` on((`afids`.`mission_leg`.`mission_id` = `afids`.`mission`.`id`))) join `afids`.`airport` `ta` on((`afids`.`mission_leg`.`to_airport_id` = `ta`.`id`))) join `afids`.`airport` `fa` on((`afids`.`mission_leg`.`from_airport_id` = `fa`.`id`))) left join `afids`.`afa_leg` `afa` on((`afids`.`mission_leg`.`id` = `afa`.`id`)))

/* rp_deceased_persons */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_deceased_persons` AS select `p`.`deceased_date` AS `deceased_date`,date_format(`p`.`deceased_date`,'%m-%d-%Y') AS `deceasedDate`,concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `personName`,`p`.`deceased_comment` AS `deceasedComment` from `afids`.`person` `p` where (`p`.`deceased` = 1)

/* rp_disaster_response_status */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_disaster_response_status` AS select `p`.`last_name` AS `lastName`,concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `personName`,`afids`.`pilot`.`hseats` AS `disasterResponse`,`p`.`county` AS `county`,`m`.`wing_id` AS `wingID`,`w`.`name` AS `wingName`,`m`.`flight_status` AS `flightStatus` from (((`afids`.`person` `p` join `afids`.`member` `m` on((`p`.`id` = `m`.`person_id`))) join `afids`.`pilot` on((`m`.`id` = `afids`.`pilot`.`member_id`))) join `afids`.`wing` `w` on((`m`.`wing_id` = `w`.`id`))) where (`m`.`active` = 1)

/* rp_flight_status_wing */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_flight_status_wing` AS select `afids`.`wing`.`name` AS `wingName`,(select count(0) AS `count(*)` from `afids`.`member` where ((`afids`.`member`.`wing_id` = `afids`.`wing`.`id`) and (`afids`.`member`.`active` = 1))) AS `totalCount`,(select count(0) AS `count(*)` from `afids`.`member` where ((`afids`.`member`.`wing_id` = `afids`.`wing`.`id`) and (`afids`.`member`.`active` = 1) and (`afids`.`member`.`flight_status` = 'Command Pilot'))) AS `commandPilot`,(select count(0) AS `count(*)` from `afids`.`member` where ((`afids`.`member`.`wing_id` = `afids`.`wing`.`id`) and (`afids`.`member`.`active` = 1) and (`afids`.`member`.`flight_status` = 'Non-pilot'))) AS `nonPilot`,(select count(0) AS `count(*)` from `afids`.`member` where ((`afids`.`member`.`wing_id` = `afids`.`wing`.`id`) and (`afids`.`member`.`active` = 1) and (`afids`.`member`.`flight_status` = 'Verify Orientation'))) AS `verifyOrientation`,(select count(0) AS `count(*)` from `afids`.`member` where ((`afids`.`member`.`wing_id` = `afids`.`wing`.`id`) and (`afids`.`member`.`active` = 1) and (`afids`.`member`.`flight_status` = 'Ground Angel'))) AS `groundAngel`,(select count(0) AS `count(*)` from `afids`.`member` where ((`afids`.`member`.`wing_id` = `afids`.`wing`.`id`) and (`afids`.`member`.`active` = 1) and (`afids`.`member`.`flight_status` = 'Mission Assistant'))) AS `missionAssistant` from `afids`.`wing` order by `afids`.`wing`.`name`

/* rp_member_application_reconciliation */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_member_application_reconciliation` AS select `p`.`first_name` AS `first_name`,`p`.`last_name` AS `last_name`,`m`.`external_id` AS `external_id`,`a`.`renewal` AS `renewal`,`a`.`dues_amount_paid` AS `dues_amount_paid`,`a`.`method_of_payment` AS `method_of_payment`,`a`.`check_number` AS `check_number`,`a`.`donation_amount_paid` AS `donation_amount_paid`,`a`.`date` AS `application_date`,date_format(`a`.`date`,'%m-%d-%Y') AS `applicationDateDisplay`,date_format(`a`.`processed_date`,'%m-%d-%Y') AS `processedDate`,`a`.`ccard_approval_number` AS `ccard_approval_number`,`a`.`payment_transaction_id` AS `payment_transaction_id`,`m`.`member_class_id` AS `member_class_id`,`mc`.`name` AS `memberClass`,`m`.`master_member_id` AS `master_member_id`,`mm`.`external_id` AS `masterMemberExternalID`,`mp`.`first_name` AS `masterMemberFirstName`,`mp`.`last_name` AS `masterMemberLastName`,`m`.`renewal_date` AS `renewal_date` from (((((`afids`.`application` `a` join `afids`.`member` `m` on((`a`.`member_id` = `m`.`id`))) join `afids`.`person` `p` on((`m`.`person_id` = `p`.`id`))) join `afids`.`member_class` `mc` on((`m`.`member_class_id` = `mc`.`id`))) left join `afids`.`member` `mm` on((`m`.`master_member_id` = `mm`.`id`))) left join `afids`.`person` `mp` on((`mm`.`person_id` = `mp`.`id`)))

/* rp_member_photos */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_member_photos` AS select `p`.`id` AS `photoID`,date_format(`p`.`submission_date`,'%m-%d-%Y') AS `submissionDate`,date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDate`,concat_ws(', ',`pa`.`first_name`,`pa`.`last_name`) AS `passengerName`,concat_ws(', ',`pl`.`first_name`,`pl`.`last_name`) AS `pilotName`,`p`.`photo_quality` AS `photo_quality`,`p`.`photo_filename` AS `photo_filename`,concat(substr(`p`.`photo_filename`,1,(locate('.',`p`.`photo_filename`) - 1)),'_thumb.jpg') AS `photoThumb`,`mb`.`wing_id` AS `wing_id`,`pa`.`last_name` AS `passLastName`,`pl`.`last_name` AS `pilotLastName` from ((((((`afids`.`mission_photo` `p` join `afids`.`mission_leg` `ml` on((`p`.`leg_id` = `ml`.`id`))) join `afids`.`mission` `m` on((`ml`.`mission_id` = `m`.`id`))) join `afids`.`member` `mb` on((`ml`.`pilot_id` = `mb`.`id`))) join `afids`.`person` `pl` on((`mb`.`person_id` = `pl`.`id`))) join `afids`.`passenger` `pass` on((`m`.`passenger_id` = `pass`.`id`))) join `afids`.`person` `pa` on((`pass`.`person_id` = `pa`.`id`))) where (`p`.`approved` = 1)

/* rp_member_wing_stats_report */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_member_wing_stats_report` AS select `s`.`month` AS `monthNo`,`s`.`year` AS `yearNo`,`s`.`wing_id` AS `wingID`,`w`.`name` AS `wingName`,`s`.`flight_status` AS `flightStatus`,`s`.`member_count` AS `memberCount` from (`afids`.`member_wing_stats` `s` join `afids`.`wing` `w` on((`s`.`wing_id` = `w`.`id`)))

/* rp_members_no_missions */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_members_no_missions` AS select `p`.`first_name` AS `firstName`,`p`.`last_name` AS `lastName`,date_format(`m`.`join_date`,'%m-%d-%Y') AS `joinDate`,`m`.`join_date` AS `joinDateSort`,`m`.`wing_id` AS `wing_id`,`p`.`email` AS `email` from (`afids`.`member` `m` join `afids`.`person` `p` on((`m`.`person_id` = `p`.`id`))) where ((`m`.`active` = 1) and (`m`.`flight_status` = 'Command Pilot') and ((select count(0) AS `count(*)` from `afids`.`mission_leg` `ml` where (isnull(`ml`.`cancelled`) and (`ml`.`pilot_id` = `m`.`id`))) = 0) and ((select count(0) AS `count(*)` from `afids`.`mission_leg` `ml` where ((`ml`.`cancelled` is not null) and (`ml`.`pilot_id` = `m`.`id`))) = 0))

/* rp_mission_leg_companion_count */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_mission_leg_companion_count` AS select distinct `afids`.`mission_companion`.`mission_leg_id` AS `mission_leg_id`,count(`afids`.`mission_companion`.`mission_leg_id`) AS `CompanionCount`,sum(`afids`.`companion`.`weight`) AS `CompanionTotalWeight` from (`afids`.`mission_companion` join `afids`.`companion` on((`afids`.`mission_companion`.`companion_id` = `afids`.`companion`.`id`))) group by `afids`.`mission_companion`.`mission_leg_id`

/* rp_mission_legs_origin_destination */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_mission_legs_origin_destination` AS select concat_ws('-',`m`.`external_id`,`ml`.`leg_number`) AS `missionNo`,`m`.`external_id` AS `externalID`,`m`.`mission_date` AS `missionDate`,`ml`.`leg_number` AS `legNumber`,date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDisplayDate`,concat(`fa`.`ident`,' (',`fa`.`city`,', ',`fa`.`state`,')<br/>',`faz`.`county_name`) AS `origin`,concat(`ta`.`ident`,' (',`ta`.`city`,', ',`ta`.`state`,')<br/>',`taz`.`county_name`) AS `destination`,`afids`.`wing`.`name` AS `wingName`,`m`.`mission_date` AS `mission_date`,`afids`.`afa_leg`.`id` AS `legID`,(case when (`afids`.`afa_leg`.`id` is not null) then 1 end) AS `isAfaLeg`,(case when (`mr`.`approved` = 1) then 1 end) AS `isFlown` from (((((((((`afids`.`mission` `m` join `afids`.`mission_leg` `ml` on((`m`.`id` = `ml`.`mission_id`))) left join `afids`.`mission_report` `mr` on((`ml`.`mission_report_id` = `mr`.`id`))) left join `afids`.`afa_leg` on((`ml`.`id` = `afids`.`afa_leg`.`id`))) join `afids`.`airport` `fa` on((`ml`.`from_airport_id` = `fa`.`id`))) left join `afids`.`zipcode` `faz` on((`fa`.`zipcode` = `faz`.`zipcode`))) join `afids`.`airport` `ta` on((`ml`.`to_airport_id` = `ta`.`id`))) left join `afids`.`zipcode` `taz` on((`ta`.`zipcode` = `taz`.`zipcode`))) left join `afids`.`member` `mb` on((`ml`.`pilot_id` = `mb`.`id`))) left join `afids`.`wing` on((`mb`.`wing_id` = `afids`.`wing`.`id`))) where isnull(`ml`.`cancelled`)

/* rp_mission_type_wing_stats */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_mission_type_wing_stats` AS select `afids`.`mission_type_wing_stats`.`month_no` AS `monthNo`,`afids`.`mission_type_wing_stats`.`year_no` AS `yearNo`,`afids`.`mission_type_wing_stats`.`mission_type_id` AS `missionTypeID`,`afids`.`mission_type_wing_stats`.`wing_id` AS `wingID`,`afids`.`mission_type_wing_stats`.`leg_count` AS `legCount`,`afids`.`mission_type_wing_stats`.`total_hours` AS `totalHours`,`afids`.`mission_type_wing_stats`.`aircraft_cost` AS `aircraftCost`,`afids`.`mission_type_wing_stats`.`commercial_cost` AS `commercialCost` from `afids`.`mission_type_wing_stats`

/* rp_missions_available_coordination */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_missions_available_coordination` AS select concat_ws('-',`m`.`external_id`,`ml`.`leg_number`) AS `externalID`,`ml`.`id` AS `missionLegID`,0 AS `memberWingID`,'' AS `memberHomeBase`,date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDate`,`m`.`mission_date` AS `mission_date`,`m`.`flight_time` AS `flight_time`,`ml`.`pass_on_board` AS `pass_on_board`,`fa`.`ident` AS `originID`,`fa`.`name` AS `originName`,`fa`.`city` AS `originCity`,`fa`.`state` AS `originState`,`fa`.`latitude` AS `originLat`,`fa`.`longitude` AS `originLong`,`fa`.`wing_id` AS `originWingID`,`ta`.`ident` AS `destinationID`,`ta`.`name` AS `destinationName`,`ta`.`city` AS `destinationCity`,`ta`.`state` AS `destinationState`,`ta`.`latitude` AS `destinationLat`,`ta`.`longitude` AS `destinationLong`,`ta`.`wing_id` AS `destinationWingID`,`mlc`.`CompanionCount` AS `CompanionCount`,round((acos(((sin(radians(`fa`.`latitude`)) * sin(radians(`ta`.`latitude`))) + ((cos(radians(`fa`.`latitude`)) * cos(radians(`ta`.`latitude`))) * cos((radians(`fa`.`longitude`) - radians(`ta`.`longitude`)))))) * ((180 * 60) / 3.1415)),0) AS `distance`,(case when isnull(`mlc`.`CompanionCount`) then `ml`.`pass_on_board` else (`mlc`.`CompanionCount` + `ml`.`pass_on_board`) end) AS `passCount`,((coalesce(`mlc`.`CompanionTotalWeight`,0) + coalesce(`p`.`weight`,0)) + coalesce(`ml`.`baggage_weight`,0)) AS `totalMissionWeight`,`afids`.`person`.`first_name` AS `firstName`,`afids`.`person`.`last_name` AS `lastName`,`afids`.`person`.`email` AS `email`,`afids`.`person`.`day_phone` AS `dayPhone`,`afids`.`person`.`day_comment` AS `day_comment`,`afids`.`person`.`evening_phone` AS `evePhone`,`afids`.`person`.`evening_comment` AS `evening_comment`,`ml`.`coordinator_id` AS `coordinatorID`,`cp`.`first_name` AS `coordFirstName`,`cp`.`last_name` AS `coordLastName`,`cp`.`email` AS `coordEmail`,(select count(0) AS `count(*)` from `afids`.`mission_leg` where ((`afids`.`mission_leg`.`pilot_id` = `afids`.`member`.`id`) and isnull(`afids`.`mission_leg`.`cancelled`))) AS `missionCount`,(select `afids`.`aircraft`.`speed` AS `speed` from (`afids`.`pilot_aircraft` join `afids`.`aircraft` on((`afids`.`pilot_aircraft`.`aircraft_id` = `afids`.`aircraft`.`id`))) where (`afids`.`pilot_aircraft`.`member_id` = `afids`.`member`.`id`) order by `afids`.`aircraft`.`speed` desc limit 1) AS `fastestAircraft`,(select `afids`.`aircraft`.`range` AS `range` from (`afids`.`pilot_aircraft` join `afids`.`aircraft` on((`afids`.`pilot_aircraft`.`aircraft_id` = `afids`.`aircraft`.`id`))) where (`afids`.`pilot_aircraft`.`member_id` = `afids`.`member`.`id`) order by `afids`.`aircraft`.`range` desc limit 1) AS `bestRangeAircraft`,(select `afids`.`pilot_aircraft`.`seats` AS `seats` from `afids`.`pilot_aircraft` where (`afids`.`pilot_aircraft`.`member_id` = `afids`.`member`.`id`) order by `afids`.`pilot_aircraft`.`seats` desc limit 1) AS `seatsAircraft` from ((((((((((((`afids`.`mission` `m` join `afids`.`mission_leg` `ml` on((`m`.`id` = `ml`.`mission_id`))) join `afids`.`passenger` `p` on((`p`.`id` = `m`.`passenger_id`))) join `afids`.`airport` `fa` on((`ml`.`from_airport_id` = `fa`.`id`))) join `afids`.`airport` `ta` on((`ml`.`to_airport_id` = `ta`.`id`))) left join `afids`.`coordinator` `c` on((`ml`.`coordinator_id` = `c`.`id`))) left join `afids`.`member` `cm` on((`c`.`member_id` = `cm`.`id`))) left join `afids`.`person` `cp` on((`cm`.`person_id` = `cp`.`id`))) left join `afids`.`rp_mission_leg_companion_count` `mlc` on((`mlc`.`mission_leg_id` = `m`.`id`))) left join `afids`.`afa_leg` on((`ml`.`id` = `afids`.`afa_leg`.`id`))) join `afids`.`pilot`) join `afids`.`member`) join `afids`.`person`) where (isnull(`ml`.`pilot_id`) and isnull(`ml`.`cancelled`) and (`m`.`mission_date` >= now()) and isnull(`afids`.`afa_leg`.`id`) and ((`afids`.`pilot`.`primary_airport_id` = `fa`.`id`) or (`afids`.`pilot`.`primary_airport_id` = `ta`.`id`)) and (`afids`.`pilot`.`member_id` = `afids`.`member`.`id`) and (`afids`.`member`.`person_id` = `afids`.`person`.`id`) 
and (`afids`.`member`.`active` = 1) and (`afids`.`member`.`flight_status` = 'Command Pilot') and ((select `afids`.`aircraft`.`speed` AS `speed` from (`afids`.`pilot_aircraft` join `afids`.`aircraft` on((`afids`.`pilot_aircraft`.`aircraft_id` = `afids`.`aircraft`.`id`))) where (`afids`.`pilot_aircraft`.`member_id` = `afids`.`member`.`id`) order by `afids`.`aircraft`.`speed` desc limit 1) is not null))

/* rp_missions_by_member */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_missions_by_member` AS select `mb`.`external_id` AS `external_id`,concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `pilotName`,`mr`.`mission_date` AS `mission_date`,count(`ml`.`id`) AS `legCount`,sum(`mr`.`hobbs_time`) AS `hobbsTime`,sum(`mr`.`commercial_ticket_cost`) AS `commercialTicketCost` from ((((`afids`.`mission` `m` join `afids`.`mission_leg` `ml` on((`m`.`id` = `ml`.`mission_id`))) join `afids`.`mission_report` `mr` on((`ml`.`mission_report_id` = `mr`.`id`))) join `afids`.`member` `mb` on((`ml`.`pilot_id` = `mb`.`id`))) join `afids`.`person` `p` on((`mb`.`person_id` = `p`.`id`)))

/* rp_missions_origin_destination */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_missions_origin_destination` AS select distinct `m`.`external_id` AS `externalID`,`m`.`mission_date` AS `mission_date`,(select `a`.`ident` AS `ident` from ((`afids`.`airport` `a` join `afids`.`mission_leg` `mla` on((`a`.`id` = `mla`.`from_airport_id`))) join `afids`.`mission_report` `mra` on((`mla`.`mission_report_id` = `mra`.`id`))) where ((`mla`.`mission_id` = `m`.`id`) and (`mra`.`approved` = 1) and isnull(`mla`.`cancelled`)) order by `mla`.`leg_number` limit 1) AS `originID`,(select `a`.`city` AS `city` from ((`afids`.`airport` `a` join `afids`.`mission_leg` `mla` on((`a`.`id` = `mla`.`from_airport_id`))) join `afids`.`mission_report` `mra` on((`mla`.`mission_report_id` = `mra`.`id`))) where ((`mla`.`mission_id` = `m`.`id`) and (`mra`.`approved` = 1) and isnull(`mla`.`cancelled`)) order by `mla`.`leg_number` limit 1) AS `originCity`,(select `a`.`ident` AS `ident` from ((`afids`.`airport` `a` join `afids`.`mission_leg` `mla` on((`a`.`id` = `mla`.`to_airport_id`))) join `afids`.`mission_report` `mra` on((`mla`.`mission_report_id` = `mra`.`id`))) where ((`mla`.`mission_id` = `m`.`id`) and (`mra`.`approved` = 1) and isnull(`mla`.`cancelled`)) order by `mla`.`leg_number` desc limit 1) AS `destID`,(select `a`.`city` AS `city` from ((`afids`.`airport` `a` join `afids`.`mission_leg` `mla` on((`a`.`id` = `mla`.`to_airport_id`))) join `afids`.`mission_report` `mra` on((`mla`.`mission_report_id` = `mra`.`id`))) where ((`mla`.`mission_id` = `m`.`id`) and (`mra`.`approved` = 1) and isnull(`mla`.`cancelled`)) order by `mla`.`leg_number` desc limit 1) AS `destCity`,(select count(0) AS `count(*)` from (`afids`.`mission_leg` `mla` join `afids`.`mission_report` `mra` on((`mla`.`mission_report_id` = `mra`.`id`))) where ((`mla`.`mission_id` = `m`.`id`) and (`mra`.`approved` = 1) and isnull(`mla`.`cancelled`))) AS `legCount` from ((`afids`.`mission` `m` join `afids`.`mission_leg` `ml` on((`m`.`id` = `ml`.`mission_id`))) join `afids`.`mission_report` `mr` on((`ml`.`mission_report_id` = `mr`.`id`))) where ((`mr`.`approved` = 1) and isnull(`ml`.`cancelled`))

/* rp_new_member_badge */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_new_member_badge` AS select `m`.`id` AS `memberID`,`m`.`external_id` AS `externalID`,`p`.`first_name` AS `firstName`,`p`.`last_name` AS `lastName`,`p`.`address1` AS `addressOne`,`p`.`address2` AS `addressTwo`,`p`.`city` AS `city`,`p`.`state` AS `state`,`p`.`zipcode` AS `zipcode`,date_format(`m`.`join_date`,'%m-%d-%Y') AS `joinDate`,`m`.`flight_status` AS `flightStatus`,date_format(`pa`.`insurance_received`,'%m-%d-%Y') AS `insuranceReceived`,date_format(`m`.`badge_made`,'%m-%d-%Y') AS `badgeMade`,date_format(`m`.`notebook_sent`,'%m-%d-%Y') AS `notebookSent`,`m`.`join_date` AS `joinDateSort`,`m`.`wing_id` AS `wing_id`,`p`.`email` AS `email`,(select `afids`.`application`.`id` AS `id` from `afids`.`application` where (`afids`.`application`.`member_id` = `m`.`id`) order by `afids`.`application`.`date` desc limit 1) AS `applicationID` from ((`afids`.`member` `m` join `afids`.`person` `p` on((`m`.`person_id` = `p`.`id`))) left join `afids`.`pilot` `pa` on((`m`.`id` = `pa`.`member_id`))) where ((`m`.`active` = 1) and (isnull(`m`.`notebook_sent`) or isnull(`m`.`badge_made`)))

/* rp_new_member_status */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_new_member_status` AS select `p`.`first_name` AS `firstName`,`p`.`last_name` AS `lastName`,date_format(`m`.`join_date`,'%m-%d-%Y') AS `joinDate`,`m`.`flight_status` AS `flightStatus`,date_format(`pa`.`insurance_received`,'%m-%d-%Y') AS `insuranceReceived`,date_format(`m`.`badge_made`,'%m-%d-%Y') AS `badgeMade`,date_format(`m`.`notebook_sent`,'%m-%d-%Y') AS `notebookSent`,`m`.`join_date` AS `joinDateSort`,`m`.`wing_id` AS `wing_id`,`p`.`email` AS `email` from ((`afids`.`member` `m` join `afids`.`person` `p` on((`m`.`person_id` = `p`.`id`))) left join `afids`.`pilot` `pa` on((`m`.`id` = `pa`.`member_id`))) where (`m`.`active` = 1)

/* rp_outreach_report */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_outreach_report` AS select `m`.`external_id` AS `externalID`,`m`.`mission_date` AS `mission_date`,date_format(`m`.`mission_date`,'%m-%d-%Y') AS `displayDate`,`ml`.`cancelled` AS `cancelled`,concat_ws(', ',`pilot`.`first_name`,`pilot`.`last_name`) AS `pilotName`,`pilot`.`last_name` AS `pilotLastName`,`a`.`name` AS `agencyName`,concat_ws(', ',`pass`.`first_name`,`pass`.`last_name`) AS `passName`,`pass`.`last_name` AS `passLastName`,(now() - `pa`.`date_of_birth`) AS `passAge`,`pa`.`illness` AS `illness`,`pa`.`facility_name` AS `facilityName`,`pa`.`lodging_name` AS `lodgingName`,`a`.`city` AS `agencyCity`,`a`.`state` AS `agencyState`,`pass`.`state` AS `passState`,`a`.`id` AS `id`,`pa`.`id` AS `passengerID` from (((((((`afids`.`mission` `m` join `afids`.`mission_leg` `ml` on((`m`.`id` = `ml`.`mission_id`))) join `afids`.`passenger` `pa` on((`pa`.`id` = `m`.`passenger_id`))) join `afids`.`person` `pass` on((`pa`.`person_id` = `pass`.`id`))) join `afids`.`member` `mb` on((`ml`.`pilot_id` = `mb`.`id`))) join `afids`.`person` `pilot` on((`mb`.`person_id` = `pilot`.`id`))) join `afids`.`requester` `r` on((`m`.`requester_id` = `r`.`id`))) join `afids`.`agency` `a` on((`r`.`agency_id` = `a`.`id`)))

/* rp_weekend_summary */
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afids`.`rp_weekend_summary` AS select concat_ws(' ',`pass`.`first_name`,`pass`.`last_name`) AS `passName`,`pass`.`last_name` AS `passLastName`,`pa`.`weight` AS `weight`,`pass`.`day_phone` AS `passDayPhone`,`pass`.`day_phone` AS `passDayPhoneSearch`,`pass`.`evening_phone` AS `passEvePhone`,`pass`.`mobile_phone` AS `passMobilePhone`,`pass`.`pager_phone` AS `passPagerPhone`,`pass`.`other_phone` AS `passOtherPhone`,`pass`.`fax_phone1` AS `passFaxPhone`,`pass`.`day_comment` AS `passDayComment`,`pass`.`evening_comment` AS `passEveComment`,`pass`.`mobile_comment` AS `passMobileComment`,`pass`.`pager_comment` AS `passPagerComment`,`pass`.`other_comment` AS `passOtherComment`,`pass`.`fax_comment1` AS `passFaxComment`,concat_ws(' ',`pr`.`first_name`,`pr`.`last_name`) AS `reqName`,`pr`.`last_name` AS `reqLastName`,`pr`.`day_phone` AS `reqDayPhone`,`pr`.`evening_phone` AS `reqEvePhone`,`pr`.`mobile_phone` AS `reqMobilePhone`,`pr`.`pager_phone` AS `reqPagerPhone`,`pr`.`other_phone` AS `reqOtherPhone`,`pr`.`fax_phone1` AS `reqFaxPhone`,`pr`.`day_comment` AS `reqDayComment`,`pr`.`evening_comment` AS `reqEveComment`,`pr`.`mobile_comment` AS `reqMobileComment`,`pr`.`pager_comment` AS `reqPagerComment`,`pr`.`other_comment` AS `reqOtherComment`,`pr`.`fax_comment1` AS `reqFaxComment`,concat_ws(' ',`pilot`.`first_name`,`pilot`.`last_name`) AS `pilotName`,`pilot`.`last_name` AS `pilotLastName`,`pilot`.`day_phone` AS `pilotDayPhone`,`pilot`.`evening_phone` AS `pilotEvePhone`,`pilot`.`mobile_phone` AS `pilotMobilePhone`,`pilot`.`pager_phone` AS `pilotPagerPhone`,`pilot`.`other_phone` AS `pilotOtherPhone`,`pilot`.`fax_phone1` AS `pilotFaxPhone`,`ma`.`ident` AS `homeBase`,`pilot`.`day_comment` AS `pilotDayComment`,`pilot`.`evening_comment` AS `pilotEveComment`,`pilot`.`mobile_comment` AS `pilotMobileComment`,`pilot`.`pager_comment` AS `pilotPagerComment`,`pilot`.`other_comment` AS `pilotOtherComment`,`pilot`.`fax_comment1` AS `pilotFaxComment`,`ta`.`name` AS `toAirportName`,`ta`.`ident` AS `toAirportIdent`,`fa`.`name` AS `fromAirportName`,`fa`.`ident` AS `fromAirportIdent`,`m`.`mission_date` AS `mission_date`,`m`.`mission_type_id` AS `mission_type_id`,date_format(`m`.`mission_date`,'%m-%d-%Y') AS `missionDisplayDate`,`mt`.`name` AS `missionType`,`m`.`external_id` AS `missionID`,`afids`.`member`.`wing_id` AS `wing_id`,`ml`.`cancelled` AS `cancelled`,`pass`.`county` AS `countyName` from ((((((((((((`afids`.`mission` `m` join `afids`.`mission_leg` `ml` on((`m`.`id` = `ml`.`mission_id`))) join `afids`.`passenger` `pa` on((`pa`.`id` = `m`.`passenger_id`))) join `afids`.`person` `pass` on((`pass`.`id` = `pa`.`person_id`))) join `afids`.`requester` `r` on((`m`.`requester_id` = `r`.`id`))) join `afids`.`person` `pr` on((`r`.`person_id` = `pr`.`id`))) join `afids`.`airport` `ta` on((`ml`.`to_airport_id` = `ta`.`id`))) join `afids`.`airport` `fa` on((`ml`.`from_airport_id` = `fa`.`id`))) join `afids`.`mission_type` `mt` on((`m`.`mission_type_id` = `mt`.`id`))) left join `afids`.`member` on((`ml`.`pilot_id` = `afids`.`member`.`id`))) left join `afids`.`person` `pilot` on((`afids`.`member`.`person_id` = `pilot`.`id`))) left join `afids`.`pilot` `mp` on((`afids`.`member`.`id` = `mp`.`member_id`))) left join `afids`.`airport` `ma` on((`mp`.`primary_airport_id` = `ma`.`id`)))

/* rp_audit_logins_non_staff */
DELIMITER $$

CREATE PROCEDURE `rp_audit_logins_non_staff`(IN startDate date, IN endDate date)
BEGIN
SELECT COUNT(event) as total,
concat_ws(', ',`p`.`first_name`,`p`.`last_name`) AS `audit_identity`,
CASE WHEN pi.member_id is null THEN 'Non-Pilot' ELSE 'Pilot' END AS Status, event_reason
FROM audit_log al
LEFT JOIN person p ON (p.id = al.person_id)
LEFT JOIN member m ON (p.id = m.person_id)
LEFT JOIN pilot pi ON (m.id = pi.member_id)
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND (p.id NOT IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6)) or p.id is null)
GROUP BY concat_ws(', ',`p`.`first_name`,`p`.`last_name`), pi.member_id, event_reason
ORDER BY count(event) DESC;
END$$

/* rp_audit_logins_staff */
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rp_audit_logins_staff`(IN startDate date, IN endDate date)
BEGIN
SELECT COUNT(event) as total,
concat_ws(', ',`p`.`first_name`,`p`.`last_name`) AS `audit_identity`,
CASE WHEN pi.member_id is null THEN 'Non-Pilot' ELSE 'Pilot' END AS Status
FROM audit_log al
LEFT JOIN person p ON (p.id = al.person_id)
LEFT JOIN member m ON (p.id = m.person_id)
LEFT JOIN pilot pi ON (m.id = pi.member_id)
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND p.id IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6))
GROUP BY concat_ws(', ',`p`.`first_name`,`p`.`last_name`), pi.member_id
ORDER BY count(event) DESC;
END$$

/* rp_audit_logins_summary */
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rp_audit_logins_summary`(IN startDate date, IN endDate date)
BEGIN
SELECT COUNT(event) as total, 
CASE WHEN pi.member_id is null THEN 'Non-Pilot' ELSE 'Pilot' END + ' - ' + CASE WHEN LENGTH(event_reason) > 12 THEN LEFT(event_reason,INSTR('% from%',event_reason)-1) ELSE event_reason END AS Status
FROM audit_log al
LEFT JOIN person p ON (p.id = al.person_id)
LEFT JOIN member m ON (p.id = m.person_id)
LEFT JOIN pilot pi ON (m.id = pi.member_id)
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND (p.id NOT IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6)) OR p.id IS NULL)
GROUP BY CASE WHEN pi.member_id is null THEN 'Non-Pilot' ELSE 'Pilot' END + ' - ' + CASE WHEN LENGTH(event_reason) > 12 THEN LEFT(event_reason,INSTR('% from%',event_reason)-1) ELSE event_reason END
-- Total Logins
UNION SELECT count(*) as total, 'Total Logins' as Status
FROM audit_log al WHERE event = 'login' and date_time BETWEEN startDate AND endDate
-- Total Pilot / Non-Pilot logins
UNION SELECT COUNT(event) as total, 
CASE WHEN pi.member_id is null THEN 'Non-Pilot Logins' ELSE 'Pilot Logins' END AS Status
FROM audit_log al
LEFT JOIN person p ON p.id = al.person_id
LEFT JOIN member m ON p.id = m.person_id
LEFT JOIN pilot pi ON m.id = pi.member_id
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND (p.id NOT IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6)) OR p.id IS NULL)
GROUP BY CASE WHEN pi.member_id is null THEN 'Non-Pilot Logins' ELSE 'Pilot Logins' END
-- Staff logins
UNION SELECT COUNT(event) as total, 'Staff Logins' AS Status
FROM audit_log al
WHERE event = 'login' AND date_time BETWEEN startDate AND endDate
AND al.person_id IN (SELECT DISTINCT person_id FROM person_role WHERE role_id NOT IN(5,6))
ORDER BY status DESC;
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rp_member_mission_counts`(IN start_date date, IN end_date date)
BEGIN
SELECT mb.external_id, 
concat_ws(', ',`p`.`last_name`,`p`.`first_name`) AS `pilotName`,
(SELECT count(ml.id) FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr1 ON (ml.mission_report_id = mr1.id) WHERE ml.pilot_id = mb.id AND mr1.approved = 1 AND mr1.mission_date >= start_date AND mr1.mission_date <= end_date) as legCount,
(SELECT sum(mr2.hobbs_time) FROM mission_report mr2 WHERE id IN (SELECT mr3.id FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr3 on (ml.mission_report_id = mr3.id) WHERE ml.pilot_id = mb.id AND mr3.mission_date >= start_date AND mr3.mission_date <= end_date AND mr3.approved = 1)) AS hobbsTime,
(SELECT sum(mr2.commercial_ticket_cost) FROM mission_report mr2 WHERE id IN (SELECT mr3.id FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr3 on (ml.mission_report_id = mr3.id) WHERE ml.pilot_id = mb.id AND mr3.mission_date >= start_date AND mr3.mission_date <= end_date AND mr3.approved = 1)) AS commercialTickets 
FROM member mb JOIN person p ON (mb.person_id = p.id)
WHERE mb.active = 1
AND mb.member_class_id <> 3
ORDER BY (SELECT count(ml.id) FROM mission_leg ml JOIN mission m ON (ml.mission_id = m.id) JOIN mission_report mr1 ON (ml.mission_report_id = mr1.id) WHERE ml.pilot_id = mb.id AND mr1.approved = 1 AND mr1.mission_date >= start_date AND mr1.mission_date <= end_date) DESC;
END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rp_member_mission_distribution`(IN startDate date, IN endDate date)
BEGIN
SELECT count(distinct ml.pilot_id) as rowOne FROM mission_leg ml JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate;
SELECT SQL_CALC_FOUND_ROWS count(distinct mb.id) as rowTwoRows FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) = 1;SELECT FOUND_ROWS() as rowTwo;
SELECT count(distinct mb.id) as rowThree FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) <= 5;
SELECT count(distinct mb.id) as rowFour FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) <= 10;
SELECT count(distinct mb.id) as rowFive FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) <= 15;
SELECT count(distinct mb.id) as rowSix FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) <= 20;
SELECT count(distinct mb.id) as rowSeven FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) <= 30;
SELECT count(distinct mb.id) as rowEight FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) <= 50;
SELECT count(distinct mb.id) as rowNine FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) <= 100;
SELECT count(distinct mb.id) as rowTen FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate GROUP BY mb.id HAVING count(ml.id) >100;
SELECT count(id) as membersWithMissions from member WHERE active = 1 AND member.member_class_id <> 3 AND flight_status = 'Command Pilot' AND member.id IN (SELECT pilot_id FROM mission_leg ml JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mr.approved = 1);
SELECT count(mb.id) as membersWithoutMissions FROM member mb LEFT JOIN mission_leg ml ON (mb.id = ml.pilot_id) WHERE active = 1 AND mb.member_class_id <> 3 AND flight_status = 'Command Pilot' AND ml.pilot_id is Null AND ml.cancelled is Null;
SELECT count(*) as allCurrentMembers from member where active = 1;
SELECT count(*) as allCurrentCommandPilots from member WHERE active = 1 AND member.member_class_id <> 3 AND flight_status = 'Command Pilot';
SELECT count(ml.id) as legCount FROM mission_leg ml JOIN member mb on (ml.pilot_id = mb.id) JOIN mission m on m.id = ml.mission_id JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE mb.member_class_id <> 3 AND mr.approved = 1 AND mr.mission_date >= startDate AND mr.mission_date < endDate;
END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rp_mission_counts_ytd`(IN yearNo INT, IN inc VARCHAR(25))
BEGIN
    declare x int default 1;
    while x<=12 do
        SELECT x as `monthNo`,
        CASE inc
            WHEN 'all' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            WHEN 'org' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) LEFT JOIN afa_leg a ON (ml.id = a.id) WHERE a.id is Null AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            WHEN 'linking' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN afa_leg a ON (ml.id = a.id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            END as 'scheduled',
        CASE inc
            WHEN 'all' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Not Null)
            WHEN 'org' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) LEFT JOIN afa_leg a ON (ml.id = a.id) WHERE a.id is Null AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Not Null)
            WHEN 'linking' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN afa_leg a ON (ml.id = a.id)  WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Not Null)
            END as 'cancelled',
            END as 'scheduled',
        CASE inc
            WHEN 'all' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Null)
            WHEN 'org' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) LEFT JOIN afa_leg a ON (ml.id = a.id) WHERE a.id is Null AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Null)
            WHEN 'linking' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN afa_leg a ON (ml.id = a.id)  WHERE Month(m.mission_date) = x AND Year(m.mission_date) = yearNo AND ml.cancelled is Null)
            END as 'notCancelled',
        CASE inc
            WHEN 'all' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE approved = 1 AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            WHEN 'org' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) LEFT JOIN afa_leg a ON (ml.id = a.id) WHERE a.id is Null AND approved = 1 AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            WHEN 'linking' THEN (SELECT count(*) from mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN afa_leg a ON (ml.id = a.id)  JOIN mission_report mr ON (ml.mission_report_id = mr.id) WHERE approved = 1 AND Month(m.mission_date) = x AND Year(m.mission_date) = yearNo)
            END as 'approved';
        set x= x + 1;
    end while;
END$$


-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rp_mission_type_wing`(IN startDate date, IN endDate date)
BEGIN
SELECT name as wingName,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 1) as normalCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 2) as adminCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 3) as transplantCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 4) as compassionCount,
(SELECT count(*) FROM mission m JOIN mission_leg ml ON (m.id = ml.mission_id) JOIN mission_report mr ON (ml.mission_report_id = mr.id) JOIN member mb ON (ml.pilot_id = mb.id) WHERE mb.wing_id = wing.id AND approved = 1 AND m.mission_date >= startDate AND m.mission_date <= endDate AND m.mission_type_id = 5) as commCompCount
FROM wing
ORDER BY name;
END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rp_monthly_report`(IN startDate date, IN endDate date)
BEGIN

SELECT count(*) as legsFlown
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
LEFT JOIN mission_report mr on (ml.mission_report_id = mr.id) 
LEFT JOIN afa_leg al on (ml.id = al.id)
WHERE m.mission_date >= startDate AND m.mission_date <= endDate
AND mr.approved = 1
AND ml.cancelled is Null;

SELECT count(ml.id) as legsScheduled, count(cancelled) as legsCancelled
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
LEFT JOIN afa_leg al on (ml.id = al.id)
WHERE m.mission_date >= startDate AND m.mission_date <= endDate
AND al.id is Null;

SELECT count(*) as afaLegs
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN afa_leg al on (ml.id = al.id)
WHERE m.mission_date >= startDate AND m.mission_date <= endDate;

SELECT count(*) as childMissionLegs
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN passenger pa on (m.passenger_id = pa.id)
LEFT JOIN mission_report mr on (ml.mission_report_id = mr.id) 
LEFT JOIN afa_leg al on (ml.id = al.id)
WHERE m.mission_date >= startDate AND m.mission_date <= endDate
AND mr.approved = 1
AND ml.cancelled is Null
AND (DATEDIFF(Now(), pa.date_of_birth)/365) <= 18
AND al.id is Null;

SELECT sum(hobbs_time/10) as hoursFlown,
sum(hobbs_time/10) * 20 as pilotValue,
sum(a.cost * (hobbs_time/10)) as costValue,
sum(commercial_ticket_cost) as ticketValue
FROM mission_report mr LEFT JOIN aircraft a on (a.id = mr.aircraft_id)
WHERE mr.mission_date >= startDate AND mr.mission_date <= endDate
AND mr.approved = 1;

SELECT count(distinct ml.mission_id) as missionCount
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN mission_report mr on (ml.mission_report_id = mr.id)
WHERE m.mission_date >= startDate AND m.mission_date <= endDate
AND cancelled is Null
AND mr.approved = 1;

SELECT count(distinct ml.id) as afaLinkMissionCount
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
LEFT JOIN afa_leg al on (ml.id = al.id)
WHERE m.mission_date >= startDate AND m.mission_date <= endDate
AND cancelled is Null
AND al.id is not Null;

SELECT Sum(Round(ACos(Sin(Radians(fa.latitude)) * Sin(Radians(ta.latitude)) + Cos(Radians(fa.latitude)) * Cos(Radians(ta.latitude)) * Cos(Radians(fa.longitude)-Radians(ta.longitude))) * ((180*60)/3.1415),0)) as nauticalMilesFlown
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN mission_report mr on (ml.mission_report_id = mr.id)
JOIN airport fa on (ml.from_airport_id = fa.id)
JOIN airport ta on (ml.to_airport_id = ta.id)
LEFT JOIN afa_leg al on (ml.id = al.id)
WHERE mr.mission_date >= startDate AND mr.mission_date <= endDate
AND ml.cancelled is Null
AND mr.approved = 1
AND al.id is Null
AND mr.commercial_ticket_cost = 0;

SELECT count(distinct m.passenger_id) as passengersFlown
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN mission_report mr on (ml.mission_report_id = mr.id)
WHERE m.mission_date >= startDate AND m.mission_date <= endDate
AND ml.cancelled is Null
AND mr.approved = 1;

SELECT count(distinct m.passenger_id) as uniqueChildPassengers
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN mission_report mr on (ml.mission_report_id = mr.id)
JOIN passenger pa on (m.passenger_id = pa.id)
WHERE mr.mission_date >= startDate AND mr.mission_date <= endDate
AND ml.cancelled is Null
AND mr.approved = 1
AND (DateDiff(mr.mission_date, pa.date_of_birth)/365) <= 18;

SELECT count(distinct mc.id) as companionsFlown
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN mission_report mr on (ml.mission_report_id = mr.id)
JOIN mission_companion mc on (m.id = mc.mission_leg_id)
WHERE m.mission_date >= startDate AND m.mission_date <= endDate
AND ml.cancelled is Null
AND mr.approved = 1;

SELECT count(distinct m.requester_id) as requestersServed
FROM mission m JOIN mission_leg ml on (m.id = ml.mission_id)
JOIN mission_report mr on (ml.mission_report_id = mr.id)
WHERE mr.mission_date >= startDate AND mr.mission_date <= endDate
AND ml.cancelled is Null
AND mr.approved = 1;

SELECT count(m.id) as newMembers
FROM member m
WHERE m.active = 1
AND join_date >= startDate AND join_date <= endDate;

END$$

CREATE VIEW `rp_children_passengers` AS 
select `mr`.`mission_date` AS `mission_date`,
date_format(`mr`.`mission_date`,'%m-%d-%Y') AS `displayDate`,
`p`.`first_name` AS `first_name`, concat(substr(`p`.`last_name`,1,1),'.') AS `initial`,
`p`.`last_name` AS `last_name`,
`p`.`city` AS `passCity`,
`p`.`state` AS `passState`,
`p`.`county` AS `passCounty`,
`fa`.`ident` AS `originIdent`,
`fa`.`name` AS `originName`,`fa`.`city` AS `originCity`,`fa`.`state` AS `originState`,
`ta`.`ident` AS `destIdent`,
`ta`.`name` AS `destName`,`ta`.`city` AS `destCity`,`ta`.`state` AS `destState`,`a`.`name` AS `agencyName`,`pa`.`facility_name` AS `facility_name`,
`pa`.`illness` AS `illness`,floor(((to_days(`mr`.`mission_date`) - to_days(`pa`.`date_of_birth`)) / 365.25)) AS `passAge`,
`mb`.`wing_id` AS `wing_id` from ((((((((((`mission` `m` join `mission_leg` `ml` on((`m`.`id` = `ml`.`mission_id`))) join `mission_report` `mr` on((`ml`.`mission_report_id` = `mr`.`id`))) join `passenger` `pa` on((`m`.`passenger_id` = `pa`.`id`))) join `person` `p` on((`pa`.`person_id` = `p`.`id`))) join `airport` `fa` on((`ml`.`from_airport_id` = `fa`.`id`))) join `airport` `ta` on((`ml`.`to_airport_id` = `ta`.`id`))) join `requester` `r` on((`m`.`requester_id` = `r`.`id`))) join `agency` `a` on((`r`.`agency_id` = `a`.`id`))) join `member` `mb` on((`ml`.`pilot_id` = `mb`.`id`))) left join `afa_leg` `afa` on((`ml`.`id` = `afa`.`id`))) where ((floor(((to_days(`mr`.`mission_date`) - to_days(`pa`.`date_of_birth`)) / 365.25)) <= 18) and isnull(`afa`.`id`))


CREATE VIEW `rp_monthly_missions` AS
select distinct `mr`.`mission_date` AS `mission_date`,
concat_ws(' ',`p`.`first_name`,`p`.`last_name`) AS `pilotName`,
count(`ml`.`mission_report_id`) AS `legCount`,
cast((cast(`mr`.`hobbs_time` as decimal(8,1)) / 10) as decimal(8,1)) AS `hours`,
(case when (`mr`.`hobbs_time` is not null and mr.hobbs_time != 0) then cast(((cast(`mr`.`hobbs_time` as decimal(8,1)) / 10) * `aircraft`.`cost`) as decimal(8,2)) else `mr`.`commercial_ticket_cost` end) AS `legCost`,
(case when (`mr`.`hobbs_time` is not null) then cast(((cast(`mr`.`hobbs_time` as decimal(8,1)) / 10) * 35) as decimal(8,2)) when (`mr`.`commercial_ticket_cost` <> 0) then 0 end) AS `pilotCost`
from (((((`mission_report` `mr` join `mission_leg` `ml` on((`ml`.`mission_report_id` = `mr`.`id`))) join `member` `mb` on((`ml`.`pilot_id` = `mb`.`id`))) join `person` `p` on((`mb`.`person_id` = `p`.`id`))) left join `afa_leg` on((`ml`.`id` = `afa_leg`.`id`))) left join `aircraft` on((`mr`.`aircraft_id` = `aircraft`.`id`))) where (isnull(`afa_leg`.`id`) and isnull(`ml`.`cancelled`) and (`mr`.`approved` = 1)) group by `mr`.`id`,`mr`.`mission_date`


`p`.`first_name` AS `first_name`, concat(substr(`p`.`last_name`,1,1),'.') AS `initial`,


CREATE VIEW missionFaxFormAFA
AS
SELECT
date_format(now(),'%m-%d-%Y') AS `Now`,
m.id as missionID,
m.external_id as externalID,
m.mission_type_id as missionTypeID,
date_format(m.mission_date,'%m-%d-%Y') AS missionDate,
m.appt_date as apptDate,
m.flight_time as flightTime,
passenger.releasing_physician as releasingPhysician,
passenger.releasing_phone as releasingPhone,
passenger.releasing_fax1 as releasingFax,
passenger.releasing_fax1_comment as releasingFaxComment,
passenger.releasing_email as releasingEmail,
passenger.lodging_name as lodging,
passenger.lodging_phone as lodgingPhone,
passenger.lodging_phone_comment,
passenger.facility_name as facilityName,
passenger.facility_phone as facilityPhone,
passenger.facility_phone_comment as facilityPhoneComment,
passenger.public_considerations as publicConsiderations,
passenger.private_considerations as privateConsiderations,
passenger.illness,
passenger.ground_transportation_comment as groundTransportationComment,
passenger.treating_physician as treatingPhysician,
passenger.treating_phone as treatingPhone,
passenger.treating_fax1 as treatingFax,
passenger.treating_fax1_comment as treatingFaxComment,
passenger.treating_email as treatingEmail,
passenger.language_spoken,
passenger.best_contact_method,
passenger.emergency_contact_name as emergencyContactName,
passenger.emergency_contact_primary_phone as emergencyContactPrimaryPhone,
passenger.emergency_contact_secondary_phone as emergencyContactSecondaryPhone,
passenger.emergency_contact_primary_comment as emergencyContactPrimaryComment,
passenger.emergency_contact_secondary_comment as emergencyContactSecondaryComment,
pass.first_name as passFirstName,
pass.last_name as passLastName,
pass.city as passCity,
pass.state as passState,
pass.zipcode as passZipcode,
floor(((to_days(m.mission_date) - to_days(`passenger`.`date_of_birth`)) / 365.25)) AS `passAge`,
passenger.weight as passWeight,
pass.day_phone as passDayPhone,
pass.day_comment as passDayComment,
pass.evening_phone as passEvePhone,
pass.evening_comment as passEveComment,
pass.pager_phone as passPagerPhone,
pass.pager_comment as passPagerComment,
pass.mobile_phone as passMobilePhone,
pass.Mobile_comment as passMobileComment,
pass.other_phone as passOtherPhone,
pass.other_comment as passOtherComment,
pass.fax_phone1 passFaxPhone1,
pass.fax_comment1 as passFax1Comment,
pass.email as passEmail,
pass.address1 as passAddressOne,
pass.address2 as passAddressTwo,
m.need_waiver as needWaiver,
m.comment,
ml.leg_id,
ml.leg_number as legNumber,
ml.pass_on_board as passOnBoard,
m.baggage_weight as baggageWeight,
m.baggage_desc as baggageDesc,
ml.public_c_note as publicCNote,
ml.private_c_note as privateCNote,
ml.copilot_wanted as copilotWanted,
fa.ident as fromAirportIdent,
fa.name as fromAirportName,
fa.city as fromAirportCity,
fa.state as fromAirportState,
fa.gmt_offset as fromAirportGMTOffset,
fa.dst_offset as fromAirportDSTOffset,
ta.ident as toAirportIdent,
ta.name as toAirportName,
ta.city as toAirportCity,
ta.state as toAirportState,
ta.gmt_offset as toAirportGMTOffset,
ta.dst_offset as toAirportDSTOffset,
p.first_name as pilotFirstName,
p.last_name as pilotLastName,
p.day_phone as pilotDayPhone,
p.day_comment as pilotDayComment,
p.evening_phone as pilotEvePhone
p.eveComment as pilotEveComment,
p.fax_phone1 as pilotFaxPhone,
p.fax_comment1 as pilotFaxComment,
p.mobile_phone as pilotMobilePhone,
p.mobile_comment as pilotMobileComment,
p.pager_phone as pilotPagerPhone
p.pager_comment as pilotPagerComment,
p.other_phone as pilotOtherPhone,
p.other_comment as pilotOtherComment,
p.email as pilotEmail,
c.first_name as coPilotFirstName,
c.last_name as coPilotLastName,
c.day_phone as CoPilotDayPhone
c.day_comment as coPilotDayComment,
c.evening_phone as CoPilotEvePhone
c.eve_comment as coPilotEveComment,
c.mobile_phone as CoPilotMobilePhone
c.mobile_comment as coPilotMobileComment,
c.pager_phone as CoPilotPagerPhone,
c.pager_comment as coPilotPagerComment,
c.other_phone as CoPilotOtherPhone,
c.other_comment as coPilotOtherComment,
c.fax_phone1 as CoPilotFaxPhone,
c.fax_comment1 as coPilotFaxComment,
c.email as coPilotEmail,
bup.first_name as buPilotFirstName,
bup.last_name as buPilotLastName,
bup.dayPhone as buPilotDayPhone,
bup.dayComment as buPilotDayComment,
bup.evePhone as buPilotEvePhone,
bup.eveComment as buPilotEveComment,
bup.mobilePhone as buPilotMobilePhone,
bup.mobileComment as buPilotMobileComment,
bup.pagerPhone as buPilotPagerPhone,
bup.pagerComment as buPilotPagerComment,
bup.otherPhone as buPilotPagerPhone,
bup.otherComment as buPilotOtherComment,
bup.faxPhone1 as buPilotFaxPhone,
bup.faxComment1 as buPilotFaxComment,
bup.email as buPilotEmail,
coord.first_name as coordFirstName,
coord.last_name as coordLastName,
coord.day_phone as coordDayPhone,
coord.day_comment as coordDayComment,
coord.evening_phone as coordEvePhone,
coord.evening_comment as coordEveComment,
coord.mobile_phone as coordMobilePhone,
coord.mobile_comment as coordMobileComment,
coord.pager_phone as coordPagerPhone,
coord.pager_comment as coordPagerComment,
coord.other_phone as coordOtherPhone,
coord.other_comment as coordOtherComment,
coord.fax_phone1 as coordFaxPhone,
coord.fax_comment1 as coordFaxComment,
coord.email as coordEmail,
concat(r.first_name,' ',r.last_name) AS requesterName,
r.first_name as reqFirstName,
r.last_name as reqLastName,
r.day_phone as reqDayPhone,
r.evening_phone as reqEvePhone,
r.mobile_phone as reqMobilePhone,
r.pager_phone as reqPagerPhone,
r.other_phone as reqOtherPhone,
r.fax_phone1 as reqFaxPhone,
r.day_comment as reqDayComment,
r.evening_comment as reqEveComment,
r.pager_comment as reqPagerComment,
r.mobile_comment as reqMobileComment,
r.fax_comment1 as reqFaxComment,
r.other_comment as reqOtherComment,
r.email as reqEmail,
comp.name as CompanionName,
comp.relationship,
floor(((to_days(m.mission_date) - to_days(`comp`.`date_of_birth`)) / 365.25)) AS `CompanionAge`,
comp.weight,
comp.companion_phone as companionPhone,
comp.companion_phone_comment as companionPhoneComment,
afaLegs.pilot_name as pilotName,
afaLegs.day_phone as afaDayPhone,
afaLegs.night_phone as afaNightPhone,
afaLegs.fax_phone as afaFaxPhone,
afaLegs.pilot_mobile_phone as afaPilotMobilePhone,
concat(afaAircraft.make, ' ', afaAircraft.model as afaAircraft,
afaLegs.n_number as afaNNumber,
afaLegs.aircraft_color as aircraftColor,
afaLegs.etd,
afaLegs.eta,
afaOrgs.name as afaOrgName,
afaOrgs.orgPhone as afaOrgPhone,
fbos.name as fboName,
fbos.voice_phone as fboPhone,
fbos.fax_phone as fboFax,
fbos.fuel_discount as fboFuelDiscount,
fboAirport.ident as fboAirportIdent,
pac.seats as aircraftSeats,
pac.n_number as aircraftNNumber,
pac.known_ice as aircraftKnownIce,
ac.make as aircraftMake,
ac.model as aircraftModel,
camps.camp_name as campName,
camps.camp_phone as campPhone,
camps.camp_phone_comment as campPhoneComment,
camps.lodging_name as campLodgingName,
camps.lodging_phone as campLodgingPhone,
camps.lodging_phone_comment as campLodgingPhoneComment,
camps.comment as campComment,
camps.flight_information as flightInformation
FROM mission m JOIN mission_leg as ml ON (m.id = ml.mission_id)
JOIN airport as fa ON (ml.from_airport_id = fa.id)
JOIN airport as ta ON (ml.to_airport_id = ta.id)
JOIN passenger ON (m.passenger_id = passenger.id)
JOIN person pass ON (passenger.person_id = pass.id)
JOIN requester ON (m.requester_id = requester.id)
JOIN person r ON (requester.person_id = r.id)
LEFT JOIN mission_companion mc ON (m.id = mc.mission_id)
LEFT JOIN companion comp ON (mc.companion_id = comp.id)
LEFT JOIN member mpilot ON (ml.pilot_id = mpilot.id) 
LEFT JOIN person p ON (mpilot.person_id = p.id)
LEFT JOIN member mcopilot ON (ml.copilot_id = mcopilot.id)
LEFT JOIN person c ON (mcopilot.person_id = c.id)
LEFT JOIN member bupilot ON (ml.backup_pilot_id = bupilot.id)
LEFT JOIN person bup on (bupilot.person_id = bup.id)
LEFT JOIN member mcoord = (ml.coordinator_id = mcoord.id)
LEFT JOIN person coord on (mcoord.person_id = coord.id)
LEFT JOIN camp on (m.camp_id = camp.id)
LEFT JOIN afa_leg ON (ml.id = afa_legs.id)
LEFT JOIN afa_org ON (afa_leg.afa_org_id = afa_org.id)
LEFT JOIN aircraft afaAircraft ON (afa_leg.aircraft_id = afaAircraft.id)
LEFT JOIN fbo ON (ml.fbo_id = fbo.id)
LEFT JOIN airport fboAirport ON (fbo.airport_id = fboAirport.id)
LEFT JOIN pilot_aircraft pac ON (ml.pilot_aircraft_id = pac.id)
LEFT JOIN aircraft ac ON (pac.aircraft_id = ac.id)
WHERE ml.cancelled is Null


use afids;
CREATE VIEW rp_member_application
AS
SELECT a.id as applicationID,
date_format(a.date,'%m-%d-%Y') AS `applicationDate`,
p.title, 
p.first_name as firstName, 
p.last_name as lastName, 
p.address1 as addressOne, 
p.address2 as addressTwo, 
p.city, 
p.state, 
p.zipcode, 
p.day_phone as dayPhone,
p.day_comment as pilotDayComment,
p.evening_phone as evePhone,
p.evening_comment as pilotEveComment,
p.fax_phone1 as faxPhone1,
p.fax_comment1 as pilotFaxComment,
p.fax_phone2 as faxPhone2,
p.fax_comment2 as pilotFaxComment2,
p.mobile_phone as mobilePhone,
p.mobile_comment as pilotMobileComment,
p.pager_phone as pagerPhone,
p.pager_comment as pilotPagerComment,
p.other_phone as otherPhone,
p.other_comment as pilotOtherComment,
p.email,
p.pager_email as pageEmail,
p.secondary_email as secondaryEmail,
a.spouse_first_name as spouseFirstName, 
a.spouse_last_name as spouseLastName, 
CASE
	WHEN applicant_pilot = 1 THEN 'Yes'
	ELSE 'No'
	END as applicantPilot,
CASE
	WHEN spouse_pilot = 1 THEN 'Yes'
	ELSE 'No'
	END as spousePilot, 
CASE
	WHEN applicant_copilot = 1 THEN 'Yes'
	ELSE 'No'
	END as applicantCopilot, 
a.languages_spoken as languagesSpoken, 
home_base as homeBase,
fbo as fboName, 
app.make as apMake,
app.model as apModel, 
CASE
	WHEN aircraft_primary_own = 1 THEN 'Yes'
	ELSE 'No'
	END as aircraftPrimaryOwn,
CASE
	WHEN aircraft_primary_ice = 1 THEN 'Yes'
	ELSE 'No'
	END as aircraftPrimaryIce,
aircraft_primary_seats as aircraftPrimarySeats,
aircraft_primary_nnumber as aircraftPrimaryNNumber,
aps.make as asMake,
aps.model as asModel,
CASE
	WHEN aircraft_secondary_own = 1 THEN 'Yes'
	ELSE 'No'
	END as aircraftSecondaryOwn,
CASE
	WHEN aircraft_secondary_ice = 1 THEN 'Yes'
	ELSE 'No'
	END aircraftSecondaryIce,
aircraft_secondary_seats as aircraftSecondarySeats,
aircraft_secondary_nnumber as aircraftSecondaryNNumber,
a.pilot_certificate as pilotCertificate,
a.other_ratings as ratings,
a.medical_class as medicalClass,
a.license_type as licenseType,
a.total_hours as totalHours,
a.ifr_hours as ifrHours,
a.multi_hours as multiHours,
a.other_hours as otherHours,
date_format(a.date_of_birth,'%m-%d-%Y') AS dateOfBirth,
a.height,
a.weight,
CASE
	WHEN availability_weekdays = 1 THEN 'Yes'
	ELSE 'No'
	END as availabilityWeekdays,
CASE
	WHEN availability_weeknights = 1 THEN 'Yes'
	ELSE 'No'
	END as availabilityWeeknights,
CASE
	WHEN availability_weekends = 1 THEN 'Yes'
	ELSE 'No'
	END as availabilityWeekends,
CASE
	WHEN availability_notice = 1 THEN 'Yes'
	ELSE 'No'
	END availabilityNotice,
CASE
	WHEN availability_last_minute = 1 THEN 'Yes'
	ELSE 'No'
	END as availabilityLastMinute,
CASE
	WHEN availability_copilot = 1 THEN 'Yes'
	ELSE 'No'
	END as availabilityCopilot,
CASE
	WHEN affirmation_agreed = 1 THEN 'Agreed'
	ELSE 'Not Agreed'
	END as affirmationAgreed,
CASE
	WHEN insurance_agreed = 1 THEN 'Agreed'
	ELSE 'Not Agreed'
	END as insuranceAgreed,
CASE
	WHEN hseats_interest = 1 THEN 'Yes'
	ELSE 'No'
	END as hseatsInterest,
volunteer_interest as volunteerInterest,
company_position as companyPosition,
CASE
	WHEN company_match_funds = 1 THEN 'Yes'
	ELSE 'No'
	END as companyMatchFunds,
company_business_category_id as companyBusinessCategoryID,
s.source_name as referralSource,
referral_source_other as referralSourceOther,
CASE
	WHEN premium_choice = 1 THEN 'Hat'
	ELSE 'T-Shirt'
	END as premiumChoice,
CASE
	WHEN premium_size = 1 THEN 'Medium'
	WHEN premium_size = 2 THEN 'Large'
	WHEN premium_size = 3 THEN 'X-Large'
	WHEN premium_size = 4 THEN 'XX-Large'
	ELSE 'N/A'
	END as premiumSize,
dues_amount_paid as duesAmountPaid,
donation_amount_paid as donationAmountPaid,
method_of_payment as methodOfPaymentID,
ccard_approval_number as ccardApprovalNumber,
date_format(a.processed_date,'%m-%d-%Y') AS processedDate,
CASE
	WHEN mission_orientation = 1 THEN 'Yes'
	ELSE 'No'
	END as missionOrientation,
CASE
	WHEN mission_coordination = 1 THEN 'Yes'
	ELSE 'No'
	END as missionCoordination,
CASE
	WHEN pilot_recruitment = 1 THEN 'Yes'
	ELSE 'No'
	END as pilotRecruitment,
CASE
	WHEN fund_raising = 1 THEN 'Yes'
	ELSE 'No'
	END as fundRaising,
CASE
	WHEN celebrity_contacts = 1 THEN 'Yes'
	ELSE 'No'
	END as celebrityContacts,
CASE
	WHEN hospital_outreach = 1 THEN 'Yes'
	ELSE 'No'
	END as hospitalOutreach,
CASE
	WHEN media_relations = 1 THEN 'Yes'
	ELSE 'No'
	END as mediaRelations,
CASE
	WHEN telephone_work = 1 THEN 'Yes'
	ELSE 'No'
	END as telephoneWork,
CASE
	WHEN computers = 1 THEN 'Yes'
	ELSE 'No'
	END as computers,
CASE
	WHEN clerical = 1 THEN 'Yes'
	ELSE 'No'
	END as clerical,
CASE
	WHEN publicity = 1 THEN 'Yes'
	ELSE 'No'
	END as publicity,
CASE
	WHEN writing = 1 THEN 'Yes'
	ELSE 'No'
	END as writing,
CASE
	WHEN speakers_bureau = 1 THEN 'Yes'
	ELSE 'No'
	END as speakersBureau,
CASE
	WHEN wing_team = 1 THEN 'Yes'
	ELSE 'No'
	END as wingTeam,
CASE
	WHEN graphic_arts = 1 THEN 'Yes'
	ELSE 'No'
	END as graphicArts,
CASE
	WHEN event_planning = 1 THEN 'Yes'
	ELSE 'No'
	END as eventPlanning,
CASE
	WHEN web_internet = 1 THEN 'Yes'
	ELSE 'No'
	END as webInternet,
CASE
	WHEN foundation_contacts = 1 THEN 'Yes'
	ELSE 'No'
	END as foundationContacts,
CASE
	WHEN aviation_contacts = 1 THEN 'Yes'
	ELSE 'No'
	END as aviationContacts,
CASE
	WHEN printing = 1 THEN 'Yes'
	ELSE 'No'
	END as printing,
CASE
	WHEN member_aopa = 1 THEN 'Yes'
	ELSE 'No'
	END as memberAOPA,
CASE
	WHEN member_kiwanis = 1 THEN 'Yes'
	ELSE 'No'
	END as memberKiwanis,
CASE
	WHEN member_rotary = 1 THEN 'Yes'
	ELSE 'No'
	END as memberRotary,
CASE
	WHEN member_lions = 1 THEN 'Yes'
	ELSE 'No'
	END as memberLions,
CASE
	WHEN member99s = 1 THEN 'Yes'
	ELSE 'No'
	END as member99s,
CASE
	WHEN member_wia = 1 THEN 'Yes'
	ELSE 'No'
	END as memberWIA,
date_format(m.ed_new_member_notify,'%m-%d-%Y') AS EDNewMemberNotify,
date_format(m.wn_new_memberN_ntify,'%m-%d-%Y') AS WNewMemberNotify,
date_format(m.badge_made,'%m-%d-%Y') AS badgeMade,
date_format(m.notebook_sent,'%m-%d-%Y') AS notebookSent,
m.external_id as externalID,
novapointe_id as novapointeID,
date_format(a.premium_ship_date,'%m-%d-%Y') AS premiumShipDate,
premium_ship_method as premiumShipMethod, 
premium_ship_tracking_number as premiumShipTrackingNumber
FROM application a JOIN member m on (a.member_id = m.id)
JOIN person p on (m.person_id = p.id)
LEFT JOIN aircraft app on (a.aircraft_primary_id = app.id)
LEFT JOIN aircraft aps on (a.aircraft_secondary_id = aps.id)
LEFT JOIN ref_source s ON (a.referral_source = s.id)
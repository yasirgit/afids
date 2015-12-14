
<div class="step" style="display: block;">
<div class="passenger-form">
    <p style="padding: 0px 30px 12px 10px">
    Angel Flight West acts as a coordinator, bringing together volunteer pilots
    with passengers who need transportation to medical treatment. We do not exercise
    any oversight over the flights themselves, over the pilots who fly the missions,
    or over our pilots' compliance with FAA regulations. We therefore require that
    all members attest to an important affirmations. Please read the affirmation
    below carefully and check the "I Agree" button in order to contine.
    </p>
    <p style="padding: 0px 30px 0px 10px">
    We ask all our members, whether pilot or not, to agree to the following statement.
    Your renewal cannot be completed without agreement to this affirmation.
    </p>

<h3 style="padding: 12px 30px 0px 10px">Pilot Affirmation</h3>

<p style="padding: 12px 30px 12px 10px;font-size:12px;font-family:Arial,Helvetica,sans-serif">Angel Flight West acts as a
coordinator, bringing together volunteer pilots with passengers who need
transportation to medical treatment. We do not exercise any oversight
over the flights themselves, over the pilots who fly the missions, or
over our pilots' compliance with FAA regulations. We therefore require
that all members attest to an important affirmations. Please read the
affirmation below carefully and check the "I Agree" button in order to
continue. We ask all members, whether currently a pilot or not, to agree
to these affirmations.</p>

<p style="padding: 0px 30px 12px 10px;font-size:12px;font-family:Arial,Helvetica,sans-serif">You will be asked to agree to this affirmation each year upon the
renewal of your membership as a condition of renewal.</p>

<p style="padding: 0px 30px 12px 10px;font-size:12px;font-family:Arial,Helvetica,sans-serif">By checking the "I Agree" option below, I, the undersigned applicant,
hereby affirm that all information I have provided with this form is
accurate and correct. Membership in Angel Flight West is a privilege,
and I understand it is subject to revocation. I agree to HOLD HARMLESS
Angel Flight West, its officers, directors, agents, mission assistants,
referring agencies, an all other entities or persons which have assisted
in arranging or participating in Angel Flight transportation, from any
and all claims, liability, losses or damages incurred as a result of any
activity associated with Angel Flight West. I also understand that Angel
Flight has minimum qualification requirements for pilots who fly
flights, and I have reviewed these requirements and understand them.</p>

<p style="padding: 0px 30px 12px 10px;font-size:12px;font-family:Arial,Helvetica,sans-serif">I promise not to act as an Angel Flight West Command Pilot as
pilot-in-command of any flight referred to me by Angel Flight West
unless at the time of each such flight:</p>

<ul>
<li style="margin-left:30px;padding: 0px 30px 4px 5px">I hold a valid and current pilot certificate for the class and type
aircraft (if a type rating is required) in which I will be acting as
pilot-in-command.</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">I hold at least a valid and current Class III medical certificate.</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">I am in compliance with all Federal Aviation Regulations relating to
currency for carrying passengers (including those regulations relating
to annual or biennial flight reviews, landings, night flying, fuel
reserves and IFR, if applicable).</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">I am in compliance with all Federal Aviation Regulations relating to the
use of alcohol and drugs, including reporting requirements specified in
the regulations.</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">Whether flying rented or owned aircraft, I have in force liability
insurance applicable to the flight. The minimum coverage is $500,000
each accident and $100,000 each seat.</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">I am flying an airplane with a valid standard airworthiness certificate
(normal, utility, acrobatic, commuter or transport category).</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">If I am renting an aircraft, I have met the requirements of the renting
agency for currency. If I belong to a flying club, I am a member in good
standing and I have met all requirements to fly club airplanes for which
I am approved.</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">I have flown at least 50 hours as pilot-in-command in the last 12
calendar months; if not, I have completed a flight review per FAR 61.56
within the last 3 months or completed one phase of the FAA Wings program
within the last 12 months.</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">If I have an instrument rating and I plan to fly missions under IFR, I
am current in accordance with FAR 61.57 (c) or (d).</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">I have a total time as pilot of at least 300 hours, at least 75 of these
hours has been logged as pilot-in-command for cross country flight; or I
hold a valid Commercial certificate and at least 75 hours as
pilot-in-command for cross country flight, or a valid Airline Transport
Pilot certificate and I have logged at least 25 hours as
pilot-in-command in the make and model of aircraft I will be flying.</li>

<li style="margin-left:30px;padding: 0px 30px 4px 5px">I understand that it is my sole responsibility and obligation to decline
serving as pilot-in-command on any flight referred to me by Angel Flight
West unless ALL of the above statements are true at the time of the
flight. I further understand that I will complete this affirmation
annually at the time of my membership renewal.</li>
</ul>

<p style="padding: 12px 30px 0px 10px;font-size:12px;font-family:Arial,Helvetica,sans-serif">I understand that it is my responsibility and obligation to decline serving as pilot-in-command on any flight referred to me by Angel Flight West unless ALL of the above statements are true at the time of the flight.  I further understand that I will complete this affirmation annually at the time of my membership renewal.</p>
<form
	action="<?php echo url_for('pending_member/step4Check?id='.$application_temp->getId()) ?>"
	method="post">
<div class="box full">
<div class="wrap"><?php echo $widget->render('affirmation_agreed', ESC_RAW)?>
</div>
<div class="form-submit"><a class="btn-action" href="#"
	onclick="$('#step4_submit').click(); return false;"><span>Save and
Continue »</span><strong> </strong></a> 
   
   <a class="cancel" href="<?php echo $application_temp->getApplicantPilot() ? "/pending_member/step3/id/".$sf_request->getParameter("id"):"/pending_member/step2/id/".$sf_request->getParameter("id")?>">&laquo;
Back</a>
   <input type="submit" id="step4_submit" value="submit"
	class="hide" /></div>
</div>
</form>
</div>
</div>

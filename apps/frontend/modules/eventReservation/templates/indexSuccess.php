<h1>EventReservation List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Event</th>
      <th>Member</th>
      <th>Reservation date</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>Zipcode</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Adult guests</th>
      <th>Child guests</th>
      <th>Guest names</th>
      <th>Amt paid</th>
      <th>Method of payment</th>
      <th>Payment date</th>
      <th>Auth number</th>
      <th>Status</th>
      <th>Comments</th>
      <th>Collect secure info</th>
      <th>Addl info fields</th>
      <th>Novapointe trans</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($event_reservation_list as $event_reservation): ?>
    <tr>
      <td><a href="<?php echo url_for('eventReservation/edit?id='.$event_reservation->getId()) ?>"><?php echo $event_reservation->getId() ?></a></td>
      <td><?php echo $event_reservation->getEventId() ?></td>
      <td><?php echo $event_reservation->getMemberId() ?></td>
      <td><?php echo $event_reservation->getReservationDate() ?></td>
      <td><?php echo $event_reservation->getFirstName() ?></td>
      <td><?php echo $event_reservation->getLastName() ?></td>
      <td><?php echo $event_reservation->getAddress() ?></td>
      <td><?php echo $event_reservation->getCity() ?></td>
      <td><?php echo $event_reservation->getState() ?></td>
      <td><?php echo $event_reservation->getZipcode() ?></td>
      <td><?php echo $event_reservation->getPhone() ?></td>
      <td><?php echo $event_reservation->getEmail() ?></td>
      <td><?php echo $event_reservation->getAdultGuests() ?></td>
      <td><?php echo $event_reservation->getChildGuests() ?></td>
      <td><?php echo $event_reservation->getGuestNames() ?></td>
      <td><?php echo $event_reservation->getAmtPaid() ?></td>
      <td><?php echo $event_reservation->getMethodOfPayment() ?></td>
      <td><?php echo $event_reservation->getPaymentDate() ?></td>
      <td><?php echo $event_reservation->getAuthNumber() ?></td>
      <td><?php echo $event_reservation->getStatus() ?></td>
      <td><?php echo $event_reservation->getComments() ?></td>
      <td><?php echo $event_reservation->getCollectSecureInfo() ?></td>
      <td><?php echo $event_reservation->getAddlInfoFields() ?></td>
      <td><?php echo $event_reservation->getNovapointeTransId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eventReservation/new') ?>">New</a>

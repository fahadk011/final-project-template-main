<section class="contact-list">
    <h2 class="section-title">Contact List</h2>

    <?php 
        foreach($contacts as $contact) {
    ?>
    <div class="contact-card">
        <h4 class="card-header"><?php echo $contact->name; ?></h4>
        <a href="mailto:<?php echo $contact->email; ?>" class="btn">Send E-Mail</a>
        
        <p><?php echo $contact->message; ?> </p>
    </div>
    <?php } ?>
  </section>
<?php
  /**
   * Requires the "PHP Email Form" library
   * The "PHP Email Form" library is available only in the pro version of the template
   * The library should be uploaded to: vendor/php-email-form/php-email-form.php
   * For more info and help: https://bootstrapmade.com/php-email-form/
   */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'gursimransujlana@gmail.com';

  // Check if the PHP Email Form library exists and include it
  $php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';
  if (file_exists($php_email_form_path)) {
    include($php_email_form_path);
  } else {
    die('Unable to load the "PHP Email Form" Library! Please make sure it is uploaded to the correct path.');
  }

  // Create a new PHP_Email_Form instance
  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  // Set email properties
  $contact->to = $receiving_email_address;
  $contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
  $contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
  $contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'Contact Form Submission';

  // Uncomment and configure the following code if you want to use SMTP for sending emails
  /*
  $contact->smtp = array(
    'host' => 'smtp.example.com', // Replace with your SMTP host
    'username' => 'your_smtp_username', // Replace with your SMTP username
    'password' => 'your_smtp_password', // Replace with your SMTP password
    'port' => '587' // Adjust the SMTP port if needed
  );
  */

  // Add form messages
  $contact->add_message($_POST['name'] ?? '', 'From');
  $contact->add_message($_POST['email'] ?? '', 'Email');
  $contact->add_message($_POST['message'] ?? '', 'Message', 10);

  // Send the email and output the result
  echo $contact->send();
?>

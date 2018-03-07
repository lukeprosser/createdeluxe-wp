<?php

  // Message vars
  $msg = '';
  $msgClass = '';

  // Check for submit
  if(filter_has_var(INPUT_POST, 'submit')){
    // Get form data
    $name = htmlspecialchars($_POST['contact-name']);
    $email = htmlspecialchars($_POST['contact-email']);
    $message = htmlspecialchars($_POST['contact-message']);

    // Check required fields
    if(!empty($name) && !empty($email) && !empty($message)){
      // Passed
      // Check email
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // Failed
        $msg = 'Please use a valid email address';
        $msgClass = 'alert-fail';
      } else {
        // Passed
        $toEmail = 'luke@createdeluxe.com';
        $subject = 'Website enquiry from '.$name;
        $body = '<h2>Contact Request</h2>
          <h4>Name</h4><p>'.$name.'</p>
          <h4>Email</h4><p>'.$email.'</p>
          <h4>Message</h4><p>'.$message.'</p>
        ';

        // Email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= "From: " .$name. "<".$email.">". "\r\n";

        if(mail($toEmail, $subject, $body, $headers)){
          // Email sent
          $msg = 'Thank you! Your email has been sent';
          $msgClass = 'alert-success';
        } else {
          // Failed
          $msg = 'Sorry, there was a problem sending your email - please try again';
          $msgClass = 'alert-fail';
        }

      }
    } else {
      // Failed
      $msg = 'Please fill in all fields';
      $msgClass = 'alert-fail';
    }
  }

?>

<?php get_header(); ?>

  <!-- showcase -->
  <div class="showcase" data-type="background" data-speed="3">
    <!-- container -->
    <div class="container">
      <!-- intro -->
      <div class="intro">
        <h2>Get In Touch</h2>
        <p>If you'd like to work with me or have an enquiry about a project, please feel free to contact me directly</p>
      </div><!-- /intro -->
    </div><!-- /container -->
  </div><!-- /showcase -->

  <!-- contact -->
  <section id="contact">
    <!-- container -->
    <div class="container">
      <p class="constrain center">You can reach me via the form below, or alternatively by email or LinkedIn:</p>
      <!-- contact form -->
      <?php if($msg != ''): ?>
        <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
      <?php endif; ?>
      <form class="contact-form" name="contact" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="contact-name" placeholder="Full Name" value="<?php echo isset($_POST['contact-name']) ? $name : ''; ?>">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="contact-email" placeholder="Email Address" value="<?php echo isset($_POST['contact-email']) ? $email : ''; ?>">
        </div>
        <div class="form-group full">
          <label>Message</label>
          <textarea name="contact-message" rows="3" placeholder="Message"><?php echo isset($_POST['contact-message']) ? $message : ''; ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn full">Submit</button>
      </form><!-- /contact-form -->
      <!-- social links -->
      <div class="social center">
        <ul>
          <li><a href="https://github.com/lukeprosser" target="_blank"><i class="fab fa-github-square fa-lg"></i> GitHub</a></li>
          <li><a href="https://www.linkedin.com/in/lukeprosser/" target="_blank"><i class="fab fa-linkedin fa-lg"></i> LinkedIn</a></li>
          <li><a href="mailto:luke@createdeluxe.com" target="_blank"><i class="fas fa-envelope-square fa-lg"></i> luke@createdeluxe.com</a></li>
        </ul>
      </div><!-- social links -->
    </div><!-- /container -->
  </section><!-- /contact -->

<?php get_footer(); ?>

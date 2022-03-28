(function(){
  function load_contact_form() {
    var contactform = new AgoraContactForm({
      selector: '.js-contact-form',
      action: 'https://oxfordclub.com/apps/agora-contact-form/',
      redirect: '/contact?contact=true',
      email: 'customerservice@profittrends.com',
      includeName: true,
      includePhone: true,
      requestTypes: {
        'Reason for Contacting': '',
        'Email not Received': 'Email Problems',
        'Login Problems': 'Login Problems',
        'Update Email Address': 'Customer Maintenance',
        'Feedback to the Editor': 'Editorial Comments',
        'Other': 'Miscellaneous',
        'Remove Me From Email List': 'Unsubscribe',
        'Subscription Cancellation Request':          'Subscription Cancellation Request',
        'Auto Renew / Maintenance Fee Cancellation Request': 'Auto Renew / Maintenance Fee Cancellation Request',
      }
    });
  }

  load_contact_form();

  if(window.location.href.indexOf('true') > -1) {
      $('#alert').show();
  }

  $('#contact_us_form').submit(function(e) {
    // Do nothing if honey pot returns a value
    if ($(this).closest('form').find('.hunny').is(':checked')) {
      console.log($(this).closest('form').find('.hunny').val());
      console.log('Checkbox is checked');
      return false;
    }
    return true;
  })

  var form = document.getElementById("contact_us_form");
  var email = form.elements.namedItem("email");
  email.required = true;
  var first_name = form.elements.namedItem("first_name");
  first_name.required = true;
  var last_name = form.elements.namedItem("last_name");
  last_name.required = true;
  var phone = form.elements.namedItem("phone");
  phone.required = true;
  var request_type = form.elements.namedItem("request_type");
  request_type.required = true;
  var message = form.elements.namedItem("message");
  message.required = true;
})();

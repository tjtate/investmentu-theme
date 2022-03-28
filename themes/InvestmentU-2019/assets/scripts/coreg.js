(function ($) {

  function send(e){
    e.preventDefault();

    var email = e.target.elements[0].value;
    var adv_list_names = '';
    var source_id = '';
    var count = 0;

    [...document.querySelectorAll('.coreg-check')].forEach(checkbox => {
      if(checkbox.checked) {
        count++;
      }
      adv_list_names += checkbox.dataset.advId + ','
      source_id = checkbox.dataset.sourceid
    })

    if(count == 0){
      document.querySelector('.submit-message').innerHTML =
          '<div class="error-message"><div class="row justify-content-center"><div class="col"><div class="alert alert-danger error-message"><p class="lead m-0">Select the boxes of the Newsletters you wish to receive</p></div></div></div></div>'
        ;
      return;
    }

    var options = {
      email,
      adv_list_names,
      source_id
    };

    //Email validation
    //TODO: optional adv list name
    Portrait.email.validate(options, function (data) {

      if (data.response == 'success' || data.response == "Already Active On List") {
        document.querySelector('.submit-message').innerHTML = '<div class="success-message"><div class="row justify-content-center"><div class="col"><div class="alert alert-success"><p class="lead m-0">You’re signed up and should start receiving emails right away.</p></div></div></div></div>';

        //submission
        [...document.querySelectorAll('.coreg-check')].map(checkbox => {
          if(checkbox.checked) {
          let adv_id = checkbox.dataset.advId
          let coreg_id = checkbox.dataset.coregId
          let sourceid = checkbox.dataset.sourceid
          let domain = checkbox.dataset.domain

          $('<iframe>', {
            src: 'https://'+domain+'/Content/SaveFreeSignups?source='+sourceid+'&CoRegs='+coreg_id+'&oneClick=true&email='+email,
            id:  'submit',
            frameborder: 0,
            scrolling: 'no'
          }).appendTo('.iframe');
        }

        })
      } else {
        document.querySelector('.submit-message').html('<div class="error-message"><div class="row justify-content-center"><div class="col"><div class="alert alert-danger error-message"><p class="lead m-0">Invalid email address. Please check that the email address you entered is in the proper format.</p></div></div></div></div>');
      }
    });
  }

  var form = document.getElementById('form')
  form.addEventListener('submit', send);

   // select all checkbox
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
    
})(jQuery)

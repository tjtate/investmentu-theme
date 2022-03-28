(function($){
  var ocListCodeStore = "";

  //On Leadgen Openx Form Focus
  $('#lead-gen input[name="signup.emailAddress"]').on('focus', function(e) {

      var beacon = $(this).parent().closest("ins"),
          list = $(this).parent().parent().find('input[name="signup.listCode"]').val(),
          sourceid = $(this).parent().parent().find("input[name='signup.sourceId']").val(),
        zoneid = beacon.data('revive-zoneid');

        if (ocListCodeStore !== zoneid) {

          ocListCodeStore = zoneid;

          window.dataLayer = window.dataLayer || [];

          dataLayer.push({
              'event':'event_triggered',
              'event_category':'Newsletter',
              'event_action':'Start',
              'event_label': sourceid+' | '+list
          });

        }
  });
})(jQuery);

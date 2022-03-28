(function ($) {

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function createModal (target, content) {
    document.querySelector(target).insertAdjacentHTML('beforeend', `
      <div class="modal fade" id="modal_window" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right; padding: 10px 15px 0;">
              <span aria-hidden="true">&times;</span>
            </button>
            <div style="padding:0 30px 15px">${content}</div>
          </div>
        </div>
      </div>
    `)

    // Bootstrap Modal JS is neeed here. After Bootstrap 5, upgrade it.
    $('#modal_window').on('hidden.bs.modal', function (e) {
      $('#modal_window').remove();
      $('#modal_window').modal('dispose');
      // console.log('Remove Existing #modal_window');
    });

    $('#modal_window').modal('show');
  }

  function displayConfirmModal( list, status ) {
    const types = {
      INVESTME: {
        listName : 'Investment U',
        confirmMessage : '<p>Welcome to the family! We’ve received your subscription to the free <em>Investment U</em> daily e-letter, your first step to becoming a smarter, more confident and self-reliant investor. Check your inbox for a special welcome email from us.</p><p>To ensure our expert analysis doesn’t go to spam, please take a moment now to <a href="/whitelist/" target="_blank">whitelist us</a>.</p>',
      },
      TRADEDAY: {
        listName : 'Trade of the Day',
        confirmMessage : '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/trade-of-the-day-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Trade of the Day</em> e-letter, where you’ll find everything you need for options and other fast-moving trades. Check your inbox for a personal note from founder Bryan Bottarelli.</p>',
      },
      LIBWEALT: {
        listName : 'Liberty Through Wealth',
        confirmMessage : '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/liberty-through-wealth-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Liberty Through Wealth</em> daily e-letter, your first step toward being free of financial worry and living life on your terms. Check your inbox for a personal note from leading contributor Alexander Green.</p>',
      },
      MANDIGES: {
        listName : 'Manward Digest',
        confirmMessage : '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/manward-digest-icon.png" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Manward Digest</em> daily e-letter, your first step to living a fuller, richer life. Check your inbox for a personal note from Founder Andy Snyder.</p>',
      },
      PROFTRND: {
        listName : 'Profit Trends',
        confirmMessage : '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/profit-trends-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Profit Trends</em> e-letter, your essential guide to the market’s emerging, breakthrough and disruptive trends. Check your inbox for a personal note from leading contributor Matthew Carr.</p>',
      },
      EARLYINV: {
        listName : 'Early Investing',
        confirmMessage : '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/early-investing-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Early Investing</em> e-letter, where you’ll find everything you need to navigate the private startup and cryptocurrency spaces. Check your inbox for a personal note from Co-Founder Adam Sharp.</p>',
      },
      WEALTHRE: {
        listName : 'Wealthy Retirement',
        confirmMessage : '<p><img src="https://s3.amazonaws.com/assets.oxfordclub.com/images/icons/e-letters/wealthy-retirement-icon.svg" style="width: 90px; float: right; margin-bottom: 30px;">Thank you for signing up for the free <em>Wealthy Retirement</em> daily e-letter, your first step to living out your golden years on your terms. Check your inbox for a personal note from leading contributor Marc Lichtenfeld.</p>',
      }
    }

    const { listName, confirmMessage } = types[list] || list.INVESTME

    const welcomeMessage = status === 'success' ?
      `<h2>Thank you for signing up for <em>${listName}</em>!</h2>${confirmMessage}`
      : `<h2>It appears you are already subscribed to <em>${listName}</em></h2>`;

    createModal("body", welcomeMessage);

    setCookie(listCode, true, 365);
    document.querySelector(".gated-content").style.display = "block";
    document.querySelector(".gated").remove();
  }

  function displayErrorModal (error = "Please enter a valid email address.") {
    createModal("body", `<h2>${error}</h2>`)
  }

  function formEventPush (action, label) {
    window.dataLayer = window.dataLayer || [];
    if (dataLayer)   {
      dataLayer.push({
        'event': 'event_triggered',
        'event_category': 'Newsletter',
        'event_action': action,
        'event_label': label
      });
    }
  }

  async function submitForm({ emailAddress = '', sourceId = '', listCode = '', welcomeEmail = '' }) {

    if (!emailAddress) {
      return
    }

    const url = encodeURI(`/apps/signupapp.php?email=${emailAddress}&source=${sourceId}&list=${listCode}&welcome=${welcomeEmail}`)
    const label = `${sourceId} | ${listCode}`;

    try {
      const response = await fetch(url, {
        method: 'GET',
        credentials: 'same-origin',
        headers: {
          'Content-Type': 'application/json'
        }
      });

      if (!response.ok) { throw response }

      const data = await response.json()

      if (data === 'success') {
        displayConfirmModal(listCode, data);
        formEventPush('Submit', label);
      } else if (data === 'Invalid email format') {
        displayErrorModal();
        formEventPush('Error - Invalid Email', label);
      } else {
        formEventPush('Error - 200', label);
      }
    } catch (err) {
      const { status } = err
      if (status) {
        displayErrorModal("Unknown error");
        formEventPush(`Error - ${status}`, label);
      }
    }
  }

document.addEventListener('submit', async e => {
  const { target: { id = '', classList = [], elements = [] } = {} } = e

  if (!(id === 'lead-gen' || classList.contains('lead-gen'))) {
    return
  }

  e.preventDefault();

  const { value: emailAddress = '' } = elements['signup.emailAddress']
  const { value: sourceId = '' } = elements['signup.sourceId'];
  const { value: listCode = '' } = elements['signup.listCode'];
  const { value: welcomeEmail = '' } = elements['signup.welcomeEmailTemplateName'];

  await submitForm({ emailAddress, sourceId, listCode, welcomeEmail });

  if (window.jstag) {
    window.jstag.send({
      email: emailAddress
    });
  }
})
})(jQuery);

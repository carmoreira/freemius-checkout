freemiusTriggers = {};
freemiusTriggers.init = function () {

	for (var key in fmsTriggers) {

		var trigger = document.querySelectorAll(fmsTriggers[key].selector);

		for (var i = 0; i < trigger.length; i++) {

			trigger[i].fmskey = key;

			trigger[i].addEventListener("click", function (event) {

				var fmskey = event.currentTarget.fmskey;
				var rule = fmsTriggers[fmskey];

				var opts = {
					plugin_id: rule.plugin_id,
					plan_id: rule.plan_id,
					public_key: rule.public_key
				};

				if (rule.image !== '') {
					opts.image = rule.image;
				}

				if (rule.sandbox_token !== '' && rule.timestamp !== '') {
					opts.sandbox_token = rule.sandbox_token;
					opts.timestamp = rule.timestamp;
				}

				var currency = 'usd';
				if (typeof rule.currency !== undefined) {
					currency = rule.currency;
				}

				var hide_coupon = false;
				if (typeof rule.hide_coupon !== undefined) {
					hide_coupon = freemiusTriggers.bool(rule.hide_coupon);
				}

				var fremmiusCheckout = FS.Checkout.configure(opts);

				fremmiusCheckout.open({
					name: rule.name,
					licenses: rule.licenses,
					billing_cycle: rule.billingCycle,
					currency: currency,
					trial: freemiusTriggers.bool(rule.trial),
					coupon: rule.coupon,
					hide_coupon: hide_coupon,
					// You can consume the response for after purchase logic.
					purchaseCompleted: function (response) {
						if ( typeof gtag !== undefined ) {
							gtag('event', 'purchase', {
								'value': response.purchase.initial_amount,
								'currency': currency
							});
						}
					},
					success: function (response) {
						// The logic here will be executed after the customer closes the checkout, after a successful purchase.                                // alert(response.user.email);
					}
				});
				event.preventDefault();

			});

		}

	}
};

freemiusTriggers.init();

/** Util function to return boolean value of string */
freemiusTriggers.bool = function (string) {
	var bool = Number(string) === 0 || string === "false" || typeof string === "undefined" ? false : true;
	return bool;
};
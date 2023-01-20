    const INPUT_AMOUNT = $('#amount-input');
    const INPUT_NAME = $('#input-name');
    const INPUT_WA_OR_EMAIL = $('#input-wa-or-email');
    const INPUT_ANONYMOUS = $('#anonymous');
    const INPUT_SUPPORT_MESSAGE = $('#input-support-message');
    const ITEM_NOMINAL = $('.item-nominal');
    const ITEM_PAYMENT = $('.item-payment');

    const CSRF_TOKEN = "dp6pPBSY04vWkq2jebBtVJnMRBUKo9WIpeqIsGH6";
    const INPUT_URL = "bersamayatim";

    const nominal_donate = $('#nominal_donate');
    const payment_method = $('#payment_method');
    const anonymous = $('#anonymous_user');
    const support_message = $('#support_message');

    const BTN_SELECT_PAYMENT_METHOD = $('#btn-payment-chosen');
    const BTN_SUBMIT_PAYMENT_SUMMARY = $('#custom-submit');
    const BTN_CLOSE_BOTTOM_SHEET = $('.by-bottomsheet');

    const NOMINAL_RULE = $('#nominal-rule');
    const WA_OR_EMAIL_RULE = $('#wa-or-email-rule');

    let validation_email_or_wa = true;

    let data = {
        nominal: 0,
        payment_method: "",
        name: "",
        wa_or_email: "",
        anonymous: false,
        support_message: "",
    }

    function validateBtnSubmitToPayment(){
        if(data.payment_method !== "" &&
            data.nominal !== 0 &&
            INPUT_NAME.val() !== "" &&
            INPUT_WA_OR_EMAIL.val() !== "" &&
            INPUT_AMOUNT.val().length > 5 &&
            INPUT_AMOUNT.val().length < 16 &&
            validation_email_or_wa){
            BTN_SUBMIT_PAYMENT_SUMMARY.removeAttr('disabled')
        } else {
            BTN_SUBMIT_PAYMENT_SUMMARY.attr('disabled', true)
        }
    }

    $(document).on('keyup', '#amount-input', function (){
        if(INPUT_AMOUNT.val().length > 5 && INPUT_AMOUNT.val().length < 16 ){
            BTN_SELECT_PAYMENT_METHOD.removeAttr('disabled');
            NOMINAL_RULE.slideUp('fast');
        } else {
            BTN_SELECT_PAYMENT_METHOD.attr('disabled', true);
            NOMINAL_RULE.slideDown('fast');
        }
        nominal_donate.val(INPUT_AMOUNT.val())
        data.nominal = INPUT_AMOUNT.val()
        validateBtnSubmitToPayment()
    })

    $(document).on('change', '#amount-input', function (){
        if(INPUT_AMOUNT.val().length > 5 && INPUT_AMOUNT.val().length < 16){
            BTN_SELECT_PAYMENT_METHOD.removeAttr('disabled');
            NOMINAL_RULE.slideUp('fast');
        } else {
            BTN_SELECT_PAYMENT_METHOD.attr('disabled', true);
            NOMINAL_RULE.slideDown('fast');
        }
        nominal_donate.val(INPUT_AMOUNT.val())
        data.nominal = INPUT_AMOUNT.val()
        validateBtnSubmitToPayment()
    })

    $(document).on('change', '#amount-input', function (){
        if(INPUT_AMOUNT.val().length > 5 && INPUT_AMOUNT.val().length < 16){
            BTN_SELECT_PAYMENT_METHOD.removeAttr('disabled');
            NOMINAL_RULE.slideUp('fast');
        } else {
            BTN_SELECT_PAYMENT_METHOD.attr('disabled', true);
            NOMINAL_RULE.slideDown('fast');
        }
        nominal_donate.val(INPUT_AMOUNT.val())
        data.nominal = INPUT_AMOUNT.val()
        validateBtnSubmitToPayment()
    })

    $(document).on('change', '#anonymous', function (){
        anonymous.val(INPUT_ANONYMOUS.is(":checked") ? true : false)
    })

    $(document).on('change', '#input-support-message', function (){
        support_message.val(INPUT_SUPPORT_MESSAGE.val())
    })

    ITEM_NOMINAL.click(function() {
        ITEM_NOMINAL.each(function (){
            $(this).removeClass('active')
        })
        data.nominal = $(this).attr('data-nominal');
        $(this).addClass('active');
        INPUT_AMOUNT.val(data.nominal).trigger('change');
    })

    BTN_SELECT_PAYMENT_METHOD.click(function () {
        $('.by-overlay').addClass('active');
        $('.by-bottomsheet').addClass('active');
        $('.by-container').removeClass('active');

    })

    BTN_CLOSE_BOTTOM_SHEET.click(function () {
        $('.by-overlay').removeClass('active');
        $('.by-bottomsheet').removeClass('active');

    })

    ITEM_PAYMENT.click(function (){
        $('#payment-chosen')
            .text('')
            .append($(this).html())
        data.payment_method = $(this).attr('name')
        payment_method.val(data.payment_method)
        validateBtnSubmitToPayment()
    })

    $(document).on('keyup', '#input-name', function () {
        validateBtnSubmitToPayment()
    })

    $(document).on('keyup', '#input-wa-or-email', function () {
        const phone_test = /^\d{9,12}$/.test(INPUT_WA_OR_EMAIL.val());
        const email_test = /\S+@\S+\.\S+/.test(INPUT_WA_OR_EMAIL.val());
        if(phone_test || email_test){
            WA_OR_EMAIL_RULE.slideUp('fast')
            validation_email_or_wa = true
        } else {
            WA_OR_EMAIL_RULE.slideDown('fast');
            validation_email_or_wa = false
        }
        validateBtnSubmitToPayment()
    })

    BTN_SUBMIT_PAYMENT_SUMMARY.click(function (){
        $('#loading').show();
    })

    $('#loading').hide();


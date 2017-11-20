$(document).ready(function(){

    $('#checkout button').on('click', function(){
        var form    = $('#checkout');
        var submit  = form.find('button');
        var submitInitialText = submit.text();

        submit.attr('disabled', 'disabled').text('Just one moment...');

        Stripe.card.createToken(form, function(status, response) {
            var token;

            if(response.error){
                form.find('.stripe-errors').text(response.error.message).show();
                submit.removeAttr('disabled');
                submit.text(submitInitialText);
            }else{
                token = response.id;
                form.append($('<input type="hidden" name="token">').val(token));

                form.submit();
            }
        });
    });
});
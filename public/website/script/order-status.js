$(document).ready(function() {
    $('#submit_button').on('click', function() {
      var order_id = $('#order_id_input').val();
      var requestData = {
          order_id: order_id // Assuming this is what you want to do with the order ID
      };
      $.ajax({
          url: '/search-order',
          method: 'POST',
          data: requestData,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
              if (response.result === 'success') {
                if (response.data && response.data.cancel_note == null) {
                    if (response.data.pickup_note !== null) {
                        $('#pickupclass').removeClass('tracking-item-pending').addClass('tracking-item');
                        $('#pickup').text(response.data.pickup_note);
                    }
                    if (response.data.booked_note !== null) {
                        $('#bookedclass').removeClass('tracking-item-pending').addClass('tracking-item');
                        $('#booked').text(response.data.booked_note);
                    }
                    if (response.data.on_his_way_note !== null) {
                        $('#on_his_wayclass').removeClass('tracking-item-pending').addClass('tracking-item');
                        $('#on_his_way').text(response.data.on_his_way_note);
                    }
                    if (response.data.at_destination_note !== null) {
                        $('#at_destinationclass').removeClass('tracking-item-pending').addClass('tracking-item');
                        $('#at_destination').text(response.data.at_destination_note);
                    }
                    if (response.data.out_of_delivery_note !== null) {
                        $('#out_for_deliveryclass').removeClass('tracking-item-pending').addClass('tracking-item');
                        $('#out_for_delivery').text(response.data.out_of_delivery_note);
                    }
                    if (response.data.delivered_note !== null) {
                        $('#deliveryclass').removeClass('tracking-item-pending').addClass('tracking-item');
                        $('#delivery').text(response.data.delivered_note);
                    }
                }else{
                    console.error('Data is not in the expected format or is undefined.');
                    $('#order_status').addClass('d-none');
                    $('#order_canceled').html(`
                        <div class="col-lg-12 align-self-end">
                            <div class="quote-wrap">
                                <h4 class="text-danger">Your Order Is Canceled</h4>
                                <p class="text-danger">${response.data.cancel_note}</p>
                            
                            </div>
                        </div>
                    `);
                }
              
                
                
              } else {
                  console.error('Data is not in the expected format or is undefined.');
              }
          },
          error: function(xhr, status, error) {
              console.error('Error:', error);
          }
      });
  });

 
});
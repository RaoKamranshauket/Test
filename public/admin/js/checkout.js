$('.razorBtn').click(function (e) {
    e.preventDefault();
    validateInputs();

    var lname  =      $('.lname').val();
    var fname  =      $('.fname').val();
    var email  =      $('.email').val();
    var phone   =      $('.phone').val();
    var address1  =   $('.address1').val();
    var address2  =   $('.address2').val();
    var city =       $('.city').val();
    var state =      $('.state').val();
    var country =      $('.country').val();
    var pincode  =      $('.pincode').val();
    function validateInputs() {
        const inputs = document.querySelectorAll('input');

        inputs.forEach((input) => {
          const id = input.getAttribute('name');
          if (id) {
            const error = document.querySelector(`#${id}-error`);
            if (error) {
              error.textContent = input.value.trim() === '' ? id+'  is required.' : '';
            }
          }
        });
      }
if(lname==''||fname==''||email==''||phone==''||address1==''||address2==''||city==''||state==''||country==''||pincode=='')
{

return false;

}
else
{

      $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
      $.ajax({
        type: "POST",
        url:"/New-Pro/public/razor-pay",
        data: {
    lname    :lname,
    fname    :fname,
    email    :email,
    phone    :phone,
    address1 :address1,
    address2 :address2,
    city    :city,
    state  :state,
    country  :country,
    pincode  :pincode,
     } ,
        success: function (response) {
            alert(response.total_amount);
        },

    });
}
  });




$('#profileimage').click(function() {
    $('#image').click();
});



$('#province').click(function() {

    if($('#province').find(":selected").val() != 0){
      $('#kotkabid').prop('disabled', false);
      var id = $('#province').find(":selected").val();

      $.ajax({
          type: 'GET',
          url: 'http://localhost/tskdon/api/getcitiesbyprovince/'+id,
          contentType: "application/json",
          dataType: 'json',
          success: function(data) {
            $('#kotkabid')
                .find('option')
                .remove()
                .end()
                .append('<option selected="selected" value="0">Please Select</option>')
                .val('whatever');

            $.each(data, function(i, val){
              $('#kotkabid')
                 .append($("<option></option>")
                            .attr("value",data[i].id)
                            .text(data[i].nama));
            });
          },

      });
    }else{
      $('#kotkabid').prop('disabled', true);
    }
});

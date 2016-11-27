    <script>
        var divisionid;
        $('#region').on('change', function(e){
          console.log(e);
          var region_id = e.target.value; 
          divisionid = $('#division').val();
          console.log(divisionid);
          $.get('{{ url('divisions') }}?region_id=' + region_id, function(data) {
             console.log(data);
             $('#division').empty();
             $('#division').append("<option value=" + 0 + ">[Unspecified]</option>"); 
             var sel = "";
             $.each(data, function(index,division) {  
                if (divisionid == division.DivID) {
                    sel = "selected";
                }  				
                $('#division').append("<option value=" + division.DivID + " " + sel + ">" + division.DivName + "</option>"); 
            });
         });
      });
        $('#division').on('change', function(e){
            console.log(e);
            divisionid = $(this).val();
            return divisionid;
            console.log(divisionid);
        });
    </script>
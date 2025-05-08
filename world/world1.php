<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

</head>
<body>
    <label for="Region">Region</label>
    <select name="Region" id="Region" onchange="getSubRegion(this.value)">
        <option value="">---select---</option>
    </select>
    <label for="Subregion">Subregion</label>
    <select name="Subregion" id="Subregion" onchange="getCountry(this.value)">
        <option value="">---select---</option>
    </select>
    <label for="Country">Country</label>
    <select name="Country" id="Country" onchange="getState(this.value)">
        <option value="">---select---</option>
    </select>
    <label for="states">states</label>
    <select name="states" id="states" onchange="getCity(this.value)"> 
        <option value="">---select---</option>
    </select>
    
    <h2>Cities</h2>
    <div id="cities">
       

    </div>
</body>
</html>
<script>
    var region=[];
   
    $.ajax({
    url: "region.php", 
    type: "GET",
    dataType: "json", 
    success: function(data) {region=data;
        //console.log(region);

        var regionSelect = $("#Region");
        regionSelect.empty(); // Clear existing options
        regionSelect.append('<option value="">---select---</option>'); // Add default option
        $.each(region, function(key, value) {
            regionSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
        });

    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error: " + textStatus + " - " + errorThrown);
    }
});


 var subregion=[];

    
        $.ajax({
            url: "subregion.php",
            type: "GET",
            dataType: "json",
           
            success: function(data) {
                subregion=data;
                //console.log(subregion);
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: " + textStatus + " - " + errorThrown);
            }
        });


        
        function getSubRegion(id){
            //console.log(id);
            var sub=subregion.filter((data)=>data.region_id===id);
           // console.log(sub);
            var subregionSelect = $("#Subregion");
            subregionSelect.empty(); // Clear existing options
            subregionSelect.append('<option value="">---select---</option>'); // Add default option
            $.each(sub, function(key, value) {
                subregionSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
            });



    }

    // ---------------------------------------------------------------------------------------------------------------------
    // ---------------------------------------------------------------------------------------------------------------------

    var country=[];

   
        $.ajax({
            url: "countries.php",
            type: "GET",
            dataType: "json",
            
            success: function(data) {
                country=data;
                
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: " + textStatus + " - " + errorThrown);
            }
        });

        function getCountry(id){
           console.log(id);
          
            var coun=country.filter((data)=>data.subregion_id===id);
            var countrySelect = $("#Country");
            countrySelect.empty(); // Clear existing options
            countrySelect.append('<option value="">---select---</option>'); // Add default option
            $.each(coun, function(key, value) {
                countrySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
            

    }


// ---------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------


    var state=[];

   
        $.ajax({
            url: "states.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                state=data;
               console.log(state);
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: " + textStatus + " - " + errorThrown);
            }
        });
        
        function getState(id){
            console.log(id);
            var sta=state.filter((data)=>data.country_id===id);
            var stateSelect = $("#states");
            stateSelect.empty(); // Clear existing options
            stateSelect.append('<option value="">---select---</option>'); // Add default option
            $.each(sta, function(key, value) {
                stateSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
    }

// ---------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------


    var city=[];

    
        $.ajax({
            url: "cities.php",
            type: "GET",
            dataType: "json",
            data: { id: id },
            success: function(data) {
                city=data;
               console.log(city);
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: " + textStatus + " - " + errorThrown);
            }
        });
        
        function getCity(id){

            console.log(id);
            console.log(city);
            var cit=city.filter((data)=>data.state_id===id);
            var citySelect = $("#cities");
            citySelect.empty(); 
           
            $.each(cit, function(key, value) {
                citySelect.append('<h5 value='+value.id+'>'+value.name+'</h5>');
            });
    }


</script>


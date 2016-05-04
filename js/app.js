$(document).ready(function(){
  $('#generate').on('click', function(){

    //get the data from form fields
    var dataString = {
      blockname: $('input[name=blockname]').val(),
      from: $('input[name=from]').val(),
      to: $('input[name=to]').val()
    }
    
    $('#rentchart').submit(function(event){
      event.preventDefault();
    });

    //check if form is empty
    if(dataString.from == '' || dataString.to == ''){
      alert("Please fill in the dates.");
    }

    //submit the form
    $.ajax({
        type: "POST",
        url: "http://localhost/Rentit/charts/block_rent_details",
        data: dataString,
        success: function(data){
              chartData = data;
              var chartProperties = {
                "caption": "Total Rent Expected",
                "xAxisName": "Time",
                "parentyaxisName": "Rent Expected",
                "rotatevalues": "1",
                "theme": "zune"
              };
             var apiChart = new FusionCharts({
                type: 'line',
                renderAt: 'chart-container',
                width: '550',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                  "chart": chartProperties,
                  "data": chartData
                }
              });
              apiChart.render();
            }
        });
  });
});  
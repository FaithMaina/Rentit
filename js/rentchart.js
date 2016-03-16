$(function(){
  $.ajax({
    url: 'http://localhost/Rentit/charts/block_rent_details',
    type: 'GET',
    success : function(data){
      chartData = data;
      var chartProperties = {
        "caption": "Total Rent Expected",
        "xAxisName": "Time",
        "yAxisName": "Rent Expected",
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
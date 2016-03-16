
$(function(){
  $.ajax({
    url: 'http://localhost/Rentit/charts/',
    type: 'GET',
    success : function(data){
      chartData = data;
      var chartProperties = {
        "caption": "Blocks and Units",
        "xAxisName": "Blocks",
        "yAxisName": "No. of Units",
        "rotatevalues": "1",
        "theme": "zune"
      };
     var apiChart = new FusionCharts({
        type: 'pie3d',
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
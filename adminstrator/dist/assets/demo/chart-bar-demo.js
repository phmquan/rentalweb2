// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var la_bar;
var da_bar;

function getdata() {
  var file_path = 'json/bardata.json';

  // Sử dụng XMLHttpRequest để đọc dữ liệu từ tệp tin JSON
  var xhr_bar = new XMLHttpRequest();
  xhr_bar.open('GET', file_path, true);

  xhr_bar.onreadystatechange = function () {
      if (xhr_bar.readyState == 4 && xhr_bar.status == 200) {
          // Dữ liệu đã được nhận từ server
          var json_data = JSON.parse(xhr_bar.responseText);
          console.log(json_data);
          la_bar = json_data.Barchart.map(function(elem){
              return elem.order_month;
          })
         
          da_bar = json_data.Barchart.map(function(elem){
              return elem.monthly_revenue;
          })
         
      }
  };

  // Gửi yêu cầu
  xhr_bar.send();
}


// Bar Chart Example
getdata();
console.log("lable_bar: ",la_bar);
console.log("data_bar: ",da_bar);
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],
    //lables: la_bar,
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: da_bar,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'category'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 20
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: Math.max.da_bar,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
var la;
var da;
function getdata() {
    var file_path = 'json/chartdata.json';

    // Sử dụng XMLHttpRequest để đọc dữ liệu từ tệp tin JSON
    var xhr = new XMLHttpRequest();
    xhr.open('GET', file_path, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Dữ liệu đã được nhận từ server
            var json_data = JSON.parse(xhr.responseText);
            console.log(json_data);
            la = json_data.Areachart.map(function(elem){
                return elem.order_month;
            })
           
            da = json_data.Areachart.map(function(elem){
                return elem.total_money;
            })
            // Xử lý dữ liệu và cập nhật biểu đồ
          
            // if (json_data && Array.isArray(json_data)) {
            //     json_data.forEach(function (item) {
            //         // Lấy dữ liệu từ hai cột mà bạn quan tâm
            //         var order_date = item.order_month;
            //         var total_money = item.total_money;

            //         // Thêm dữ liệu vào mảng labels_json và data_json
            //         labels_json.push(order_date);
            //         data_json.push(total_money);
            //     });

            //     // Gọi hàm vẽ biểu đồ hoặc thực hiện các thao tác khác ở đây
            //     // Ví dụ: drawChart(labels_json, data_json);
            // } else {
            //     console.error("Lỗi: Dữ liệu JSON không hợp lệ hoặc không tồn tại!");
            // }
        }
    };

    // Gửi yêu cầu
    xhr.send();
}


// Ở đây, labels_json và data_json chứa dữ liệu từ hai cột của mảng json_data


// Area Chart Example


getdata();
console.log("lable: ",la);
console.log("data: ",da);
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    //labels: ["18-12-2023","18-12-2023","19-12-2023"],
    labels: la,
    datasets: [{
      label: "Tổng tiền",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      //data: [31,55,10],  
      data: da,
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
          max: Math.max.da,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});






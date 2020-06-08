$(function () {
  var data, options;

  // headline charts
  data = {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    series: [
      [23, 29, 24, 40, 25, 24, 35],
      [14, 25, 18, 34, 29, 38, 44],
    ],
  };

  options = {
    height: 300,
    showArea: true,
    showLine: false,
    showPoint: false,
    fullWidth: true,
    axisX: {
      showGrid: false,
    },
    lineSmooth: false,
  };

  new Chartist.Line('#headline-chart', data, options);

  // visits trend charts
  data = {
    labels: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec',
    ],
    series: [
      {
        name: 'series-real',
        data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
      },
      {
        name: 'series-projection',
        data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
      },
    ],
  };

  options = {
    fullWidth: true,
    lineSmooth: false,
    height: '270px',
    low: 0,
    high: 'auto',
    series: {
      'series-projection': {
        showArea: true,
        showPoint: false,
        showLine: false,
      },
    },
    axisX: {
      showGrid: false,
    },
    axisY: {
      showGrid: false,
      onlyInteger: true,
      offset: 0,
    },
    chartPadding: {
      left: 20,
      right: 20,
    },
  };

  new Chartist.Line('#visits-trends-chart', data, options);

  // visits chart
  data = {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    series: [[6384, 6342, 5437, 2764, 3958, 5068, 7654]],
  };

  options = {
    height: 300,
    axisX: {
      showGrid: false,
    },
  };

  new Chartist.Bar('#visits-chart', data, options);

  // real-time pie chart
  var sysLoad = $('#system-load').easyPieChart({
    size: 130,
    barColor: function (percent) {
      return (
        'rgb(' +
        Math.round((200 * percent) / 100) +
        ', ' +
        Math.round(200 * (1.1 - percent / 100)) +
        ', 0)'
      );
    },
    trackColor: 'rgba(245, 245, 245, 0.8)',
    scaleColor: false,
    lineWidth: 5,
    lineCap: 'square',
    animate: 800,
  });

  var updateInterval = 3000; // in milliseconds

  setInterval(function () {
    var randomVal;
    randomVal = getRandomInt(0, 100);

    sysLoad.data('easyPieChart').update(randomVal);
    sysLoad.find('.percent').text(randomVal);
  }, updateInterval);

  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
});

/*-----------------------------
        Producmy_profile modal  
    -------------------------------*/
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var first_name = button.data('first_name'); // Extract info from data-* attributes
  var last_name = button.data('last_name'); // Extract info from data-* attributes
  var street = button.data('street'); // Extract info from data-* attributes
  var city = button.data('city'); // Extract info from data-* attributes
  var postal_code = button.data('postal_code'); // Extract info from data-* attributes
  var country = button.data('country'); // Extract info from data-* attributes
  var phone = button.data('phone'); // Extract info from data-* attributes
  var email = button.data('email'); // Extract info from data-* attributes
  var password = button.data('password'); // Extract info from data-* attributes
  var confirmPassword = button.data('confirmPassword'); // Extract info from data-* attributes

  var id = button.data('id'); // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find(".modal-body input[name='first_name']").val(first_name);
  modal.find(".modal-body input[name='last_name']").val(last_name);
  modal.find(".modal-body input[name='street']").val(street);
  modal.find(".modal-body input[name='city']").val(city);
  modal.find(".modal-body input[name='postal_code']").val(postal_code);
  modal.find(".modal-body input[name='country']").val(country);
  modal.find(".modal-body input[name='phone']").val(phone);
  modal.find(".modal-body input[name='email']").val(email);
  modal.find(".modal-body input[name='password']").val(password);
  modal.find(".modal-body input[name='confirmPassword']").val(confirmPassword);

  modal.find(".modal-body input[name='id']").val(id);
  //   modal.find(".modal-body textarea[name='content']").html(content);
});

/*-----------------------------
            Confirm delete user_profile 
        -------------------------------*/
function myConfirm() {
  var result = confirm('Do you really want to delete your account?');
  if (result == true) {
    return true;
  } else {
    return false;
  }
}

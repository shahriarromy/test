function CalculateAge() {
    //var inputdob = document.getElementById("txtDOB").value;
    var dateString = document.getElementById("txtDOB").value;
    //regular expression to validate date formate mm/dd/yyyy
    //var rex = /^(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d+$/;
//    if (rex.test(dateString)) {
    //convet to input date into Date object
    var DOBDate = new Date(dateString);
    //get the current date
    var currentDate = new Date();
    var monthDiff = currentDate.getMonth() - DOBDate.getMonth();
    var yearDiff = currentDate.getFullYear() - DOBDate.getFullYear();
    var dayDiff = currentDate.getDate() - DOBDate.getDate();
//        if (isNaN(yearDiff)) {
//            document.getElementById("lblDOB").innerHTML = "Input date is incorrect.";
//        }
//        else {
    if (monthDiff < 0) {
        yearDiff = parseInt(yearDiff, 10) - 1;
        monthDiff = 12 + parseInt(monthDiff, 10);
        if (dayDiff < 0) {
            monthDiff = parseInt(monthDiff, 10) - 1;
            dayDiff = 30 + parseInt(dayDiff, 10);
            document.getElementById('lblAgeMesg').value = 'Age : ' + yearDiff + ' Years ' + monthDiff + ' Months ' + dayDiff + ' Days';
        }
        else {
            document.getElementById('lblAgeMesg').value = 'Age : ' + yearDiff + ' Years ' + monthDiff + ' Months ' + dayDiff + ' Days';
        }
    }
    else {
        if (monthDiff == 0) {
            yearDiff = parseInt(yearDiff, 10) - 1;
            if (dayDiff < 0) {
                dayDiff = 30 + parseInt(dayDiff, 10);
                document.getElementById('lblAgeMesg').value = 'Age : ' + yearDiff + ' Years ' + monthDiff + ' Months ' + dayDiff + ' Days';
            }
            else {
                document.getElementById('lblAgeMesg').value = 'Age : ' + yearDiff + ' Years ' + monthDiff + ' Months ' + dayDiff + ' Days';
            }
        }
        else {
            if (dayDiff < 0) {
                monthDiff = parseInt(monthDiff, 10) - 1;
                dayDiff = 30 + parseInt(dayDiff, 10);
                document.getElementById('lblAgeMesg').value = 'Age : ' + yearDiff + ' Years ' + monthDiff + ' Months ' + dayDiff + ' Days';
            }
            else {
                document.getElementById('lblAgeMesg').value = 'Age : ' + yearDiff + ' Years ' + monthDiff + ' Months ' + dayDiff + ' Days';
            }
        }
    }
}



//function change_age(dateString) {
//    var today = new Date();
//    var birthDate = new Date(dateString);
//    var age = today.getFullYear() - birthDate.getFullYear();
//    var m = today.getMonth() - birthDate.getMonth();
//    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
//        age--;
//    }
//    document.getElementById('present_age').value = age + ' years';
//}

function change_department(value) {

    $.ajax({
        type: "POST",
        url: site_url + "admin/employee/get_change_value/" + value,
        dataType: "JSON",
        success: function(data) {
            //  data = JSON.parse(data)
            var str = '<option value="0">Select</option>';
            $(data).each(function(i, v) {
//                alert(v.name);
                str += '<option value="' + v.id + '">' + v.name + '</option>';
            });
            $('#department').html(str);
        }
    });
}

function change_salary() {
    //alert('dfds');
    var salary0 = parseInt($('#salary0').val());
    if (typeof salary0 === 'undefined') {
        salary0 = 0;
    }
    var salary1 = parseInt($('#salary1').val());
    if (typeof salary1 === 'undefined') {
        salary1 = 0;
    }
    var salary2 = parseInt($('#salary2').val());
    if (typeof salary2 === 'undefined') {
        salary2 = 0;
    }
    var salary3 = parseInt($('#salary3').val());
    if (typeof salary3 === 'undefined') {
        salary3 = 0;
    }
    var salary4 = parseInt($('#salary4').val());
    if (typeof salary4 === 'undefined') {
        salary4 = 0;
    }
    var salary5 = parseInt($('#salary5').val());
    if (typeof salary5 === 'undefined') {
        salary5 = 0;
    }
    var salary6 = parseInt($('#salary6').val());
    if (typeof salary6 === 'undefined') {
        salary6 = 0;
    }
    var salary7 = parseInt($('#salary7').val());
    if (typeof salary7 === 'undefined') {
        salary7 = 0;
    }
    var salary8 = parseInt($('#salary8').val());
    if (typeof salary8 === 'undefined') {
        salary8 = 0;
    }
    var salary9 = parseInt($('#salary9').val());
    if (typeof salary9 === 'undefined') {
        salary9 = 0;
    }
    var total = salary0 + salary1 + salary2 + salary3 + salary4 + salary5 + salary6 + salary7 + salary8 + salary9;
    $('#total_salary').val(total);
}


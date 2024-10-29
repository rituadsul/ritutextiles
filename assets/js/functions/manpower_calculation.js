(function () {
    function updateTotal() {
        const one = parseFloat(document.getElementById("from_lab").value) || 0;
        const two = parseFloat(document.getElementById("from_other").value) || 0;
        const total = add(one, two);
        document.getElementById("total").value = total;
    }

    function updateTotalA() {
        const technicalManpower = parseFloat(document.getElementById("technical_manpower").value) || 0;
        const workingDays = parseFloat(document.getElementById("working_day").value) || 0;
        const extraManDays = parseFloat(document.getElementById("extra_man_day").value) || 0;
        const additionalWorking = parseFloat(document.getElementById("addtional_working").value) || 0;

        const totalA = (technicalManpower * workingDays) + extraManDays + additionalWorking;
        document.getElementById("total_a").value = totalA;
        totalcalc();
    }

    function updateTotalB() {
        const specialWork = parseFloat(document.getElementById("special_work").value) || 0;
        const deputation = parseFloat(document.getElementById("deputation").value) || 0;
        const leaveDays = parseFloat(document.getElementById("leave_day").value) || 0;

        const totalB = add(specialWork, deputation, leaveDays);
        document.getElementById("total_b").value = totalB;
        totalcalc();
    }

    function totalcalc() {
        const totalA = parseFloat(document.getElementById("total_a").value) || 0;
        const totalB = parseFloat(document.getElementById("total_b").value) || 0;
        const totalC = totalA - totalB;

        document.getElementById("total_c_hidden").value = totalC;
        console.log(totalC); // For debugging

        const totalS = parseFloat(document.getElementById("total_s").value) || 0;
        const avgOp = totalC ? (totalS / totalC).toFixed(2) : 0;
        document.getElementById("average_op").value = avgOp;

        const totalP = parseFloat(document.getElementById("total_p").value) || 0;
        const avgPm = totalC ? (totalP / totalC).toFixed(2) : 0;
        document.getElementById("average_pm").value = avgPm;
    }

    function add() {
        return Array.from(arguments).reduce((total, num) => total + (num || 0), 0);
    }

    // Event Listeners
    $("#from_lab").blur(updateTotal);
    $("#from_other").blur(updateTotal);
    $("#working_day").blur(updateTotalA);
    $("#extra_man_day").blur(updateTotalA);
    $("#addtional_working").blur(updateTotalA);
    $("#special_work").blur(updateTotalB);
    $("#deputation").blur(updateTotalB);
    $("#leave_day").blur(updateTotalB);
})();

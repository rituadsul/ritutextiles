(function () {

$("#rev_qua_nonreg1").blur(function()
{
var one=parseFloat(document.getElementById("rev_qua_nonreg1").value);

var t=percentage(18, one);
document.getElementById("rev_qua_nonreg2").value = t;
document.getElementById("rev_qua_nonreg1").value = one.toFixed(2);

});

$("#rev_eco_nonreg1").blur(function()
{
var one=parseFloat(document.getElementById("rev_eco_nonreg1").value);

var t=percentage(18, one);
document.getElementById("rev_eco_nonreg2").value = t;
document.getElementById("rev_eco_nonreg1").value = one.toFixed(2);

});

$("#rev_qua_reg1").blur(function()
{
var one=parseFloat(document.getElementById("rev_qua_reg1").value);

var t=percentage(18, one);
document.getElementById("rev_qua_reg2").value = t;
document.getElementById("rev_qua_reg1").value = one.toFixed(2);

});

$("#rev_eco_reg1").blur(function()
{
var one=parseFloat(document.getElementById("rev_qua_nonreg1").value); 
var two=parseFloat(document.getElementById("rev_eco_nonreg1").value);
var three=parseFloat(document.getElementById("rev_qua_reg1").value);
var four=parseFloat(document.getElementById("rev_eco_reg1").value);

var per=percentage(18, four);
document.getElementById("rev_eco_reg2").value = per;
document.getElementById("rev_eco_reg1").value = four.toFixed(2);

var adds=add(one, two, three, four);
document.getElementById("rev_total1").value = adds;


var one2=parseFloat(document.getElementById("rev_qua_nonreg2").value); 
var two2=parseFloat(document.getElementById("rev_eco_nonreg2").value);
var three2=parseFloat(document.getElementById("rev_qua_reg2").value);
var four2=parseFloat(document.getElementById("rev_eco_reg2").value);

var adds2=add(one2, two2, three2, four2);
document.getElementById("rev_total2").value = adds2;

});

$('#rev_eco_reg2').blur(function(){
var one2=parseFloat(document.getElementById("rev_qua_nonreg2").value); 
var two2=parseFloat(document.getElementById("rev_eco_nonreg2").value);
var three2=parseFloat(document.getElementById("rev_qua_reg2").value);
var four2=parseFloat(document.getElementById("rev_eco_reg2").value);

var adds2=add(one2, two2, three2, four2);
document.getElementById("rev_total2").value = adds2;
});



$("#rev_qua_nonreg3").blur(function()
{
var one=parseFloat(document.getElementById("rev_qua_nonreg3").value);


var t=percentage(18, one);
document.getElementById("rev_qua_nonreg4").value = t;
document.getElementById("rev_qua_nonreg3").value = one.toFixed(2);

//1+2
var one1=parseFloat(document.getElementById("rev_qua_nonreg1").value);
document.getElementById("rev_qua_nonreg5").value =add(one1+one);

//GST 1=2
var two=parseFloat(document.getElementById("rev_qua_nonreg2").value);
var two1=parseFloat(document.getElementById("rev_qua_nonreg4").value);
document.getElementById("rev_qua_nonreg6").value =add(two+two1);




});
$("#rev_eco_nonreg3").blur(function()
{
var one=parseFloat(document.getElementById("rev_eco_nonreg3").value);

var t=percentage(18, one);
document.getElementById("rev_eco_nonreg4").value = t;
document.getElementById("rev_eco_nonreg3").value = one.toFixed(2);

//1+2
var one1=parseFloat(document.getElementById("rev_eco_nonreg1").value);
document.getElementById("rev_eco_nonreg5").value =add(one1+one);

//GST 1=2
var two=parseFloat(document.getElementById("rev_eco_nonreg2").value);
var two1=parseFloat(document.getElementById("rev_eco_nonreg4").value);
document.getElementById("rev_eco_nonreg6").value =add(two+two1);

});

$("#rev_qua_reg3").blur(function()
{
var one=parseFloat(document.getElementById("rev_qua_reg3").value);

var t=percentage(18, one);
document.getElementById("rev_qua_reg4").value = t;
document.getElementById("rev_qua_reg3").value = one.toFixed(2);

//1+2
var one1=parseFloat(document.getElementById("rev_qua_reg1").value);
document.getElementById("rev_qua_reg5").value =add(one1+one);

//GST 1=2
var two=parseFloat(document.getElementById("rev_qua_reg2").value);
var two1=parseFloat(document.getElementById("rev_qua_reg4").value);
document.getElementById("rev_qua_reg6").value =add(two+two1);

});

$("#rev_eco_reg3").blur(function()
{
//Total Add
var one=parseFloat(document.getElementById("rev_qua_nonreg3").value); 
var two=parseFloat(document.getElementById("rev_eco_nonreg3").value);
var three=parseFloat(document.getElementById("rev_qua_reg3").value);
var four=parseFloat(document.getElementById("rev_eco_reg3").value);

var per=percentage(18, four);
document.getElementById("rev_eco_reg4").value = per;
document.getElementById("rev_eco_reg3").value = four.toFixed(2);

var adds=add(one, two, three, four);
document.getElementById("rev_total3").value = adds;

//GST Calculate
var one2=parseFloat(document.getElementById("rev_qua_nonreg4").value); 
var two2=parseFloat(document.getElementById("rev_eco_nonreg4").value);
var three2=parseFloat(document.getElementById("rev_qua_reg4").value);
var four2=parseFloat(document.getElementById("rev_eco_reg4").value);

var adds2=add(one2, two2, three2, four2);
document.getElementById("rev_total4").value = adds2;


//set 1+2 rev_eco_nonreg6 rev_eco_reg1 rev_eco_reg3 rev_qua_nonreg6
//1+2
var one1=parseFloat(document.getElementById("rev_eco_reg1").value);
document.getElementById("rev_eco_reg5").value =add(one1+four);

//GST 1=2 rev_eco_reg4
var two=parseFloat(document.getElementById("rev_eco_reg2").value);
document.getElementById("rev_eco_reg6").value =add(two+four2);

//1+2 total
var one3=parseFloat(document.getElementById("rev_qua_nonreg5").value); 
var two3=parseFloat(document.getElementById("rev_eco_nonreg5").value);
var three3=parseFloat(document.getElementById("rev_qua_reg5").value);
var four3=parseFloat(document.getElementById("rev_eco_reg5").value);

var adds3=add(one3, two3, three3, four3);
document.getElementById("rev_total5").value = adds3;


//1+2 GST Total
var one4=parseFloat(document.getElementById("rev_qua_nonreg6").value); 
var two4=parseFloat(document.getElementById("rev_eco_nonreg6").value);
var three4=parseFloat(document.getElementById("rev_qua_reg6").value);
var four4=parseFloat(document.getElementById("rev_eco_reg6").value);

var adds4=add(one4, two4, three4, four4);
document.getElementById("rev_total6").value = adds4;


});


$("#rev_qua_nonreg7").blur(function()
{

var one=parseFloat(document.getElementById("rev_qua_nonreg7").value);
var total=parseFloat(document.getElementById("rev_qua_nonreg5").value);

var t=percentage(18, one);
document.getElementById("rev_qua_nonreg8").value = t;
document.getElementById("rev_qua_nonreg7").value = one.toFixed(2);

var p=(total-one).toFixed(2);
document.getElementById("rev_qua_nonreg9").value=p;

var pt=percentage(18, p);
document.getElementById("rev_qua_nonreg10").value = pt;


});

$("#rev_eco_nonreg7").blur(function()
{

var one=parseFloat(document.getElementById("rev_eco_nonreg7").value);
var total=parseFloat(document.getElementById("rev_eco_nonreg5").value);

var t=percentage(18, one);
document.getElementById("rev_eco_nonreg8").value = t;
document.getElementById("rev_eco_nonreg7").value = one.toFixed(2);

var p=(total-one).toFixed(2);
document.getElementById("rev_eco_nonreg9").value=p;

var pt=percentage(18, p);
document.getElementById("rev_eco_nonreg10").value = pt;


});//

$("#rev_qua_reg7").blur(function()
{

var one=parseFloat(document.getElementById("rev_qua_reg7").value);
var total=parseFloat(document.getElementById("rev_qua_reg5").value);

var t=percentage(18, one);
document.getElementById("rev_qua_reg8").value = t;
document.getElementById("rev_qua_reg7").value = one.toFixed(2);

var p=(total-one).toFixed(2);
document.getElementById("rev_qua_reg9").value=p;

var pt=percentage(18, p);
document.getElementById("rev_qua_reg10").value = pt;

});
//

$("#rev_eco_reg7").blur(function()
{

var one=parseFloat(document.getElementById("rev_eco_reg7").value);
var total=parseFloat(document.getElementById("rev_eco_reg5").value);

var t=percentage(18, one);
document.getElementById("rev_eco_reg8").value = t;
document.getElementById("rev_eco_reg7").value = one.toFixed(2);

var p=(total-one).toFixed(2);
document.getElementById("rev_eco_reg9").value=p;

var pt=percentage(18, p);
document.getElementById("rev_eco_reg10").value = pt;


//same row total

var one1=parseFloat(document.getElementById("rev_qua_nonreg7").value);
var two1=parseFloat(document.getElementById("rev_eco_nonreg7").value);
var three1=parseFloat(document.getElementById("rev_qua_reg7").value);
var four1=parseFloat(document.getElementById("rev_eco_reg7").value);

var t=add(one1+two1+three1+four1);
document.getElementById("rev_total7").value = t;


var one2=parseFloat(document.getElementById("rev_qua_nonreg8").value);
var two2=parseFloat(document.getElementById("rev_eco_nonreg8").value);
var three2=parseFloat(document.getElementById("rev_qua_reg8").value);
var four2=parseFloat(document.getElementById("rev_eco_reg8").value);

var t2=add(one2+two2+three2+four2);
document.getElementById("rev_total8").value = t2;

var one3=parseFloat(document.getElementById("rev_qua_nonreg9").value);
var two3=parseFloat(document.getElementById("rev_eco_nonreg9").value);
var three3=parseFloat(document.getElementById("rev_qua_reg9").value);
var four3=parseFloat(document.getElementById("rev_eco_reg9").value);

var t3=add(one3+two3+three3+four3);
document.getElementById("rev_total9").value = t3;


var one4=parseFloat(document.getElementById("rev_qua_nonreg10").value);
var two4=parseFloat(document.getElementById("rev_eco_nonreg10").value);
var three4=parseFloat(document.getElementById("rev_qua_reg10").value);
var four4=parseFloat(document.getElementById("rev_eco_reg10").value);

var t4=add(one4+two4+three4+four4);
document.getElementById("rev_total10").value = t4;          


});


$("#rev_eco_reg11").blur(function()
{

var one4=parseFloat(document.getElementById("rev_qua_nonreg11").value);
var two4=parseFloat(document.getElementById("rev_eco_nonreg11").value);
var three4=parseFloat(document.getElementById("rev_qua_reg11").value);
var four4=parseFloat(document.getElementById("rev_eco_reg11").value);

var t4=add(one4+two4+three4+four4);
document.getElementById("rev_total11").value = t4;    

});

$("#rev_eco_reg12").blur(function()
{

var one4=parseFloat(document.getElementById("rev_qua_nonreg12").value);
var two4=parseFloat(document.getElementById("rev_eco_nonreg12").value);
var three4=parseFloat(document.getElementById("rev_qua_reg12").value);
var four4=parseFloat(document.getElementById("rev_eco_reg12").value);

var t4=add(one4+two4+three4+four4);
document.getElementById("rev_total12").value = t4;    

});

$("#rev_eco_reg13").blur(function()
{

var one4=parseFloat(document.getElementById("rev_qua_nonreg13").value);
var two4=parseFloat(document.getElementById("rev_eco_nonreg13").value);
var three4=parseFloat(document.getElementById("rev_qua_reg13").value);
var four4=parseFloat(document.getElementById("rev_eco_reg13").value);

var t4=add(one4+two4+three4+four4);
document.getElementById("rev_total13").value = t4;    

}); 

$("#rev_eco_reg14").blur(function()
{

var one4=parseFloat(document.getElementById("rev_qua_nonreg14").value);
var two4=parseFloat(document.getElementById("rev_eco_nonreg14").value);
var three4=parseFloat(document.getElementById("rev_qua_reg14").value);
var four4=parseFloat(document.getElementById("rev_eco_reg14").value);

var t4=add(one4+two4+three4+four4);
document.getElementById("rev_total14").value = t4;    

});

function add() 
{
var total=0;

for( let i=0; i< arguments.length; i++)
{
arguments[i]=arguments[i] || 0;
total +=arguments[i];
} 
return parseFloat(total).toFixed(2);
};



function percentage(percent, total) 
{
return ((percent/ 100) * total).toFixed(2);
}







})();
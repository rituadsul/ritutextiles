(function () 
{

      $("#qua_nonreg2").blur(function()
        {
          var one=parseInt(document.getElementById("qua_nonreg1").value); 
          var two=parseInt(document.getElementById("qua_nonreg2").value);
          
          var t=add(one, two);
          document.getElementById("qua_nonreg3").value = t;          
        
        });

      $("#eco_nonreg2").blur(function()
        {
          var one=parseInt(document.getElementById("eco_nonreg1").value); 
          var two=parseInt(document.getElementById("eco_nonreg2").value);
          var t=add(one, two);
          document.getElementById("eco_nonreg3").value = t;        
        });

      $("#qua_reg2").blur(function()
        {
          var one=parseInt(document.getElementById("qua_reg1").value); 
          var two=parseInt(document.getElementById("qua_reg2").value);
          var t=add(one, two);
          document.getElementById("qua_reg3").value = t;        
        });

      $("#eco_reg2").blur(function()
        {
          var one=parseInt(document.getElementById("eco_reg1").value); 
          var two=parseInt(document.getElementById("eco_reg2").value);
          var t=add(one, two);
          document.getElementById("eco_reg3").value = t;        
        });

      //Total All

      $("#eco_reg1").blur(function()
        {
          
          var one=parseInt(document.getElementById("qua_nonreg1").value); 
          var two=parseInt(document.getElementById("eco_nonreg1").value);
          var three=parseInt(document.getElementById("qua_reg1").value);
          var four=parseInt(document.getElementById("eco_reg1").value);
          var t=add(one, two, three, four);
          document.getElementById("total1").value= t;        
        
        });



      $("#eco_reg2").blur(function()
        {
          var one=parseInt(document.getElementById("qua_nonreg2").value); 
          var two=parseInt(document.getElementById("eco_nonreg2").value);
          var three=parseInt(document.getElementById("qua_reg2").value);
          var four=parseInt(document.getElementById("eco_reg2").value);

          var t=add(one, two, three, four);

          document.getElementById("total2").value = t;

           var one1=parseInt(document.getElementById("qua_nonreg3").value); 
          var two1=parseInt(document.getElementById("eco_nonreg3").value);
          var three1=parseInt(document.getElementById("qua_reg3").value);
          var four1=parseInt(document.getElementById("eco_reg3").value);
          var t1=add(one1, two1, three1, four1);

          document.getElementById("total3").value = t1;
        
        });


        $("#eco_reg3").blur(function()
        {
          var one=parseInt(document.getElementById("qua_nonreg3").value); 
          var two=parseInt(document.getElementById("eco_nonreg3").value);
          var three=parseInt(document.getElementById("qua_reg3").value);
          var four=parseInt(document.getElementById("eco_reg3").value);

          var t=add(one, two, three, four);
          document.getElementById("total3").value = t;
        
        });

      $("#eco_reg4").blur(function()
        {
          var one=parseInt(document.getElementById("qua_nonreg4").value); 
          var two=parseInt(document.getElementById("eco_nonreg4").value);
          var three=parseInt(document.getElementById("qua_reg4").value);
          var four=parseInt(document.getElementById("eco_reg4").value);

          var t=add(one, two, three, four);
          document.getElementById("total4").value = t;

          var five=parseInt(document.getElementById("eco_reg3").value);
          //var s=sub(five, four);
          document.getElementById("eco_reg5").value = five-four;

          var one1=parseInt(document.getElementById("qua_nonreg5").value); 
          var two1=parseInt(document.getElementById("eco_nonreg5").value);
          var three1=parseInt(document.getElementById("qua_reg5").value);
          var four1=parseInt(document.getElementById("eco_reg5").value);

          var t1=add(one1, two1, three1, four1);
          document.getElementById("total5").value = t1;
        
        });
      
       $("#qua_nonreg4").blur(function() {
        var one = parseInt($("#qua_nonreg3").val()) || 0; 
        var two = parseInt($(this).val()) || 0;
        var result = one - two;

        if (two >= one) {
            alert("Value for row 4 cannot be greater than or equal to row 3.");
            $(this).val('');
            $("#qua_nonreg5").val(''); 
        } else {
            $("#qua_nonreg5").val(result);
        }
    });
    
        $("#eco_nonreg4").blur(function() {
        var one = parseInt($("#eco_nonreg3").val()) || 0; 
        var two = parseInt($(this).val()) || 0;
        var result = one - two;

        if (two >= one) {
            alert("Value for row 4 cannot be greater than or equal to row 3.");
            $(this).val('');
            $("#eco_nonreg5").val(''); 
        } else {
            $("#eco_nonreg5").val(result);
        }
    });
    
        $("#qua_reg4").blur(function() {
        var one = parseInt($("#qua_reg3").val()) || 0; 
        var two = parseInt($(this).val()) || 0;
        var result = one - two;

        if (two >= one) {
            alert("Value for row 4 cannot be greater than or equal to row 3.");
            $(this).val('');
            $("#qua_reg5").val(''); 
        } else {
            $("#qua_reg5").val(result);
        }
    });

         $("#eco_reg4").blur(function() {
        var one = parseInt($("#eco_reg3").val()) || 0; 
        var two = parseInt($(this).val()) || 0;
        var result = one - two;

        if (two >= one) {
            alert("Value for row 4 cannot be greater than or equal to row 3.");
            $(this).val('');
            $("#eco_reg5").val(''); 
        } else {
            $("#eco_reg5").val(result);
        }
    });
    
      function add() 
      {
        var total=0;
        for( let i=0; i< arguments.length; i++)
        {
          arguments[i]=arguments[i] || 0;

          total +=arguments[i];
        } 
        return total;
      };

} ) ();
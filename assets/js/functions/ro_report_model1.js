

  function sampleUpdate(transaction_id) 
  {
    $('#sample_transaction_id').val("");
    $('#sample_name').val("");
    $('#qua_nonreg').val("");
    $('#eco_nonreg').val("");
    $('#qua_reg').val("");
    $('#eco_reg').val("");

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetSampleRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {

        console.log(rdgdg);
                    
        $('#sample_transaction_id').val(result[0].sample_transaction_id);
        $('#sample_name').val(result[0].sample_name);
                    $('#qua_nonreg').val(result[0].qua_nonreg);
                    $('#eco_nonreg').val(result[0].eco_nonreg);
                    $('#qua_reg').val(result[0].qua_reg);
                    $('#eco_reg').val(result[0].eco_reg);
                    
                    
                  }
                });
  }

  function updateSample() 
  {

    $('#sampleModel').modal('hide');

    var sample_transaction_id=$('#sample_transaction_id').val();
    var qua_nonreg=$('#qua_nonreg').val();
    var eco_nonreg=$('#eco_nonreg').val();
    var qua_reg=$('#qua_reg').val();
    var eco_reg=$('#eco_reg').val();
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateSampleRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {sample_transaction_id:sample_transaction_id, qua_nonreg:qua_nonreg, eco_nonreg:eco_nonreg,qua_reg:qua_reg, 
          eco_reg:eco_reg },
          success:function(result)
          {
              $('#sampleModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }


  //revenue


  function revenueUpdate(transaction_id) 
  {
    $('#revenue_transaction_id').val("");
    $('#revenue_label_name').val("");
    $('#rev_qua_nonreg').val("");
    $('#rev_eco_nonreg').val("");
    $('#rev_qua_reg').val("");
    $('#rev_eco_reg').val("");

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetRevenueRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#revenue_transaction_id').val(result[0].revenue_transaction_id);
        $('#revenue_label_name').val(result[0].revenue_label_name);
                    $('#rev_qua_nonreg').val(result[0].rev_qua_nonreg);
                    $('#rev_eco_nonreg').val(result[0].rev_eco_nonreg);
                    $('#rev_qua_reg').val(result[0].rev_qua_reg);
                    $('#rev_eco_reg').val(result[0].rev_eco_reg);
                    
                    
                  }
                });
  }

  function updateRevenue() 
  {

    $('#revenueModel').modal('hide');

    var revenue_transaction_id=$('#revenue_transaction_id').val();
    var rev_qua_nonreg=$('#rev_qua_nonreg').val();
    var rev_eco_nonreg=$('#rev_eco_nonreg').val();
    var rev_qua_reg=$('#rev_qua_reg').val();
    var rev_eco_reg=$('#rev_eco_reg').val();
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateRevenueRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {revenue_transaction_id:revenue_transaction_id, rev_qua_nonreg:rev_qua_nonreg, rev_eco_nonreg:rev_eco_nonreg,rev_qua_reg:rev_qua_reg, 
          rev_eco_reg:rev_eco_reg },
          success:function(result)
          {
              $('#revenueModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }

  //Training

  function trainingUpdate(transaction_id) 
{
    $('#training_program_id').val("");
    $('#organisation_name').val("");
    $('#training_date').val("");
    $('#participant_no').val("");
    $('#amount').val("");
    $('#gst_amount').val("");

    var id = transaction_id;

    $.ajax(
    {
        url: "assets/js/ajax/ajax_GetTrainingRecord.php", 
        type: "post", 
        dataType: 'json',
        data: {id: id},
        success: function(result)
        {
            $('#training_program_id').val(result[0].training_program_id);
            $('#organisation_name').val(result[0].organisation_name);
            $('#training_date').val(result[0].training_date);
            $('#participant_no').val(result[0].participant_no);
            $('#amount').val(result[0].amount);

            var amount = parseFloat(result[0].amount);
            var gstAmount = (amount * 0.18).toFixed(2);
            $('#gst_amount').val(gstAmount);
        }
    });
}



  
  function updateTraining() 
  {

    $('#trainingModel').modal('hide');

    var training_program_id=$('#training_program_id').val();
    var organisation_name=$('#organisation_name').val();
    var training_date=$('#training_date').val();
    var participant_no=$('#participant_no').val();
    var amount=$('#amount').val();
    var gst_amount=$('#gst_amount').val();
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateTrainingRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {training_program_id:training_program_id, organisation_name:organisation_name, 
            training_date:training_date, participant_no:participant_no,amount:amount, 
          gst_amount:gst_amount },
          success:function(result)
          {
              $('#trainingModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }



  //Activity

 function activityUpdate(transaction_id) 
  {
    $('#activity_transaction_id').val("");
    $('#activity_name').val("");
    $('#organisation_name').val("");
    $('#name_of_units').val("");
    $('#date_of_commencement').val("");
    $('#date_of_completion').val("");
    $('#training_program').val("");
    $('#remark').val("");
    $('#activity_amount').val("");
    $('#activity_gst_amount').val("");

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetActivityRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
        // console.log(result[0].organisation_name);
                    
        $('#activity_transaction_id').val(result[0].activity_transaction_id);
        $('#activity_name').val(result[0].activity_name);
        $('#organisation_name1').val(result[0].organisation_name);
        $('#name_of_units').val(result[0].name_of_units);
        $('#date_of_commencement').val(result[0].date_of_commencement);
        $('#date_of_completion').val(result[0].date_of_completion);
        $('#training_program').val(result[0].training_program);
        $('#remark').val(result[0].remark);
        $('#activity_amount').val(result[0].amount);
        $('#activity_gst_amount').val(result[0].gst_amount);
                    
                    
                  }
                });
  }

  function updateActivity() 
  {

    $('#activityModel').modal('hide');

    var activity_transaction_id=$('#activity_transaction_id').val();
    var organisation_name=$('#organisation_name').val();
    var name_of_units=$('#name_of_units').val();
    var date_of_commencement=$('#date_of_commencement').val();
    var date_of_completion=$('#date_of_completion').val();
    var remark=$('#training_program').val();
    var remark=$('#remark').val();
    var amount=$('#activity_amount').val();
    var gst_amount=$('#activity_gst_amount').val();
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateActivityRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {activity_transaction_id:activity_transaction_id, organisation_name:organisation_name, name_of_units:name_of_units,
            date_of_commencement:date_of_commencement,date_of_completion:date_of_completion, 
          remark:remark, amount:amount, gst_amount:gst_amount },
          success:function(result)
          {
              $('#activityModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }

  //Meet

 function meetUpdate(transaction_id) 
  {
    
    $('#meet_transaction_id').val("");
    $('#meet_name').val("");
    $('#meet_date').val("");
    $('#place').val("");
    $('#participant').val("");
    $('#description').val("");
    $('#meet_remark').val("");
   

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetMeetRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#meet_transaction_id').val(result[0].meet_transaction_id);
        $('#meet_name').val(result[0].meet_name);
        $('#meet_date').val(result[0].meet_date);
        $('#place').val(result[0].place);
        $('#participant').val(result[0].participant);
        $('#description').val(result[0].description);
        $('#meet_remark').val(result[0].remark);
        
                    
                    
                  }
                });
  }

  function updateMeet() 
  {

    $('#meetModel').modal('hide');

    var meet_transaction_id=$('#meet_transaction_id').val();
    var meet_date=$('#meet_date').val();
    var place=$('#place').val();
    var participant=$('#participant').val();
    var description=$('#description').val();
    var remark=$('#meet_remark').val();
   
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateMeetRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {meet_transaction_id:meet_transaction_id, meet_date:meet_date, 
            place:place, description:description, participant:participant, 
          remark:remark },
          success:function(result)
          {
              $('#meetModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }


    //Consultancy

 function consultancyUpdate(transaction_id) 
  {
    
    $('#technical_consultancy_id').val("");
    
    $('#name_of_sme').val("");
    $('#consultancy_type').val("");
    $('#consultancy_amount').val("");
    $('#consultancy_gst_amount').val("");
    
   

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetConsultancyRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#technical_consultancy_id').val(result[0].technical_consultancy_id);
        
        $('#name_of_sme').val(result[0].name_of_sme);
        $('#consultancy_type').val(result[0].consultancy_type);
        $('#consultancy_amount').val(result[0].amount);
        $('#consultancy_gst_amount').val(result[0].gst_amount);
        
        
                    
                    
                  }
                });
  }

  function updateConsultancy() 
  {

    $('#consultancyModel').modal('hide');

    var technical_consultancy_id=$('#technical_consultancy_id').val();
    var name_of_sme=$('#name_of_sme').val();
    var consultancy_type=$('#consultancy_type').val();
    var amount=$('#consultancy_amount').val();
    var gst_amount=$('#consultancy_gst_amount').val();
    
   
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateConsultancyRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {technical_consultancy_id:technical_consultancy_id, name_of_sme:name_of_sme, 
            consultancy_type:consultancy_type, amount:amount, gst_amount:gst_amount },
          success:function(result)
          {
              $('#consultancyModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }


  //Dispose

 function disposeUpdate(transaction_id) 
  {
    
    $('#dispose_item_transaction_id').val("");
    $('#dispose_item_name').val("");
    $('#date_of_dispose').val("");
    $('#date_of_after_dispose').val("");
    $('#dispose_amount').val("");
    
   

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetDisposeRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#dispose_item_transaction_id').val(result[0].dispose_item_transaction_id);
        $('#dispose_item_name').val(result[0].dispose_item_name);
        $('#date_of_dispose').val(result[0].date_of_dispose);
        $('#date_of_after_dispose').val(result[0].date_of_after_dispose);
        $('#dispose_amount').val(result[0].amount);
        
        
                    
                    
      }
    });
  }

  function updateDispose() 
  {

    $('#disposeModel').modal('hide');

    var dispose_item_transaction_id=$('#dispose_item_transaction_id').val();
    var date_of_dispose=$('#date_of_dispose').val();
    var date_of_after_dispose=$('#date_of_after_dispose').val();
    var amount=$('#dispose_amount').val();
    
   
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateDisposeRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {dispose_item_transaction_id:dispose_item_transaction_id, date_of_dispose:date_of_dispose,
            date_of_after_dispose:date_of_after_dispose, amount:amount },
          success:function(result)
          {
              $('#disposeModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }


  //Expenditure

 function expenditureUpdate(transaction_id) 
  {
    
    $('#expenditure_transaction_id').val("");
    $('#expenditure_label_name').val("");
    $('#exp_amount').val("");
    $('#exp_remark').val("");
  
    
   

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetExpenditureRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#expenditure_transaction_id').val(result[0].expenditure_transaction_id);
        $('#expenditure_label_name').val(result[0].expenditure_label_name);
        $('#exp_amount').val(result[0].amount);
        $('#exp_remark').val(result[0].remark);
        
        
        
                    
                    
      }
    });
  }

  function updateExpediture() 
  {

    $('#expenditureModel').modal('hide');

    var expenditure_transaction_id=$('#expenditure_transaction_id').val();
    var amount=$('#exp_amount').val();
    var remark=$('#exp_remark').val();
    
    
   
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateExpenditureRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {expenditure_transaction_id:expenditure_transaction_id, amount:amount,
            remark:remark },
          success:function(result)
          {
              $('#expenditureModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }

  //Stock Postion

 function stockpositionUpdate(transaction_id) 
  {
    
    $('#stock_position_transaction_id').val("");
    $('#stock_position_label_name').val("");
    $('#stock_position_adequate').val("");
    $('#action').val("");
  
    
   

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetStockPostionRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#stock_position_transaction_id').val(result[0].stock_position_transaction_id);
        $('#stock_position_label_name').val(result[0].stock_position_label_name);
        $('#stock_position_adequate').val(result[0].stock_position_adequate);
        $('#action').val(result[0].action);
        
        
        
                    
                    
      }
    });
  }

  function updateStockPostion() 
  {

    $('#stockpositionModel').modal('hide');

    var stock_position_transaction_id=$('#stock_position_transaction_id').val();
    var stock_position_adequate=$('#stock_position_adequate').val();
    var action=$('#action').val();
    
    
   
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateStockPostionRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {stock_position_transaction_id:stock_position_transaction_id, stock_position_adequate:stock_position_adequate,
            action:action },
          success:function(result)
          {
              $('#stockpositionModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }

  //Equipment

 function equipmentUpdate(transaction_id) 
  {
    
    $('#equipment_transaction_id').val("");
    $('#equipment_name').val("");
    $('#parameter_name').val("");
    $('#test_performed').val("");
    $('#eqp_remark').val("");
  
    
  
    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetEquipmentRecord.php", 
      type: "post",
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {   
        $('#equipment_transaction_id').val(result[0].equipment_transaction_id);
        $('#equipment_name').val(result[0].equipment_name);
        $('#parameter_name').val(result[0].parameter_name);
        $('#test_performed').val(result[0].test_performed);
        $('#eqp_remark').val(result[0].remark);
        
        
        
                    
                    
      }
    });
  }

  function updateEquipment() 
  {

    $('#equipmentModel').modal('hide');

    var equipment_transaction_id=$('#equipment_transaction_id').val();
    var test_performed=$('#test_performed').val();
    var remark=$('#eqp_remark').val();
    var parameter_name=$('#parameter_name').val();
    
   
    
   $.ajax({
          url:"assets/js/ajax/ajax_updateEquipmentRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {equipment_transaction_id:equipment_transaction_id,parameter_name:parameter_name, test_performed:test_performed,
            remark:remark },
          success:function(result)
          {
              $('#equipmentModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }


    //Equipment

 function equipmentnotworkingUpdate(transaction_id) 
  {
    
    $('#equipment_nonworking_id').val("");
    $('#nw_equipment_name').val("");
    $('#equipment_id').val("");
   
    $('#problem').val("");
    $('#nw_action').val("");
  
    
   

    var id=transaction_id;

    $.ajax(
    {

      url:"assets/js/ajax/ajax_GetEquipmentNotWorkingRecord.php ", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                // console.log(result[0].equipment_id);
    
        $('#equipment_nonworking_id').val(result[0].equipment_nonworking_id);
        $('#nw_equipment_name').val(result[0].equipment_name);
        $('#equipment_id').val(result[0].equipment_id);
        
        $('#problem').val(result[0].problem);
        $('#nw_action').val(result[0].action);
        
        
        
                    
                    
      }
    });
  }

  function updateEquipmentNotWorking() 
  {

    $('#equipmentnotworkingModel').modal('hide');

    var equipment_nonworking_id=$('#equipment_nonworking_id').val();
    var equipment_id = $('#equipment_id').val();
    var problem=$('#problem').val();
    var action=$('#nw_action').val();
    
    
   
   $.ajax({
          url:"assets/js/ajax/ajax_updateEquipmentNotWorkingRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {equipment_nonworking_id:equipment_nonworking_id,equipment_id:equipment_id, problem:problem,
            action:action },
          success:function(result)
          {
              $('#equipmentnotworkingModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }





  //New Customer

  function newcustomerUpdate(transaction_id) 
  {
    $('#customer_id').val("");
    $('#customer_name').val("");
    $('#test_sample').val("");
    $('#newcust_amount').val("");
    

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetNewCustomerRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#customer_id').val(result[0].customer_id);
        $('#customer_name').val(result[0].customer_name);
        $('#test_sample').val(result[0].test_sample);
        $('#newcust_amount').val(result[0].amount);
                          
                    
       }
    });
  }


  
  function updateNewCustomer() 
  {

    $('#newcustomerModel').modal('hide');

    var customer_id=$('#customer_id').val();
    var customer_name=$('#customer_name').val();
    var test_sample=$('#test_sample').val();
    var amount=$('#newcust_amount').val();
    
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateNewCustomerRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {customer_id:customer_id, customer_name:customer_name, 
            test_sample:test_sample, amount:amount },
          success:function(result)
          {
              $('#newcustomerModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }


    //Marketing

  function marketingUpdate(transaction_id) 
  {
    $('#marketing_activity_idmarketing_activity_id').val("");
    $('#company_name').val("");
    $('#company_type').val("");
    $('#contact_person').val("");
    $('#contact_number').val("");
    $('#email').val("");
    $('#visited_date').val("");
    $('#sample_received').val("");
    $('#customer_response').val("");
    $('#specific_requirement').val("");
    $('#mark_remark').val("");
   
    

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetMarketingRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#marketing_activity_id').val(result[0].marketing_activity_id);
        $('#company_name').val(result[0].company_name);
        $('#company_type').val(result[0].company_type);
        $('#contact_person').val(result[0].contact_person);
        $('#contact_number').val(result[0].contact_number);
        $('#email').val(result[0].email);
        $('#visited_date').val(result[0].visited_date);
        $('#sample_received').val(result[0].sample_received);
        $('#customer_response').val(result[0].customer_response);
        $('#specific_requirement').val(result[0].specific_requirement);
        $('#mark_remark').val(result[0].remark);
                          
                    
       }
    });
  }


  
  function updateMarketing() 
  {

    $('#marketingModel').modal('hide');

    var marketing_activity_id=$('#marketing_activity_id').val();
    var company_name=$('#company_name').val();
    var company_type=$('#company_type').val();
    var contact_person=$('#contact_person').val();
    var contact_number=$('#contact_number').val();
    var email=$('#email').val();
    var visited_date=$('#visited_date').val();
    var sample_received=$('#sample_received').val();
    var customer_response=$('#customer_response').val();
    var specific_requirement=$('#specific_requirement').val();

    var remark=$('#mark_remark').val();
    
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateMarketingRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {marketing_activity_id:marketing_activity_id, company_name:company_name, 
            company_type:company_type, contact_person:contact_person, contact_number:contact_number,
            email:email,visited_date:visited_date,
            sample_received:sample_received,customer_response:customer_response,specific_requirement:specific_requirement,
            remark:remark  },
          success:function(result)
          {
              $('#marketingModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }


  //Bulk Customer

  function bulkcustomerUpdate(transaction_id) 
  {
    $('#bulk_customer_id').val("");
    $('#bulk_customer_name').val("");
    $('#sample_reported').val("");
    $('#testing_charges').val("");
    $('#b_remark').val("");
    

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetBulkCustomerRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#bulk_customer_id').val(result[0].bulk_customer_id);
        $('#bulk_customer_name').val(result[0].bulk_customer_name);
        $('#sample_reported').val(result[0].sample_reported);
        $('#testing_charges').val(result[0].testing_charges);
        $('#b_remark').val(result[0].remark);
                          
                    
       }
    });
  }


  function tatkalcustomerUpdate(transaction_id) 
  {
    $('#tatkal_customer_id').val("");
    $('#tatkal_customer_name').val("");
    $('#tatkal_sample_reported').val("");
    $('#tatkal_testing_charges').val("");
    $('#tatkal_remark').val("");
    

    var id=transaction_id;

    $.ajax(
    {
      url:"assets/js/ajax/ajax_GetTatkalRecord.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
                    
        $('#tatkal_customer_id').val(result[0].tatkal_customer_id);
        $('#tatkal_customer_name').val(result[0].tatkal_customer_name);
        $('#tatkal_sample_reported').val(result[0].tatkal_sample_reported);
        $('#tatkal_testing_charges').val(result[0].tatkal_testing_charges);
        $('#tatkal_remark').val(result[0].tatkal_remark);
                          
                    
       }
    });
  }

  function updateTatkalRecord()
   {

    $('#tatkalcustomerModel').modal('hide');

    var tatkal_customer_id=$('#tatkal_customer_id').val();
    var tatkal_customer_name=$('#tatkal_customer_name').val();
    var tatkal_sample_reported=$('#tatkal_sample_reported').val();
    var tatkal_testing_charges=$('#tatkal_testing_charges').val();
    var tatkal_remark=$('#tatkal_remark').val();
    
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateTatkalRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {tatkal_customer_id:tatkal_customer_id, tatkal_customer_name:tatkal_customer_name, 
            tatkal_sample_reported:tatkal_sample_reported, tatkal_testing_charges:tatkal_testing_charges, tatkal_remark:tatkal_remark  },
          success:function(result)
          {
              $('#tatkalcustomerModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }


  
  function updateBulkCustomer() 
  {

    $('#newcustomerModel').modal('hide');

    var bulk_customer_id=$('#bulk_customer_id').val();
    var bulk_customer_name=$('#bulk_customer_name').val();
    var sample_reported=$('#sample_reported').val();
    var testing_charges=$('#testing_charges').val();
    var remark=$('#b_remark').val();
    
        
        

   $.ajax({
          url:"assets/js/ajax/ajax_updateBulkCustomerRecord.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {bulk_customer_id:bulk_customer_id, bulk_customer_name:bulk_customer_name, 
            sample_reported:sample_reported, testing_charges:testing_charges, remark:remark  },
          success:function(result)
          {
              $('#newcustomerModel').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
        
  }



  function manpoweravailability(transaction_id)
  {
    

     $('#manpoweravailability').modal('hide');

    var manpower_available_id=$('#manpower_available_id').val();
    var designation_id=$('#designation_id').val();
    var from_lab=$('#from_lab').val();
    var from_other=$('#from_other').val();
    var total=$('#total').val();

    var id=transaction_id;

     $.ajax({
          url:"assets/js/ajax/ajax_GetManpowerAvailabilityRecord.php", 
           type: "post",
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
             
        $('#manpower_available_id').val(result[0].manpower_available_id);
        $('#designation_id').val(result[0].designation_id);
        $('#from_lab').val(result[0].from_lab);
        $('#from_other').val(result[0].from_other);
        $('#total').val(result[0].total);
                          
                    
       }
         }); 

  }


  function updatemanpoweravailability()
  {

     $('#manpoweravailability').modal('hide');

    var manpower_available_id=$('#manpower_available_id').val();
    var designation_id=$('#designation_id').val();
    var from_lab=$('#from_lab').val();
    var from_other=$('#from_other').val();
    var total=$('#total').val();
   
   $.ajax({
          url:"assets/js/ajax/ajax_updateMapnoweravaialbiltiyRecord.php", 
          type: "post",
          dataType: 'json',
          data: {manpower_available_id:manpower_available_id, designation_id:designation_id, 
            from_lab:from_lab, from_other:from_other, total:total  },
          success:function(result)
          {
              $('#manpoweravailability').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
  }


function manpowerutilisation(transaction_id)
  {
     $('#manpowerutilisation').modal('hide');

    var manpower_transaction_id=$('#manpower_transaction_id').val();
    var technical_manpower=$('#technical_manpower').val();
    var working_day=$('#working_day').val();
    var extra_man_day=$('#extra_man_day').val();
    var addtional_working=$('#addtional_working').val();
    var total_a=$('#total_a').val();
    var special_work=$('#special_work').val();
    var deputation=$('#deputation').val();
    var leave_day=$('#leave_day').val();
    var total_b=$('#total_b').val();
    var total_c=$('#total_c').val();
    var total_s=$('#total_s').val();
    var average_op=$('#average_op').val();
    var total_p=$('#total_p').val();
    var average_pm=$('#average_pm').val();

    var id=transaction_id;

     $.ajax({
          url:"assets/js/ajax/ajax_GetManpowerUtilisationRecord.php", 
           type: "post",
      dataType: 'json',
      data: {id:id},
      success:function(result)
      {
        $('#manpower_transaction_id').val(result[0].manpower_transaction_id);
        $('#technical_manpower').val(result[0].technical_manpower);
        $('#working_day').val(result[0].working_day);
        $('#extra_man_day').val(result[0].extra_man_day);
        $('#addtional_working').val(result[0].addtional_working);
        $('#total_a').val(result[0].total_a);
        $('#special_work').val(result[0].special_work);
        $('#deputation').val(result[0].deputation);
        $('#leave_day').val(result[0].leave_day);
        $('#total_b').val(result[0].total_b);
        $('#total_c').val(result[0].total_c);
        $('#total_s').val(result[0].total_s);
        $('#average_op').val(result[0].average_op);
        $('#total_p').val(result[0].total_p);
        $('#average_pm').val(result[0].average_pm);         
       }
         }); 
  }


  function updatemanpowerutilisation()
  {

     $('#manpowerutilisation').modal('hide');

    var manpower_transaction_id=$('#manpower_transaction_id').val();
    var technical_manpower=$('#technical_manpower').val();
    var working_day=$('#working_day').val();
    var extra_man_day=$('#extra_man_day').val();
    var addtional_working=$('#addtional_working').val();
    var total_a=$('#total_a').val();
    var special_work=$('#special_work').val();
    var deputation=$('#deputation').val();
    var leave_day=$('#leave_day').val();
    var total_b=$('#total_b').val();
    var total_c=$('#total_c').val();
    var total_s=$('#total_s').val();
    var average_op=$('#average_op').val();
    var total_p=$('#total_p').val();
    var average_pm=$('#average_pm').val();

   $.ajax({
          url:"assets/js/ajax/ajax_updateMapnowerUtilisationRecord.php", 
          type: "post",
          dataType: 'json',
          data: {manpower_transaction_id:manpower_transaction_id,technical_manpower:technical_manpower, working_day:working_day, extra_man_day:extra_man_day,addtional_working:addtional_working, total_a:total_a, special_work:special_work, deputation:deputation, leave_day:leave_day, total_b:total_b, total_c:total_c, total_s:total_s, average_op:average_op, total_p:total_p, average_pm:average_pm  },
          success:function(result)
          {
              $('#manpowerutilisation').modal('hide');
                if(result=='1')
                {
                    refreshPage();
                }
                else if(result='0')
                {
                  showMessage();
                }
            }
         }); 
  }



      

     

function refreshPage()
  {
    location.reload(true);
  }

  function showMessage()
  {
    alert("Details Not updated, Kindly Contact Head Office, Mumbai..!!");
  }

  


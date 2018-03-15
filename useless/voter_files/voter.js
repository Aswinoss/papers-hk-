$(document).ready(function(){
  
  $("#take_pledge").click(function() {
    $("#take_pledge_div").dialog("open");
  });
  
  $("#close_pledge").click(function() {
    $("#take_pledge_div").dialog("close");
    $("#pledge_school_city_div").hide();
  });
  
  // Check fields before submitting pledge form
  $("#pledge_form").submit(function(event) {
    event.preventDefault();
    if (!CheckForm() || !$(".pledge_registered_as_voter").is(":checked") || !$(".pledge_would_like_to_volunteer").is(":checked") 
      || !$("#pledge_1").is(":checked") || !$("#pledge_2").is(":checked")) {
      $("#pledge_form_error").show();
      return false;
    } else {
      $("#pledge_form_error").hide();
    }
    $.post($(this).attr("action"), 
      {
       full_name: $("#pledge_full_name").val(),
       pin_code: $("#pledge_pin_code").val(),
       state: $("#pledge_state").val(),
       city: $("#pledge_city").val(),
       phone_number: $("#pledge_phone_number").val(),
       email_address: $("#pledge_email_address").val(),
       registered_as_voter: $(".pledge_registered_as_voter:checked").val(),
       would_like_to_volunteer: $(".pledge_would_like_to_volunteer:checked").val(),
       school_city: $("#pledge_school_city").val(),
       school_name: $("#pledge_school_name").val(),
       source: $("#pledge_source").val()
      }
    );

    $("#pledge_step1").addClass("hidden");
    $("#post_pledge_registration_message").toggle(!($(".pledge_registered_as_voter:checked").val() == "True"));
    $("#pledge_step2").removeClass("hidden");
    $("#pledge_form")[0].reset();
    return false;
  });

  $("#close_pledge_form").click(function() {
    $("#take_pledge_div").dialog("close");
    $("#pledge_step1").removeClass("hidden");
    $("#pledge_step2").addClass("hidden");
  });

  // Function to populate the pledge state and city dropdowns from pincode
  $("#pledge_pin_code").blur(function() {
    var pincode = $(this).val();
    var pattern = new RegExp($(this).attr("validation_pattern"), "i");
    if (pincode != "" && pincode.match(pattern)) {
      populateDropdownsFromPincode($("#pledge_state.state_dropdown"), null, null, $("#pledge_city"), null, pincode);
    }
  });

  //Populate city and school dropdowns when state is selected
  var pledge_schools = {};
  $("#pledge_state").change(function() {
    $("#pledge_school_city").html('<option value="">Select City</option>');
    var state = $(this).val();
    $.getJSON("/school/list?state=" + $(this).val(), function(data) {
      pledge_schools = data;
      if (data['error'] == "") {
        pledge_school_cities = [];
        for (var city in data['entries']) {
          pledge_school_cities.push(city);
        }
        pledge_school_cities.sort();
        for (var i in pledge_school_cities) {
          $("#pledge_school_city").append('<option value="' + pledge_school_cities[i] + '">' + pledge_school_cities[i] + '</option>');
        }
        if (pledge_school_cities.length > 0) $("#pledge_school_city_div").show();
        else $("#pledge_school_city_div").hide();
      } 
    });
    $("#pledge_school_name").html('<option value="">Select School</option>');
  });
  
  $("#pledge_school_city").change(function() {
    $("#pledge_school_name").html('<option value="">Select School</option>');
    var city = $(this).val();
    var pledge_school_names = pledge_schools['entries'][city];
    for (var i in pledge_school_names) {
      $("#pledge_school_name").append('<option value="' + pledge_school_names[i] + '">' + pledge_school_names[i] + '</option>');
    }
  });

  $("#residing_since.date_field, #declaration_date.date_field, #previously_registered_epic_issue_date.date_field, #dob.date_field").datepicker("option", "maxDate", 0);
  $("#declaration_date.date_field").datepicker("option", "showOn", "focus");
  
  if (typeof voter_state != "undefined") {
    load_states_dropdown($("#state.state_dropdown"), voter_state);
    if (typeof voter_district != "undefined") {
      load_districts_dropdown($("#district.district_dropdown"), voter_state, voter_district);
      if (typeof voter_assembly_constituency != "undefined") load_assembly_constituencies_dropdown($("#assembly_constituency.assembly_constituency_dropdown"), voter_state, voter_district, voter_assembly_constituency);
    }
  }
  
  if (typeof pob_state != "undefined") {
    load_states_dropdown($("#pob_state.state_dropdown"), pob_state);
    if (typeof pob_district != "undefined") {
      load_districts_dropdown($("#pob_district.district_dropdown"), pob_state, pob_district);
    }
  }
  
  if (typeof previous_voter_id_state != "undefined") {
    load_states_dropdown($("#previously_registered_state.state_dropdown"), previous_voter_id_state);
  }
  
  // Function to populate the state, district and assembly constituency dropdowns from pincode
  $("#pin_code").blur(function() {
    var pincode = $(this).val();
    var pattern = new RegExp($(this).attr("validation_pattern"), "i");
    if (pincode != "" && pincode.match(pattern))
      populateDropdownsFromPincode($("#state.state_dropdown"), $("#district.district_dropdown"), 
        $("#assembly_constituency.assembly_constituency_dropdown"), $(".town_dropdown"), $(".taluka_dropdown"), pincode);
  });
  
  // Temporarily show a message to users for Edit Form 6
  $("#edit_form_6_tmp_message").dialog({autoOpen: false, width: 300, height: 200, modal: true});
  $("#edit_form_6").click(function() {
    $("#edit_form_6_tmp_message").dialog("open");
  });
  
  // Open FAQ when voter clicks on Eligible to Vote text
  $("#eligible_to_vote").click(function() {$("#faq_tab").click();});
  
  // Populate the review page
  $("#step7_link").click(function(){
   	if($("#state").val() == "Andhra Pradesh")
   	{
   		$('#image_upload').show();
   	}
   	else
   	{
   		$('#image_upload').hide();
   	}
    $(".submit-form-button").removeAttr("disabled");
    $(".review").each(function() {
      var id_field = $(this).attr("id")+"_review";
      $("#" + id_field).html($(this).val());
      
      if (($(this).hasClass("required-field") && ($(this).val() == "" || $(this).val() == 0)) ||
         (($(this).hasClass("needs-validation") || $(this).hasClass("needs-validation2")) && !$(this).hasClass("validated"))) {
        $("#" + id_field).parents("tr").addClass("review_error");
      } else {
        $("#" + id_field).parents("tr").removeClass("review_error");
      }
    });
    
    if (!$(".form_error").is(":hidden") && $(".review_error").size()) {
      $(".form_error").show();
    } else {
      $(".form_error").hide();
    }
  });
  
  // Disable default form submit action
  $("#voter_create_form_6_page_content form").submit(function(e) {
    CheckDeclaration("#declaration_date");
    CheckDeclaration("#declaration_place");
    var self = this;
    if ($(".review_error").size()) {
      $(".form_error").show();
      return false;
    } else {
      $(".form_error").hide();
      $(".form_captcha_error").hide();
      $(".form_submit_message").show();
      /*
      // Make Captcha Ajax call
      $.post("/captcha",
        {
         recaptcha_challenge_field: $("#recaptcha_challenge_field").val(),
         recaptcha_response_field: $("#recaptcha_response_field").val(),
        },
        function(data) {
          if (data === "true") {
            self.submit();
          } else {
            $(".form_submit_message").hide();
            $(".form_captcha_error").show();
          }
        }
      );
      return false; //prevent submit by default
      */
      return true;
    }
  });
  
  // Set the dob day/month/year fields whenever dob is changed and check if age >=18
  $("#dob").blur(function() {
    CheckValue($(this));
    CheckForm();
    var dob = $(this).val();
    var pattern = new RegExp($(this).attr("validation_pattern"), "i");
    var moment_format = $(this).attr("moment_format");
    var match = pattern.exec(dob);
    // Ensure match worked properly
    if (match != null && match.length == 4 && moment_format != "") {
      var birthDate = moment(dob, moment_format);
      var todayDate = moment().date(1).month(0); //1st Jan of current year
      
      //Convert to numeric values to store in backend
      $("#dob_day").val(birthDate.format("DD"));
      $("#dob_month").val(birthDate.format("MM"));
      $("#dob_year").val(birthDate.format("YYYY"));
      
      var age_years = (todayDate.year() - birthDate.year());
      var age_months = (todayDate.month() - birthDate.month());
      
      // Handle special cases
      if (age_months < 0) {
          age_years--;
          age_months = 12 + age_months;
      } else if (age_months == 0 && todayDate.date() < birthDate.date()) {
          age_years--;
          age_months = 11;
      }
      
      $("#age_years").val(age_years);
      $("#age_months").val(age_months);
      if (age_years < 18) {
        $(this).removeClass("validated").parent().addClass("has-error");
        $(this).siblings(".needs-validation-error2").addClass("show").removeClass("hidden");
      } else {
        $(this).addClass("validated").parent().removeClass("has-error");
        $(this).siblings(".needs-validation-error2").removeClass("show").addClass("hidden");
      }
    }
  });
  
  // Check that Residing Since is older than 6 months
  $("#residing_since").blur(function() {
    CheckValue($(this));
    CheckForm();
    var residing_since = $(this).val();
    var pattern = new RegExp($(this).attr("validation_pattern"), "i");
    var moment_format = $(this).attr("moment_format");
    var match = pattern.exec(residing_since);
    // Ensure match worked properly
    if (match != null && match.length == 4 && moment_format != "") {
      residingDate = moment(residing_since, moment_format);
      todayDate = moment();
      
      var age_years = (todayDate.year() - residingDate.year());
      var age_months = (todayDate.month() - residingDate.month());
  
      if (age_years == 0 && (age_months < 6 || age_months == 6 && todayDate.getDate() < residingDate.getDate())) {
        $(this).removeClass("validated").parent().addClass("has-error");
        $(this).siblings(".needs-validation-error2").addClass("show").removeClass("hidden");
      } else {
        $(this).addClass("validated").parent().removeClass("has-error");
        $(this).siblings(".needs-validation-error2").removeClass("show").addClass("hidden");
      }
    }
  });
  
  // Common code to check Declaration Date/Place fields
  function CheckDeclaration(obj) {
    if (($(obj).hasClass("required-field") && ($(obj).val() == "" || $(obj).val() == 0)) ||
         (($(obj).hasClass("needs-validation") || $(obj).hasClass("needs-validation2")) && !$(obj).hasClass("validated"))) {
        $(obj).parents(".form-group").addClass("review_error");
    } else {
      $(obj).parents(".form-group").removeClass("review_error");
    }
  }

  // Ensure Declaration Date and Place fields do not disable Submit button 
  $("#declaration_date, #declaration_place").blur(function() {
    CheckValue($(this));
    CheckForm();
    CheckDeclaration($(this));
    $(".submit-form-button").removeAttr("disabled");
  });
  
  // Check to see if the fields on a particular screen have all been properly filled,
  // and change sidebar images accordingly 
  $("#voter_create_form_6_page_content .switch_tab").click(function () {
    // If clicking on one of the Previous/Next buttons, trigger click on the corresponding link
    var pattern = /step\d+_(step\d+)_button/g;
    var match = pattern.exec($(this).attr("id"));
    if (match != null) {
      var step = match[1];
      $("#" + step + "_link").click();
    }
    // Find currently active step and check all fields for it
    pattern = /(step\d+)_link/g;
    match = pattern.exec($("#nav_sidebar li.active a").attr("id"));
    if (match != null) {
      var active_step = match[1];
      $(".tab-pane#" + active_step).each(function() {
        var required_and_empty = $(this).find(".required-field").filter(function() {
                                   var val = $(this).val();
                                   return val == "" || val == 0;
                                }).size();
        var need_validation_and_invalid = $(this).find(".needs-validation").not(".validated").size() + $(this).find(".needs-validation2").not(".validated").size();
        var tab_id = $(this).attr("id");
        if (required_and_empty + need_validation_and_invalid > 0) {
          $("#" + tab_id + "_link").removeClass("complete");
        } else {
          $("#" + tab_id + "_link").addClass("complete");
        }
      });
    }
  });
  
  
  //Code to detect browser platform
  $(function() {		
				
				$("#app_msg").dialog({
						height: 300,
						width:$(window).width()*(0.70),
						autoOpen: false,
						modal:true,
						buttons: {
								Yes: function(){
									window.location.assign("https://play.google.com/store/apps/details?id=org.ovbi.voterregistration");
								},
       							 No: function() {
          						$( this ).dialog( "close" );
        						}
      						}
				});
  				if(jQuery.browser.mobile){ 
  				$("#app_msg").dialog("open"); 	
  				}

		});
		
  
  // Function to check search parameters for Search Drives
  $("#voter_landing_page_content #search_drive_submit").click(function checkSearchDrivesSelection(){

    var pincode = $("#pincode").val();
    var state = $("#state").val();
    var district = $("#district").val();
    var constituency = $("#consti").val();
 
    if(pincode || (state && district && constituency)){
      document.getElementById('search_drives_form').submit();
    }
    else{
      $('#voter_search_help').removeClass('hidden');
    }
  });
});

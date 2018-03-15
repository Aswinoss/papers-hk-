//Load Country
function load_country_dropdown(country_dropdown,country){
 	var countries = Object.keys(country_state);
 	countries.push("India");
 	countries.sort();
 	default_text = "Select a Country";
  if ($(country_dropdown).hasClass("dropdown_is_search_filter")) default_text = "Show All";
  $(country_dropdown).html("<option value=''>" + default_text + "</option>");
  for (var i = 0; i < countries.length; i++) {
    var s = countries[i];
    $(country_dropdown).append("<option value='" + s + "'>" + s + "</option>");
  }

  if (typeof country != "undefined") {
    $(country_dropdown).val(country);
    var $form = $(country_dropdown).closest("form");
    handleDistrictAndAssembly($(country_dropdown).val(), $($form).find(".initiative").val(), $($form));
  }
}	
function load_state_for_country(stateDropdown,country,state){
 	default_text = "Select a State";
  	if ($(stateDropdown).hasClass("dropdown_is_search_filter")) default_text = "Show All";
 	 $(stateDropdown).html("<option value=''>" + default_text + "</option>");
  	if (typeof country != "undefined" && country != "" && country != "Other") {
		var states=[] ;
		var keys_country = Object.keys(country_state);
		for (var i = 0; i < keys_country.length; i++) {
		   if( country == keys_country[i]) {  
	    	 	country_state[country].forEach(function (item) {
	    	 			states.push(item); });
	    	}
	    }
		states.sort();
	    for (var i = 0; i < states.length; i++) {
	      var d = states[i];
	      $(stateDropdown).append("<option value='" + d + "'>" + d + "</option>");
	    }
    	 $(stateDropdown).val(state);
 	 }
 	 $(stateDropdown).append("<option value='Other'>Other</option>").siblings(".other").hide();
}

//Load the States
function load_states_dropdown(state_dropdowns, state) {
  states = Object.keys(state_dist_const);
  var indian_state = false;
  states.sort();
  default_text = "Select a State";
  if ($(state_dropdowns).hasClass("dropdown_is_search_filter")) default_text = "Show All";
  $(state_dropdowns).html("<option value=''>" + default_text + "</option>");
  for (var i = 0; i < states.length; i++) {
    var s = states[i];
    if( s == state){
    	indian_state = true; // For non-indian states the dropdown would show a blank value since the last loop would fail
    }
    $(state_dropdowns).append("<option value='" + s + "'>" + s + "</option>");
  }
  //$(state_dropdowns).append("<option value='Other'>Other</option>");
  if (typeof state != "undefined" && indian_state) {
  	$(state_dropdowns).val(state);
  }
}

//Load the Districts
function load_districts_dropdown(district_dropdowns, state, district) {
  default_text = "Select a District";
  if ($(district_dropdowns).hasClass("dropdown_is_search_filter")) default_text = "Show All";
  $(district_dropdowns).html("<option value=''>" + default_text + "</option>");
  var country = $(district_dropdowns).closest(".dropdowns_div").find(".country_dropdown").val();
  if (typeof country == "undefined" || country == "India"){
  		if (typeof state != "undefined" && state != "" && state != "Other" && state != null) {
  			var state_dist_dict = state_dist_const[state];
  			if(typeof state_dist_dict != "undefined"){
    			var districts = Object.keys(state_dist_dict);
    			districts.sort();
    			for (var i = 0; i < districts.length; i++) {
      					var d = districts[i];
	      				$(district_dropdowns).append("<option value='" + d + "'>" + d + "</option>");
    			}
    			if (typeof district != "undefined") $(district_dropdowns).val(district);
    		}
  		}
  		$(district_dropdowns).append("<option value='Other'>Other</option>").siblings(".other").hide();
  	}
}

//Load the Assembly constituencies
function load_assembly_constituencies_dropdown(assembly_constituency_dropdowns, state, district, assembly_constituency) {
  $("#search_but").attr('disabled', 'disabled');
  default_text = "Select a Constituency";
  if ($(assembly_constituency_dropdowns).hasClass("dropdown_is_search_filter")) default_text = "Show All";
  $(assembly_constituency_dropdowns).html("<option value=''>" + default_text + "</option>");
  if (typeof state != "undefined" && state != "" && state != null && typeof district != "undefined" && district != "" && district != "Other") {
    	var state_dist_dict = state_dist_const[state];
    	if(typeof state_dist_dict != "undefined"){
    				var districts = state_dist_dict;
    				if ( typeof district != "undefined" && district != "None")
    				{
    						var assembly_constituencies = districts[district];    				
    						assembly_constituencies.sort();

    						for (var i = 0; i < assembly_constituencies.length; i++) {
      										var ac = assembly_constituencies[i];
      								$(assembly_constituency_dropdowns).append("<option value='" + ac + "'>" + ac + "</option>");
    						}
    				}
    	}
    if (typeof assembly_constituency != "undefined") $(assembly_constituency_dropdowns).val(assembly_constituency);
  }
  $(assembly_constituency_dropdowns).append("<option value='Other'>Other</option>").siblings(".other").hide();
}

//Hide District and Assembly Constituency for certain Initiative values #BAD LOGIC
function handleDistrictAndAssembly(country, initiative, $form) {
  var pattern1 = new RegExp("voter", "i");
  var pattern2 = new RegExp("election", "i");
  if (country != 'India') {
    $($form).find(".district_dropdown_div").css("visibility", "hidden").end()
      .find(".district_dropdown").removeClass("required-field").end()
      .find(".assembly_constituency_dropdown_div").css("visibility", "hidden").end()
      .find(".assembly_constituency_dropdown").removeClass("required-field");
  } else {
    $($form).find(".district_dropdown_div").css("visibility", "visible").end()
      .find(".district_dropdown").removeClass("required-field").end()
      .find(".assembly_constituency_dropdown_div").css("visibility", "visible").end()
      .find(".assembly_constituency_dropdown").removeClass("required-field");
    if (initiative != undefined) {
      if (initiative.match(pattern1) || initiative.match(pattern2)) {
        $($form).find(".district_dropdown").addClass("required-field").end()
          .find(".assembly_constituency_dropdown").addClass("required-field");
      }
    }
  }
}

function handle_other_option(element) {
  if (element) {
    // If "Other" is selected, show input textbox for other option, and shift attributes
    if ($(element).val() == "Other") {
      $(element).siblings(".other").attr("id", $(element).attr("id")).attr("name", $(element).attr("name")).show();
      $(element).attr("other", "true").removeAttr("id").removeAttr("name");
    } else {
      if ($(element).attr("other") == "true") {
        $(element).removeAttr("other").attr("id", $(element).siblings(".other").attr("id")).attr("name", $(element).siblings(".other").attr("name"));
      }
      $(element).siblings(".other").removeAttr("id").removeAttr("name").hide();
    }
  }
}

// Populate given list of entries as a dropdown for given element, converting it into a dropdown if it's not one already
function populate_as_dropdown(element, entries, default_text) {
  if (element) {
    var name_attr = $(element).attr("name");
    var id_attr = $(element).attr("id");
    var class_attr = $(element).attr("class");
    var other_attr = $(element).attr("other");
    my_events = $._data( $(element)[0], "events");
    if (entries.length > 0) {
      var new_element = $("<select></select>", {"id": id_attr, "class": class_attr, "name": name_attr, "other": other_attr});
      if (my_events) {
        $.each(my_events, function (i, event) {
          $.each(event, function (j, v){
            $(new_element).on(i, v.handler);    
          });
        });
      }
      $(element).replaceWith(new_element);
      $(new_element).html("<option value=''>" + default_text + "</option>");
      for (var i = 0; i < entries.length; i++) {
        $(new_element).append("<option value='" + entries[i] + "'>" + entries[i] + "</option>");
      }
      $(new_element).append("<option value='Other'>Other</option>");
      if (entries.length == 1) {
        $(new_element).val(entries[0]);
        $(new_element).trigger("change");
      }
      handle_other_option(new_element);
    }
  }
}

//Load the State/District/AssemblyConstituency dropdowns given a pincode
function populateDropdownsFromPincode(state_dropdown, district_dropdown, assembly_constituency_dropdown, city_dropdown, taluka_dropdown, pincode) {
  var params = "pincode=" + pincode;
  var http = new XMLHttpRequest();
  http.open("GET", "/pincode?" + params, true);
  http.send(null);

  http.onreadystatechange=function(){
    if (http.readyState==4 && http.status==200) {
      var pincode_to_places = JSON.parse(http.responseText);
      populate_as_dropdown(state_dropdown, pincode_to_places["state"], "Select a State");
      populate_as_dropdown(district_dropdown, pincode_to_places["district"], "Select a District");
      populate_as_dropdown(assembly_constituency_dropdown, pincode_to_places["assembly"], "Select a Constituency");
      populate_as_dropdown(city_dropdown, pincode_to_places["city"], "Select a City");
      populate_as_dropdown(taluka_dropdown, pincode_to_places["taluka"], "Select a Taluka");
    }
  }
}


  function CheckValue(obj) {
  var value = obj.val();
    if (obj.hasClass("required-field")) {
      if (value=="") {
        obj.parent().addClass("has-error");
        obj.siblings(".required-field-error").addClass("show").removeClass("hidden");
        return;
      } else {
        obj.parent().removeClass("has-error");
        obj.siblings(".required-field-error").removeClass("show").addClass("hidden");
      }
    }

    if (obj.hasClass("needs-validation")) {
    	if( value != "")
    	{
		      var pattern = new RegExp(obj.attr("validation_pattern"), "i");
      		  if (!value.match(pattern)) {
        	  obj.removeClass("validated").parent().addClass("has-error");
        	  obj.siblings(".needs-validation-error").addClass("show").removeClass("hidden");
        	  return;
      		} else {
        		obj.addClass("validated").parent().removeClass("has-error");
        		obj.siblings(".needs-validation-error").removeClass("show").addClass("hidden");
      		}
        }else{
     		obj.addClass("validated").parent().removeClass("has-error");
            obj.siblings(".needs-validation-error").removeClass("show").addClass("hidden");     	
     	}
     }
      if (obj.hasClass("needs-validation2")) {
      var pattern = new RegExp(obj.attr("validation_pattern"), "i");
      if (value.length > 0 && !value.match(pattern)) {
        obj.removeClass("validated").parent().addClass("has-error");
        obj.siblings(".needs-validation-error").addClass("show").removeClass("hidden");
        return;
      } else {
        obj.addClass("validated").parent().removeClass("has-error");
        obj.siblings(".needs-validation-error").removeClass("show").addClass("hidden");
      }
      }
      if (obj.hasClass("needs-email-validation")) {
      if ( value != ""){
      var pattern = new RegExp(obj.attr("validation_pattern"), "i");
      if (!value.match(pattern)) {
        obj.removeClass("validated").parent().addClass("has-error");
        obj.siblings(".needs-validation-error").addClass("show").removeClass("hidden");
        return;
      } else {
        obj.addClass("validated").parent().removeClass("has-error");
        obj.siblings(".needs-validation-error").removeClass("show").addClass("hidden");
      }
      }
      else
      {
        obj.addClass("validated").parent().removeClass("has-error");
        obj.siblings(".needs-validation-error").removeClass("show").addClass("hidden");
        }
      }
	  
      if (obj.hasClass("email-spell-check")){
      	
      	var valid = true;
      	var email = obj.val().toLowerCase();
      	var dom_index = email.indexOf('@');
      	var long_domain = email.substring(dom_index+1);
      	var domain = long_domain.substring(0,long_domain.indexOf('.'));
      	var ext = long_domain.substring(long_domain.indexOf('.')+1)

        if (email != "") {
        	if ( domain_keys.indexOf(domain.substr(0,1)) != -1){
        		      		
        		if ((domain_dict[domain.substr(0,1)].indexOf(domain.substring(1))) == -1){
        			valid = false;
        		}
        		
        	}
        	
        	if(valid){
        		if ( domain_keys.indexOf(domain.substr(0,2)) != -1){
        		      		
        			if ((domain_dict[domain.substr(0,2)].indexOf(domain.substring(2))) == -1){
        				valid = false;
        			}	
        		
        		}	
        	}
        	
        	
        	if (ext.indexOf('.') != -1) {  //look in cctld
        	
        		var temp_ext = ext.substring(ext.indexOf('.')+1);
        		if ( cctld.indexOf(temp_ext) == -1){
        			valid = false
        		}
        	}else{      	
        	
        	//if (ext.length > 2){
        		if (tld.indexOf(ext) == -1){
        			valid = false;
        		}
        	}
        }
      	if(!valid){
      		obj.parent().addClass("has-error");
      		obj.siblings(".email-spell-check-error").addClass("show").removeClass("hidden");
      	}
      	else{
      		obj.siblings(".email-spell-check-error").removeClass("show").addClass("hidden");
      		obj.parent().removeClass("has-error");
      	}
      }
      
      
  }

// Called after most of the fields of the forms in the site and checks that all data requirement and data validation is ok
  function CheckForm($obj) {
    var $form = $($obj).closest("form");
    var required_and_empty = $($form).find(".required-field").filter(function() {
                                 var val = $(this).val();
                                 return val == "" || val == 0;
                              }).size();
    var need_validation_and_invalid = $($form).find(".needs-validation").not(".validated").size() + $(".needs-validation2").not(".validated").size() ;
    /*var radios = $("input.radio-drive-type").length;
    var radio_selected = $($form).find("input.radio-drive-type:checked").length || -1;
    var radio_button_need_validation=0;
    if ( radio_selected < 1 )
    { 
      if(required_and_empty + need_validation_and_invalid == 0)
      {
          $("#drive-warn").addClass("show").removeClass("hidden");
        }
    radio_button_need_validation = 1;
   }
   if (radios == 0)
   {
    radio_button_need_validation = 0;
   }*/
    
    if (required_and_empty + need_validation_and_invalid > 0 ) {
    //if (required_and_empty + need_validation_and_invalid + radio_button_need_validation >= 1 ) {
      $($form).find(".submit-form-button").attr("disabled","disabled");
    } else {
      $($form).find(".submit-form-button").removeAttr("disabled");
    }
    
    return (required_and_empty + need_validation_and_invalid < 1);
    //return (required_and_empty + need_validation_and_invalid + radio_button_need_validation < 1);  
  }

 // list of current emails from volunteer_create_drive.html
  var volunteer_emails = volunteer_emails? volunteer_emails : '';
  
//function get_drives_const(d) {
//	drives_const = d;
//}

function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

// General purpose function for volunteer_hangout.js and volunteer_email.js
function isVolunteerName(name){  
  if ( name.length >0 && name.toLowerCase() != 'none')
     return true;
  else 
    return false;
}

/***************************************************/
/* Functions for loading event_type and initiatives */
/****************************************************/
function get_event_initiative(obj){  
  event_initiative = obj;
}

function load_initiative_types() {
  Object.keys(event_initiative).sort().forEach(function (item) {
    $("#initiative").append("<option value='" + item+ "'>" + item + "</option>"); 
  });

  load_event_types(cur_initiative);
  $("#initiative").val(cur_initiative);
  $("#event_type").val(cur_event_type);
  var $form = $(this).closest("form");
  handleDistrictAndAssembly($($form).find(".country_dropdown").val(), cur_initiative, $($form));
}

function load_event_types(initiative) {
  if (initiative!="") {
    $("#event_type option:not(:first-child)").remove();
    event_initiative[initiative].sort().forEach(function (item) {
      $("#event_type").append("<option value='" + item+ "'>" + item + "</option>"); 
    });
  }
}

function CheckFormFull(form) {
  $(form).find("input,textarea,select").each(function() {
    CheckValue($(form));
  });
  if (!CheckForm($(form))) { // Form has errors
    $(form).find(".submit-form-message").show();
    return false;
  } else {
    $(form).find(".submit-form-message").hide();
    return true;
  }
}

/****************************************************/

$(document).ready(function(){
	
	//if (typeof volunteer_state != "undefined") {
  if (typeof volunteer_country != "undefined") {
  	load_country_dropdown($(".country_dropdown"),volunteer_country);
  }
  	if (typeof volunteer_state != "undefined" ){
  			if ((typeof volunteer_country != "undefined" && volunteer_country == "India" ) || typeof volunteer_country == "undefined"){
  		    	load_states_dropdown($(".state_dropdown"), volunteer_state);
  		    	if (typeof volunteer_district != "undefined") {
      				load_districts_dropdown($(".district_dropdown"), volunteer_state, volunteer_district);
      				if (typeof volunteer_assembly_constituency != "undefined") {
      						load_assembly_constituencies_dropdown($(".assembly_constituency_dropdown"), volunteer_state, volunteer_district, volunteer_assembly_constituency);
      				}
    			}
    		}else if (typeof volunteer_country != "undefined" && volunteer_country != "India" ){
  					load_state_for_country(".state_dropdown",volunteer_country,volunteer_state);
  					}
   		}
   
  	
  load_drives_dropdown();
   
  if (typeof(enable_disable_search_button) === 'function')  { 
  	enable_disable_search_button();
  }
  
  $(".country_dropdown").change(function(){
    if($(this).val() == "India"){
      load_states_dropdown($(this).closest(".dropdowns_div").find(".state_dropdown"), volunteer_state);
      load_districts_dropdown($(this).closest(".dropdowns_div").find(".district_dropdown"), $(this).closest(".dropdowns_div").find(".state_dropdown").val());
      load_assembly_constituencies_dropdown($(this).closest(".dropdowns_div").find(".assembly_constituency_dropdown"), $(this).val());
      $(this).closest(".dropdowns_div").find(".district_dropdown").removeAttr("disabled").end().find(".district_dropdown_div").css("visibility", "visible");
      $(this).closest(".dropdowns_div").find(".assembly_constituency_dropdown").removeAttr("disabled").end().find(".assembly_constituency_dropdown_div").css("visibility", "visible");
    }else if($(this).val() != "India"){
      $(this).closest(".dropdowns_div").find(".district_dropdown").removeClass("required-field").attr("disabled","disabled").end().find(".district_dropdown_div").css("visibility", "hidden");
      $(this).closest(".dropdowns_div").find(".assembly_constituency_dropdown").removeClass("required-field").attr("disabled","disabled").end().find(".assembly_constituency_dropdown_div").css("visibility", "hidden");
      load_state_for_country($(this).closest(".dropdowns_div").find(".state_dropdown"), $(this).val(),volunteer_state);
      $(this).closest(".dropdowns_div").find(".district_dropdown").val(""); // Reset to default
      $(this).closest(".dropdowns_div").find(".assembly_constituency_dropdown").val(""); // Reset to default;
    }
    var $form = $(this).closest("form");
    handleDistrictAndAssembly($(this).val(), $($form).find(".initiative").val(), $($form));
  });
  
  $(".state_dropdown").change(function() {
    //handle_other_option(this);
    if( $('.district_dropdown').is(':visible')) {
    	load_districts_dropdown($(this).closest(".dropdowns_div").find(".district_dropdown"), $(this).val());
    	load_assembly_constituencies_dropdown($(this).closest(".dropdowns_div").find(".assembly_constituency_dropdown"), $(this).val());
 	}
  });

  $(".district_dropdown").change(function() {
    var state_obj = $(this).closest(".dropdowns_div").find(".state_dropdown");
    var state;
    if (state_obj.size()) state = state_obj.val();
    else state = volunteer_state;
    handle_other_option(this);
    load_assembly_constituencies_dropdown($(this).closest(".dropdowns_div").find(".assembly_constituency_dropdown"), state, $(this).val());
  });
  
	$(".assembly_constituency_dropdown").change(function() {
	 	handle_other_option(this);
 	 	if (typeof(loadMyDrives) === 'function')  { 
 	 		loadMyDrives()
 	 	}
	}); 	

  $(".other_dropdown").change(function() {
    handle_other_option(this);
  });

//load drives dropdown on reload after a search is performed 
function load_drives_dropdown(){
	if ( $(".assembly_constituency_dropdown").val() != '' )
	{
		if (typeof(loadMyDrives) === 'function')  {
		loadMyDrives()
		}
	}
	}
	
	 
	 /*function load_drives_dropdown(volunteer_drives){
 //	$(".drive_dropdown").html("<option value=''>Show All</option>");
 //	drives = Object.keys(volunteer_drives);
 	drives.sort();
    for (var i = 0; i < drives.length; i++) {
      var d = drives[i];
      $(".drive_dropdown").append("<option value='" + d + "'>" + d + "</option>");
    }
  }
  */
  
  // Convert event local dates/times to user local dates/times (for Event Search and My Events pages)
  $(".report_date_local_to_event").each(function() {
    var $parent = $(this).closest(".dates_div");
    var $report_date = $($parent).find(".report_date");
    if ($(this).text != "") {
      var report_date_local_to_user = moment($(this).text()).format("D MMM YYYY");
      $($report_date).text(report_date_local_to_user);
    }
  });
  $(".start_date_local_to_event").each(function() {
    var $parent = $(this).closest(".dates_div");
    var $start_date = $($parent).find(".start_date");
    if ($(this).text != "") {
      var start_date_local_to_user = moment($(this).text()).format("D MMM YYYY, hh:mm a");
      $($start_date).text(start_date_local_to_user);
    }
  });
  $(".end_date_local_to_event").each(function() {
    var $parent = $(this).closest(".dates_div");
    var $end_date = $($parent).find(".end_date");
    if ($(this).text != "") {
      var end_date_local_to_user = moment($(this).text()).format("D MMM YYYY, hh:mm a");
      var user_timezone = jstz.determine().name();
      var user_timezone_abbr = moment(end_date_local_to_user).tz(user_timezone).format('z');
      $($end_date).text(end_date_local_to_user + " (" + user_timezone_abbr + ")");
    }
  });
  
  // Hiding some search filters at start; Must happen after loading of state/district/constituency above
  var con_dom = $("#consti_div");
  var status_dom = $("#status_div");
  var drive_dom = $("#drive_div")
  if ($("#district").val() == '') {
    $(con_dom).hide(); $("#con_head").hide();
    $(status_dom).hide(); $("#stat_head").hide();
    $(drive_dom).hide(); $("#drive_head").hide();
  }
  //if ($("#status").val() == 'all') { $(status_dom).hide(); $("#stat_head").hide();}
  //if ($("#drive").val() == 'all') { $(drive_dom).hide(); $("#drive_head").hide();}

   // Remove email invalid warning when user focuses on the text box again
  $("#email, #search_term").focus(function(){
    $("#warning").text("");
  });

  // When the user navigates out of the text box, check for validate the email string
  $("#email,#search_term").blur(function(){

    	var email = 'testing';
    	email=$(this).val();

  		var verified = true;
  		//var emailReg = /^([a-zA-Z0-9][\w-\.]*[a-zA-Z0-9]@([a-zA-Z0-9][\w-]+[a-zA-Z0-9]\.)+[a-zA-Z]{2,4})?$/
  		var emailReg = /^[A-Z0-9\._-]+@[A-Z0-9\.-]+\.[A-Z]{2,4}$/i ;
  		if( email.length > 0 )
  		{
  			if( !emailReg.test(email))
  			{
	  			if ($(this).attr('name') != "search_term"){
	  				$("#warning").text(email + " is Not a valid e-mail address");
	  				verified = false;
	  			}
  			}


    		if( !verified )
    		{
    			$( "#search_but").attr('disabled', 'disabled');
    			$("#search_form").bind('submit',function(e){e.preventDefault();});
    		}
    		else
    		{
    			$( "#search_but").removeAttr('disabled', 'disabled');
    			$("#search_form").unbind('submit');
    		}

  		}
  });

//
  $("#district").change(function() {
  	 if(($(this).val()) != '')
  	 	{
  	 		$("#con_head").show();
  	 		//$(con_dom).insertAfter("#district_div");
  	 		$(con_dom).show();

  	 		$("#consti").on("change",function() {
  	 				if((($(this).val()) != '') && (($("#district").val()) != '') )
  	 				{
  	 					$("#stat_head").show();
  	 					//$(status_dom).insertAfter("#consti_div");
  	 					$(status_dom).show();
  	 					$("#drive_head").show();
  	 					//$(drive_dom).insertAfter("#status_div");
  	 					$(drive_dom).show();
  	 				}
  	 			});

  	 	} else {
   			$("#drive_head").hide();
 			$("#drive_div").hide();	 	
  	 	}

	});

	
	//$('.time_field').timepicker({timeFormat: 'H:i:s'});
	/*$('#timefields.time').timepicker({
   'showDuration': true,
   'timeFormat': 'g:ia'}); */
    
  $(".date_field").datepicker({ dateFormat: "dd MM, yy", changeMonth: true, changeYear: true, yearRange: "-100:+1", onSelect: function() {$(this).blur();}, showOn: "focus", buttonImage: "/images/calendar.gif", buttonImageOnly: true });
 

  $(".required-field, .needs-validation").blur(function() {
    CheckValue($(this));
    CheckForm($(this));
  });
  
  // This is for fields which are not required (eg. primary contact email) but need validation if atleast 1 character is entered
   $(".needs-validation2").blur(function() {
    CheckValue($(this));
    CheckForm($(this));
  });
  
  // This is for 
  $(".needs-email-validation").blur(function() {
    CheckValue($(this));
    //CheckForm($(this));
  });
  
  //
  $(".needs-selection").click(function(){
    CheckValue($(this));
    CheckForm($(this));
  });
  
  $(".needs-selection").blur(function() {
    CheckValue($(this));
    CheckForm($(this));
  });
 
  $("select.required-field").change(function() {
    CheckValue($(this));
    CheckForm($(this));
  });
  
   
  // Show or hide volunteer details
  $(".show_hide_volunteer_details").click(function() {
    $("#event_volunteer_details").toggle();
    if ($("#event_volunteer_details").is(":visible")) $(this).text("Hide volunteer details");
    else $(this).text("Show volunteer details");
  });
  
   // Show text to edit additional volunteer name/email address on hover
  // Populate additional volunteer's name/email address on click
  function create_tooltips() {
    $("#additional_volunteers .might-overflow").tooltip({ placement: "left"});
    $("#additional_volunteers .volunteer_name").hover(function() {
      $(this).children(".help-edit").removeClass("hidden");
    }, function() {
      $(this).children(".help-edit").addClass("hidden");
    }).click(function() {
      $(this).addClass("editing");
      var old_name = $(this).attr("volunteer_name");
      var old_email = $(this).attr("volunteer_email");
      var old_combined = old_name + ':' + old_email;
      $(this).attr("value",old_combined);
      $("#volunteer_name").val($(this).attr("volunteer_name"));
      $("#volunteer_email").val($(this).attr("volunteer_email"));
      $("#add_edit_additional_volunteer").html("Edit volunteer");
    });
    }
  create_tooltips();


  // Add volunteer name/email address to Additional Volunteers list in UI (not to database)
  $("#add_edit_additional_volunteer").click(function() {
    $(this).html("Add Volunteer");
    var volunteer_name = $("#volunteer_name").val();
    var volunteer_email = $("#volunteer_email").val().toLowerCase();
    var email_list_to_check = volunteer_emails;
    var email_valid= $("#volunteer_email").hasClass("validated")? true:false;
    var name_valid= $("#volunteer_name").hasClass("validated")? true:false;
    
    $("#volunteer_name").siblings(".needs-validation-error").html("Invalid Name (Only spaces allowed)");
    $("#volunteer_email").siblings(".needs-validation-error").html("Invalid email address");
    
    if ( volunteer_name != "" && volunteer_email != "" && email_valid && name_valid)
    {
    
    var index = email_list_to_check.indexOf(volunteer_email);
    var index2 = $("#volunteers_to_be_added").attr("value").indexOf(volunteer_email);
    if ( index != -1)
    {
    	
    	$(this).siblings(".needs-validation-error").html("This Volunteer already associated with this drive").addClass("show").addClass("invalidated").removeClass("hidden");
    }
    else if ( index2 != -1)
    {
    	$(this).siblings(".needs-validation-error").html("Volunteer already added to this drive").addClass("show").addClass("invalidated").removeClass("hidden");
    }	
    else
    {
    	if ( $(this).siblings(".needs-validation-error").hasClass("invalidated") )
    	{
    		$(this).siblings(".needs-validation-error").removeClass("invalidated");
    		$(this).siblings(".needs-validation-error").addClass("hidden").removeClass("show");
    	}
    	var is_edit = $(".editing").size();
    	
    	// If editing existing volunteer, should replace the entry inplace and also replace 
    	//the new email in the final list sent to backend
    	
    	if ( is_edit > 0)
    	{
    		$(".editing").attr("volunteer_name",volunteer_name);
    		$(".editing").attr("volunteer_email",volunteer_email);
    		$(".editing").html('<a> ' + volunteer_name + '</a><span class="hidden help-edit" style="float:right">Click to edit</span>');
    		var title = volunteer_name + ', ' + volunteer_email;
    		$(".editing").attr("data-original-title", title);
    		var old_value=$(".editing").attr("value");
    		var new_combined = volunteer_name +':'+volunteer_email;
    		$(".editing").attr("value", new_combined);
    		
    		var current_emails=$("#volunteers_to_be_added").attr("value");
    		if ( current_emails.indexOf(old_value) != -1 )
    		{  			
          		var replaced_emails=current_emails.replace(old_value,new_combined);          	       
          		$("#volunteers_to_be_added").attr("value",replaced_emails);
          	}
    		$("#volunteer_name, #volunteer_email").val("");    		
    		$(".editing").parent().children().removeClass("editing");
    	}
    	else
    	{
    	  var volunteer_value = volunteer_name + ':' + volunteer_email;
    		$("#additional_volunteers").append('<div class="additional_volunteer"><img class="icon pointer delete_volunteer" title="Delete this volunteer" \
    		    src="/images/icons/32x32/delete-32x32-blue.png"><div class="might-overflow text-muted capital volunteer_name" \
          	title="' + volunteer_name + ', ' + volunteer_email + '" volunteer_name="' + volunteer_name + '" \
          	volunteer_email="' + volunteer_email + '" value="' + volunteer_value + '"><a> ' + volunteer_name + '</a>\
          	<span class="hidden help-edit" style="float:right">Click to edit</span></div></div>' );
          	
          	var current_emails=$("#volunteers_to_be_added").attr("value");
          	var current_emails_array = current_emails.trim().split(",").filter(function(el) {return el.length != 0});
          	current_emails_array.push(volunteer_value);
          	var new_emails=current_emails_array.join(",");	
          
          	$("#volunteers_to_be_added").attr("value",new_emails);
    	$("#volunteer_name, #volunteer_email").val("");
    	}	
    	}
    }// end of if which checks values
    else
    {    
    	if (volunteer_name == "" )
    	{
    	  $("#volunteer_name").parent().addClass("has-error");
    	  $("#volunteer_name").siblings(".needs-validation-error").addClass("show").addClass("invalidated").removeClass("hidden");
    	 }
    	 if (volunteer_email == "" )
    	 {
    	   $("#volunteer_email").parent().addClass("has-error");
    	  $("#volunteer_email").siblings(".needs-validation-error").addClass("show").addClass("invalidated").removeClass("hidden");
    	 }
    }
    
    	create_tooltips();
  });


// Deletion of volunteers on Drive Details page

$("input.volunteer_checkbox").click(function(){	
	if($(this).is(":checked"))
			{
				var current_keys=$("#volunteers_to_be_removed").attr("value");
				var new_keys=current_keys.trim()+','+($(this).attr("value"));
				var len = current_keys.trim().length;
          		if ( len == 0)
          		{
	          		new_keys = new_keys.substring(1,(new_keys.length));
    	      	}	
    	      
				$("#volunteers_to_be_removed").attr("value",new_keys);
			}
	else		
			{
				var current_keys = $("#volunteers_to_be_removed").attr("value");
				var remove_key_end = $(this).attr("value").trim();
				var remove_key = remove_key_end+',';
				if( current_keys.indexOf(remove_key) != -1)
				{
					var new_keys = current_keys.replace(remove_key,'');
				}
				else if ( current_keys.indexOf(remove_key_end) != 1)
				{
					var new_keys = current_keys.replace(remove_key_end,'');
				}
				$("#volunteers_to_be_removed").attr("value",new_keys);
			}	
	});// End of input.volunteer_checkbox.click

  $(".initiative").change(function() {
    var $form = $(this).closest("form");
    handleDistrictAndAssembly($($form).find(".country_dropdown").val(), $(this).val(), $($form));
    load_event_types($(this).val());
  });
  
  // Disable default form submit action if form has errors
  $("form").submit(function(e) {
    return CheckFormFull($(this));
  });
  
});// End of Document ready


$(document).ready(function(){
	$(window).on('popstate', function (e) {
		var state = e.originalEvent.state;
		if (state !== null) {
			document.title = state.url.split("ent=")[1];
			loadPage(state.url,undefined,false);
		}
	});
    $('.slimscroll').slimscroll();
    initScripts();
});

function initScripts() {
    // To show pace loader
    $(document).ajaxStart(function() { Pace.restart(); });   

    // For Laravel
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} 
    });

    $('.box-header input[name=search]').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $('.search').click();//Trigger search button click event
        }
    });
    
    // To load ajax content in specific div
    $(".quick-ajax").each(function () {
        // Pace.restart();
        // Pace.track(function () {
            $(this).load($(this).attr('data-url'), function(){
                $(this).removeClass('quick-ajax');
            });
        // });
    });
    
}

function loadPage(url, container, async) {
	// Is the URL sent in paramter? Else get it from the objects attribute
	if ( typeof url === 'object' ) url=$(this).attr('href');
	if ( typeof container == 'undefined' ) container="#content ";
	
	$(container).css('opacity','1').load(url, function(response, status, xhr) {
			try {
				response = jQuery.parseJSON(response);
				if(response.status=='ERROR') {
					notify(response.status,response.message);
					$(container).html(response.message);
					$('#loading').hide();
					return false;
				}
				console.log(response);
			} catch(error) {}
			$(container).fadeIn('5000');
			$('#loading').hide();
	});
	return false;
}



var Upload = function (file, url, id) {
    this.file = file;
    this.url = url;
    this.id = id;
};

Upload.prototype.getType = function() {
    return this.file.type;
};
Upload.prototype.getSize = function() {
    return this.file.size;
};
Upload.prototype.getName = function() {
    return this.file.name;
};
Upload.prototype.doUpload = function () {
    var that = this;
    var formData = new FormData();

    // add assoc key values, this will be posts values
    formData.append("file", this.file, this.getName());
    formData.append("id", this.id);

    $.ajax({
        type: "POST",
        url: this.url,
        xhr: function () {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
            	$('#progress-wrp').show();
                myXhr.upload.addEventListener('progress', that.progressHandling, false);
            }
            return myXhr;
        },
        success: function (response) {
        	setTimeout(function() {
           		$('#progress-wrp').hide();
        	},1000)
        	try {
				response = jQuery.parseJSON(response);
	        	console.log(response);
	        	if (response.status!='OK') {
	        		toastr.error(response.msg);
	        	} else {
	        		toastr.success(response.msg);
	        	}
	        } catch {
	        	console.log("Error");
	        }
            // your callback here
        },
        error: function (error) {
            // handle error
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
    });
};

Upload.prototype.progressHandling = function (event) {
    var percent = 0;
    var position = event.loaded || event.position;
    var total = event.total;
    var progress_bar_id = "#progress-wrp";
    if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
    }
    // update progressbars classes so it fits your code
    $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
    $(progress_bar_id + " .status").text(percent + "%");
};

function deleteRow(obj) {
    id = $(obj).attr('data-id');
    name = $(obj).attr('data-name');
    url = $(obj).attr('data-url');
    const willDelete = swal({
      title: "Are you sure?",
      text: 'Are you sure you want to delete '+ name +'?',
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then(willDelete => {
        if (!willDelete) {
            return false;
        }
        Pace.restart();
        Pace.track(function () {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    _method: 'DELETE'
                },
                url: "/"+url+"/"+id+'',
                success: function (response) {
                    try {
                        response = jQuery.parseJSON(response);
                    } catch {}
                    if (response.status!='OK') {
                        toastr.error(response.msg);
                        return false;
                    }
                    $('.row-'+id).fadeOut(1500);
                    toastr.success(response.msg);
                    return true;
                } 
            });
        })
    })
}

function postAjax(data_url, data, callback='', exit = 0)
{
    $.ajax({
         type: 'POST',
         url: data_url,
         data: data,
         success: function (response) {
            try {
                callback();
            } catch(e) { }
            if (exit) {
                return;
            }

            try {
                response = jQuery.parseJSON(response);
            } catch {}
            
            if (response.status!='OK') {
                toastr.error(response.msg);
                return;
            }
            toastr.success(response.msg);
            $('.close').click()
            return;
        },
        error: function() {
            toastr.error("Something went wrong!!");
        }
    });
}


function formatDate(dateObj,format)
{
    var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
    var curr_date = dateObj.getDate();
    var curr_month = dateObj.getMonth();
    curr_month = curr_month + 1;
    var curr_year = dateObj.getFullYear();
    var curr_min = dateObj.getMinutes();
    var curr_hr= dateObj.getHours();
    var curr_sc= dateObj.getSeconds();
    if(curr_month.toString().length == 1)
    curr_month = '0' + curr_month;      
    if(curr_date.toString().length == 1)
    curr_date = '0' + curr_date;
    if(curr_hr.toString().length == 1)
    curr_hr = '0' + curr_hr;
    if(curr_min.toString().length == 1)
    curr_min = '0' + curr_min;

    if(format ==1)//dd-mm-yyyy
    {
        return curr_date + "-"+curr_month+ "-"+curr_year;       
    }
    else if(format ==2)//yyyy-mm-dd
    {
        return curr_year + "-"+curr_month+ "-"+curr_date;       
    }
    else if(format ==3)//dd/mm/yyyy
    {
        return curr_date + "/"+curr_month+ "/"+curr_year;       
    }
    else if(format ==4)// MM/dd/yyyy HH:mm:ss
    {
        return curr_month+"/"+curr_date +"/"+curr_year+ " "+curr_hr+":"+curr_min+":"+curr_sc;
    }
    else if(format ==5)//yyyy-mm-dd
    {
        return curr_year + "-"+curr_month+ "-"+curr_date+ " "+curr_hr+":"+curr_min+":"+curr_sc;
    }
    else if(format ==6)//yyyy-mm-dd
    {
        return curr_hr+":"+curr_min+":"+curr_sc;
    }
}

function compareTime(str1, str2){
    if(str1 === str2){
        return 1;
    }
    var time1 = str1.split(':');
    var time2 = str2.split(':');
    if(eval(time1[0]) > eval(time2[0])){
        return -1;
    } else if(eval(time1[0]) == eval(time2[0]) && eval(time1[1]) > eval(time2[1])) {
        return -1;
    } else {
        return 1;
    }
}

function c(msg) {
    console.log(msg);
}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
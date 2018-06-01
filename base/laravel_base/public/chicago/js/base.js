$(document).ready(function(){
	$(window).on('popstate', function (e) {
		var state = e.originalEvent.state;
		if (state !== null) {
			document.title = state.url.split("ent=")[1];
			loadPage(state.url,undefined,false);
		}
	});
    initScripts();
});

function initScripts() {
    // To show pace loader
    $(document).ajaxStart(function() { Pace.restart(); });
    
    // To load ajax content in specific div
    $(".quick-ajax").each(function () {
        $(this).load($(this).attr('data-url'));
    });

    // For Laravel
	$.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} 
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
    Pace.restart();
    Pace.track(function () {
        id = $(obj).attr('data-id');
        name = $(obj).attr('data-name');
        url = $(obj).attr('data-url');
        if(confirm('Are you sure you want to delete '+ name +'?')) {
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
                        return;
                    }
                    $('.row-'+id).fadeOut("slow");
                    toastr.success(response.msg);
                    return;
                } 
            });
        }
    });
}
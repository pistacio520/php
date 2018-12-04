
		 var onProgress=function(fun){
             	onProgress.onprogress=fun;
             	return function(){
             		var xhr=$.ajaxSettings.xhr();
             		if (typeof onProgress.onprogress !== 'function') {
             			return xhr;
             		}
             		if (onProgress.onprogress && xhr.upload) {
             			xhr.upload.onprogress=onProgress.onprogress;
             		}
             		return xhr;
             	 }; 
             	};          	
		$('#pdffile').on('change',function(){
               var formdata=new FormData();
               formdata.append('pdffile',$('#pdffile')[0].files[0]);
               formdata.append('who','pdffile');
               formdata.append('zid',$('#zid').val());
               $.ajax({
               	url:"http://pbenz.oicp.net/seal/ajax_upload",
               	type:'POST',
               	cache:false,
               	data:formdata,
               	processData:false,
               	contentType:false,
               	xhr:onProgress(function(e){
               		if (e.lengthComputable) {
               			$('#pdffile').nextAll('.progressBar').css('display','inline-block').html(Math.round(e.loaded*100/e.total)+'%');
             	    }
               	})
               }).done(function(res){
                   data=JSON.parse(res);
                   if (data.error) {
                   		g_alert("error",data.error);
                   }else{
                    $('#pdffile').next().remove();
                    $('#pdffile').remove();
                    $('#pdfmd5').val(data.file_md5);
                   }
               }).fail(function(res){});
		});

	$('#oafile').on('change',function(){
               var formdata=new FormData();
               formdata.append('oafile',$('#oafile')[0].files[0]);
               formdata.append('who','oafile');
               formdata.append('zid',$('#zid').val());
               $.ajax({
               	url:"http://pbenz.oicp.net/seal/ajax_upload" ,
               	type:'POST',
               	cache:false,  
               	data:formdata,
               	processData:false,
               	contentType:false,
               	xhr:onProgress(function(e){
               		if (e.lengthComputable) {
               			$('#oafile').nextAll('.progressBar').css('display','inline-block').html(Math.round(e.loaded*100/e.total)+'%');
             	    }
               	})
               }).done(function(res){
                   data=JSON.parse(res);
                   if (data.error) {
                   		g_alert("error",data.error);
                   }else{
                   	console.log(data);
                   	 $('#oafile').next().remove();
                     $('#oafile').remove();
                     $('#oamd5').val(data.file_md5);
                   }
               }).fail(function(res){});
		});

     $('textarea').on('focus',function(){
     	if($(this).html()=="关键词表示方式为：单组为名称：值，多组以‘-’隔开" || $(this).html()=="相关备注" ){
     	$(this).html('');
        
     }
     })
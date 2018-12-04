
         
<div class="container">
    <div class="row">
    <h2>数据比对</h2>
        <div class="content">
         <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
            <div class="uploadbox">
                 <h2>请选择文件或把文件拖到验证虚线框内</h1>
                <div class="uploadmain"> 
                    <div class="uploadchoose">
                    <input type="file" name="" id="fileinput">   
                    <div id="filedrop"></div>
                    </div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
           

                </div>
            </div>  
             <div class="uploadbox">
                    <span id="server_info"></span>
            </div> 
        </form>
        </div>
    </div>
 
</div>  
<!-- contianer end -->
    <script src="<?php echo base_url();?>style/js/spark-md5.js" type="text/javascript"></script>
    <script>
        function get_filemd5sum(ofile) {
            var file = ofile;
            var tmp_md5;
            var blobSlice = File.prototype.slice || File.prototype.mozSlice || File.prototype.webkitSlice,
                // file = this.files[0],
                chunkSize = 8097152, // Read in chunks of 2MB
                chunks = Math.ceil(file.size / chunkSize),
                currentChunk = 0,
                md5_progress=0,
                spark = new SparkMD5.ArrayBuffer(),
                fileReader = new FileReader();
                                var handler_info = document.getElementById("handler_info");
                var server_info = document.getElementById("server_info");
                var progressbar = document.getElementsByClassName("progress-bar")[0];
                
            
            fileReader.onload = function(e) {
                // console.log('read chunk nr', currentChunk + 1, 'of', chunks);
                spark.append(e.target.result); // Append array buffer
                currentChunk++;
                md5_progress = Math.floor((currentChunk / chunks) * 100);

                //console.log(file.name + "  正在处理，请稍等," + "已完成" + md5_progress + "%");

              
                progressbar.style.width =md5_progress+"%";
                progressbar.innerHTML=md5_progress+"%";
                if (currentChunk < chunks) {
                    loadNext();
                } else {
                    tmp_md5 = spark.end();
                    
                  //  handler_info.innerHTML = file.name + "的MD5值是：" + tmp_md5;
                       
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function(e) {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                              server_info.innerHTML=xhr.responseText
                                 $("#fileupload")[0].reset();
                                 progressbar.innerHTML=0;
                                 progressbar.style.width ="0%";
                            } else {
                               
                            }
                        }
                    };
        
                    // 开始上传
                    data=encodeURIComponent('md5') + "=" + encodeURIComponent(tmp_md5);
                    xhr.open("POST",'checkmd5result',true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send(data);
                }
            };

            fileReader.onerror = function() {
                console.warn('oops, something went wrong.');
            };

            function loadNext() {
                var start = currentChunk * chunkSize,
                    end = ((start + chunkSize) >= file.size) ? file.size : start + chunkSize;
                fileReader.readAsArrayBuffer(blobSlice.call(file, start, end));
            }
            loadNext();
        }

        var uploadfile  = document.getElementById('fileinput');
        var uploaddrop  = document.getElementById('filedrop');
        uploaddrop.addEventListener("dragover",function(e){e.preventDefault();},false);
        uploaddrop.addEventListener("drop",function(e){
            e.stopPropagation();
            e.preventDefault();
            var file=e.target.files || e.dataTransfer.files;
            //console.log(file);
              if(!file) {
                alert('请选择文件！');
                return false;
            }
            get_filemd5sum(file[0]);
        })

        uploadfile.onchange = function(e){
            var file = this.files[0];
             if(!file) {
                alert('请选择文件！');
                return false;
            }
            get_filemd5sum(file)
        }

    </script>

$(function() {
    $(".bcontent").wysihtml5({
      toolbar: {
        "image": false
      }
    });
    
    $(document).on('change', '.btn-file :file', function() {
      var input = $(this);
      var numFiles = input.get(0).files ? input.get(0).files.length : 1;
      console.log(input.get(0).files);
      var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });
    
    $('.btn-file :file').on('fileselect', function(event, numFiles, label){
      var input = $(this).parents('.input-group').find(':text');
      var log = numFiles > 1 ? numFiles + ' files selected' : label;
      
      if( input.length ) {
        input.val(log);
      } else {
        if( log ){ alert(log); }
      }
      
    });
  });


$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // $('.profile-pic2').attr('src', e.target.result);
                try {
                  document.getElementById("myDiv").style.backgroundImage = "url("+e.target.result+")";
                }
                catch(err) {
                  document.getElementById("demo").innerHTML = err.message;
                }
                
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload2").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button2").on('click', function() {
       $(".file-upload2").click();
    });
});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*$('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
          }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
          });*/

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*$(function() {
    var form_delete = $('#delete');


    $(form_delete).submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
          $.ajax({
            type: 'post',
            url: 'delete.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });
          return false;
    });
});*/

        
    /*$(function () {
        $('#logoff').click(function (event) {
          $.ajax({
            type: 'get',
            url: 'logoff.php',
            data: $('#logoff').serialize(),
            success: function () {
                //alert();
            }
          });
          return false;
        });
    });*/

    $(function () {
        $('.arrow-buttons-left').click(function (event) {
          $id = event.target.id.toString();
          if($id !== 1) {
            $row = "#row" + $id;
            $id = "id=" + $id;
            $($row).remove();
            $.ajax({
              type: 'post',
              url: 'deleteRecord.php',
              data: $id,
              success: function () {

              }
            });
            return false;
          }
        });
    });
    
    $(function () {
        $('.arrow-buttons-right').click(function (event) {
          alert("arrow button right");
          $id = event.target.id.toString();
          $id = $id.substring(12, $id.length);
          $row = "#row" + $id;
          $id = "id=" + $id;
          $($row).remove();
          $.ajax({
            type: 'post',
            url: 'deleteRecord.php',
            data: $id,
            success: function () {
              
            }
          });
          return false;
        });
    });
      

/*$(function() {
    // Get the form.
    var form = $('#form');
    // Get the messages div.
    var formMessages = $('#message-div');

    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();
        e.stopPropagation();
        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: 'admin.php?part=check',
            data: formData,
            success: function (response) {// if it is success in ajax side
                if (response=='true') {//if it is success in backend
                    $(formMessages).text('');//clears the message
                    $(formMessages).removeClass('failure');//removes the failure class
                    $(formMessages).addClass('success');//adds the success class
                    $(formMessages).text("Giriş başarılı");//adds the text
                    $('#firstName').val(''); //clears fields
                    $('#lastName').val(''); //clears fields
                    $('#email').val(''); //clears fields
                    $('#company').val(''); //clears fields
                    $('#phoneNumber').val(''); //clears fields
                    document.getElementById('captchaImage').src = 'captcha.php?' + Math.random();
                    $('#captcha').val(''); //clears fields
                    setTimeout(function() { $(formMessages).text('');
                                            $(formMessages).removeClass('success');
                                            $(formMessages).addClass('message-div');},3000);
                }
                else {
                    $(formMessages).text('');//clears the message
                    $(formMessages).removeClass('success');//removes the success class
                    $(formMessages).addClass('failure');//adds the failure class
                    $(formMessages).text("E-mail sending has failed. Please check the fields and try again.");//adds the text
                    setTimeout(function() { $(formMessages).text('');
                                            $(formMessages).removeClass('failure');
                                            $(formMessages).addClass('message-div');},3000);
                }

            },
            error: function(){// if it is error in ajax side
                $(formMessages).removeClass('success');//removes the success class
                $(formMessages).addClass('failure');//adds the failure class
                $(formMessages).text("Giriş başarısız");//adds the text
                setTimeout(function() { $(formMessages).text('');
                                        $(formMessages).removeClass('failure');
                                        $(formMessages).addClass('message-div');},3000);
            }           
        });     
    });
});*/


//SLIDER SUBMIT

    /*$(function () {
        $('body').on('click','#sliderSubmit', function (event) {
            
            document.getElementById("firstform").submit();
            document.getElementById("secondform").submit();
            var file_data = $('#file-input').prop('files')[0];  
            alert(file_data);
            var formData = new FormData($(this)[0]);
            alert(formData);
            formData.append('photo', file_data);
            alert(formData);
            $.ajax({
                type: 'post',
                dataType: 'text',
                cache: false,
                url: 'add-photo.php',
                processData: false,
                contentType: false,
                data: formData,
                success: function(php_script_response){
                    alert(php_script_response);
                }
            });
        });
    });*/


    $(function () {
        $('.sliderphotobox').click(function (event) {
            $id = $(this).attr('id');
            $(".sliderphotobox").removeClass("sliderphotoboxfocus");
            $('#'+ $id).addClass("sliderphotoboxfocus");
        });
    });
    
    
    $(function () {
        $('.delete-slider-icon').click(function (event) {
            $idRow = $(".sliderphotoboxfocus").attr('id');
            $id = $idRow.substring(11,$id.length);
            var formData = "id=" + $id;
            //alert($id);
            if($id !== 'undefined') {
                $row = '#sliderphotodiv' + $id;              
                $.ajax({     
                    type: 'post',
                    url: '?controller=pages&action=slider&part=delete',
                    data: formData,
                    success: function(php_script_response){
                        
                    }
                });
                $($row).remove();
            }
        });
    });  
    
    $(function () {
        $('.edit-slider-icon').click(function (event) {
            $id = $(".sliderphotoboxfocus").attr('id');
            $id = $id.substring(11,$id.length);
            var formData = "id=" + $id;
            //alert($id);
            if($id !== 'undefined') {  
                window.location.href = "?controller=pages&action=slider&page=edit&" + formData;
                /*$.ajax({     
                    type: 'post',
                    url: "?controller=pages&action=slider&page=edit&" + formData,
                    data: formData,
                    success: function(php_script_response){
                        window.location.href = "?controller=pages&action=slider&page=edit&" + formData;
                    }
                });*/
            }
        });
    }); 
    
    $(function () {
        $('#product-delete-icon').click(function (event) {
            //alert($id);
            $id = $(".sliderphotoboxfocus").attr('id');
            var formData = "id=" + $id.substring(11,$id.length);
            alert($id);
            if($id !== 'undefined') {
                $row = '#' + $id;              
                $.ajax({     
                    type: 'post',
                    url: '?controller=pages&action=products&subpage=products&part=delete',
                    data: formData,
                    success: function(php_script_response){
                        $($row).remove();
                    }
                });
            }
        });
    });
    
    function deleteProductRow(elem) {
        $id = $(elem).attr('id');
        $id = $id.substring(7,$id.length);
        $row = '#productRow' + $id; 
        var formData = "id=" + $id;
        $.ajax({     
            type: 'post',
            url: "?controller=pages&action=products&subpage=products&part=delete",
            data: formData,
            success: function(){
               window.setTimeout('location.reload()', 0); 
            }
        });
    }
    
    function deleteProductCategoryRow(elem) {
        $id = $(elem).attr('id');
        $id = $id.substring(15,$id.length);
        $row = '#productCategoryRow' + $id; 
        var formData = "id=" + $id;
        $.ajax({     
            type: 'post',
            url: "?controller=pages&action=products&subpage=productcategories&part=delete",
            data: formData,
            success: function(){
               window.setTimeout('location.reload()', 0); 
            }
        });
    }
    
    function addProductCategoryRow(elem) {
        $id = $(elem).attr('id');
        $id = $id.substring(15,$id.length);
        $row = '#productCategoryRow' + $id; 
        for (i=0; i< $(productCategoryList).length; i++) {
            if($id == $(productCategoryList)[i]["ProductCategoryId"]) {
                $('#productCategoryParent').val($(productCategoryList)[i]["ProductCategoryListName"]);
                $('#productCategoryParentId').val($id);
                $('html, body').animate({ scrollTop: 0 }, 'fast');
            }
        }        
    }
    
    function deleteReferenceRow(elem) {
        $id = $(elem).attr('id');
        $id = $id.substring(10,$id.length);
        $row = '#referenceRow' + $id; 
        var formData = "id=" + $id;
        $.ajax({     
            type: 'post',
            url: "?controller=pages&action=references&part=delete",
            data: formData,
            success: function(){
               window.setTimeout('location.reload()', 1000); 
            }
        });
    }
    
    function databaseButton() {
        window.location = 'databaseImport.php';
    }
    
    /*function refresh() {
        alert("refreshing...");
        // Stop the browser from submitting the form.
        alert("script.js");
        // Serialize the form data.
        var form = $('#firstform');
        var formData = $(form).serialize();         
        $.ajax({     
            type: 'POST',
            url: '?controller=pages&action=products&subpage=productcategories&part=add',
            data: formData,
            success: function(){
                window.setTimeout('location.reload()', 0); 
                //window.location.href = "?controller=pages&action=slider";
            }
        });
    }*/
    
    $(function () {
        var form = $('#firstform');
        
        $(form).submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();
            e.stopPropagation();
            // Serialize the form data.
            var form = $('#firstform');
            var formData = $(form).serialize();         
            $.ajax({     
                type: 'POST',
                url: '?controller=pages&action=products&subpage=productcategories&part=add',
                data: formData,
                success: function(){
                    window.setTimeout('location.reload()', 0); 
                    //window.location.href = "?controller=pages&action=slider";
                }
            });
        });
    }); 
    
    
    
    ///////////////// IMAGE INPUT //////////////////
    
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-input").change(function(){
        readURL(this);
    });  
    
    function readURLSeveral(input) {
        $id = $(input).attr('id');
        $id = $id.substring(10,11);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview' + $id).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    
    $("input[id*='file-input']").change(function(){
        readURLSeveral(this);
    });  
    
    
    ///////////////// IMAGE INPUT //////////////////
    
    
    
    ///////////////// PRODUCT CATEGORIES //////////////////
    
    
    function categoryList() {
        for (i=0; i<$(productCategoryChildList).length; i++) {
            
        }
    }
    
    function getProductCategoryChilds(input,event,type) {
        if(type === "Parent") {
            $(".productCategoryChild").remove();
            $("#productCategoryChild").remove();
        }
        alert($(input).attr('id'));
        alert(event.target.id);
        $chosenChild= $(input).find(":selected");
        $id = $chosenChild.attr('id');
        $id = $id.substring(6, $id.length);
        alert($id);
        var formData = "parent_id=" + $id;

        /*$.ajax({     
            type: 'post',
            url: "?controller=pages&action=products&subpage=productcategories",
            data: formData,
            success: function(){
               //window.setTimeout('location.reload()', 0); 
            }
        });*/
        
        $parent =null;
        $option = "<option id='optionUrunAltKategori'>Ürün Alt Kategorisi</option>";
        for (i=0; i< $(productCategoryList).length; i++) {
            if($id == $(productCategoryList)[i]["ProductCategoryParentId"]) {
                $parent = $(productCategoryList)[$(productCategoryList)[i]["ProductCategoryParentId"]];
                $option += "<option value='"+$(productCategoryList)[i]['ProductCategoryName']+"' id='option"+$(productCategoryList)[i]["ProductCategoryId"]+"'>";
                $option += $(productCategoryList)[i]["ProductCategoryListName"];
                $option += "</option>";
            }
        }
        
        $row = "<br class='productCategoryChild'><br class='productCategoryChild'>"+
                    "<label class='productCategoryChild' for='productCategoryChild'>Ürün Alt Kategorisi:</label>"+
                    "<select class='form-control productCategoryChild' id='productCategoryChild"+$id+"' name='"+$parent["ProductCategoryName"]+"Child'>"+
                    $option+
                    "</select>";
        $($row).insertAfter(input);
        $("#productCategoryChild" + $id).change(function(event){
            alert();
            getProductCategoryChilds(this,event,"Child");
        }); 
    }
    
    function addRow() {
        /*alert("addrow");        
        for (i=0;i<$(jArray1).length;i++) {
            $row = "<option id='optionUrunler'>"+
                        $(jArray1)[i]["ProductCategoryName"]+
                    "</option>";
            $('#productCategoryChild').append($row);
        }*/
    }
    
    $(".productCategory").change(function(event){
        getProductCategoryChilds(this,event,"Parent");
    });
    
    
    ///////////////// PRODUCT CATEGORIES //////////////////
    
    
    
    ///////////////// SITE SETTINGS //////////////////
    
    $("#template").ready(function(){
        for (i=0; i< $(jArray).length; i++ ) {
            if($(jArray)[i]['IsOn'] == "1") {
                $arr = $(jArray)[i];
                break;
            }
            if(i==$(jArray).length-1) {
                $arr = $(jArray)[0];
            }
        }
        
        $('#isOn').prop('checked', (($arr['IsOn']=="1")? true : false));
        $('#templateId').val($arr['Id']);
        $('#templateName').val($arr['Name']);
        if($arr["LogoNavbar"]!=""){$imagePreview = "../uploads/"+$arr["LogoNavbar"];}else{$imagePreview = "Public/images/Add_image_icon.svg";}
        if($arr["LogoFavicon"]!=""){$imagePreviewFavicon = "../uploads/"+$arr["LogoFavicon"];}else{$imagePreviewFavicon = "Public/images/Add_image_icon.svg";}
        if($arr["Background"]!=""){$imagePreviewBackground = "../uploads/"+$arr["Background"];}else{$imagePreviewBackground = "Public/images/Add_image_icon.svg";}
        $('#image-preview').attr('src', $imagePreview);
        $('#image-preview-favicon').attr('src', $imagePreviewFavicon);
        $('#image-preview-background').attr('src', $imagePreviewBackground);
        $('#oldPhotoName').attr('value', $arr["LogoNavbar"]);
        $('#oldPhotoNameFavicon').attr('value', $arr["LogoFavicon"]);
        $('#oldPhotoNameBackground').attr('value', $arr["Background"]);
        $('#templateNavbarColor').val($arr['NavbarColor']);
        $('#templateNavbarOpacity').val($arr['NavbarOpacity']);
        $('#templateNavbarOpacityRangeText').val($arr['NavbarOpacity']);
        $('#templateBodyBackground').val($arr['BodyBackground']);
        $('#templateBodyBackgroundColor').val($arr['BackgroundColor']);
        $('#templateFooterColor').val($arr['FooterColor']);
        $('#templateFooterOpacity').val($arr['FooterOpacity']);
        $('#templateFooterOpacityRangeText').val($arr['FooterOpacity']);
        $('#templateFooterDescription').val($arr['FooterDescription']);
        $('#templateFontFamily').val($arr['FontFamily']);
        $('#templateFontSize').val($arr['FontSize']);
        $('#templateFontSizeRangeText').val($arr['FontSize']);
    });
    
    $("#template").change(function(event){
        $id = $(this).children(":selected").attr("id");
        $id = $id.substring(6, $id.length);
        for (i=0; i< $(jArray).length; i++ ) {
            if($(jArray)[i]['Id'] == $id) {
                $arr = $(jArray)[i];
                break;
            }
        }
        
        $('#isOn').prop('checked', (($arr['IsOn']=="1")? true : false));
        $('#templateId').val($arr['Id']);
        $('#templateName').val($arr['Name']);
        if($arr["LogoNavbar"]!=""){$imagePreview = "../uploads/"+$arr["LogoNavbar"];}else{$imagePreview = "Public/images/Add_image_icon.svg";}
        if($arr["LogoFavicon"]!=""){$imagePreviewFavicon = "../uploads/"+$arr["LogoFavicon"];}else{$imagePreviewFavicon = "Public/images/Add_image_icon.svg";}
        if($arr["Background"]!=""){$imagePreviewBackground = "../uploads/"+$arr["Background"];}else{$imagePreviewBackground = "Public/images/Add_image_icon.svg";}
        $('#image-preview').attr('src', $imagePreview);
        $('#image-preview-favicon').attr('src', $imagePreviewFavicon);
        $('#image-preview-background').attr('src', $imagePreviewBackground);
        $('#oldPhotoName').attr('value', $arr["LogoNavbar"]);
        $('#oldPhotoNameFavicon').attr('value', $arr["LogoFavicon"]);
        $('#oldPhotoNameBackground').attr('value', $arr["Background"]);
        $('#templateNavbarColor').val($arr['NavbarColor']);
        $('#templateNavbarOpacity').val($arr['NavbarOpacity']);
        $('#templateNavbarOpacityRangeText').val($arr['NavbarOpacity']);
        $('#templateBodyBackground').val($arr['BodyBackground']);
        $('#templateBodyBackgroundColor').val($arr['BackgroundColor']);
        $('#templateFooterColor').val($arr['FooterColor']);
        $('#templateFooterOpacity').val($arr['FooterOpacity']);
        $('#templateFooterOpacityRangeText').val($arr['NavbarOpacity']);
        $('#templateFooterDescription').val($arr['FooterDescription']);
        $('#templateFontFamily').val($arr['FontFamily']);
        $('#templateFontSize').val($arr['FontSize']);
        $('#templateFontSizeRangeText').val($arr['FontSize']);
    });
    
    
    function setInput(input) {
        $value = $(input).val();
        $("#"+ $(input).attr("id") +"RangeText").val($value);
    }

    $("#templateFooterOpacity").change(function(){
        setInput(this);
    }); 
    
    $("#templateNavbarOpacity").change(function(){
        setInput(this);
    }); 
    
    $("#templateFontSize").change(function(){
        setInput(this);
    }); 
    
    
    function readURLFavicon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview-favicon').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-input-favicon").change(function(){
        readURLFavicon(this);
    });  
    
    
    $("#file-input-background").change(function(){
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview-background').attr('src', e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    });  
    
    ///////////////// SITE SETTINGS //////////////////

    
    /*
    $(function () {
        $('.sliderphotobox').click(function (event) {
            document.getElementById("firstform").submit();
            document.getElementById("secondform").submit();
            var file_data = $('#file-input').prop('files')[0];  
            alert(file_data);
            var formData = new FormData($(this)[0]);
            alert(formData);
            formData.append('photo', file_data);
            alert(formData);
            $.ajax({
                type: 'post',
                dataType: 'text',
                cache: false,
                url: 'add-photo.php',
                processData: false,
                contentType: false,
                data: formData,
                success: function(php_script_response){
                    alert(php_script_response);
                }
            });
        });
    });*/
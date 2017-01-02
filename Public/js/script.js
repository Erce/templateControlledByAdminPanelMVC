/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $(function () {
        $('.submit').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            var formMessages = $('#message-div');
            var formData = $('#form').serialize();  
            $.ajax({     
                type: 'post',
                url: './Controller/contactController.php',
                data: formData,
                success: function(response){
                    if (response=='true') {//if it is success in backend
                        $(formMessages).text('');//clears the message
                        $(formMessages).removeClass('failure');//removes the failure class
                        $(formMessages).addClass('success');//adds the success class
                        $(formMessages).text("E-mail gönderildi. Bizimle iletişime geçtiğiniz için teşekkür ederiz.");//adds the text
                        $('#firstName').val(''); //clears fields
                        $('#lastName').val(''); //clears fields
                        $('#email').val(''); //clears fields
                        $('#company').val(''); //clears fields
                        $('#phoneNumber').val(''); //clears fields
                        document.getElementById('captchaImage').src = './view/contact/captcha.php?' + Math.random();
                        $('#captcha').val(''); //clears fields
                        setTimeout(function() { $(formMessages).text('');
                                                $(formMessages).removeClass('success');
                                                $(formMessages).addClass('message-div');},3000);
                    }
                    else {
                        $(formMessages).text('');//clears the message
                        $(formMessages).removeClass('success');//removes the success class
                        $(formMessages).addClass('failure');//adds the failure class
                        $(formMessages).text("E-mail gönderilemedi. Lütfen alanları tam olarak doldurunuz.");//adds the text
                        setTimeout(function() { $(formMessages).text('');
                                                $(formMessages).removeClass('failure');
                                                $(formMessages).addClass('message-div');},3000);
                    }
                },
                error: function () {
                    alert("error");
                }
            });           
        });
    });
    
    
    $(function () {
        $('.img-container-inside').click(function (e) {
            $id = e.target.id.toString();
            $id = $id.substring(5, $id.length);
            $modal = document.getElementById('myModal');
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            $img = document.getElementById('myImg'+$id);
            $modalImg = document.getElementById("img01");
            $captionText = document.getElementById("caption");
            // Putting image into modal
            $modal.style.display = "block";
            $modalImg.src = this.src;
            $modalImg.alt = this.alt;
            $captionText.innerHTML = this.alt;
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                $modal.style.display = "none";
            };
        });
    });


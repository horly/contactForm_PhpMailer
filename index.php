<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Contact Form</title>
</head>
<body>

    <style>
        #success-message, #error-message{
            display:none;
        }
    </style>
    <div class="container">
        <h1>Contact Form</h1>

        <form id="contact-form" action="sendmail.php">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" id="message" rows="4" placeholder="Enter your message"></textarea>
            </div>

            <button type="button" class="btn btn-primary btn-block" id="send-form">Send</button>

        </form>

        <br>
        <div class="alert alert-success text-center" id="success-message" role="alert">
            Email has been sent successfully
        </div>

        <div class="alert alert-danger text-center" id="error-message" role="alert">
            The Email was not sent
        </div>
    </div>
    

    <script src="assets/jquery-v3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        $('#send-form').click(function()
        {
            var form = $('#contact-form');

            $.ajax({
                type : 'POST', 
                url : form.attr('action'),
                data : form.serializeArray(),
                success:function(data)
                {
                    //console.log(data);
                   if(data == 'success')
                    {
                        $('#success-message').css('display', 'block');
                        $('#error-message').css('display', 'none');

                        form[0].reset();
                    }
                    else
                    {
                        $('#success-message').css('display', 'none');
                        $('#error-message').css('display', 'block');
                    }
                }
            });
        });
    </script>
</body>
</html>
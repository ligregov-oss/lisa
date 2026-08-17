
$(document).ready(function() {
    $('#calculateBtn').on('click', function(event) {
        var height = $('#height').val();
        var weight = $('#weight').val();

        if (height && weight) {
            var bmi = (weight / Math.pow(height / 100, 2)).toFixed(2);
            $('#result').text('Vaš BMI je: ' + bmi);

            var imageSrc = '';

            if (bmi < 18.5) {
                imageSrc = '1.jpg';  
            } else if (bmi >= 18.5 && bmi < 24.9) {
                imageSrc = '2.jpg'; 
            } else if (bmi >= 25 && bmi < 29.9) {
                imageSrc = '3.jpg';
            } else if (bmi >= 30 && bmi < 34.9) {
                imageSrc = '4.jpg';    
            } else {
                imageSrc = '5.jpg';  
            }

            $('#image').html('<img src="' + imageSrc + '" alt="BMI image" style="width: 100px; height: auto;">');
        } else {
            $('#result').text('Molimo unesite visinu i težinu.');
        }
    });
});

$('#saveBtn').click(function() {
    var height = $('#height').val();
    var weight = $('#weight').val();
    var bmi = $('#bmi').text();
    var bmiText = $('#result').text();  
    var bmiValue = bmiText.split(': ')[1];
    
    $.ajax({
        url: 'save_bmi.php',
        method: 'POST',
        data: {
            height: height,
            weight: weight,
            bmi: bmiVlue
        },
        success: function(response) {
            alert(response);
        },
        error: function() {
            alert('Error saving BMI data!');
        }
    });
});

$(document).ready(function() {
    $('#registerForm').on('submit', function(e) {
        e.preventDefault(); 
        $.ajax({
            type: 'POST',
            url: 'register_user.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#response').html(response);
            },
            error: function() {
                $('#response').html('An error occurred. Please try again.');
                }
        });
    });
});

 $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); 

                $.ajax({
                    type: 'POST',
                    url: 'login.php', 
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#response').html(response);
                    },
                    error: function() {
                        $('#response').html('An error occurred. Please try again.');
                        
               if (password_verify($password, $hashed_password)) {
                    error_log("Password verified"); 
                        } else {
                    error_log("Invalid password"); 
                }
                }
        });
    });
});

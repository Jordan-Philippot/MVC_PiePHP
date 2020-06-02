/* __________________________________ REGISTRATION _____________________________ */

$("#signUp").click(function (e) {
    e.preventDefault();
    const prenom = $('#prenom').val();
    const nom = $('#nom').val();
    const email = $('#email').val();
    const naissance = $('#naissance').val();
    const password = $('#password').val();
    const passwordConfirm = $('#passwordConfirm').val();

    $.ajax({
        dataType: "json",
        type: "POST",
        url: "./registration",
        data: { prenom, nom, email, naissance, password, passwordConfirm },
        success: function (response) {
            console.log(response);
            if (response.success) {
                window.location.href = "/MVC_PiePHP/";
                $("body").apprend('<p class="errors"> tu es inscrit</p>');
            }
            else {
                if ($(".errors")) {
                    $(".errors").remove();
                }
                $.map(response.errors, function (error, key) {
                    $("#" + key).after('<p class="errors">' + error + '</p>');
                    $("#" + key).css('border', '0.5px solid rgb(255, 70, 70)');
                    $("#" + key).css('box-shadow', '2px 2px 0px 3px rgb(205, 0, 0)');
                    gsap.fromTo(".errors", 2, { opacity: 0, scale: 0 }, { opacity: 1, ease: "bounce", scale: 1 });
                });
            }
        }
    });
});

/* ________________________________  LOGIN ______________________________*/

$('#loginSubmit').click(function (e) {
    e.preventDefault();
    const email = $('#email').val();
    const password = $('#password').val();
    $.ajax({
        dataType: "json",
        type: "POST",
        url: "./connect",
        data: { email, password },
        success: function (response) {
            if (response.success) {
                window.location.href = "/MVC_PiePHP/";
            }
            else {
                if ($(".errors")) {
                    $(".errors").remove();
                }
                $.map(response.errors, function (error, key) {
                    $("#" + key).after('<p class="errors">' + error + '</p>');
                    $("#" + key).css('box-shadow', '3px 5px 0px 3px rgb(255, 70, 70)');
                    gsap.fromTo(".errors", 2, { opacity: 0, scale: 0 }, { opacity: 1, ease: "bounce", scale: 1 });
                });
            }
        }
    });
});
$(function () {
    //Horizontal form basic
    $('#wizard_horizontal').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            $("select.select2").select2({ width: 'resolve' });
            setButtonWavesEffect(event);
        },
        onFinishing: function (event, currentIndex) {
            //alert("onFinishing");
            $("#simpan").submit();
            //formhr.validate().settings.ignore = ':disabled';
            //return formhr.valid();
        }
    });

    //Vertical form basic
    $('#wizard_vertical').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        stepsOrientation: 'vertical',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        }
    });
    
    //Advanced form with validation
    var form = $('#wizard_with_validation').show();
    form.steps({
        headerTag: 'h3',
        bodyTag: 'fieldset',
        transitionEffect: 'slideLeft',
        onInit: function (event, currentIndex) {
            $.AdminInfiniO.input.activate();

            //Set tab width
            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
            var tabCount = $tab.length;
            $tab.css('width', (100 / tabCount) + '%');

            //set button waves effect
            setButtonWavesEffect(event);
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex > newIndex) { return true; }

            if (currentIndex < newIndex) {
                form.find('.body:eq(' + newIndex + ') label.error').remove();
                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
            }

            form.validate().settings.ignore = ':disabled,:hidden';
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ':disabled';
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            swal("Good job!", "Submitted!", "success");
        }
    });

    form.validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        rules: {
            'confirm': {
                equalTo: '#password'
            }
        }
    });
   // $('#simpan').parsley();
     var formhr =  $('#simpan');
    formhr.validate({
        ignore: '.select2-input, .select2-focusser',
        highlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-offscreen")) {
                $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
            } else {
                elem.addClass(errorClass);
            }
        },
    
        unhighlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-offscreen")) {
                $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
            } else {
                elem.removeClass(errorClass);
            }
        }
        
        ,errorPlacement: function (error, element) {
            var elem = $(element);
           if (elem.hasClass("select2-hidden-accessible")) {
               element = $("#select2-" + elem.attr("id") + "-container").parent(); 
               error.insertAfter(element);
           } else {
               error.insertAfter(element);
           }
        }
    }); 
    window.Parsley
    .addValidator('validateFullWidthCharacters', {
        requirementType: 'string',
        validateString: function (value, requirement) {
            regex = /^([a-z0-9_\.-]+\@[\da-z\.-]+\.[a-z\.]{2,6})$/gm;
            return regex.test(value);
        },
        messages: {
            en: 'Please enter a valid email address.'
        }
    });
    $('#wizard_hr').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex > newIndex) { return true; }

            if (currentIndex < newIndex) {
                formhr.find('.body:eq(' + newIndex + ') label.error').remove();
                formhr.find('.body:eq(' + newIndex + ') .error').removeClass('error');
            }
            formhr.validate().settings.ignore = ':disabled,:hidden';
            //return formhr.valid();
            return $("#simpan").parsley({excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], :hidden"}).validate();
            //return $("#simpan").parsley().validate();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            //$(".select2").select2({ width: '100%' });
            setButtonWavesEffect(event);
        },
        onFinishing: function (event, currentIndex) {
            //alert("onFinishing");
            if($("#simpan").parsley({excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], :hidden"}).isValid()){
                $("#simpan").submit();
            } else {
                $("#simpan").parsley({excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], :hidden"}).validate();
            }
            //formhr.validate().settings.ignore = ':disabled';
            //return formhr.valid();
        },
        onFinished: function (event, currentIndex) {
            alert("onFinished");
            if($("#simpan").parsley({excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], :hidden"}).isValid()){
                alert("valid");
            }
            swal("Good job!", "Submitted!", "success");
        }
    });
    $('#wizard_hrview').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        enableFinishButton: false,
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            $("select.select2").select2({ width: 'resolve' });
            setButtonWavesEffect(event);
        }
    });
    
});


function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
}
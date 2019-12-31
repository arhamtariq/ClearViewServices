$(function() {
    /*-------------------register form styling-----------------*/
    $("#overall-form").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        stepsOrientation: "vertical",
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate: '<div class="title">#title#</div>',
        labels: {
            previous: 'Back Step',
            next: '<i class = "fa fa-arrow-right" style="color:white;"></i>',
            finish: '<i class = "fa fa-arrow-right" style="color:white;"> </i>',
            current: ''
        },
        onFinished: function(event, currentIndex) {

            $("#rform").submit();

        }
    })
});
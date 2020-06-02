$('.titleMovie').hover(
    function () {
        TweenMax.to(this, 1.5, { borderRadius: "50px", scaleX: 1.1, scaleY: 1.1, ease: Circ.easeOut });
        TweenMax.to(this.children, 1.5, { scaleX: 1.1, scaleY: 1.1, ease: Circ.easeOut });
    },
    function () {
        TweenMax.to(this, 1.5, { borderRadius: "0px", scaleX: 1, scaleY: 1, ease: Circ.easeOut });
        TweenMax.to(this.children, 1.5, { scaleX: 1, scaleY: 1, ease: Circ.easeOut });
    }
);

$(document).ready(function ($) {
    //for running once remove the reapet and repeat dealay on line 6,7

    let contact_anim = new TimelineMax({
        paused: true,
        repeat: 10,
        repeatDelay: 1,
        yoyo: true
    });
    contact_anim.to('.line', 0.5, { scale: 1, ease: Power4.easeOut });
    contact_anim.to('.line', 1, { left: "100%", ease: Power2.easeOut });
    contact_anim.add('streched', 0.5);
    $('.welcome').children().each(function (index) {
        let span = $(this)[0];
        let label = "appear" + index;
        contact_anim.add(label, 0.5 + index * 0.1)
        contact_anim.to(span, 0.2, { opacity: 1, ease: Power3.easeOut }, label);
    })
    contact_anim.to('.line', 0.5, { scale: 0, ease: Power4.easeOut });
    contact_anim.play();

})



$(document).ready(function () {

    var els = $(".Onemovie"),
        stagTime = 0.5;

    els.each(function (i, e) {
        var tl = new TimelineLite();

        tl.to({}, (stagTime * i), {})
        tl.fromTo(this, 2.5, { x: -1500 }, { x: 0, ease: "back" });
    });

    var els = $(".oneKind"),
        stagTime = 0.5;

    els.each(function (i, e) {
        var tl = new TimelineLite();

        tl.to({}, (stagTime * i), {})
        tl.fromTo(this, 2.5, { x: -1500 }, { x: 0, ease: "back" });
    });
});

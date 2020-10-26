const maxWidth = 992;

$(document).on('pjax:success tooltip', function(){
    $('.tooltip.show').remove();
    $('[data-toggle="tooltip"]').tooltip({trigger:'hover'});
});
$(document).trigger('tooltip');
$('[data-scroll]').click(function(e){
    $('html, body').animate({scrollTop: $($(this).attr('data-scroll')).offset().top}, 1000);
    e.preventDefault();
});

var om_s = 0;
var om_x = 0;
var om_p = 0;
$('[data-toggle="offcanvas"]').on('click', function(){
    $(this).toggleClass('offcanvas-open');
    $('.offcanvas-collapse').toggleClass('open');
});
$('[data-toggle="offcanvas"], .offcanvas-collapse').on('touchstart', function(e){
    om_s = e.originalEvent.touches[0].pageX;
}).on('touchmove', function(e){
    om_x = e.originalEvent.touches[0].pageX;
    om_p = (om_s - om_x) / om_s * 100;
    if (om_p > 20) {
        $('[data-toggle="offcanvas"]').removeClass('offcanvas-open');
        $('.offcanvas-collapse').removeClass('open');
    }
});

$(document).on('click', 'a[href="#"]', function(e){
    e.preventDefault();
});

window.onbeforeunload = function (e) {
    if (e.currentTarget.innerWidth < maxWidth) {
        $('body > div:eq(1)').css('opacity', 0.7);
        $('#load').show();
    }
};

var move = 0;
$(window).resize(function(){
    moveResize($(this));
});
moveResize($(window));
function moveResize(obj) {
    if (obj.outerWidth() > maxWidth) {
        if (!move) {
            move = 1;
            $('[data-move-from]').each(function(){
                $(this).find('> *').appendTo($('[data-move-to="' + $(this).attr('data-move-from') + '"]'));
            });
        }
    } else {
        if (move) {
            move = 0;
            $('[data-move-to]').each(function(){
                $(this).find('> *').appendTo($('[data-move-from="' + $(this).attr('data-move-to') + '"]'));
            });
        }
    }
}

function modalLoad(obj, data) {
    renderData(obj, data.title, '.modal-title');
    renderData(obj, data.body, '.modal-body');
    renderData(obj, data.footer, '.modal-footer');
    obj.find('.modal-dialog').attr('class', 'modal-dialog').addClass(data.dialog);
    obj.addClass(data.class).attr('data-modal-action', data.action);
    if (data.title) {
        obj.find('.modal-header').show();
    } else {
        obj.find('.modal-header').hide();
    }
    if (data.autoclose) {
        setTimeout(function(){
            $('.modal-load').modal('hide');
            if (data.redirect) {
                window.location.href = data.redirect;
            }
        }, data.autoclose);
    }
}
function renderData(obj, data, sel) {
    if (data) {
        obj.find(sel).html(data).show();
    } else {
        obj.find(sel).hide();
    }
}
function openModal(action = null, config = {}) {
    //$('.g-recaptcha').remove();
    var obj = $('.modal-load');
    $(document).trigger('tooltip');
    if (action === obj.attr('data-modal-action')) {
        obj.modal({show: true});
    } else if (action === null || action === '') {
        modalLoad(obj, config);
        if (typeof config.backdrop !== 'undefined') {
            config.backdrop = 'true';
        }
        if (typeof config.keyboard !== 'undefined') {
            config.keyboard = 'true';
        }
        obj.modal({
            show: true,
            backdrop: config.backdrop === 'false' ? false : true,
            keyboard: config.keyboard === 'false' ? false : true
        });
    } else {
        $.getJSON(action, function(data){
            if (data) {
                config = $.extend(config, data);
                modalLoad(obj, config);
                if (!config.backdrop) {
                    config.backdrop = 'true';
                }
                if (!config.keyboard) {
                    config.keyboard = 'true';
                }
                obj.modal({
                    show: true,
                    backdrop: config.backdrop === 'false' ? false : true,
                    keyboard: config.keyboard === 'false' ? false : true
                });
            }
        });
    }
}
$(document).on('click', '*[data-modal]', function(e){
    e.preventDefault();
    var config = {
        action: $(this).attr('data-modal'),
        dialog: $(this).attr('data-modal-dialog'),
        title: $(this).attr('data-modal-title'),
        body: $(this).attr('data-modal-body'),
        footer: $(this).attr('data-modal-footer'),
        class: $(this).attr('data-modal-class'),
        backdrop: $(this).attr('data-modal-backdrop'),
        keyboard: $(this).attr('data-modal-keyboard'),
        autoclose: $(this).attr('data-modal-autoclose'),
        redirect: $(this).attr('data-modal-redirect')
    };
    openModal(config.action, config);
});
$(document).on('click', '.modal-load button[type="submit"]', function(){
    waitForm($(this));
    var modal = $('.modal-load');
    modal.attr('data-modal-action', null);
    var form = modal.find('form');
    if ($(this).hasClass('fix')) {
        // VerifyPhone
        form.trigger('beforeSubmit');
    } else {
        $.post(form.attr('action'), form.serialize(), function(data){
            modalLoad(modal, data);
        }, 'json');
    }
    return false;
});

$(document).on('submit', 'form', function(){
    waitForm($(this).find('button[type="submit"]'));
});

$(document).on('beforeSubmit', 'form', function(e){
    if($(this).data('submitting')) {
        e.preventDefault();
        return false;
    }
    $(this).data('submitting', true);
    return true;
});

function waitForm(btn) {
    btn.prop('disabled', true).find('.spinner-border').remove();
    btn.prepend($('<span/>').addClass('spinner-border spinner-border-sm mr-2'));
    setTimeout(function(){
        btn.prop('disabled', false).find('.spinner-border').remove();
    }, 1000);
}

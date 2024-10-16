const delete_alert_container = $('#delete_alert_container');
const delete_alert = $('#delete_alert');
const deleteP = $('#delete');
const cancel_delete = $('#cancel_delete');

const kebab = $('#kebab');
const photo_info = $('#photo_info');
let is_photo_info_open = false

deleteP.on('click', () => {
    gsap.to(delete_alert_container, {
        opacity: 1,
        display: 'flex',
        duration: 0.3,
    });
    gsap.fromTo(delete_alert, {
        opacity: 0,
        scale: 0.4,
        translateY: '50vh',
    }, {
        opacity: 1,
        scale: 1,
        translateY: '0',
        duration: 0.3
    });
})

const closeDeleteAlert = () => {
    gsap.to(delete_alert, {
        opacity: 0,
        scale: 0.4,
        translateY: '50vh',
        duration: 0.3
    });
    gsap.to(delete_alert_container, {
        opacity: 0,
        display: 'none',
        duration: 0.3,
    });
}

cancel_delete.on('click', () => {
    closeDeleteAlert();
})

delete_alert_container.on('click', (e) => {
    if (e.target === delete_alert_container[0]) {
        closeDeleteAlert();
    }
})

kebab.on('click', () => {
    if (!is_photo_info_open) {
        gsap.fromTo(photo_info, {
            translateX: '-80%',
        }, {
            display: 'flex',
            translateX: '-90%',
            width: 'auto',
            height: 'auto',
        });
        isOpen = true;
    }
    overlay.removeClass('hidden');
    is_photo_info_open = true;
});

overlay.on('click', () => {
    gsap.to(photo_info, {
        display: 'none',
        translateX: '50%',
        duration: 0
    });
    overlay.addClass('hidden');
    is_photo_info_open = false;
});

const alert_container = $('#alert_container');
const alert = $('#alert');
const logout = $('#logout');
const cancel = $('#cancel');

const username = $('#username');
const user_info = $('#user_info');
const overlay = $('#overlay');
let is_open = false;

logout.on('click', () => {
    gsap.to(alert_container, {
        opacity: 1,
        display: 'flex',
        duration: 0.3,
    });
    gsap.fromTo(alert, {
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

const closeAlert = () => {
    gsap.to(alert, {
        opacity: 0,
        scale: 0.4,
        translateY: '50vh',
        duration: 0.3
    });
    gsap.to(alert_container, {
        opacity: 0,
        display: 'none',
        duration: 0.3,
    });
}

cancel.on('click', () => {
    closeAlert();
})

alert_container.on('click', (e) => {
    if (e.target === alert_container[0]) {
        closeAlert();
    }
})

username.on('click', () => {
    if (!is_open) {
        gsap.fromTo(user_info, {
            translateX: '10%',
        }, {
            display: 'flex',
            translateX: '0%',
            width: 'auto',
            height: 'auto',
            duration: 0.15
        });
    is_open = true;
    }
    overlay.removeClass('hidden');
});

overlay.on('click', () => {
    gsap.to(user_info, {
        display: 'none',
        translateX: '50%',
        duration: 0
    });
    is_open = false;
    overlay.addClass('hidden');
});

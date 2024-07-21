import './echo';

Echo.channel('chat')
    .listen('MessageSent', (e) => {
        console.log(e.message);
    });

var animationPath = 'https://assets5.lottiefiles.com/packages/lf20_5ijvgxxu.json';

var animationOptions = {
    container: document.getElementById('animationContainer'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: animationPath
};

var animation = lottie.loadAnimation(animationOptions);
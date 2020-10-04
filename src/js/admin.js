import { Router } from './admin/router.js';
import { TokenClient } from './admin/token-client.js';
import { TokenStorage } from './admin/token-storage.js';
import { WeightApp } from './admin/weight-app.js';
import { ThermometerApp } from './admin/thermometer-app.js';
import { TokenManagerApp } from './admin/token-manager-app.js';

const assetsBaseUrl = document.documentElement.dataset.urlAssets;

let tokenClient = new TokenClient();
let tokenStorage = new TokenStorage();
let router = new Router('/admin');

let contentElement = document.querySelector('.admin-content');

router.interceptor = (url) => {
  let token = tokenStorage.load();
  if(!token || !url) {
    return '/login';
  } else if (token && ['/login', '/'].includes(url)) {
    return '/home';
  } else {
    return url;
  }
};

router.renderer = {
  render: text => {
    contentElement.innerHTML = text;
  },
  clear: () => {
    contentElement.innerHTML = '';
  }
}

router.register('/home', {
  content: assetsBaseUrl + '/html-partials/home.html'
});

router.register('/login', {
  content: assetsBaseUrl + '/html-partials/login.html',
  logic: () => {
    let form = document.getElementById('login');
    form.addEventListener('submit', e => {
      e.preventDefault();

      let username = document.getElementById('username').value;
      let password = document.getElementById('password').value;

      tokenClient.fetchToken(username, password)
        .then(token => {
          tokenStorage.save(token);
        })
        .then(() => {
          router.redirect('/home');
        })
        .catch(e => {
          document.getElementById('login').reset();
          document.getElementById('error').textContent = e.message;
        });
    });
  }
});

router.register('/weight', {
  content: assetsBaseUrl + '/html-partials/weight.html',
  logic: () => {
    let weightApp = new WeightApp(tokenStorage.load());

    weightApp.run();

  }
});

router.register('/thermometer', {
  content: assetsBaseUrl + '/html-partials/thermometer.html',
  logic: async () => {
    let thermometerApp = new ThermometerApp(tokenStorage.load());

    thermometerApp.run();
  }
});

router.register('/token-manager', {
  content: assetsBaseUrl + '/html-partials/token-manager.html',
  logic: () => {
    let tokenManager = new TokenManagerApp(tokenStorage.load());

    tokenManager.run();
  }
});

window.addEventListener('load', () => {
  router.start();
});


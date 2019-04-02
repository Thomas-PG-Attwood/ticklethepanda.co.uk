export { TokenClient };

const authApiBase = document.documentElement.dataset.urlApiAuth;

class TokenClient {
  fetchToken(username, password) {
    let headers = new Headers();
    headers.append('Authorization', 'Basic ' + btoa(username + ":" + password));

    let opts = {
      method: 'POST',
      mode: 'cors',
      headers: headers
    }

    let url = authApiBase + '/tokens/users';

    return fetch(url, opts)
      .then(response => {
        if (response.ok) {
          return response.text();
        } else {
          if (response.status === 401) {
            throw new Error('Unauthorized');
          } else {
            throw new Error('Unexpected error occured');
          }
        }
      });

  }
}

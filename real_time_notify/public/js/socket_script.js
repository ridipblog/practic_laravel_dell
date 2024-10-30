import Echo from 'laravel-echo'
import io from 'socket.io-client'

window.Echo = new Echo({
  broadcaster: 'socket.io',
  host: window.location.hostname + ':6001', // Adjust the port if necessary
  namespace: 'App.Events'
})

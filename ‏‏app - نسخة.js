/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');



 window.Vue = require('vue').default;
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
 });
  
 window.Echo.private(`App.Models.User.${userId}`) 
 .notification(function(data){
     alert(data.body)
      $('#session-notification').prepend(` <li> <a href="${data.url}?notify_id=${data.id}&user_id=${userId}">
      <p class="font-12"> ${data.title} </p>
          <p class="font-12"> <strong>*</strong>  ${data.body}  </p>
          </a>
      </li>`);
      let count = Number($('#counnotification').text())
      count++;
      if (count > 99){
         count = '99+'
      }
      $('#counnotification').text(count)
 }) 
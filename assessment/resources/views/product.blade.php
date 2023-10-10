<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Publish an event to channel <code>my-channel</code>
    with event name <code>my-event</code>; it will appear below:
  </p>
  <br><br>
  <div>
      <form>
      <input type="file" name="file" id="file"/>
        
      </form>
  </div>
    <br><br>

  <div>
      <table>
  <tr>
    <th>Time</th>
    <th>File Name</th>
    <th>Status</th>
  </tr>
  <tbody id="real-data">
 <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  </tbody>
 
</table>
  </div>
  <div id="app">
    <ul>
      <li v-for="message in messages">
      </li>
    </ul>
  </div>

  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('91d25b044c9e3fd10efc', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('notification');
    channel.bind('Notification', function(data) {

        console.log("data==>",data);
      app.messages.push(JSON.stringify(data));
    });

    // Vue application
    const app = new Vue({
      el: '#app',
      data: {
        messages: [],
      },
    });
  </script>
</body>
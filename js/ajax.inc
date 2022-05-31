<section id="output"></section>

<script>
    // Only to display messages from Worker-Supervisor

    $(document).ready(function() {

    var outputTarget = document.getElementById('output');
    outputTarget.innerHTML = '';

      $.ajax({
        type: "GET",
        url: "data.txt",
        dataType: "text",
        success: function(data) {processData(data)}
      });

      function processData(data) {

        var outputTarget = document.getElementById('output');
        outputTarget.innerHTML = data;

        $('html,body').animate({scrollTop: document.body.scrollHeight},"fast");
      }
    });
</script>

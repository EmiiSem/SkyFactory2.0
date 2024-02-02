(function () {
  $("#login_form").on("submit", function (e) {
    let eForm = $("form#login_form");
    let eMessage = eForm.find(".message").get(0);

    if (!!eMessage) {
      $(eMessage).remove();
    }

    var dataString = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "/api/auth/login",
      data: dataString,
      error: function (error) {
        let message = JSON.parse(error?.responseText)?.message || "";

        $(eForm).append(`
          <div class="message error">
            ${message}
          </div>
        `);
      },
    });

    e.preventDefault();
  });

  $("#register_form").on("submit", function (e) {
    let eForm = $("form#register_form");
    let eMessage = eForm.find(".message").get(0);

    if (!!eMessage) {
      $(eMessage).remove();
    }

    var dataString = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "/api/auth/register",
      data: dataString,
      success: function (response) {
        console.log(response);
      },
      error: function (error) {
        let message = JSON.parse(error?.responseText)?.message || "";
        let parsed = message.replaceAll(/\n/g, "<br/>");

        $(eForm).append(`
          <div class='message error'>
            ${parsed}
          </div>
        `);
      },
    });

    e.preventDefault();
  });
})();

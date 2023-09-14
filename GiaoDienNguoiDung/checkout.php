<link rel="stylesheet" href="stylecheckout.css">
<div class="modal fade" id="modal-main"  tabindex="-1" role="dialog" data-backdrop="false" >
  <section id="left">
    <div id="head">
      <h1>Life has great moments</h1>
      <p>Enjoy them with Poster!</p>
    </div>
    <h3>Only 9.99$</h3>
  </section>
  <section id="right">
    <h1>Purchase</h1>
    <form action="process_checkout.php" method="Post">
      <div id="form-card" class="form-field">
        <label for="cc-number">Name:</label>
        <input id="cc-number" maxlength="19" placeholder="Ex: Tai Smile " name="name_receiver" required>
      </div>
      <div id="form-sec-code" class="form-field">
        <label for="sec-code">Adress:</label>
        <input type="text" maxlength="200" placeholder="house 123 street A street B" name="address_receiver" required>
        <br>
        <label for="sec-code">Phone Number:</label>
        <input type="text" maxlength="13" placeholder="012334..." name="phone_receiver" required>
      </div>
      <button >order now</button>
    </form>
  </section>
</div>
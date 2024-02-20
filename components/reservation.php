<!-- reservation.php -->
<fieldset id="reservation">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" required>
      <h3>Réservation(s) en tarif réduit</h3>
      <input type="checkbox" name="tarifReduit" id="tarifReduit">
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <h3>Choisissez votre formule :</h3>
      <input type="checkbox" name="passSelection" id="pass1jour">
      <label for="pass1jour">Pass 1 jour : 40€</label>

      <!-- Si case cochée, afficher le choix du jour -->
      <section id="pass1jourDate">
        <input type="checkbox" name="passSelection" id="choixJour1">
        <label for="choixJour1">Pass pour la journée du 01/07</label>
        <input type="checkbox" name="passSelection" id="choixJour2">
        <label for="choixJour2">Pass pour la journée du 02/07</label>
        <input type="checkbox" name="passSelection" id="choixJour3">
        <label for="choixJour3">Pass pour la journée du 03/07</label>
      </section>

      <input type="checkbox" name="passSelection" id="pass2jours">

      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate">
        <input type="checkbox" name="passSelection" id="choixJour12">
        <label for="choixJour1">Pass pour deux journées du 01/07 au 02/07</label>
        <input type="checkbox" name="passSelection" id="choixJour23">
        <label for="choixJour2">Pass pour deux journées du 02/07 au 03/07</label>
      </section>

      <label for="pass2jours">Pass 2 jours : 70€</label>
      <input type="checkbox" name="passSelection" id="pass3jours">
      <label for="pass3jours">Pass 3 jours : 100€</label>
      <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
      <input type="checkbox" name="passSelection" id="pass1jour">
      <label for="pass1jour">Pass 1 jour : 25€</label>
      <input type="checkbox" name="passSelection" id="pass2jours">
      <label for="pass2jours">Pass 2 jours : 50€</label>
      <input type="checkbox" name="passSelection" id="pass3jours">
      <label for="pass3jours">Pass 3 jours : 65€</label>

      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

      <p class="bouton" onclick="suivant('options')">Suivant</p>
    </fieldset>
    
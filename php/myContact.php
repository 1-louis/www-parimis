

<?php
     require_once('../php/header.php');
?>

<section id="contact">
        <div class="divider"></div>
        <div class="heading">
            <h2>Contactez</h2>
        </div>
        <div class="white-divider"></div>

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form id="contact-form" method="post" action="" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">Prénom <span class="blue">*</span></label>
                            <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Nom <span class="blue">*</span></label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email <span class="blue">*</span></label>
                            <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Téléphone</label>
                            <input id="phone" type="tel" name="phone" class="form-control" placeholder="Votre Téléphone">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-12">
                            <label for="message">Message <span class="blue">*</span></label>
                            <textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="4" charset="utf-8"></textarea>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-12">
                            <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                        </div>
                        <div class="col-md-12" id="envoyer">
                            <input type="submit" class="button1" value="Envoyer">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>


    <?php
    require_once('../php/footer.php');
    
    ?>
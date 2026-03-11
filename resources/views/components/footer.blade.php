<footer class="footer">
    <div class="container">
        <div class="footer__columns">
            <div class="footer__column footer__column--centered">
                <a href="#" class="footer__logo">EasyLecture</a>
                <p class="footer__description">Lire, découvrir, vendre <br> Directement ici</p>
            </div>
            <div class="footer__column">
                <nav>
                    <ul class="footer__links">
                        <p class="footer__title">Pages</p>
                        <li><a href="{{ url('/') }}" class="footer__link">Accueil</a></li>
                        <li><a href="{{ url('/boutique') }}" class="footer__link">Boutique</a></li>
                        <li><a href="{{ url('/contact') }}" class="footer__link">Contact FAQ</a></li>
                        <li><a href="{{ url('/login') }}" class="footer__link">Login</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer__column">
                <nav>
                    <ul class="footer__links">
                        <p class="footer__title">Informations</p>
                        <li><a href="{{ url('/mentions-legales') }}" class="footer__link">Mention Légale</a></li>
                        <li><a href="#" class="footer__link">Condition Général de Ventes</a></li>
                        <li><a href="#" class="footer__link">Protection des données</a></li>
                        <li><a href="#" class="footer__link">Gestion des Cookie</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer__column">
                <ul class="footer__links">
                    <p class="footer__title">La NewsLetter</p>
                    <p class="footer__paragraph">2 fois par semaines, de nouvelle histoire à decouvrir</p>
                    <div class="footer__newsletter">
                        <input class="footer__nav-input" type="text" placeholder="Email"></input>
                        <button class="button__footer">S'inscrire</button>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</footer>
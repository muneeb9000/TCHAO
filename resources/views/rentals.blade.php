<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- slick links -->
<link rel="stylesheet" type="text/css" href="{{ asset('main/css/slick/slick.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('main/css/slick/slick-theme.css')}}" />
<link rel="stylesheet" href="{{ asset('main/css/styles.css')}}" />
<title>Tchao Tchao</title>
<style>
    .custom-field {
        
        padding: 0.5rem; /* Tailwind: p-2 */
        border-radius: 0.5rem; /* Tailwind: rounded-lg */
        border: 1px solid #e5e7eb; /* Tailwind: border-gray-300 */
        width: 100%; /* Full width */
        font-size: 1rem; /* Consistent font size */
        color: #374151; /* Text color */
        outline: none; /* Remove default outline */
        box-shadow: none; /* Remove default box-shadow */
    }

    .custom-field:focus {
       
        box-shadow: 0 0 0 3px rgba(233, 84, 186, 0.3); /* Focus shadow */
    }

    .custom-field::-webkit-calendar-picker-indicator {
        filter: invert(35%) sepia(62%) saturate(1548%) hue-rotate(260deg) brightness(92%) contrast(101%);
    }

    .custom-button {
        background-color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
        font-size: 1rem;
        color: #374151;
        cursor: pointer;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .custom-button:hover {
        border-color: #d946ef;
    }

    .custom-button:focus {
        outline: none;
        border-color: #d946ef;
        box-shadow: 0 0 0 3px rgba(233, 84, 186, 0.3);
    }

    .custom-field::placeholder {
        color: #9ca3af; /* Placeholder text color (Tailwind: text-gray-400) */
    }

    /* Specific styles for the select field to make it look like input */
    .custom-field {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-position: right 1rem center;
        background-repeat: no-repeat;
        background-image: url('data:image/svg+xml;charset=US-ASCII,<svg%20xmlns="http://www.w3.org/2000/svg"%20width="10"%20height="10"%20viewBox="0%200%2010%2010"><polygon%20points="0,0%2010,0%205,5"></polygon></svg>');
    }

    /* Ensuring select looks like input, adding padding for custom arrow */
    select.custom-field {
    
        padding-right: 2.5rem; /* Add space for the custom dropdown arrow */
    }
</style>
 </head>
    <body>

    <!-- header start -->
    <header>
      <div class="container">
      <div class="logo">
         <a  href="{{ route('home')}}" onclick="showSection('home')"> <img src="{{ asset('main/imgs/logo.png')}}" alt="Logo" /></a>
        </div>
        <div class="hamburger">
          <div class="bar"></div>
            <div class="bar"></div>
              <div class="bar"></div>
        </div>
        <nav>
        <ul class="nav-links">
    <li class="nav-item">
        <a href="{{ route('rentals.create') }}" onclick="showSection('contact')">
            <button class="secondary">Envie de proposer</button>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home') }}" onclick="showSection('contacts')">
            <button class="btn">Besoin de rechercher</button>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home') }}" onclick="showSection('home')">Home</a>
    </li>
    <li class="nav-item">
        <a href="#howitswork" onclick="showSection('howitswork')">How It Works</a>
    </li>

    @if (Auth::check())
        <!-- Display the username as a link to the dashboard for authenticated users -->
        <li class="nav-item">
            <a href="{{ route('customer_dashboard') }}">{{ Auth::user()->name }}</a>
        </li>
    @else
        <!-- Display Registration and Login for guests -->
        <li class="nav-item">
            <a href="{{ route('showregister') }}" onclick="showSection('contact')">Registration</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('showlogin') }}" onclick="showSection('contacts')">Login</a>
        </li>
    @endif
</ul>

        </nav>
      </div>
    </header>
     <!-- header end -->
     
     <div class="blogs">
    <div class="container">
        <div class="bar"></div>
        <h3 style="margin: 150px 0 20px; color: #374151;">Les dernières Annonces</h3> <!-- Added 50px top margin -->
        <div class="blogWrap" style="display: flex; flex-wrap: wrap; gap: 20px;">
            @foreach($rentals as $rental)
                <div class="rental-item" style="flex: 1 1 calc(33.33% - 20px); margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
                    <a href="{{ route('rentals.show', $rental->id) }}" style="text-decoration: none; color: inherit;">
                        @if($rental->rental_property_pictures)
                            <img src="{{ asset('images/rentals/' . $rental->rental_property_pictures) }}" alt="{{ $rental->rental_name }}" style="width: 100%; height: 200px; object-fit: cover;">
                        @else
                            <p>No image available</p>
                        @endif
                        <p>From {{ $rental->each_person_price }} € / Per Person</p>
                        <h5>{{ $rental->rental_name }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>


      <!-- how its wrok start -->
       <section id="howitswork" class="howitswork section">
        <div class="container">
          <h1>How its Work</h1>
          <div class="textWrap">
            <div class="left">
              <strong class="title">Je propose une location classique ou à partager</strong>
              <div class="text">
                <strong>1</strong>
                <span>RAPIDE :<br/>
                  Pour les Hébergeurs (Tchahôte)<br/>
                  Onglet " Envie de proposer puis proposer votre location "<br/>
                  Je créé mon annonce et je la publie.</span>
                  <strong>2</strong>
                  <span>Les colocataires réservent directement en ligne, je suis libre d'accepter ou de refuser une demande</span>
              </div>
            </div>
            <div class="right">
              <strong class="title">Je recherche une location à partager et des colocataires</strong>
              <div class="text">
                <strong>1</strong>
                <span>RAPIDE :<br/>
                  Pour les Hébergeurs (Tchahôte)<br/>
                  Onglet " Envie de proposer puis proposer votre location "<br/>
                  Je créé mon annonce et je la publie.</span>
                  <strong>2</strong>
                  <span>Les colocataires réservent directement en ligne, je suis libre d'accepter ou de refuser une demande</span>
              </div>
            </div>
          </div>
        </div>
       </section>
      <!-- how its work end -->
       
       
       <!-- faq start -->
       <section id="faq" class="faq section">
        <div class="container">
          <h1>Frequently Asked Questions</h1>
      
          <div class="faq-item active">
            <h3 class="faq-question">What is your return policy?</h3>
            <div class="faq-answer">
              <p>Our return policy allows returns within 30 days of purchase, provided that the items are in original condition.</p>
            </div>
          </div>
      
          <div class="faq-item">
            <h3 class="faq-question">How long does shipping take?</h3>
            <div class="faq-answer">
              <p>Shipping takes 3-5 business days for standard deliveries.</p>
            </div>
          </div>
      
          <div class="faq-item">
            <h3 class="faq-question">What payment methods do you accept?</h3>
            <div class="faq-answer">
              <p>We accept all major credit cards, PayPal, and Apple Pay.</p>
            </div>
          </div>
        </div>
      </section>
       <!-- faq end -->
        <!-- cookies start -->
         <section id="cookies" class="cookies section">
          <div class="contianer">
            <h1>Cookies</h1>
            <p>Lors de sa première visite sur le Site, le Visiteur ou l’Utilisateur est amené à installer des cookies sur son périphérique de connexio </p>
            <p>Les cookies sont des fichiers informatiques installés sur le disque dur d’un périphérique, utilisés par le Site pour envoyer des informations au navigateur du Visiteur ou de l’Utilisateur et permettant à ce navigateur de renvoyer des informations au Site (par exemple un identifiant de session, le choix d’une langue ou une date).</p>
            <p>TCHAO TCHAO peut être amené à utiliser trois types de cookies :

              - Les Cookies fonctionnels obligatoires, nécessaires au bon fonctionnement du Site, Fonctionnalités ou Services de TCHAO TCHAO ;
              
              - Les Cookies statistiques qui permettent à TCHAO TCHAO de collecter des informations relatives à l’utilisation faite du Site afin d’en améliorer l’ergonomie et les services.</p>
              <p>Les données générées par les Cookies concernent l’utilisation faite du Site par le Visiteur ou l’Utilisateur.</p>
              <p>Lorsque le Visiteur ou l’Utilisateur accède au Site, un bandeau l’informant de la finalité des Cookies utilisés, de la possibilité de personnaliser ses préférences et du fait que la poursuite de sa navigation vaut accord apparaît.</p>
              <p>La durée de consentement est au maximum de 13 mois et dépend du Cookie utilisé :</p>
              <table>
                <thead>
                  <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                    <th>Header 3</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Row 1, Column 1</td>
                    <td>Row 1, Column 2</td>
                    <td>Row 1, Column 3</td>
                  </tr>
                  <tr>
                    <td>Row 2, Column 1</td>
                    <td>Row 2, Column 2</td>
                    <td>Row 2, Column 3</td>
                  </tr>
                  <tr>
                    <td>Row 3, Column 1</td>
                    <td>Row 3, Column 2</td>
                    <td>Row 3, Column 3</td>
                  </tr>
                </tbody>
              </table>
              <p>TCHAO TCHAO rappelle qu’il est conseillé au Visiteur ou à l’Utilisateur de supprimer régulièrement les Cookies de son terminal via son navigateur et qu’à ce titre plusieurs options sont possibles. </p>
              <p>Le Visiteur ou l’Utilisateur peut en effet paramétrer le navigateur de ses différents terminaux afin d’accepter tous les cookies, ou de les rejeter ou encore de choisir ceux qu’il choisit d’accepter ou de refuser selon l’émetteur ou, au cas par cas, préalablement à l’installation des Cookies.</p>
          </div>
         </section>
        <!-- cookies end -->
        <!-- terms start -->
         <section id="terms" class="terms section" >
          <div class="container">
            <h1>Conditions and Terms</h1>
            <div class="term">
              <p>Les présentes Conditions Générales d’Utilisation (ci-après désignées « CGU ») régissent l’accès au Site qui y est proposé aux Utilisateurs. En utilisant le Site, vous accepterez sans réserve ces CGU, la Politique de confidentialité et les Mentions légales de TCHAO TCHAO</p>
              <h3>Article 1 - Définitions</h3>
              <p> <strong> Annonce :</strong> désigne toute annonce de mise en location d’un logement pour une courte durée ou toute annonce de recherche de location de logement pour une courte durée.
             </p>
             <p> <strong>Annonceur : </strong> désigne l’Utilisateur publiant une Annonce sur le Site.</p>
             <p><strong>Compte :</strong> désigne l’espace personnel de l’Utilisateur lui permettant d’accéder et d’utiliser les Fonctionnalités du Site. désigne l’espace personnel de l’Utilisateur lui permettant d’accéder et d’utiliser les Fonctionnalités du Site.</p>
             <p> <strong>Annonceur : </strong> désigne l’Utilisateur publiant une Annonce sur le Site.</p>
             <p><strong>Compte :</strong> désigne l’espace personnel de l’Utilisateur lui permettant d’accéder et d’utiliser les Fonctionnalités du Site. désigne l’espace personnel de l’Utilisateur lui permettant d’accéder et d’utiliser les Fonctionnalités du Site.</p>
             <h3>Article 2 – Objet</h3>
              <p> Ces CGU ont pour objet de définir les conditions d’accessibilité et d’utilisation du Site.
             </p>
             <p> Elles ont pour objet d’accorder à l’Utilisateur un droit personnel, non cessible et non exclusif, d’accès et d’utilisation du Site mis à disposition de l’Utilisateur à titre gracieux par TCHAO TCHAO suite à son Inscription</p>
             <p><strong>Compte :</strong> désigne l’espace personnel de l’Utilisateur lui permettant d’accéder et d’utiliser les Fonctionnalités du Site. désigne l’espace personnel de l’Utilisateur lui permettant d’accéder et d’utiliser les Fonctionnalités du Site.</p>
           <h3>Article 3 – Acceptation des CGU</h3>
           <p>En accédant ou en utilisant le Site, le Visiteur ou l’Utilisateur accepte sans réserve ces CGU.</p>
           <p>TCHAO TCHAO peut procéder à la mise à jour de ces CGU à tout moment.</p>
           <p>Si le Visiteur ou l’Utilisateur n’accepte pas les modifications apportées à ces CGU, il doit cesser toute utilisation du Site.</p>
            </div>
          </div>
         </section>
        <!-- terms end -->
        <!--help center start -->
        <section id="helpcenter" class="helpcenter section">
          <div class="container">
            <h1>Help Center</h1>
            <p>Welcome to our Help Center. Find the answers to your questions or contact our support team.</p>
        
            <h3>FAQs</h3>
            <ul>
              <li><a href="#">How do I reset my password?</a></li>
              <li><a href="#">What is your return policy?</a></li>
              <li><a href="#">How can I track my order?</a></li>
            </ul>
        
            <h3>Contact Support</h3>
            <p>Need more help? Reach us at <a href="mailto:support@example.com">support@example.com</a> or call 1-800-123-4567.</p>
        
            <h3>User Guides</h3>
            <p><a href="#">View our step-by-step user guides</a> to help you get started.</p>
        
            <h3>Troubleshooting</h3>
            <p><a href="#">Common issues</a> and how to resolve them.</p>
        
            <h3>Billing</h3>
            <p><a href="#">Learn about billing, payments, and refunds.</a></p>
          </div>
        </section>
        <!-- help center end -->
         <!-- user guides start -->
         <section id="userguides" class="userguides section">
          <div class="container">
            <h1>User Guides</h1>
            <p>Welcome to our User Guides section. Below, you'll find comprehensive information to help you get the most out of our platform.</p>
            
            <p><strong>1. Getting Started:</strong> This guide will walk you through setting up your account, basic navigation, and configuring essential settings. It’s perfect for new users just getting acquainted with the platform.</p>
            
            <p><strong>2. Profile Customization:</strong> Learn how to personalize your profile by adding a profile picture, updating your information, and managing your preferences to match your individual style.</p>
            
            <p><strong>3. Order Management:</strong> Understand how to view your order history, track ongoing orders, edit current orders, and cancel if necessary, ensuring smooth transactions.</p>
            
            <p><strong>4. Advanced Features:</strong> Dive into our more sophisticated features, such as integrating third-party tools, customizing workflows, and using analytics for better decision-making.</p>
          </div>
        </section>
         <!-- user guides end -->
       <!-- footer start -->
    <footer>
      <div class="footer-container">
        <div class="footer-section">
          <h3>INFORMATIONS</h3>
          <div class="underline"></div>
          <ul>
            <li><a href="mailto:contact@tchaotchao.fr">N'hésitez pas à nous écrire à contact@tchaotchao.fr</a></li>
            <li><a href="{{ route('home')}}" onclick="showSection('home')">Home</a></li>
            <li><a href="#howitswork" onclick="showSection('howitswork')">How its Work</a></li>
         
            <li><a href="#faq"  onclick="showSection('faq')">FAQ</a></li>
          </ul>
        </div>
 
        <div class="footer-section">
          <h3>USEFUL LINKS</h3>
          <div class="underline"></div>
          <ul>
            <li><a href="#terms" onclick="showSection('terms')">Conditions and Terms</a></li>
            <li><a href="#userguides" onclick="showSection('userguides')">User Guides:</a></li>
            <li><a href="#helpcenter" onclick="showSection('helpcenter')">Help Center</a></li>
            <li><a href="#cookies" onclick="showSection('cookies')">Cookies</a></li>
          </ul>
        </div>
  
        <div class="footer-section">
          <h3>SOCIAL LINKS</h3>
          <div class="underline"></div>
          <div class="social-icons">
            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        © 2024 TchaoTchao - Tous droits réservés
      </div>
    </footer>
     <!-- footer end -->
     <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
     <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('main/js/script.js')}}"></script>
  </body>
</html>

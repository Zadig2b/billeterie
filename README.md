En tant que dev full stack vous créerez le formulaire d'inscription et tout le nécessaire front, aussi bien que le traitement et l'enregistrement des données en back. 
Le site souhaite créer sa propre billetterie plutôt que de passer par un site tiers. Il s'agira de faire une interface pour prendre les réservations des festivaliers, les enregistrer en BDD, et faire en sorte que chacun puisse consulter et modifier certaines choses dans leur réservation ou l'annuler, et que les admins puissent toutes les voir. Le formulaire sera complet, sur plusieurs pages, afin d'affiner les questions auprès des festivaliers et leur proposer la meilleure expérience !


Contexte du projet
En tant que developpeur full stack, vous utiliserez le HTML fourni en lui ajoutant de JS et du CSS, 

puis vous réaliserez le traitement et l'enregistrement des données en back.

​

COTÉ FRONT

Vous devez mettre en forme et animer les sections, pour les faire apparaitre au clic sur suivant.

DONE

- vérifier la valeur des champs avant soumission

EN COURS


- animer les transitions des questions, ...
- Faire une page admin, depuis laquelle on pourra voir la liste de toutes les réservations.
​

COTÉ BACK

Vous recevez les données en post, 
- vous devez les analyser avant toute utilisation en back (sécurité, formatage, ...)
- Si le formulaire n'est pas complet, on le renvoie, avec les informations qu'on a quand même reçues, pour éviter que l'utilisateur doivent tout reremplir. (Il faudra donc modifier le HTML donné).

- Vous traiterez les données reçues, et lorsque tout le formulaire sera rempli et soumis, alors vous l'enregistrerez dans un fichier CSV.

Une fois que tout est validé, vous renvoyez à l'utilisateur un message récapitulatif avec ses informations choisies, et le total du prix à payer.
faire ceci dans index.php. ceci doit être fait une fois que ajouterReservationAuCSV a été un succès
 dans reservation.php ajouter le code necessaire pour faire appel à "displaySuccessMessage" dans index.php, qui exécutera le code responsable pour afficher le message à l'utilisateur. 
créer la fonction "displaySuccessMessage" dans index.php pour afficher le message à l'utilisateur

- En JS, animer le formulaire pour voir les sections une par une.
DONE
- l'enregistrement se fait après vérification et traitement des données reçues.
DONE
- l'utilisateur est notifié tout au long de son parcours des éventuelles erreurs ou succès de sa soumission
DONE
- Le travail est documenté.
- le formulaire fonctionnel sera mis en ligne
